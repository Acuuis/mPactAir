<?php

namespace WP_Shopify\API\Items;

use WP_Shopify\Messages;
use WP_Shopify\Utils;
use WP_Shopify\Utils\Data as Utils_Data;

if (!defined('ABSPATH')) {
    exit();
}

class Customers extends \WP_Shopify\API
{
    public function __construct(
        $DB_Settings_General,
        $DB_Settings_Syncing,
        $Shopify_API,
        $Processing_Customers,
        $DB_Customers,
        $DB_Settings_Connection,
        $Storefront_Customers,
        $Admin_Customers
    ) {
        $this->DB_Settings_General = $DB_Settings_General;
        $this->DB_Settings_Syncing = $DB_Settings_Syncing;
        $this->Shopify_API = $Shopify_API;
        $this->Processing_Customers = $Processing_Customers;
        $this->DB_Customers = $DB_Customers;
        $this->DB_Settings_Connection = $DB_Settings_Connection;
        $this->Storefront_Customers = $Storefront_Customers;
        $this->Admin_Customers = $Admin_Customers;
    }

    /*

	Get Collections Count

	*/
    public function get_customers_count($request)
    {
        $response = $this->Shopify_API->get_customers_count();

        return $this->handle_response([
            'response' => $this->Shopify_API->pre_response_check($response),
            'access_prop' => 'count',
            'return_key' => 'customers',
            'warning_message' => 'customers_count_not_found',
        ]);
    }

    /*

	Get Customers

	Runs for each "page" of the Shopify API

	*/
    public function get_customers($request)
    {
        $page = $request->get_param('page');

        if (!is_integer($page)) {
            return $this->handle_response([
                'response' => Utils::wp_error([
                    'message_lookup' => 'Page is not of type integer',
                    'call_method' => __METHOD__,
                    'call_line' => __LINE__,
                ]),
            ]);
        }

        $page = sanitize_text_field($page);

        // Grab customers from Shopify
        $param_limit = $this->DB_Settings_General->get_items_per_request();
        $param_status = 'any';

        $response = $this->Shopify_API->get_customers_per_page(
            $param_limit,
            $param_status
        );

        return $this->handle_response([
            'response' => $this->Shopify_API->pre_response_check($response),
            'access_prop' => 'customers',
            'return_key' => 'customers',
            'warning_message' => 'missing_customers_for_page',
            'process_fns' => [$this->Processing_Customers],
        ]);
    }

    /*
   
   Docs: https://help.shopify.com/en/api/storefront-api/reference/mutation/customerrecover

   */
    public function customers_reset_password($request)
    {
        $creds = $request->get_body();

        $creds_decoded = json_decode($creds);
        $email = sanitize_email($creds_decoded->email);

        $response = $this->Storefront_Customers->recover_password($email);

        if (!empty($response->customerRecover->userErrors)) {
            return $this->send_error(
                $response->customerRecover->userErrors[0]->message
            );
        }

        if (is_wp_error($response)) {
            return $this->send_error($response);
        }

        return $response;
    }

    public function customers_set_password($request)
    {
        $creds = $request->get_body();

        $creds_decoded = json_decode($creds);

        $customer_id = $creds_decoded->customerId;
        $reset_token = $creds_decoded->resetToken;
        $password = $creds_decoded->password;

        $response = $this->Storefront_Customers->reset_customer_password(
            $customer_id,
            $reset_token,
            $password
        );

        if (is_wp_error($response)) {
            return $this->send_error($response);
        }

        $user_id = $this->DB_Customers->get_user_id_from_customer_id(
            $customer_id
        );

        $new_access_token =
            $response->customerReset->customerAccessToken->accessToken;

        $updated_customers_table_result = $this->DB_Customers->update_column_single(
            ['access_token' => $new_access_token],
            ['user_id' => $user_id]
        );

        // Shopify updated successfully. Now update WordPress.
        $user_update_result = wp_update_user([
            'ID' => $user_id,
            'user_pass' => $password,
        ]);

        // There was an error, probably that user doesn't exist.
        if (is_wp_error($user_update_result)) {
            return $this->send_error($user_update_result);
        } else {
            return $response;
        }
    }

    public function set_user_meta($user_id)
    {
        $user = new \WP_User($user_id);

        return $user->set_role('wpshopify_customer');
    }

    public function customers_register($request)
    {
        $creds = $request->get_body();

        $creds_decoded = json_decode($creds);

        $email = sanitize_email($creds_decoded->email);
        $username = sanitize_user($creds_decoded->username);
        $password = $creds_decoded->password;

        if (username_exists($username)) {
            return $this->send_error(
                'An existing user was found with that username. Please use a different username or <a href="/login">login instead</a>.'
            );
        }

        if (email_exists($email)) {
            return $this->send_error(
                'An existing user was found with that email. Please use a different email or <a href="/login">login instead</a>.'
            );
        }

        // At this point we know the user doesn't exist within WordPress. We should now call the Shopify API.
        $response = $this->Storefront_Customers->create_customer(
            $creds_decoded->email,
            $creds_decoded->password
        );

        if (is_wp_error($response)) {
            return $this->send_error($response);
        }

        if (empty($username)) {
            $username = $email;
        }

        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            return $this->send_error($user_id);
        }

        // $user = new \WP_User($user_id);
        // $user->set_role('wpshopify_customer');

        $this->set_user_meta($user_id);

        $insert_result = $this->DB_Customers->insert_customer([
            'customer_id' => $this->DB_Customers->get_rest_id_from_graph_id(
                $response->customerCreate->customer->id
            ),
            'email' => $email,
            'user_id' => $user_id,
        ]);

        // $login_result = wp_signon($creds, is_ssl());

        // if (is_wp_error($login_result)) {

        //    return $this->handle_response([
        //       'response' => Utils::wp_error([
        //          'message_lookup' 	=> $this->normalize_login_errors($login_result)
        //       ])
        //    ]);
        // }

        return $response;
    }

    public function customers_update_address($request)
    {
        $creds = $request->get_body();

        $creds_decoded = json_decode($creds);

        $new_address = $creds_decoded->address;
        $set_default_address = $new_address->setDefault;
        $address_id = sanitize_text_field($creds_decoded->addressId);
        $user_id = get_current_user_id();

        // Throw this away since we don't need it
        unset($new_address->setDefault);

        $customer_access_token_resp = $this->DB_Customers->get_customer_access_token_from_user_id(
            $user_id
        );

        if (empty($customer_access_token_resp)) {
            return $this->send_error(
                'Customer access token is empty while editing address. Please try again.'
            );
        } else {
            $customer_access_token = $customer_access_token_resp;
        }

        $response_update_address = $this->Storefront_Customers->update_customer_address(
            $customer_access_token,
            $address_id,
            $new_address
        );

        if (is_wp_error($response_update_address)) {
            return $this->send_error($response_update_address);
        }

        if (!empty($set_default_address)) {
            $response_set_default = $this->Storefront_Customers->update_customer_default_address(
                $customer_access_token,
                $address_id
            );

            if (is_wp_error($response_set_default)) {
                return $this->send_error($response_set_default);
            }
        } else {
            $response_set_default = false;
        }

        return [
            'updateAddress' => $response_update_address,
            'updateDefaultAddress' => $response_set_default,
        ];
    }

    public function customers_add_address($request)
    {
        $creds = $request->get_body();

        $creds_decoded = json_decode($creds);

        $new_address = $creds_decoded->address;
        $set_default_address = $new_address->setDefault;

        $user_id = get_current_user_id();

        // Throw this away since we don't need it
        unset($new_address->setDefault);

        $customer_access_token_resp = $this->DB_Customers->get_customer_access_token_from_user_id(
            $user_id
        );

        if (empty($customer_access_token_resp)) {
            return $this->send_error(
                'Customer access token while adding address is empty. Please try again.'
            );
        } else {
            $customer_access_token = $customer_access_token_resp;
        }

        $response_add_address = $this->Storefront_Customers->add_customer_address(
            $customer_access_token,
            $new_address
        );

        if (is_wp_error($response_add_address)) {
            return $this->send_error($response_add_address);
        }

        if (!empty($set_default_address)) {
            $response_set_default = $this->Storefront_Customers->update_customer_default_address(
                $customer_access_token,
                $response_add_address->customerAddressCreate->customerAddress
                    ->id
            );

            if (is_wp_error($response_set_default)) {
                return $this->send_error($response_set_default);
            }
        } else {
            $response_set_default = false;
        }

        return [
            'addAddress' => $response_add_address,
            'addDefaultAddress' => $response_set_default,
        ];
    }

    public function customers_delete_address($request)
    {
        $creds = $request->get_body();

        $creds_decoded = json_decode($creds);

        $address_id = $creds_decoded->addressId;

        $user_id = get_current_user_id();

        $customer_access_token_resp = $this->DB_Customers->get_customer_access_token_from_user_id(
            $user_id
        );

        if (empty($customer_access_token_resp)) {
            return $this->send_error(
                'Customer access token while deleting address is empty. Please try again.'
            );
        } else {
            $customer_access_token = $customer_access_token_resp;
        }

        $response_delete_address = $this->Storefront_Customers->delete_customer_address(
            $customer_access_token,
            $address_id
        );

        if (is_wp_error($response_delete_address)) {
            return $this->send_error($response_delete_address);
        }

        return $response_delete_address;
    }

    public function normalize_access_token($access_token_resp)
    {
        if (!is_string($access_token_resp)) {
            return $access_token_resp->customerAccessTokenCreate
                ->customerAccessToken->accessToken;
        }

        return $access_token_resp;
    }

    public function build_user_args($email, $password)
    {
        return [
            'user_login' => $email,
            'user_password' => $password,
            'remember' => true,
        ];
    }

    public function login_wp_user($email, $password)
    {
        $args = $this->build_user_args($email, $password);

        return wp_signon($args, is_ssl());
    }

    public function has_user_row($email)
    {
        return $this->DB_Customers->select_in_col('user_id', 'email', $email);
    }

    public function insert_customer($access_token, $user_id, $email)
    {
        return $this->DB_Customers->insert_customer([
            'access_token' => $access_token,
            'user_id' => $user_id,
            'email' => $email,
        ]);
    }

    public function update_customer($access_token, $user_id)
    {
        return $this->DB_Customers->update_column_single(
            ['access_token' => $access_token],
            ['user_id' => $user_id]
        );
    }

    /*

	Get Customers

	Runs for each "page" of the Shopify API

	*/
    public function customers_login($request)
    {
        $creds = $request->get_body();
        $creds_decoded = json_decode($creds);
        $email = sanitize_email($creds_decoded->email);
        $password = $creds_decoded->password;

        $user = get_user_by('email', $email);

        /* 

      If empty user, this could mean that the user exists but they haven't yet logged into the WP site. So we need to
      check for a user within Shopify instead first.

      */
        if (empty($user)) {
            $customer_access_token_resp = $this->Storefront_Customers->create_customer_access_token(
                $email,
                $password
            );

            if (is_wp_error($customer_access_token_resp)) {
                return $this->send_error($customer_access_token_resp);
            }

            $customer_access_token = $this->normalize_access_token(
                $customer_access_token_resp
            );

            /*
         
         If we get a successful access token, then we know the user already exists inside Shopify. Now we need to add them to WP.

         */

            // Creates a new WP user
            $user_id = wp_create_user($email, $password, $email);

            if (is_wp_error($user_id)) {
                return $this->send_error($user_id);
            }

            // Sets the custom WPS user role
            $this->set_user_meta($user_id);

            // Logs the WP user into the system
            $login_result = $this->login_wp_user($email, $password);

            // Inserts the info into our custom table
            $insert_result = $this->insert_customer(
                $customer_access_token,
                $user_id,
                $email
            );

            return $customer_access_token;
        }

        /*
      
      User already exists, just need to log them in
      
      */
        $user_id = $user->data->ID;
        $customer_access_token_resp = $this->DB_Customers->get_customer_access_token_from_user_id(
            $user_id
        );

        /*
      
      A user was found within WP, but the custom access token is empty inside the DB. So we need to create a new one.
      
      */
        if (empty($customer_access_token_resp)) {
            $customer_access_token_resp = $this->Storefront_Customers->create_customer_access_token(
                $email,
                $password
            );

            if (is_wp_error($customer_access_token_resp)) {
                return $this->send_error($customer_access_token_resp);
            }
        }

        $customer_access_token = $this->normalize_access_token(
            $customer_access_token_resp
        );

        // If not error ... login the WP user ...
        $login_result = $this->login_wp_user($email, $password);

        if (is_wp_error($login_result)) {
            return $this->send_error(
                $this->normalize_login_errors($login_result)
            );
        }

        /*
      
      Even though the native WP user exists, we may not have a record in our custom table.
      
      */

        if (empty($this->has_user_row($email))) {
            $insert_result = $this->insert_customer(
                $customer_access_token,
                $user_id,
                $email
            );
        } else {
            $update_result = $this->update_customer(
                $customer_access_token,
                $user_id
            );
        }

        return $customer_access_token;
    }

    public function customers_get($request)
    {
        $user_id = $request->get_body();
        $user_id = (int) $user_id;

        if (empty($user_id)) {
            return $this->send_error('No user found. Please register first.');
        }

        $customer_access_token_resp = $this->DB_Customers->get_customer_access_token_from_user_id(
            $user_id
        );

        if (!is_string($customer_access_token_resp)) {
            if (empty($customer_access_token_resp)) {
                return $this->send_error(
                    'Customer access token is empty. Please try again.'
                );
            } else {
                $customer_access_token =
                    $customer_access_token_resp->customerAccessTokenCreate
                        ->customerAccessToken->accessToken;
            }
        } else {
            $customer_access_token = $customer_access_token_resp;
        }

        $response = $this->Storefront_Customers->get_customer(
            $customer_access_token
        );

        if (is_wp_error($response)) {
            return $this->send_error($response);
        }

        return $response;
    }

    public function normalize_login_errors($login_result)
    {
        if (property_exists($login_result, 'errors') && $login_result->errors) {
            if (
                \array_key_exists('incorrect_password', $login_result->errors)
            ) {
                return '<strong>Error</strong>: The login credentials you entered are incorrect. <a href="/forgot-password">Lost your password?</a>';
            }
        }

        return $login_result->get_error_message($login_result);
    }

    /*

	Register route: cart_icon_color

	*/
    public function register_route_customers_count()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customers/count',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'get_customers_count'],
                    'permission_callback' => [$this, 'pre_process'],
                ],
            ]
        );
    }

    public function register_route_customers_login()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customers/login',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'customers_login'],
                ],
            ]
        );
    }

    public function register_route_customers_get()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customer',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'customers_get'],
                ],
            ]
        );
    }

    /*

	Register route: cart_icon_color

	*/
    public function register_route_customers()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customers',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'get_customers'],
                    'permission_callback' => [$this, 'pre_process'],
                ],
            ]
        );
    }

    public function register_route_customers_reset_password()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customers/reset-password',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'customers_reset_password'],
                ],
            ]
        );
    }

    public function register_route_customers_set_password()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customers/set-password',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'customers_set_password'],
                ],
            ]
        );
    }

    public function register_route_customers_register()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customers/register',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'customers_register'],
                ],
            ]
        );
    }

    public function register_route_customers_update_address()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customers/address/update',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'customers_update_address'],
                ],
            ]
        );
    }

    public function register_route_customers_add_address()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customers/address/add',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'customers_add_address'],
                ],
            ]
        );
    }

    public function register_route_customers_delete_address()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/customers/address/delete',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'customers_delete_address'],
                ],
            ]
        );
    }

    function maybe_delete_wps_customer($user_id)
    {
        $user = get_user_by('id', $user_id);

        if ($this->DB_Customers->is_user_customer($user)) {
            $delete_result = $this->DB_Customers->delete_customer_by_user_id(
                $user_id
            );
        }
    }

    function block_customers_from_backend()
    {
        if (
            !$this->DB_Settings_General->get_col_value(
                'enable_customer_accounts',
                'bool'
            )
        ) {
            return;
        }

        $user = wp_get_current_user();

        if (is_admin() && $this->DB_Customers->is_user_customer($user)) {
            $slug = $this->DB_Settings_General->get_col_value(
                'account_page_account',
                'string'
            );

            wp_safe_redirect('/' . $slug);
            exit();
        }
    }

    public function init()
    {
        add_action('rest_api_init', [$this, 'register_route_customers_count']);
        add_action('rest_api_init', [$this, 'register_route_customers']);

    }

}

<?php

namespace WP_Shopify\API\Items;

use WP_Shopify\Messages;
use WP_Shopify\Utils;
use WP_Shopify\Utils\Data as Utils_Data;

if (!defined('ABSPATH')) {
    exit();
}

class Orders extends \WP_Shopify\API
{
    public function __construct(
        $DB_Settings_General,
        $DB_Settings_Syncing,
        $Shopify_API,
        $Processing_Orders
    ) {
        $this->DB_Settings_General = $DB_Settings_General;
        $this->DB_Settings_Syncing = $DB_Settings_Syncing;
        $this->Shopify_API = $Shopify_API;
        $this->Processing_Orders = $Processing_Orders;
    }

    /*

	Get Collections Count

	*/
    public function get_orders_count($request)
    {
        $response = $this->Shopify_API->get_orders_count('any');

        return $this->handle_response([
            'response' => $this->Shopify_API->pre_response_check($response),
            'access_prop' => 'count',
            'return_key' => 'orders',
            'warning_message' => 'orders_count_not_found',
        ]);
    }

    /*

	Get Orders

	Runs for each "page" of the Shopify API

	*/
    public function get_orders($request)
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

        // Grab orders from Shopify
        $param_limit = $this->DB_Settings_General->get_items_per_request();
        $param_status = 'any';

        $response = $this->Shopify_API->get_orders_per_page(
            $param_limit,
            $page,
            $param_status
        );

        return $this->handle_response([
            'response' => $this->Shopify_API->pre_response_check($response),
            'access_prop' => 'orders',
            'return_key' => 'orders',
            'warning_message' => 'missing_orders_for_page',
            'process_fns' => [$this->Processing_Orders],
        ]);
    }

    /*

	Register route: cart_icon_color

	*/
    public function register_route_orders_count()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/orders/count',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'get_orders_count'],
                    'permission_callback' => [$this, 'pre_process'],
                ],
            ]
        );
    }

    /*

	Register route: cart_icon_color

	*/
    public function register_route_orders()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/orders',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'get_orders'],
                    'permission_callback' => [$this, 'pre_process'],
                ],
            ]
        );
    }

    public function init()
    {
        add_action('rest_api_init', [$this, 'register_route_orders_count']);
        add_action('rest_api_init', [$this, 'register_route_orders']);
    }

}

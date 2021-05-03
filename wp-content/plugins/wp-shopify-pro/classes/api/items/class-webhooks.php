<?php

namespace WP_Shopify\API\Items;

if (!defined('ABSPATH')) {
    exit();
}

class Webhooks extends \WP_Shopify\API
{
    public function __construct(
        $DB_Settings_Syncing,
        $Webhooks,
        $Processing_Webhooks,
        $Processing_Webhooks_Deletions,
        $Shopify_API
    ) {
        $this->DB_Settings_Syncing = $DB_Settings_Syncing;
        $this->Webhooks = $Webhooks;
        $this->Processing_Webhooks = $Processing_Webhooks;
        $this->Processing_Webhooks_Deletions = $Processing_Webhooks_Deletions;
        $this->Shopify_API = $Shopify_API;
    }

    public function get_webhooks_count($request)
    {
        return [
            'webhooks' => count($this->Webhooks->default_topics()),
        ];
    }

    public function delete_webhooks($request)
    {
        $response = $this->Shopify_API->pre_response_check(
            $this->Shopify_API->get_webhooks()
        );

        return $this->handle_response([
            'response' => $response,
            'access_prop' => 'webhooks',
            'process_fns' => [$this->Processing_Webhooks_Deletions],
        ]);
    }

   
    public function register_webhooks($request)
    {
        if ($this->DB_Settings_Syncing->is_syncing()) {
            $this->Async_Processing_Webhooks->process($request);
        }
    }

    public function register_all_webhooks($request)
    {
        return $this->handle_response([
            'response' => $this->Webhooks->default_topics(),
            'warning_message' => 'webhooks_not_found',
            'process_fns' => [$this->Processing_Webhooks],
        ]);
    }

    public function register_route_webhooks_count()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/webhooks/count',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'get_webhooks_count'],
                    'permission_callback' => [$this, 'pre_process'],
                ],
            ]
        );
    }

  
    public function register_route_webhooks()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/webhooks',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'register_all_webhooks'],
                    'permission_callback' => [$this, 'pre_process'],
                ],
            ]
        );
    }

    public function register_route_webhooks_delete()
    {
        return register_rest_route(
            WP_SHOPIFY_SHOPIFY_API_NAMESPACE,
            '/webhooks/delete',
            [
                [
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => [$this, 'delete_webhooks'],
                    'permission_callback' => [$this, 'pre_process'],
                ],
            ]
        );
    }

    public function init()
    {
        add_action('rest_api_init', [$this, 'register_route_webhooks']);
        add_action('rest_api_init', [$this, 'register_route_webhooks_count']);
        add_action('rest_api_init', [$this, 'register_route_webhooks_delete']);
    }

}

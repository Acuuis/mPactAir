<?php

namespace WP_Shopify\Factories\Render\Collections;

if (!defined('ABSPATH')) {
    exit();
}

use WP_Shopify\Factories;
use WP_Shopify\Render\Collections\Defaults;

class Defaults_Factory
{
    protected static $instantiated = null;

    public static function build($plugin_settings = false)
    {
        if (is_null(self::$instantiated)) {
            self::$instantiated = new Defaults(
                Factories\Render\Attributes_Factory::build(),
                Factories\Render\Products\Defaults_Factory::build(
                    $plugin_settings
                ),
                $plugin_settings
            );
        }

        return self::$instantiated;
    }
}

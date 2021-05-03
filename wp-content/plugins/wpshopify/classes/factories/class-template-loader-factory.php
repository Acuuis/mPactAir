<?php

namespace WP_Shopify\Factories;

use WP_Shopify\Template_Loader;

if (!defined('ABSPATH')) {
    exit();
}

class Template_Loader_Factory
{
    protected static $instantiated = null;

    public static function build()
    {
        if (is_null(self::$instantiated)) {
            self::$instantiated = new Template_Loader();
        }

        return self::$instantiated;
    }
}

<?php

namespace WP_Shopify;

if (!defined('ABSPATH')) {
    exit();
}

class Template_Loader extends \WP_Shopify\Vendor_Template_Loader_Gamajo
{
    // Prefix for filter names.
    protected $filter_prefix = 'wps';

    // Directory name where custom templates for this plugin should be found in the theme.
    protected $theme_template_directory = 'wps-templates';

    protected $plugin_directory = WP_SHOPIFY_PLUGIN_DIR_PATH;

    /*

	Directory name where templates are found in this plugin.

	Can either be a defined constant, or a relative reference from where the subclass lives.

	e.g. 'templates' or 'includes/templates', etc.

	@since 1.1.0
	@var string

	*/
    protected $plugin_template_directory = WP_SHOPIFY_RELATIVE_TEMPLATE_DIR;

}

<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Woocommerce_Pdf_Invoices_Packing_Slips
 * @subpackage Woocommerce_Pdf_Invoices_Packing_Slips/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Woocommerce_Pdf_Invoices_Packing_Slips
 * @subpackage Woocommerce_Pdf_Invoices_Packing_Slips/includes
 * @author     multidots <mahesh.prajapati@multidots.com>
 */
class Woocommerce_Pdf_Invoices_Packing_Slips_Activator {

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate() {
        set_transient( '_welcome_screen_activation_redirect_data', true, 30 );
        if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')),true) && !is_plugin_active_for_network('woocommerce/woocommerce.php')) {
            wp_die("<strong> WooCommerce Product Attachment</strong> Plugin requires <strong>WooCommerce</strong> <a href='" . esc_url(get_admin_url(null, 'plugins.php')) . "'>Plugins page</a>.");
        }
    }
}

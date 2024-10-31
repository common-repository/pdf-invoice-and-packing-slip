<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Woocommerce_Product_Attachment_Pro
 * @subpackage Woocommerce_Product_Attachment_Pro/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Woocommerce_Product_Attachment_Pro
 * @subpackage Woocommerce_Product_Attachment_Pro/includes
 * @author     multidots <mahesh.prajapati@multidots.com>
 */
class Woocommerce_Pdf_Invoices_Packing_Slips_i18n {

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {

        load_plugin_textdomain(
                'woocommerce-product-attachment-', false, dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}

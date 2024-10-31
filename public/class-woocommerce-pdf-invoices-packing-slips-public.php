<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Woocommerce_Product_Attachment_Pro
 * @subpackage Woocommerce_Product_Attachment_Pro/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woocommerce_Product_Attachment_Pro
 * @subpackage Woocommerce_Product_Attachment_Pro/public
 * @author     multidots <mahesh.prajapati@multidots.com>
 */
class Woocommerce_Pdf_Invoices_Packing_Slips_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    
    
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */

    function create_invoice_package_slip_number_for_wc_order( $order_id ) { 
    // get order details data...
        $settings=Woocommerce_Pdf_Invoices_Packing_Slips::get_settings();
        $invoice_number=$settings['invoice_settings']['next_invoice_number'];
        $invoice_number_prefix=$settings['invoice_settings']['invoice_number_prefix'];
        $invoice_number_suffix=$settings['invoice_settings']['invoice_number_sufix'];
        $settings['invoice_settings']['next_invoice_number']=$settings['invoice_settings']['next_invoice_number']+1;
        update_option('invoice_settings_inputs',$settings['invoice_settings']);

        $invoice_number_str=$invoice_number_prefix.$invoice_number.$invoice_number_suffix;

        update_post_meta($order_id,'inoice_number',$invoice_number_str);
    }

    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woocommerce_Product_Attachment_Pro_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woocommerce_Product_Attachment_Pro_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/woocommerce-product-attachment-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woocommerce_Product_Attachment_Pro_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woocommerce_Product_Attachment_Pro_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/woocommerce-product-attachment-public.js', array('jquery'), $this->version, false);
    }
    public function order_data_show($order){
        $order_id = $order->get_id();
        $order_data = wc_get_order( $order_id );
        $orderStatus = $order->get_status();

        $settings = Woocommerce_Pdf_Invoices_Packing_Slips::get_settings();
        $my_account_visible = $settings['invoice_settings']['allow_my_account_invoice_download'];
        $actual_link = PIPSFW_PLUGIN_URL . "download/invoice_of_". $order_id ."_".$orderStatus."_data.pdf";
        $get_general_settings=get_option('general_settings_inputs');
        $pdf_view = $get_general_settings['pdf_view'];
        if( 'newtab' === $pdf_view ) {
            $download = '';
        } else {
            $download = 'download';
        }

        if('on' === $settings['invoice_settings']['invoice_enable_diable']){
            if(empty($settings['invoice_settings']['disablefor'])){
                if(is_account_page() && 'always' === $my_account_visible){
                    ?>
                    <div class="pipsfw_download_button">
                        <a href="<?php echo esc_url($actual_link); ?>" target="_blank" <?php echo esc_attr($download);?> ><?php esc_html_e('Download Invoice',PIPSFW_PLUGIN_TEXT_DOMAIN)?></a>
                    </div>  
                <?php
                }

            }elseif( !in_array('wc-'.$orderStatus, $settings['invoice_settings']['disablefor']) ){
                if(is_account_page() && 'always' === $my_account_visible){
                    ?>
                    <div class="pipsfw_download_button">
                        <a href="<?php echo esc_url($actual_link); ?>" target="_blank" <?php echo esc_attr($download);?> ><?php esc_html_e('Download Invoice',PIPSFW_PLUGIN_TEXT_DOMAIN)?></a>  
                    </div>
                <?php
                }
            }
        }
    }
    public function order_data_show_thankyou($order_id){
        $order_data = wc_get_order( $order_id );
        $orderStatus = $order_data->get_status();
        $settings = Woocommerce_Pdf_Invoices_Packing_Slips::get_settings();
        $actual_link = PIPSFW_PLUGIN_URL . "download/invoice_of_".$order_id ."_".$orderStatus."_data.pdf";
        $get_general_settings = get_option('general_settings_inputs');
        $pdf_view = $get_general_settings['pdf_view'];
        if( 'newtab' === $pdf_view ) {
            $download = '';
        } else {
            $download = 'download';
        }

        if('on' === $settings['invoice_settings']['invoice_enable_diable']){
            if(empty($settings['invoice_settings']['disablefor'])){
                ?>
                <div class="pipsfw_download_button">
                    <a href="<?php echo esc_url($actual_link); ?>" target="_blank" <?php echo esc_attr($download);?> ><?php esc_html_e('Download Invoice',PIPSFW_PLUGIN_TEXT_DOMAIN)?></a>
                </div>  
            <?php
            }elseif( !in_array('wc-'.$orderStatus, $settings['invoice_settings']['disablefor']) ){
                ?>
                <div class="pipsfw_download_button">
                    <a href="<?php echo esc_url($actual_link); ?>" target="_blank" <?php echo esc_attr($download);?> ><?php esc_html_e('Download Invoice',PIPSFW_PLUGIN_TEXT_DOMAIN)?></a>  
                </div>
            <?php
            }
        }
    }
}
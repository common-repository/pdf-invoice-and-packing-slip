<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Woocommerce_Product_Attachment
 * @subpackage Woocommerce_Product_Attachment/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woocommerce_Product_Attachment
 * @subpackage Woocommerce_Product_Attachment/admin
 * @author     Multidots <inquiry@multidots.in>
 */
use Dompdf\Dompdf;
use Dompdf\Options;
class Woocommerce_Pdf_Invoices_Packing_Slips_Admin
{

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
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woocommerce_Product_Attachment_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woocommerce_Product_Attachment_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        $current_screen = get_current_screen();
        $post_type = $current_screen->post_type;
        $menu_page=filter_input(INPUT_GET,'page',FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($menu_page) && !empty($menu_page) && ($menu_page === "woocommerce_pdf_invoices_packing_slips" || $menu_page === "pdf_invoices_packing_slips_invoice_settings" || $menu_page === "pipsfw-page-get-started" || $menu_page === "pipsfw-page-information" || $menu_page === "pdf_invoices_packing_slips_template_settings" || $menu_page === "pdf_invoices_packing_slips_bulk_download") || !empty($post_type) && ($post_type === 'product')) {
            wp_enqueue_style('thickbox');
            wp_enqueue_style($this->plugin_name . '-pipsfw-main-style', plugin_dir_url(__FILE__) . 'css/style.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/woocommerce_pdf_invoices_packing_slips-admin.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name . '-pipsfw-main-style', plugin_dir_url(__FILE__) . 'css/style.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name . '-font-awesome', plugin_dir_url(__FILE__) . 'css/font-awesome.min.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name . '-jquery-ui', plugin_dir_url(__FILE__) . 'css/jquery-ui.min.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name . '-main-jquery-ui', plugin_dir_url(__FILE__) . 'css/jquery-ui.css', array(), $this->version, 'all');
            wp_enqueue_style($this->plugin_name . '-select2.min', plugin_dir_url(__FILE__) . 'css/select2.min.css', array(), $this->version, 'all');
                     wp_enqueue_style('thickbox'); // call to media files in wp
      
        }
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Woocommerce_Product_Attachment_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Woocommerce_Product_Attachment_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        $current_screen = get_current_screen();
        $post_type = $current_screen->post_type;
        $menu_page=filter_input(INPUT_GET,'page',FILTER_SANITIZE_SPECIAL_CHARS);
         if (isset($menu_page) && !empty($menu_page) && ($menu_page === "woocommerce_pdf_invoices_packing_slips" || $menu_page === "pdf_invoices_packing_slips_invoice_settings" || $menu_page === "pipsfw-page-get-started" || $menu_page === "pipsfw-page-information" || $menu_page === "pdf_invoices_packing_slips_template_settings" || $menu_page === "pdf_invoices_packing_slips_bulk_download") || !empty($post_type) && ($post_type === 'product')) {
            wp_enqueue_script('postbox');
            wp_enqueue_script('jquery');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-datepicker');
            
            wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/woocommerce_pdf_invoices_packing_slips-admin.js', array('jquery'), $this->version, false);
            wp_enqueue_script($this->plugin_name . '-select2_js', plugin_dir_url(__FILE__) . 'js/select2.full.min.js?ver=4.0.3', array('jquery'), '4.0.3', false);
            wp_enqueue_script($this->plugin_name . '-datepicker', plugin_dir_url(__FILE__) . 'js/datepicker.min.js', array('jquery'), $this->version, false);
            wp_enqueue_script($this->plugin_name . '-validation', plugin_dir_url(__FILE__) . 'js/jquery.validation.js', array('jquery'), $this->version, false);
            wp_enqueue_script('thickbox');
            wp_enqueue_media();
           
        }
        if (isset($menu_page) && !empty($menu_page) && ($menu_page === "pipsfw_bulk_attachment")) {
            wp_dequeue_script('wp-auth-check');
        }
    }
    /**
     *
     * dotsstore menu add
     */
    public function dot_store_menu()
    {
        global $GLOBALS;
        if (empty($GLOBALS['admin_page_hooks']['dots_store'])) {
            add_menu_page(
                'DotStore Plugins', 'DotStore Plugins', 'null', 'dots_store', array($this, 'dot_store_menu_page'), plugin_dir_url(__FILE__) . 'images/menu-icon.png', 25
            );
        }
    }

    /**
     *
     * WooCommerce Product Attachment menu add
     */
    public function pipsfw_plugin_menu()
    {
        add_submenu_page("dots_store", "WooCommerce PDF Invoices & Packing Slips", "WooCommerce PDF Invoices & Packing Slips", "manage_options", "woocommerce_pdf_invoices_packing_slips", array($this, "pipsfw_general_setting"));
         add_submenu_page("dots_store", 'PDF Invoices Packing Slips Invoice Settings', 'PDF Invoices Packing Slips Invoice Settings', 'manage_options', 'pdf_invoices_packing_slips_invoice_settings', array($this, "pipsfw_invoice_settings"));
         add_submenu_page("dots_store", 'Pdf Invoices Packing Slips Template Settings', 'PDF Invoices Packing Slips Template Settings', 'manage_options', 'pdf_invoices_packing_slips_template_settings', array($this, "pipsfw_template_settings"));
         add_submenu_page("dots_store", 'Pdf Invoices Packing Slips Bulk Download', 'Pdf Invoices Packing Slips Bulk Download', 'manage_options', 'pdf_invoices_packing_slips_bulk_download', array($this, "pipsfw_bulk_download"));
         add_submenu_page("dots_store", 'Getting Started', 'Getting Started', 'manage_options', 'pipsfw-page-get-started', array($this, "pipsfw_get_started_page"));
         add_submenu_page("dots_store", 'Quick info', 'Quick info', 'manage_options', 'pipsfw-page-information', array($this, "pipsfw_information_page"));    
    }


    /*
     * Remove Menu.
     */

    public function pipsfw_remove_admin_menus()
    {
        remove_submenu_page('dots_store', 'pdf_invoices_packing_slips_invoice_settings');
        remove_submenu_page('dots_store', 'pdf_invoices_packing_slips_template_settings');
        remove_submenu_page('dots_store', 'pdf_invoices_packing_slips_bulk_download');
        remove_submenu_page( 'dots_store', 'pipsfw-page-get-started' );
        remove_submenu_page( 'dots_store', 'pipsfw-page-information' );
    }

    /**
     * WooCommerce P
     roduct Attachment Option Page HTML
     *
     */
    public function pipsfw_general_setting()
    {
       require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-header.php');
       require_once(plugin_dir_path( __FILE__ ).'partials/pipsfw-general-setting.php');
       require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-sidebar.php');
    }

    public function pipsfw_invoice_settings(){
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-header.php');
        require_once(plugin_dir_path( __FILE__ ).'partials/pipsfw-invoice-setting.php');
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-sidebar.php');
    }

    public function pipsfw_template_settings(){
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-header.php');
        require_once(plugin_dir_path( __FILE__ ).'partials/pipsfw-template-setting.php');
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-sidebar.php');
    }
    /**
     * Quick guide page
     *
     * @since    1.0.0
     */
    public function pipsfw_get_started_page() {
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-header.php');
        require_once( plugin_dir_path( __FILE__ ) . 'partials/pipsfw-get-started-page.php' );
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-sidebar.php');
    }
    
    /**
     * Plugin information page
     *
     * @since    1.0.0
     */
    public function pipsfw_information_page() {
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-header.php');
        require_once( plugin_dir_path( __FILE__ ) . 'partials/pipsfw-information-page.php' );
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-sidebar.php');
    }

    public function pipsfw_bulk_download(){
        $download_submit=filter_input(INPUT_GET,'submit',FILTER_SANITIZE_STRING);
        $start_date=filter_input(INPUT_GET,'start_date',FILTER_SANITIZE_STRING);
        $end_date=filter_input(INPUT_GET,'end_date',FILTER_SANITIZE_STRING);
        $zip_error = "";

        if(isset($download_submit)){
            $order_data = wc_get_orders(array(
                'limit'=>-1,
                'type'=> 'shop_order',
               // 'status'=> array( 'wc-pending', 'wc-processing', 'wc-on-hold', 'wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed' ),
                'date_created'=> $start_date .'...'. $end_date 
                )
            );
            if(!empty($order_data)){
                $dir_to_save = PIPSFW_PLUGIN_DIR_PATH."download/multiple";
                
                if (!is_dir($dir_to_save)) {
                  mkdir($dir_to_save);
                }
                
                // Checking files are selected
                $zip = new ZipArchive(); // Load zip library 
                $zip_name = time().".zip"; // Zip name
                $zip->open($zip_name,  ZipArchive::CREATE);

                foreach($order_data as $order_info){

                    $order_id = $order_info->id;

                    //global $woocommerce;
                    $settings=Woocommerce_Pdf_Invoices_Packing_Slips::get_settings();
                    $order = new WC_Order( $order_id );
                    $order_data = $order->get_data();
                    //$orderStatus = get_post_meta($order_id, '_status', true);
                    $orderStatus = $order_data['status'];
                    $invoice_number=get_post_meta($order_id,'inoice_number',true);

                    if(ob_get_length() > 0) {
                        ob_clean();
                    }
                    ob_start(); 

                    $options = new Options();
                    $options->set('isRemoteEnabled', true);
                    $dompdf = new Dompdf($options); 

                    $pdf_save_label = $dir_to_save.'/invoice_of_'.$order_id.'_'.$orderStatus.'_data.pdf';

                    //require_once plugin_dir_path(dirname(__FILE__)) . 'templates/invoice-email.php';
                    $style_url = PIPSFW_PLUGIN_DIR_PATH."templates/template-style.css";

                    wp_enqueue_style( 'template-style' );
                    wp_add_inline_style( 'template-style', 'header{width:100%}header table td{width:50%}table{width:100%;margin-bottom:20px}header table td a{font-weight:600}header table td div{margin-bottom:5px}.text-gray-light{margin-top:10px}h2.to{margin-top:10px;text-transform:capitalize}table.product-detail thead tr{background:#000;color:#fff}table.product-detail tbody tr td:first-child,table.product-detail thead tr th:first-child{width:5%;text-align:center}table.product-detail tbody tr td:nth-child(2),table.product-detail thead tr th:nth-child(2){width:50%;text-align:left}table.product-detail tbody tr td:nth-child(3),table.product-detail thead tr th:nth-child(3){width:15%}table.product-detail tbody tr td,table.product-detail thead tr th{width:15%;text-align:center}table tfoot td:nth-child(2){font-weight:700}img.invoice_logo{max-width:200px;max-height:200px;float:left}' ); 
                    ?>
                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <div id="invoice">
                        <div class="invoice overflow-auto">
                            <header>
                                <table class="table" width="100%">
                                    <tr>
                                        <td>
                                            <?php if( isset($settings['template_settings']['logo_image']) && (!empty($settings['template_settings']['logo_image'])) ){    

                                            $path_data =  $settings['template_settings']['logo_image']; 
                                            $type_data = pathinfo($path_data, PATHINFO_EXTENSION);
                                            $data = file_get_contents($path_data);
                                            $base64 = 'data:image/' . $type_data . ';base64,' . base64_encode($data);
                                             ?>
                                            <a target="_blank" href="https://lobianijs.com">
                                                <img class='invoice_logo' src="<?php echo esc_url($path_data); ?>" data-holder-rendered="true" />
                                            </a>
                                            <?php } ?>    

                                        </td>
                                        <td class="text-right">
                                            <?php if( isset($settings['template_settings']['shop_name']) && (!empty($settings['template_settings']['shop_name'])) ){ ?>    
                                                <h2 class="name">
                                                    <a target="_blank" href="https://lobianijs.com">
                                                        <?php esc_html_e($settings['template_settings']['shop_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                                    </a>
                                                </h2>
                                            <?php } ?>

                                            <?php if( isset($settings['template_settings']['shop_address']) && (!empty($settings['template_settings']['shop_address'])) ){ ?>    
                                                <div><?php esc_html_e($settings['template_settings']['shop_address'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                            <?php } ?>

                                            <?php if( isset($settings['template_settings']['shop_vat_number']) && (!empty($settings['template_settings']['shop_vat_number'])) ){ ?>    
                                                <div><strong><?php esc_html_e('Vat Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_vat_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                            <?php } ?>

                                            <?php if( isset($settings['template_settings']['shop_pan_number']) && (!empty($settings['template_settings']['shop_pan_number'])) ){ ?>    
                                                <div><strong><?php esc_html_e('PAN Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_pan_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                            <?php } ?>

                                            <?php if( isset($settings['template_settings']['shop_gst_number']) && (!empty($settings['template_settings']['shop_gst_number'])) ){ ?>    
                                                <div><strong><?php esc_html_e('GST Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_gst_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                            <?php } ?>

                                            <?php if( isset($settings['template_settings']['bank_name']) && (!empty($settings['template_settings']['bank_name'])) ){ ?>    
                                                <div><strong><?php esc_html_e('Bank Name: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['bank_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                            <?php } ?>

                                            <?php if( isset($settings['template_settings']['bank_account_number']) && (!empty($settings['template_settings']['bank_account_number'])) ){ ?>    
                                                <div><strong><?php esc_html_e('A/c No: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong><?php esc_html_e($settings['template_settings']['bank_account_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table row contacts">
                                    <tr class="col invoice-to">
                                        <td>
                                            <h4 class="text-gray-light"><strong><?php esc_html_e('Invoice To:',PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </strong></h4>
                                            <h4 class="to">
                                                <label class="fname"><?php esc_html_e($order_data['billing']['first_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                                <label class="lname"><?php esc_html_e($order_data['billing']['last_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                            </h4>
                                            <?php 
                                                $state_code = $order_data['billing']['state'];
                                                $country_code = $order_data['billing']['country'];

                                                $state_name = WC()->countries->states[$country_code][$state_code];
                                                $country_name = WC()->countries->countries[ $country_code ];
                                            ?>
                                            <div class="address">
                                                <p><?php esc_html_e( $order_data['billing']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                                <p><?php esc_html_e( $order_data['billing']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                                <?php esc_html_e( $order_data['billing']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['billing']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                                <p><?php esc_html_e( $state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                                <?php esc_html_e( $country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                                <?php esc_html_e( $order_data['billing']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p> 
                                            </div>
                                            <?php if(isset($settings['invoice_settings']['enable_diable_phone_number'])){ ?>
                                                    <div class="tel"><?php esc_html_e('Tel: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?> <a href="<?php echo esc_url($order_data['billing']['phone']); ?>"><?php esc_html_e( $order_data['billing']['phone'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a></div>
                                            <?php } ?>
                                              <?php if(isset($settings['invoice_settings']['enable_diable_email_address'])){ ?>
                                                    <div class="email"><a href="<?php echo esc_url('mailto:john@example.com'); ?>"><?php esc_html_e($order_data['billing']['email'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a></div>
                                                <?php } ?>
                                        </td>
                                        <td>
                                            <?php 
                                            if(isset($settings['invoice_settings']['enable_diable_shipping_address']) && $settings['invoice_settings']['enable_diable_shipping_address']==='on'){ ?>

                                                <h4 class="text-gray-light"><strong><?php esc_html_e('Shipping To:',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong> </h4>
                                                <h4 class="to">
                                                    <label class="fname"><?php esc_html_e($order_data['shipping']['first_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                                    <label class="lname"><?php esc_html_e($order_data['shipping']['last_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                                </h4>
                                                <?php 
                                                    $ship_state_code = $order_data['shipping']['state'];
                                                    $ship_country_code = $order_data['shipping']['country'];

                                                    $ship_state_name = WC()->countries->states[$ship_country_code][$ship_state_code];
                                                    $ship_country_name = WC()->countries->countries[ $ship_country_code ];
                                                ?>
                                                <?php if( empty($order_data['shipping']) ){ ?>
                                                    <div class="address">
                                                        <p><?php esc_html_e( $order_data['billing']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                                        <p><?php esc_html_e( $order_data['billing']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                                        <?php esc_html_e( $order_data['billing']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['billing']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                                        <p><?php esc_html_e( $state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                                        <?php esc_html_e( $country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                                        <?php esc_html_e( $order_data['billing']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p> 
                                                    </div>
                                                <?php }else{ ?>
                                                    <div class="address">
                                                        <p><?php esc_html_e( $order_data['shipping']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                                        <p><?php esc_html_e( $order_data['shipping']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                                        <?php esc_html_e( $order_data['shipping']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['shipping']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                                        <p><?php esc_html_e( $ship_state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                                        <?php esc_html_e( $ship_country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                                        <?php esc_html_e( $order_data['shipping']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>     
                                                    </div>
                                                <?php } ?>
                                            <?php } 
                                            ?>
                                        </td>

                                        <td class="text-right">
                                            <?php if(isset($settings['invoice_settings']['enable_diable_invoice_number_column'])){ ?>
                                                <h4 class="invoice-id"><strong><?php esc_html_e('Invoice Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php echo isset($invoice_number) ? esc_html_e($invoice_number,PIPSFW_PLUGIN_TEXT_DOMAIN) : ""; ?></strong></h4></div>
                                            <?php } ?>
                                            <?php if(isset($settings['invoice_settings']['enable_diable_invoice_date'])){ ?>
                                                <div class="date"><?php esc_html_e('Invoice Date: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e(date_format($order_data['date_created'],"Y/m/d H:i:s"),PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                            <?php } ?>
                                            <div class="payment"><?php esc_html_e('Payment Method: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e($order_data['payment_method_title'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                            <div class="order_status"><?php esc_html_e('Order Status: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e($order_data['status'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                        </td>
                                    </tr>
                                </table>
                            </header>
                            <table class="table text-right product-detail" border="0" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left"><?php esc_html_e('Name',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                                        <th class="text-center"><?php esc_html_e('Rate',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                                        <th class="text-center"><?php esc_html_e('Quantity',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                                        <th class="text-center"><?php esc_html_e('Total',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    $items = $order->get_items();
                                    $order_subtotal = $order->get_subtotal();
                                    $order_subtotal = number_format( $order_subtotal, 2 );
                                    foreach ( $items as $item_id => $item_data ) {
                                        $_product = wc_get_product( $item_data['product_id'] ); ?>
                                    <tr>
                                        <td class="no"><?php esc_html_e( $item_data['product_id'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                        <td class="text-left"><?php esc_html_e( $item_data['name'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                        <td class="unit"><?php esc_html_e( $_product->get_price(), PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                        <td class="qty"><?php esc_html_e( $item_data['quantity'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                        <td class="total"><?php esc_html_e( $item_data['total'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td></td><td></td><td></td>
                                    <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Subtotal',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></td>
                                    <td class="total"><?php esc_html_e( $order_subtotal, PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                </tr>
                                <?php 
                                if(isset($settings['invoice_settings']['enable_disable_shipping_list_invoice'])){
                                    if(!empty($order_data['shipping_total'])){ ?>
                                        <tr>
                                            <td></td><td></td><td></td>
                                            <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Shipping',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></strong></td>
                                            <td class="total"><?php esc_html_e( $order_data['shipping_total'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?><</td>
                                        </tr>
                                        <?php
                                    } 
                                } ?>
                                <tr>
                                    <td></td><td></td><td></td>
                                    <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Total',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></td>
                                    <td class="total"><?php esc_html_e( $order_data['total'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?><</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="thanks"><?php esc_html_e('Thank you!',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>

                            <?php if( isset($settings['template_settings']['invoice_notes']) && (!empty($settings['template_settings']['invoice_notes'])) ){ ?>     
                                <div class="notices">
                                    <div class="notice"><label><?php esc_html_e('Notice: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label><?php esc_html_e($settings['template_settings']['invoice_notes'] ,PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                </div>
                            <?php } ?>

                            <?php if( isset($settings['template_settings']['footer']) && (!empty($settings['template_settings']['footer'])) ){ ?>     
                                <footer>
                                    <?php esc_html_e($settings['template_settings']['footer'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                </footer>
                            <?php } ?>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                    <?php
                    $html = ob_get_contents();

                    $dompdf->loadHtml($html);
                    $dompdf->render();
                    $output = $dompdf->output();
                    
                    file_put_contents($pdf_save_label, $output);

                    ob_get_clean();

                    $zip->addFile($pdf_save_label,'invoice_of_'.$order_id.'_'.$orderStatus.'_data.pdf'); 

                }

                $zip->close();
                if(file_exists($zip_name))
                {
                    ob_clean();
                    ob_end_flush();
                    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
                    header('Content-Type: application/zip;\n');
                    header("Content-Transfer-Encoding: Binary");
                    header('Content-Disposition: attachment; filename="'.$zip_name.'"');
                    readfile($zip_name);
                    // remove zip file is exists in temp path
                    unlink($zip_name);
                } 
                 
                //Get a list of all of the file names in the folder.
                $dir_to_save_files = glob($dir_to_save . '/*');
                 
                foreach($dir_to_save_files as $file){
                    //Make sure that this is a file and not a directory.
                    if(is_file($file)){
                        //Use the unlink function to delete the file.
                        unlink($file);
                    }
                }
                exit();
            }else{
                $zip_error = "No any order found";
            }        
        }        
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-header.php'); 
        if(!empty($zip_error)){ ?>
            <div class="zip_error"><?php esc_html_e($zip_error,PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
        <?php }
        require_once(plugin_dir_path( __FILE__ ).'partials/pipsfw-bulk-download.php');
        require_once(plugin_dir_path( __FILE__ ).'partials/header/plugin-sidebar.php');  
    }

    public function register_metabox_for_order_page() {
        $post_type='shop_order';
        add_meta_box(
            PIPSFW_PLUGIN_SLUG,
            __(PIPSFW_PLUGIN_NAME, 'my-plugin'),
            [$this, 'registerField'],
            $post_type,
            "side"
        );
        
    }

    public function registerField(){
        $order_id=filter_input(INPUT_GET,'post',FILTER_SANITIZE_SPECIAL_CHARS);
        $order = wc_get_order( $order_id );
        $orderStatus = $order->get_status();
        $actual_link = PIPSFW_PLUGIN_URL . "download/invoice_of_".$order_id ."_".$orderStatus."_data.pdf";
    ?>
        <a class='button' href="<?php echo esc_url($actual_link) ?>">Download Invoice</a>
        <?php
    }

    public function pipsfw_attach_invoice_pdf_to_email( $attachments, $status , $order ) {

        if ( empty( $order ) ) {
            return $attachments;
        }

        $order_id = $order->get_id();
        $orderStatus = $order->get_status();
        $settings=Woocommerce_Pdf_Invoices_Packing_Slips::get_settings();
        $order_data = $order->get_data();
        $invoice_number=get_post_meta($order_id,'inoice_number',true);
        $dir_to_save = PIPSFW_PLUGIN_DIR_PATH."download";
        if (!is_dir($dir_to_save)) {
          mkdir($dir_to_save);
        }

        if(ob_get_length() > 0) {
            ob_clean();
        }
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options); 
        $style_url = PIPSFW_PLUGIN_DIR_PATH."templates/template-style.css";
        $html = "";
        wp_enqueue_style( 'template-style' );
        wp_add_inline_style( 'template-style', 'header{width:100%}header table td{width:50%}table{width:100%;margin-bottom:20px}header table td a{font-weight:600}header table td div{margin-bottom:5px}.text-gray-light{margin-top:10px}h2.to{margin-top:10px;text-transform:capitalize}table.product-detail thead tr{background:#000;color:#fff}table.product-detail tbody tr td:first-child,table.product-detail thead tr th:first-child{width:5%;text-align:center}table.product-detail tbody tr td:nth-child(2),table.product-detail thead tr th:nth-child(2){width:50%;text-align:left}table.product-detail tbody tr td:nth-child(3),table.product-detail thead tr th:nth-child(3){width:15%}table.product-detail tbody tr td,table.product-detail thead tr th{width:15%;text-align:center}table tfoot td:nth-child(2){font-weight:700}img.invoice_logo{max-width:200px;max-height:200px;float:left}' ); 

        $html.='<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">';

        ob_start();  

        $pdf_save_label = $dir_to_save.'/invoice_of_'.$order_id.'_'.$orderStatus.'_data.pdf';

        //require_once plugin_dir_path(dirname(__FILE__)) . 'templates/invoice-email.php';?>
        <div id="invoice">
            <div class="invoice overflow-auto">
                <header>
                    <table class="table" width="100%">
                        <tr>
                            <td>
                                <?php   
                                if( isset($settings['template_settings']['logo_image']) && (!empty($settings['template_settings']['logo_image'])) ){

                                $path_data =  $settings['template_settings']['logo_image']; 
                                $type_data = pathinfo($path_data, PATHINFO_EXTENSION);
                                $data = file_get_contents($path_data);
                                $base64 = 'data:image/' . $type_data . ';base64,' . base64_encode($data);
                                 ?>
                                <a target="_blank" href="https://lobianijs.com">
                                    <img class='invoice_logo' src="<?php echo $base64; ?>" data-holder-rendered="true" />
                                </a>
                                <?php } ?>    

                            </td>
                            <td class="text-right">
                                <?php if( isset($settings['template_settings']['shop_name']) && (!empty($settings['template_settings']['shop_name'])) ){ ?>
                                    <h2 class="name">
                                        <a target="_blank" href="https://lobianijs.com">
                                            <?php esc_html_e($settings['template_settings']['shop_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                        </a>
                                    </h2>
                                <?php } ?>

                                <?php if( isset($settings['template_settings']['shop_address']) && (!empty($settings['template_settings']['shop_address'])) ){ ?>    
                                    <div><?php esc_html_e($settings['template_settings']['shop_address'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                <?php } ?>

                                <?php if( isset($settings['template_settings']['shop_vat_number']) && (!empty($settings['template_settings']['shop_vat_number'])) ){ ?>     
                                    <div><strong><?php esc_html_e('Vat Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_vat_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                <?php } ?>

                                <?php if( isset($settings['template_settings']['shop_pan_number']) && (!empty($settings['template_settings']['shop_pan_number'])) ){ ?>     
                                    <div><strong><?php esc_html_e('PAN Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_pan_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                <?php } ?>

                                <?php if( isset($settings['template_settings']['shop_gst_number']) && (!empty($settings['template_settings']['shop_gst_number'])) ){ ?>     
                                    <div><strong><?php esc_html_e('GST Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_gst_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                <?php } ?>

                                <?php if( isset($settings['template_settings']['bank_name']) && (!empty($settings['template_settings']['bank_name'])) ){ ?>     
                                    <div><strong><?php esc_html_e('Bank Name: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['bank_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                <?php } ?>

                                <?php if( isset($settings['template_settings']['bank_account_number']) && (!empty($settings['template_settings']['bank_account_number'])) ){ ?>     
                                    <div><strong><?php esc_html_e('A/c No: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong><?php esc_html_e($settings['template_settings']['bank_account_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                    <table class="table row contacts">
                        <tr class="col invoice-to">
                            <td>
                                <h4 class="text-gray-light"><strong><?php esc_html_e('Invoice To:',PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </strong></h4>
                                <h4 class="to">
                                    <label class="fname"><?php esc_html_e($order_data['billing']['first_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                    <label class="lname"><?php esc_html_e($order_data['billing']['last_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                </h4>
                                <?php 
                                    $state_code = $order_data['billing']['state'];
                                    $country_code = $order_data['billing']['country'];

                                    $state_name = WC()->countries->states[$country_code][$state_code];
                                    $country_name = WC()->countries->countries[ $country_code ];
                                ?>
                                <div class="address">
                                    <p><?php esc_html_e( $order_data['billing']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                    <p><?php esc_html_e( $order_data['billing']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                    <?php esc_html_e( $order_data['billing']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['billing']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                    <p><?php esc_html_e( $state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                    <?php esc_html_e( $country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                    <?php esc_html_e( $order_data['billing']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p> 
                                </div>
                                <?php if(isset($settings['invoice_settings']['enable_diable_phone_number'])){ ?>
                                        <div class="tel"><?php esc_html_e('Tel: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?> <a href="<?php echo esc_url($order_data['billing']['phone']); ?>"><?php esc_html_e( $order_data['billing']['phone'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a></div>
                                <?php } ?>
                                  <?php if(isset($settings['invoice_settings']['enable_diable_email_address'])){ ?>
                                        <div class="email"><a href="<?php echo esc_url('mailto:john@example.com'); ?>"><?php esc_html_e($order_data['billing']['email'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a></div>
                                    <?php } ?>
                            </td>
                            <td>
                                <?php 
                                if(isset($settings['invoice_settings']['enable_diable_shipping_address']) && $settings['invoice_settings']['enable_diable_shipping_address']==='on'){ ?>

                                    <h4 class="text-gray-light"><strong><?php esc_html_e('Shipping To:',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong> </h4>
                                    <h4 class="to">
                                        <label class="fname"><?php esc_html_e($order_data['shipping']['first_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                        <label class="lname"><?php esc_html_e($order_data['shipping']['last_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                    </h4>
                                    <?php 
                                        $ship_state_code = $order_data['shipping']['state'];
                                        $ship_country_code = $order_data['shipping']['country'];

                                        $ship_state_name = WC()->countries->states[$ship_country_code][$ship_state_code];
                                        $ship_country_name = WC()->countries->countries[ $ship_country_code ];
                                    ?>
                                    <?php if( empty($order_data['shipping']) ){ ?>
                                        <div class="address">
                                            <p><?php esc_html_e( $order_data['billing']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                            <p><?php esc_html_e( $order_data['billing']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                            <?php esc_html_e( $order_data['billing']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['billing']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                            <p><?php esc_html_e( $state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                            <?php esc_html_e( $country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                            <?php esc_html_e( $order_data['billing']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p> 
                                        </div>
                                    <?php }else{ ?>
                                        <div class="address">
                                            <p><?php esc_html_e( $order_data['shipping']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                            <p><?php esc_html_e( $order_data['shipping']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                            <?php esc_html_e( $order_data['shipping']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['shipping']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                            <p><?php esc_html_e( $ship_state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                            <?php esc_html_e( $ship_country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                            <?php esc_html_e( $order_data['shipping']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>     
                                        </div>
                                    <?php } ?>
                                <?php } 
                                ?>
                            </td>
                            <td class="text-right">
                                <?php if(isset($settings['invoice_settings']['enable_diable_invoice_number_column'])){ ?>
                                    <h4 class="invoice-id"><strong><?php esc_html_e('Invoice Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php echo isset($invoice_number) ? esc_html_e($invoice_number,PIPSFW_PLUGIN_TEXT_DOMAIN) : ""; ?></strong></h4></div>
                                <?php } ?>
                                <?php if(isset($settings['invoice_settings']['enable_diable_invoice_date'])){ ?>
                                    <div class="date"><?php esc_html_e('Invoice Date: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e(date_format($order_data['date_created'],"Y/m/d H:i:s"),PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                <?php } ?>
                                <div class="payment"><?php esc_html_e('Payment Method: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e($order_data['payment_method_title'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                <div class="order_status"><?php esc_html_e('Order Status: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e($order_data['status'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                            </td>
                        </tr>
                    </table>
                </header>
                <table class="table text-right product-detail" border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left"><?php esc_html_e('Name',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                            <th class="text-center"><?php esc_html_e('Rate',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                            <th class="text-center"><?php esc_html_e('Quantity',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                            <th class="text-center"><?php esc_html_e('Total',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $items = $order->get_items();
                        $order_subtotal = $order->get_subtotal();
                        $order_subtotal = number_format( $order_subtotal, 2 );
                        foreach ( $items as $item_id => $item_data ) {
                            $_product = wc_get_product( $item_data['product_id'] ); ?>
                        <tr>
                            <td class="no"><?php esc_html_e( $item_data['product_id'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                            <td class="text-left"><?php esc_html_e( $item_data['name'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                            <td class="unit"><?php esc_html_e( $_product->get_price(), PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                            <td class="qty"><?php esc_html_e( $item_data['quantity'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                            <td class="total"><?php esc_html_e( $item_data['total'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td><td></td><td></td>
                        <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Subtotal',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></td>
                        <td class="total"><?php esc_html_e( $order_subtotal, PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                    </tr>
                    <?php 
                    if(isset($settings['invoice_settings']['enable_disable_shipping_list_invoice'])){
                        if(!empty($order_data['shipping_total'])){ ?>
                            <tr>
                                <td></td><td></td><td></td>
                                <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Shipping',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></strong></td>
                                <td class="total"><?php esc_html_e( $order_data['shipping_total'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?><</td>
                            </tr>
                            <?php
                        } 
                    } ?>
                    <tr>
                        <td></td><td></td><td></td>
                        <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Total',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></td>
                        <td class="total"><?php esc_html_e( $order_data['total'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?><</td>
                    </tr>
                    </tbody>
                </table>
                <div class="thanks"><?php esc_html_e( 'Thank you!', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                <?php if( isset($settings['template_settings']['invoice_notes']) && (!empty($settings['template_settings']['invoice_notes'])) ){ ?>     
                    <div class="notices">
                        <div class="notice"><strong><?php esc_html_e('Notice: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong><?php esc_html_e($settings['template_settings']['invoice_notes'] ,PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                    </div>
                <?php } ?>

                <?php if( isset($settings['template_settings']['footer']) && (!empty($settings['template_settings']['footer'])) ){ ?>    
                    <footer>
                        <?php esc_html_e($settings['template_settings']['footer'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                    </footer>
                <?php } ?>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>

        <?php
  
        $html.= ob_get_clean();

        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents($pdf_save_label, $output);

        $pdf_path = PIPSFW_PLUGIN_DIR_PATH . "download/invoice_of_".$order_id."_".$orderStatus."_data.pdf";

        if (file_exists($pdf_path)) {
            if(isset($settings['invoice_settings']['attachedto'])){
                $invoice_attaches = $settings['invoice_settings']['attachedto'];
                if (in_array('wc-'.$orderStatus, $invoice_attaches, true)){
                    $attachments[] = $pdf_path;
                    return $attachments;
                }
            }else{
                $attachments[] = $pdf_path;
                return $attachments;
            }
        }    
    }

    public function pipsfw_attach_invoice_pdf_for_field_cancle_pending_order( $order_id, $checkout = null  ) {

        $order = new WC_Order( $order_id );
        $orderStatus = $order->get_status();

        if( "pending" === $orderStatus || "cancelled" === $orderStatus || "failed" === $orderStatus){
            $settings=Woocommerce_Pdf_Invoices_Packing_Slips::get_settings();
            $order_data = $order->get_data();
            $invoice_number=get_post_meta($order_id,'inoice_number',true);
            $dir_to_save = PIPSFW_PLUGIN_DIR_PATH."download";
            if (!is_dir($dir_to_save)) {
              mkdir($dir_to_save);
            }

            if(ob_get_length() > 0) {
                ob_clean();
            }
            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new Dompdf($options); 
            $style_url = PIPSFW_PLUGIN_DIR_PATH."templates/template-style.css";
            $html='';
             $html.='<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">';
            wp_enqueue_style( 'template-style' );
            wp_add_inline_style( 'template-style', 'header{width:100%}header table td{width:50%}table{width:100%;margin-bottom:20px}header table td a{font-weight:600}header table td div{margin-bottom:5px}.text-gray-light{margin-top:10px}h2.to{margin-top:10px;text-transform:capitalize}table.product-detail thead tr{background:#000;color:#fff}table.product-detail tbody tr td:first-child,table.product-detail thead tr th:first-child{width:5%;text-align:center}table.product-detail tbody tr td:nth-child(2),table.product-detail thead tr th:nth-child(2){width:50%;text-align:left}table.product-detail tbody tr td:nth-child(3),table.product-detail thead tr th:nth-child(3){width:15%}table.product-detail tbody tr td,table.product-detail thead tr th{width:15%;text-align:center}table tfoot td:nth-child(2){font-weight:700}img.invoice_logo{max-width:200px;max-height:200px;float:left}' ); 

            ob_start();  

            $pdf_save_label = $dir_to_save.'/invoice_of_'.$order_id.'_'.$orderStatus.'_data.pdf'; ?>

            <div id="invoice">
                <div class="invoice overflow-auto">
                    <header>
                        <table class="table" width="100%">
                            <tr>
                                <td>
                                    <?php   
                                    if( isset($settings['template_settings']['logo_image']) && (!empty($settings['template_settings']['logo_image'])) ){

                                    $path_data =  $settings['template_settings']['logo_image']; 
                                    $type_data = pathinfo($path_data, PATHINFO_EXTENSION);
                                    $data = file_get_contents($path_data);
                                    $base64 = 'data:image/' . $type_data . ';base64,' . base64_encode($data);
                                     ?>
                                    <a target="_blank" href="https://lobianijs.com">
                                        <img class='invoice_logo' src="<?php echo $base64; ?>" data-holder-rendered="true" />
                                    </a>
                                    <?php } ?>    

                                </td>
                                <td class="text-right">
                                    <?php if( isset($settings['template_settings']['shop_name']) && (!empty($settings['template_settings']['shop_name'])) ){ ?>
                                        <h2 class="name">
                                            <a target="_blank" href="https://lobianijs.com">
                                                <?php esc_html_e($settings['template_settings']['shop_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                            </a>
                                        </h2>
                                    <?php } ?>

                                    <?php if( isset($settings['template_settings']['shop_address']) && (!empty($settings['template_settings']['shop_address'])) ){ ?>    
                                        <div><?php esc_html_e($settings['template_settings']['shop_address'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                    <?php } ?>

                                    <?php if( isset($settings['template_settings']['shop_vat_number']) && (!empty($settings['template_settings']['shop_vat_number'])) ){ ?>     
                                        <div><strong><?php esc_html_e('Vat Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_vat_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                    <?php } ?>

                                    <?php if( isset($settings['template_settings']['shop_pan_number']) && (!empty($settings['template_settings']['shop_pan_number'])) ){ ?>     
                                        <div><strong><?php esc_html_e('PAN Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_pan_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                    <?php } ?>

                                    <?php if( isset($settings['template_settings']['shop_gst_number']) && (!empty($settings['template_settings']['shop_gst_number'])) ){ ?>     
                                        <div><strong><?php esc_html_e('GST Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_gst_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                    <?php } ?>

                                    <?php if( isset($settings['template_settings']['bank_name']) && (!empty($settings['template_settings']['bank_name'])) ){ ?>     
                                        <div><strong><?php esc_html_e('Bank Name: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['bank_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                    <?php } ?>

                                    <?php if( isset($settings['template_settings']['bank_account_number']) && (!empty($settings['template_settings']['bank_account_number'])) ){ ?>     
                                        <div><strong><?php esc_html_e('A/c No: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong><?php esc_html_e($settings['template_settings']['bank_account_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                        <table class="table row contacts">
                            <tr class="col invoice-to">
                                <td>
                                    <h4 class="text-gray-light"><strong><?php esc_html_e('Invoice To:',PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </strong></h4>
                                    <h4 class="to">
                                        <label class="fname"><?php esc_html_e($order_data['billing']['first_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                        <label class="lname"><?php esc_html_e($order_data['billing']['last_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                    </h4>
                                    <?php 
                                        $state_code = $order_data['billing']['state'];
                                        $country_code = $order_data['billing']['country'];

                                        $state_name = WC()->countries->states[$country_code][$state_code];
                                        $country_name = WC()->countries->countries[ $country_code ];
                                    ?>
                                    <div class="address">
                                        <p><?php esc_html_e( $order_data['billing']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                        <p><?php esc_html_e( $order_data['billing']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                        <?php esc_html_e( $order_data['billing']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['billing']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                        <p><?php esc_html_e( $state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                        <?php esc_html_e( $country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                        <?php esc_html_e( $order_data['billing']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p> 
                                    </div>
                                    <?php if(isset($settings['invoice_settings']['enable_diable_phone_number'])){ ?>
                                            <div class="tel"><?php esc_html_e('Tel: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?> <a href="<?php echo esc_url($order_data['billing']['phone']); ?>"><?php esc_html_e( $order_data['billing']['phone'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a></div>
                                    <?php } ?>
                                      <?php if(isset($settings['invoice_settings']['enable_diable_email_address'])){ ?>
                                            <div class="email"><a href="<?php echo esc_url('mailto:john@example.com'); ?>"><?php esc_html_e($order_data['billing']['email'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a></div>
                                        <?php } ?>
                                </td>
                                <td>
                                    <?php 
                                    if(isset($settings['invoice_settings']['enable_diable_shipping_address']) && $settings['invoice_settings']['enable_diable_shipping_address']==='on'){ ?>

                                        <h4 class="text-gray-light"><strong><?php esc_html_e('Shipping To:',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong> </h4>
                                        <h4 class="to">
                                            <label class="fname"><?php esc_html_e($order_data['shipping']['first_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                            <label class="lname"><?php esc_html_e($order_data['shipping']['last_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                        </h4>
                                        <?php 
                                            $ship_state_code = $order_data['shipping']['state'];
                                            $ship_country_code = $order_data['shipping']['country'];

                                            $ship_state_name = WC()->countries->states[$ship_country_code][$ship_state_code];
                                            $ship_country_name = WC()->countries->countries[ $ship_country_code ];
                                        ?>
                                        <?php if( empty($order_data['shipping']) ){ ?>
                                            <div class="address">
                                                <p><?php esc_html_e( $order_data['billing']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                                <p><?php esc_html_e( $order_data['billing']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                                <?php esc_html_e( $order_data['billing']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['billing']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                                <p><?php esc_html_e( $state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                                <?php esc_html_e( $country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                                <?php esc_html_e( $order_data['billing']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p> 
                                            </div>
                                        <?php }else{ ?>
                                            <div class="address">
                                                <p><?php esc_html_e( $order_data['shipping']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                                <p><?php esc_html_e( $order_data['shipping']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                                <?php esc_html_e( $order_data['shipping']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['shipping']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                                <p><?php esc_html_e( $ship_state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                                <?php esc_html_e( $ship_country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                                <?php esc_html_e( $order_data['shipping']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>     
                                            </div>
                                        <?php } ?>
                                    <?php } 
                                    ?>
                                </td>
                                <td class="text-right">
                                    <?php if(isset($settings['invoice_settings']['enable_diable_invoice_number_column'])){ ?>
                                        <h4 class="invoice-id"><strong><?php esc_html_e('Invoice Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php echo isset($invoice_number) ? esc_html_e($invoice_number,PIPSFW_PLUGIN_TEXT_DOMAIN) : ""; ?></strong></h4></div>
                                    <?php } ?>
                                    <?php if(isset($settings['invoice_settings']['enable_diable_invoice_date'])){ ?>
                                        <div class="date"><?php esc_html_e('Invoice Date: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e(date_format($order_data['date_created'],"Y/m/d H:i:s"),PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                    <?php } ?>
                                    <div class="payment"><?php esc_html_e('Payment Method: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e($order_data['payment_method_title'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                    <div class="order_status"><?php esc_html_e('Order Status: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e($order_data['status'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                                </td>
                            </tr>
                        </table>
                    </header>
                    <table class="table text-right product-detail" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-left"><?php esc_html_e('Name',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                                <th class="text-center"><?php esc_html_e('Rate',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                                <th class="text-center"><?php esc_html_e('Quantity',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                                <th class="text-center"><?php esc_html_e('Total',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            $items = $order->get_items();
                            $order_subtotal = $order->get_subtotal();
                            $order_subtotal = number_format( $order_subtotal, 2 );
                            foreach ( $items as $item_id => $item_data ) {
                                $_product = wc_get_product( $item_data['product_id'] ); ?>
                            <tr>
                                <td class="no"><?php esc_html_e( $item_data['product_id'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                <td class="text-left"><?php esc_html_e( $item_data['name'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                <td class="unit"><?php esc_html_e( $_product->get_price(), PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                <td class="qty"><?php esc_html_e( $item_data['quantity'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                                <td class="total"><?php esc_html_e( $item_data['total'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td><td></td><td></td>
                            <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Subtotal',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></td>
                            <td class="total"><?php esc_html_e( $order_subtotal, PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                        </tr>
                        <?php 
                        if(isset($settings['invoice_settings']['enable_disable_shipping_list_invoice'])){
                            if(!empty($order_data['shipping_total'])){ ?>
                                <tr>
                                    <td></td><td></td><td></td>
                                    <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Shipping',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></strong></td>
                                    <td class="total"><?php esc_html_e( $order_data['shipping_total'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?><</td>
                                </tr>
                                <?php
                            } 
                        } ?>
                        <tr>
                            <td></td><td></td><td></td>
                            <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Total',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></td>
                            <td class="total"><?php esc_html_e( $order_data['total'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?><</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="thanks"><?php esc_html_e( 'Thank you!', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                    <?php if( isset($settings['template_settings']['invoice_notes']) && (!empty($settings['template_settings']['invoice_notes'])) ){ ?>     
                        <div class="notices">
                            <div class="notice"><strong><?php esc_html_e('Notice: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong><?php esc_html_e($settings['template_settings']['invoice_notes'] ,PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                        </div>
                    <?php } ?>

                    <?php if( isset($settings['template_settings']['footer']) && (!empty($settings['template_settings']['footer'])) ){ ?>    
                        <footer>
                            <?php esc_html_e($settings['template_settings']['footer'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </footer>
                    <?php } ?>
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div>

            <?php
      
            $html.= ob_get_clean();

            $dompdf->loadHtml($html);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents($pdf_save_label, $output);

            $pdf_path = PIPSFW_PLUGIN_DIR_PATH . "download/invoice_of_".$order_id."_".$orderStatus."_data.pdf";

            if (file_exists($pdf_path)) {
                if(isset($settings['invoice_settings']['attachedto'])){
                    $invoice_attaches = $settings['invoice_settings']['attachedto'];
                    if (in_array('wc-'.$orderStatus, $invoice_attaches, true)){
                        $attachments[] = $pdf_path;
                        return $attachments;
                    }
                }else{
                    $attachments[] = $pdf_path;
                    return $attachments;
                }
            }
        }    
    }

}
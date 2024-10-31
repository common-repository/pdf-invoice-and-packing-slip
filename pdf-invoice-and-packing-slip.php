<?php /**
 * Plugin Name: PDF Invoice and Packing slip
 * Plugin URI:        https://www.thedotstore.com/
 * Description:       With this plugin, you can create and manage complex fee rules in WooCommerce store without the help of a developer.
 * Version:           1.0.1
 * Author:            theDotstore
 * Author URI:        https://profiles.wordpress.org/dots
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pdf-invoice-and-packing-slip
 * Domain Path:       /languages
 *
 * @fs_premium_only /admin/js/pdf-invoice-and-packing-slip-for-woocommerce-admin.js
 */
// If this file is called directly, abort.
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
if ( !defined( 'ABSPATH' ) ) { 
    exit;
}

add_action( 'plugins_loaded', 'pipsfw_initialize_plugin' );
$wc_active = in_array( 'woocommerce/woocommerce.php', get_option( 'active_plugins' ), true );

if ( true === $wc_active ) {
    if(function_exists('allowed_html_tags')){
        function allowed_html_tags($tags=array()){
            $allowed_tags=array(
            'a' => array(
            'href' => array(),
            'title' => array(),
            'class' => array()
            ),
            'ul' => array('class' => array()),
            'li' => array('class' => array()),
            'div' => array('class' => array(),'id' => array()),
            'select' => array('id' => array(),'name'=> array(),'class' => array(),'multiple' => array(),'style' => array()),
            'input' => array('id' => array(),'value'=>array(),'name'=> array(),'class' => array(),'type' => array()),
            'textarea' => array('id' => array(),'name'=> array(),'class' => array()),
            'option' => array('id' => array(),'selected'=>array(),'name'=> array(),'value' => array()),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            ); 
            if(!empty($tags)){
                foreach ($tags as $key => $value) {
                    $allowed_tags[$key]=$value;
                }            
            }
            return $allowed_tags;
        }
    }

    if ( !defined( 'PIPSFW_PLUGIN_VERSION' ) ) {
        define( 'PIPSFW_PLUGIN_VERSION', '1.0.1' );
    }
    if ( !defined( 'PIPSFW_PLUGIN_URL' ) ) {
        define( 'PIPSFW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    }
    if ( !defined( 'PIPSFW_PLUGIN_DIR' ) ) {
        define( 'PIPSFW_PLUGIN_DIR', dirname( __FILE__ ) );
    }
    if ( !defined( 'PIPSFW_PLUGIN_DIR_PATH' ) ) {
        define( 'PIPSFW_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
    }
    if ( !defined( 'PIPSFW_SLUG' ) ) {
        define( 'PIPSFW_SLUG', 'pdf-invoice-and-packing-slip' );
    }
    if ( !defined( 'PIPSFW_PLUGIN_BASENAME' ) ) {
        define( 'PIPSFW_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
    }
    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-pdf-invoice-and-packing-slip-for-woocommerce-activator.php
     */
    function activate_woocommerce_pdf_invoices_packing_slips()
    {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-pdf-invoices-packing-slips-activator.php';
        Woocommerce_Pdf_Invoices_Packing_Slips_Activator::activate();
    }

    /**
     * The code that runs during plugin deactivation.
     * This action is documented in includes/class-pdf-invoice-and-packing-slip-for-woocommerce-deactivator.php
     */
    function deactivate_woocommerce_pdf_invoices_packing_slips()
    {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-pdf-invoices-packing-slips-deactivator.php';
        Woocommerce_Pdf_Invoices_Packing_Slips_Deactivator::deactivate();
    }

    register_activation_hook( __FILE__, 'activate_woocommerce_pdf_invoices_packing_slips' );
    register_deactivation_hook( __FILE__, 'deactivate_woocommerce_pdf_invoices_packing_slips' );
    /**
     * The core plugin class that is used to define internationalization,
     * admin-specific hooks, and public-facing site hooks.
     */
    require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-pdf-invoices-packing-slips.php';
    require plugin_dir_path( __FILE__ ) . 'includes/Woocommerce_Pdf_Invoices_Packing_Slips_Generator.php';
    /**
     * The core plugin include constant file for set constant.
     */
    require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-pdf-invoices-packing-slips-constants.php';
    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    function run_woocommerce_pdf_invoices_packing_slips()
    {
     
        $plugin = new Woocommerce_Pdf_Invoices_Packing_Slips();
        $plugin->run();
    }

    function woocommerce_pdf_invoices_packing_slips_path()
    {
        return untrailingslashit( plugin_dir_path( __FILE__ ) );
    }
    if (!function_exists('convert_array_to_int')) {
        function convert_array_to_int($arr){
            foreach ($arr as $key => $value) {
                $arr[$key]=(int)$value;
            }        
            return $arr;
        }
    }
}

/**
 * Check Initialize plugin in case of WooCommerce plugin is missing.
 *
 * @since    1.0.0
 */
function pipsfw_initialize_plugin()
{
    $wc_active = in_array( 'woocommerce/woocommerce.php', get_option( 'active_plugins' ), true );
    
    if ( current_user_can( 'activate_plugins' ) && $wc_active !== true || $wc_active !== true ) {
        add_action( 'admin_notices', 'pipsfw_plugin_admin_notice' );
    } else {
        run_woocommerce_pdf_invoices_packing_slips();
    }

}

/**
 * Show admin notice in case of WooCommerce plugin is missing.
 *
 * @since    1.0.0
 */
function pipsfw_plugin_admin_notice()
{
    $vpe_plugin = esc_html__( 'PDF Invoice and Packing slip', 'pdf-invoice-and-packing-slip' );
    $wc_plugin = esc_html__( 'WooCommerce', 'pdf-invoice-and-packing-slip-for-woocommercet' );
    ?>
    <div class="error">
        <p>
            <?php 
    echo  sprintf( esc_html__( '%1$s is ineffective as it requires %2$s to be installed and active.', 'pdf-invoice-and-packing-slip' ), '<strong>' . esc_html( $vpe_plugin ) . '</strong>', '<strong>' . esc_html( $wc_plugin ) . '</strong>' ) ;
    ?>
        </p>
    </div>
    <?php 
}
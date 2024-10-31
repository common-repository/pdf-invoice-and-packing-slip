<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.multidots.com/
 * @since      1.0.0
 *
 * @package    Woocommerce_Pdf_Invoices_Packing_Slips
 * @subpackage Woocommerce_Pdf_Invoices_Packing_Slips/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Woocommerce_Pdf_Invoices_Packing_Slips
 * @subpackage Woocommerce_Pdf_Invoices_Packing_Slips/includes
 * @author     multidots <mahesh.prajapati@multidots.com>
 */
class Woocommerce_Pdf_Invoices_Packing_Slips {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Woocommerce_Pdf_Invoices_Packing_Slips_Loader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $plugin_name The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct() {
        $this->plugin_name = 'woocommerce-pdf-invoices-packing-slips';
        $this->version = '1.0.0';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();

        $prefix = is_network_admin() ? 'network_admin_' : '';
        add_filter("{$prefix}plugin_action_links_" . PIPSFW_PLUGIN_BASENAME, array($this, 'plugin_action_links'), 10, 4);
    }
    public static function woocommerce_get_order_statuses() {
      $order_statuses = wc_get_order_statuses();
      $statuses = array();
      foreach ( $order_statuses as $key => $status ) {
        $statuses[$key] =  $status;
      }
      return $statuses;
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Woocommerce_Pdf_Invoices_Packing_Slips_Loader. Orchestrates the hooks of the plugin.
     * - Woocommerce_Pdf_Invoices_Packing_Slips_i18n. Defines internationalization functionality.
     * - Woocommerce_Pdf_Invoices_Packing_Slips_Admin. Defines all hooks for the admin area.
     * - Woocommerce_Pdf_Invoices_Packing_Slips_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-woocommerce-pdf-invoices-packing-slips-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-woocommerce-pdf-invoices-packing-slips-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-woocommerce-pdf-invoices-packing-slips-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-woocommerce-pdf-invoices-packing-slips-public.php';

        /**
         * Admin side user review block
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-woocommerce-pdf-invoices-packing-slips-user-feedback.php';

        $this->loader = new Woocommerce_Pdf_Invoices_Packing_Slips_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Woocommerce_Pdf_Invoices_Packing_Slips_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new Woocommerce_Pdf_Invoices_Packing_Slips_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {

        $plugin_admin = new Woocommerce_Pdf_Invoices_Packing_Slips_Admin($this->get_plugin_name(), $this->get_version());
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
         $this->loader->add_action('add_meta_boxes', $plugin_admin, 'register_metabox_for_order_page');
        if (empty($GLOBALS['admin_page_hooks']['dots_store'])) {
            $this->loader->add_action('admin_menu', $plugin_admin, 'dot_store_menu');
        }          
        $this->loader->add_action('admin_menu', $plugin_admin, 'pipsfw_plugin_menu');
        $this->loader->add_action('admin_head', $plugin_admin, 'pipsfw_remove_admin_menus');
        $this->loader->add_filter( 'woocommerce_email_attachments', $plugin_admin, 'pipsfw_attach_invoice_pdf_to_email', 10, 3);
        $this->loader->add_action( 'woocommerce_order_status_changed', $plugin_admin, 'pipsfw_attach_invoice_pdf_for_field_cancle_pending_order', 10, 3);
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks() {

        $plugin_public = new Woocommerce_Pdf_Invoices_Packing_Slips_Public($this->get_plugin_name(), $this->get_version());
       
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

        $this->loader->add_action('woocommerce_order_details_after_order_table', $plugin_public, 'order_data_show', 10, 1);
        $this->loader->add_action('woocommerce_thankyou', $plugin_public, 'order_data_show_thankyou', 10, 1);

        $this->loader->add_action('woocommerce_new_order', $plugin_public, 'create_invoice_package_slip_number_for_wc_order');
       
    }
    

    /**
     * Return the plugin action links.  This will only be called if the plugin
     * is active.
     *
     * @since 1.0.0
     * @param array $actions associative array of action names to anchor tags
     * @return array associative array of plugin action links
     */
    public function plugin_action_links($actions, $plugin_file, $plugin_data, $context) {
        $custom_actions = array(
            'configure' => sprintf('<a href="%s">%s</a>', admin_url('admin.php?page=woocommerce_pdf_invoices_packing_slips'), __('Settings', $this->plugin_name)),
            'docs' => sprintf('<a href="%s" target="_blank">%s</a>', esc_url('http://www.thedotstore.com/docs/plugin/woocommerce-pdf-invoices-packing-slips/'), __('Docs', $this->plugin_name)),
            'support' => sprintf('<a href="%s" target="_blank">%s</a>', esc_url('www.thedotstore.com/support'), __('Support', $this->plugin_name))
        );
        // add the links to the front of the actions list
        return array_merge($custom_actions, $actions);
    }

    public static function get_settings(){
        $setting=[];
        $setting['general_settings']=get_option('general_settings_inputs');
        $setting['invoice_settings']=get_option('invoice_settings_inputs');
        $setting['template_settings']=get_option('template_settings_inputs');
        return $setting;
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Woocommerce_Pdf_Invoices_Packing_Slips_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }
    
}

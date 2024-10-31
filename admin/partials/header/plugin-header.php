<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$plugin_url = PIPSFW_PLUGIN_URL;
$plugin_name = PIPSFW_PLUGIN_NAME;
$plugin_text_domain = PIPSFW_PLUGIN_TEXT_DOMAIN;
?>
<div id="dotsstoremain">
    <div class="all-pad">
        <header class="dots-header">
            <div class="dots-logo-main">
                <img  src="<?php echo esc_url($plugin_url) . '/admin/images/woo-product-att-logo.png'; ?>">
            </div>
            <div class="dots-header-right">
                <div class="logo-detail">
                    <strong><?php esc_html_e($plugin_name); ?></strong>
                    <span><?php esc_html_e('Free Version', $plugin_text_domain); ?> <?php echo esc_html(PIPSFW_PLUGIN_VERSION) ?></span>
                </div>

                <div class="button-group">
                    <div class="button-dots">
                        <span class="support_dotstore_image"><a target="_blank"
                                                                href="<?php echo esc_url('http://www.thedotstore.com/support/'); ?>">
                                <img src="<?php echo esc_url($plugin_url) . 'admin/images/support_new.png'; ?>"></a>
                        </span>
                    </div>
                </div>
            </div>
            <?php
            $about_plugin_setting_menu_enable = '';
            $PIPSFW_bulk_attachment = '';
            $about_plugin_get_started = '';
            $about_plugin_quick_info = '';
            $dotstore_setting_menu_enable = '';
            $PIPSFW_plugin_setting_page = '';
            $woocommerce_product_bulk_attachment = '';
            $tab_menu=filter_input(INPUT_GET,'tab',FILTER_SANITIZE_SPECIAL_CHARS);
            $page_menu=filter_input(INPUT_GET,'page',FILTER_SANITIZE_SPECIAL_CHARS);

            if ( isset( $page_menu ) && $page_menu === 'pipsfw-page-information' || isset( $page_menu ) && $page_menu === 'pipsfw-page-get-started' ) {
                $pipsfw_about = 'active';
            } else {
                $pipsfw_about = '';
            }
            $pipsfw_getting_started = isset( $menu_page ) && $menu_page === 'pipsfw-page-get-started' ? 'active' : '';
            $pipsfw_information = isset( $menu_page ) && $menu_page === 'pipsfw-page-get-started' ? 'active' : '';
            
            ?>

            <div class="dots-menu-main">
                <nav>
                    <ul>

                        <li><a class="dotstore_plugin <?php echo $page_menu==='woocommerce_pdf_invoices_packing_slips'?"active":""; ?>" href="<?php echo esc_url(site_url('wp-admin/admin.php?page=woocommerce_pdf_invoices_packing_slips')); ?>"><?php esc_html_e('General Settings', $plugin_text_domain) ?></a></li>
                        <li>
                            <a class="dotstore_plugin  <?php echo $page_menu==='pdf_invoices_packing_slips_invoice_settings'?"active":""; ?>" href="<?php echo esc_url(site_url('wp-admin/admin.php?page=pdf_invoices_packing_slips_invoice_settings')); ?>"><?php esc_html_e('Invoice Settings', $plugin_text_domain) ?></a>
                        </li>
                        <li>
                            <a class="dotstore_plugin <?php echo $page_menu==='pdf_invoices_packing_slips_template_settings'?"active":""; ?>" href="<?php echo esc_url(site_url('wp-admin/admin.php?page=pdf_invoices_packing_slips_template_settings')); ?>"><?php esc_html_e('Template Settings', $plugin_text_domain) ?></a>
                        </li>
                        <li>
                            <a class="dotstore_plugin <?php echo $page_menu==='pdf_invoices_packing_slips_bulk_download'?"active":""; ?>" href="<?php echo esc_url(site_url('wp-admin/admin.php?page=pdf_invoices_packing_slips_bulk_download')); ?>"><?php esc_html_e('Download', $plugin_text_domain) ?></a>
                        </li>
                        <li>
                            <a class="dotstore_plugin <?php echo esc_attr($pipsfw_about); ?>"
                               href="<?php echo esc_url(site_url('wp-admin/admin.php?page=pipsfw-page-get-started')); ?>"><?php esc_html_e( 'About Plugin', $plugin_text_domain ); ?></a>
                            <ul class="sub-menu">
                                <li><a class="dotstore_plugin <?php echo esc_attr($pipsfw_getting_started); ?>"
                                       href="<?php echo esc_url(site_url('wp-admin/admin.php?page=pipsfw-page-get-started')); ?>"><?php esc_html_e( 'Getting Started', $plugin_text_domain ); ?></a>
                                </li>
                                <li><a class="dotstore_plugin <?php echo esc_attr($pipsfw_information); ?>"
                                       href="<?php echo esc_url(site_url('wp-admin/admin.php?page=pipsfw-page-information')); ?>"><?php esc_html_e( 'Quick info', $plugin_text_domain ); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dotstore_plugin"><?php esc_html_e( 'Dotstore', $plugin_text_domain ); ?></a>
                            <ul class="sub-menu">
                                <li><a target="_blank"
                                       href="<?php echo esc_url('https://www.thedotstore.com/woocommerce-plugins/'); ?>"><?php esc_html_e( 'WooCommerce Plugins', $plugin_text_domain ); ?></a>
                                </li>
                                <li><a target="_blank"
                                       href="<?php echo esc_url('https://www.thedotstore.com/wordpress-plugins/'); ?>"><?php esc_html_e( 'Wordpress Plugins', $plugin_text_domain ); ?></a>
                                </li>
                                <li><a target="_blank"
                                       href="<?php echo esc_url('https://www.thedotstore.com/support/'); ?>"><?php esc_html_e( 'Contact Support', $plugin_text_domain ); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$image_url = PIPSFW_PLUGIN_URL . 'admin/images/right_click.png';
?>
<div class="dotstore_plugin_sidebar">

    <?php 
        $review_url = esc_url( 'https://wordpress.org/plugins/pdf-invoice-and-packing-slip/#reviews' );
        $plugin_at  = 'WP.org';
    ?>
    <div class="dotstore-important-link">
        <div class="image_box">
            <img src="<?php echo esc_url( plugin_dir_url( dirname( __FILE__, 2 ) ) . 'images/rate-us.png' ); ?>" alt="<?php esc_attr_e( 'Rate us', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?> ">
        </div>
        <div class="content_box">
            <h3><?php esc_html_e('Like This Plugin?', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></h3>
            <p><?php esc_html_e('Your Review is very important to us as it helps us to grow more.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
            <a class="btn_style" href="<?php echo $review_url;?>" target="_blank"><?php esc_html_e('Review Us on ', PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php echo $plugin_at; ?></a>
        </div>
    </div>
     <div class="dotstore-important-link">
        <h2><span class="dotstore-important-link-title"><?php esc_html_e('Important link', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></span></h2>
        <div class="video-detail important-link">
            <ul>
                <li>
                    <img src="<?php echo esc_url($image_url); ?>">
                    <a target="_blank" href="<?php echo esc_url('http://www.thedotstore.com/docs/plugin/woocommerce-product-attachment/'); ?>"><?php esc_html_e('Plugin documentation', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li> 
                <li>
                    <img src="<?php echo esc_url($image_url); ?>">
                    <a target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/support'); ?>"><?php esc_html_e('Support platform', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img src="<?php echo esc_url($image_url); ?>">
                    <a target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/suggest-a-feature/'); ?>"><?php esc_html_e('Suggest A Feature', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img src="<?php echo esc_url($image_url); ?>">
                    <a  target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/woocommerce-product-attachment#tab-changelog'); ?>"><?php esc_html_e('Changelog', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- html for popular plugin !-->
    <div class="dotstore-important-link">
        <h2><span class="dotstore-important-link-title"><?php esc_html_e('OUR POPULAR PLUGINS', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></span></h2>
        <div class="video-detail important-link">
            <ul>
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo esc_url(PIPSFW_PLUGIN_URL) . 'admin/images/advance-flat-rate.png'; ?>">
                    <a target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/flat-rate-shipping-plugin-for-woocommerce'); ?>"><?php esc_html_e('Advanced Flat Rate Shipping Method', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li> 
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo esc_url(PIPSFW_PLUGIN_URL) . 'admin/images/wc-conditional-product-fees.png'; ?>">
                    <a  target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/woocommerce-conditional-product-fees-checkout/'); ?>"><?php esc_html_e('WooCommerce Conditional Product Fees', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo esc_url(PIPSFW_PLUGIN_URL) . 'admin/images/advance-menu-manager.png'; ?>">
                    <a  target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/advance-menu-manager-wordpress/'); ?>"><?php esc_html_e('Advance Menu Manager', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo esc_url(PIPSFW_PLUGIN_URL) . 'admin/images/wc-enhanced-ecommerce-analytics-integration.png'; ?>">
                    <a target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/woocommerce-enhanced-ecommerce-analytics-integration-with-conversion-tracking'); ?>"><?php esc_html_e('Woo Enhanced Ecommerce Analytics Integration', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img  class="sidebar_plugin_icone" src="<?php echo esc_url(PIPSFW_PLUGIN_URL) . 'admin/images/advanced-product-size-charts.png'; ?>">
                    <a target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/woocommerce-advanced-product-size-charts/'); ?>"><?php esc_html_e('Advanced Product Size Charts', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                <li>
                    <img  class="sidebar_plugin_icone" src="<?php echo esc_url(PIPSFW_PLUGIN_URL) . 'admin/images/blocker.png'; ?>">
                    <a target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/product/woocommerce-blocker-lite-prevent-fake-orders-blacklist-fraud-customers/'); ?>"><?php esc_html_e('WooCommerce Blocker – Prevent Fake Orders', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
                </li>
                </br>
            </ul>
        </div>
        <div class="view-button">
            <a class="view_button_dotstore" target="_blank" href="<?php echo esc_url('https://www.thedotstore.com/plugins/'); ?>"><?php esc_html_e('VIEW ALL', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a>
        </div>
    </div>
    <!-- html end for popular plugin !-->
</div>
</div>
</body>
</html>
<?php
// If this file is called directly, abort.
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
?>

<div class="pipsfw-section-left">
    <div class="wdpad-main-table res-cl">
        <h2><?php esc_html_e( 'Quick info', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></h2>
        <table class="table-outer">
            <tbody>
            <tr>
                <td class="fr-1"><?php esc_html_e( 'Product Type', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                <td class="fr-2"><?php esc_html_e( 'WooCommerce Plugin', PIPSFW_PLUGIN_TEXT_DOMAIN); ?></td>
            </tr>
            <tr>
                <td class="fr-1"><?php esc_html_e( 'Product Name', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                <td class="fr-2"><?php esc_html_e( $plugin_name, PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
            </tr>
            <tr>
                <td class="fr-1"><?php esc_html_e( 'Installed Version', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                <td class="fr-2"><?php esc_html_e( PIPSFW_PLUGIN_VERSION, PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
            </tr>
            <tr>
                <td class="fr-1"><?php esc_html_e( 'License & Terms of use', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                <td class="fr-2">
                    <a target="_blank" href="<?php echo esc_url( 'www.thedotstore.com/terms-and-conditions' ); ?>">
						<?php esc_html_e( 'Click here', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?>
                    </a>
					<?php esc_html_e( ' to view license and terms of use.', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?>
                </td>
            </tr>
            <tr>
                <td class="fr-1"><?php esc_html_e( 'Help & Support', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                <td class="fr-2">
                    <ul>
                        <li>
                            <a href="<?php echo esc_url( add_query_arg( array( 'page' => 'pipsfw-page-get-started' ), admin_url( 'admin.php' ) ) ); ?>"><?php esc_html_e( 'Quick Start', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></a>
                        </li>
                        <li><a target="_blank"
                               href="<?php echo esc_url( '#' ); ?>"><?php esc_html_e( 'Guide Documentation', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></a>
                        </li>
                        <li><a target="_blank"
                               href="<?php echo esc_url( 'www.thedotstore.com/support' ); ?>"><?php esc_html_e( 'Support Forum', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></a>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="fr-1"><?php esc_html_e( 'Localization', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                <td class="fr-2"><?php esc_html_e( 'English', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
            </tr>

            </tbody>
        </table>
    </div>
</div>

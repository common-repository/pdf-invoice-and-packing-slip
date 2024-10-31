<?php
// If this file is called directly, abort.
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }
?>

<div class="pipsfw-section-left">
    <div class="wdpad-main-table res-cl">
        <h2><?php esc_html_e( 'Thanks For Installing PDF Invoice and Packing slip', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></h2>
        <table class="table-outer">
            <tbody>
            <tr>
                <td class="fr-2">
                    <p class="block gettingstarted">
                        <strong><?php esc_html_e( 'Getting Started', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></strong>
                    </p>
                    <p class="block textgetting">
                        <?php esc_html_e( 'Create/manage PDF invoice for WooCommerce Order.', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?>
                    </p>
                    <p class="block textgetting">
                        <?php
                            echo sprintf( wp_kses( __( '<strong>Step 1: </strong>Invoice Setting.'
                                    , PIPSFW_PLUGIN_TEXT_DOMAIN )
                                , array( 'strong' => array() ) ) );
                        ?>
                        <span class="gettingstarted">
                            <img src="<?php echo esc_url( PIPSFW_PLUGIN_URL . 'admin/images/pipsfw_Getting_Started_01.png' ); ?>">
                        </span>
                    </p>
                    <p class="block gettingstarted textgetting">
                        <?php
                            echo sprintf( wp_kses( __( '<strong>Step 2: </strong>Template Setting'
                                    , PIPSFW_PLUGIN_TEXT_DOMAIN )
                                , array( 'strong' => array() ) ) );
                        ?>
                        <span class="gettingstarted">
                            <img src="<?php echo esc_url( PIPSFW_PLUGIN_URL . 'admin/images/pipsfw_Getting_Started_02.png' ); ?>">
                        </span>
                    </p>
                    <p class="block gettingstarted textgetting">
                        <?php
                            echo sprintf( wp_kses( __( '<strong>Step 3: </strong>Display PDF Invoice on Order Page'
                                    , PIPSFW_PLUGIN_TEXT_DOMAIN )
                                , array( 'strong' => array() ) ) );
                        ?>
                        <span class="gettingstarted">
                            <img src="<?php echo esc_url( PIPSFW_PLUGIN_URL . 'admin/images/pipsfw_Getting_Started_03.png' ); ?>">
                        </span>
                    </p>
                    <p class="block gettingstarted textgetting">
                        <?php
                            echo sprintf( wp_kses( __( '<strong>Step 4: </strong>Display PDF Invoice on My Account Page.'
                                    , PIPSFW_PLUGIN_TEXT_DOMAIN )
                                , array( 'strong' => array() ) ) );
                        ?>
                        <span class="gettingstarted">
                            <img src="<?php echo esc_url( PIPSFW_PLUGIN_URL . 'admin/images/pipsfw_Getting_Started_04.png' ); ?>">
                        </span>
                    </p>
                    <p class="block gettingstarted textgetting">
                        <?php
                            echo sprintf( wp_kses( __( '<strong>Step 5: </strong>Download PDF invoice between start date to end date.'
                                    , PIPSFW_PLUGIN_TEXT_DOMAIN )
                                , array( 'strong' => array() ) ) );
                        ?>
                        <span class="gettingstarted">
                            <img src="<?php echo esc_url( PIPSFW_PLUGIN_URL . 'admin/images/pipsfw_Getting_Started_05.png' ); ?>">
                        </span>
                    </p>
                    <p class="block gettingstarted textgetting">
                        <?php
                            echo sprintf( wp_kses( __( '<strong>Important Note: </strong>This plugin is only compatible with WooCommerce version 3.0 and more.'
                                    , PIPSFW_PLUGIN_TEXT_DOMAIN )
                                , array( 'strong' => array() ) ) );
                        ?>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

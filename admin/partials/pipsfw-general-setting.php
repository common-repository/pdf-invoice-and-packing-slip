<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$plugin_text_domain = PIPSFW_PLUGIN_TEXT_DOMAIN;
$general_settings_inputs=filter_input(INPUT_POST,'general',FILTER_SANITIZE_STRING,FILTER_REQUIRE_ARRAY);
if(!empty($general_settings_inputs)){
    update_option('general_settings_inputs',$general_settings_inputs);
}
$get_general_settings = get_option('general_settings_inputs');
$pdf_view = $get_general_settings['pdf_view'];
?>
<div class="wdpad-main-table res-cl">
    <h2><?php esc_html_e('General Settings',$plugin_text_domain)?></h2>
    <form method="POST"  action="">
        <input type="hidden" name="post_type" value="wc_dynamic_pricing">
        <input type="hidden" name="dpad_post_id" value="">
        <table class="form-table table-outer product-fee-table">
            <tbody>
                <tr valign="top">
                    <th class="titledesc" scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('How do you want to view PDF',$plugin_text_domain)?></label></th>
                    <td class="forminp">
                        <select name="general[pdf_view]">
                            <option <?php echo isset($pdf_view) && $pdf_view==='download'?"selected":'' ?> value="download"><?php esc_html_e('Download',$plugin_text_domain)?></option>
                            <option <?php echo isset($pdf_view) && $pdf_view==='newtab'?"selected":'' ?> value="newtab"><?php esc_html_e('Open in new tab',$plugin_text_domain)?></option>
                        </select>
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Choose one which you want to display PDF invoice in new tab or download', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <input type="submit" class="button button-primary" name="">
    </form>
</div>

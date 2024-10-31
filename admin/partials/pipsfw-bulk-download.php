<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$plugin_text_domain = PIPSFW_PLUGIN_TEXT_DOMAIN;
?>

<div class="wdpad-main-table res-cl">
  <h2><?php esc_html_e('Download Invoice',$plugin_text_domain)?></h2>
  <form method="GET"  action="admin.php">
    <table class="form-table table-outer product-fee-table">
    	<tbody>
        <tr valign="top">
          <th class="titledesc"   scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Start Date',$plugin_text_domain)?><span class="required-star">*</span></label></th>
          <td class="forminp" >
            <input type="text" class="pipsfw_datepicker" name="start_date" value="" placeholder="Start Date" autocomplete="off" required/>
            <span class="pipsfw_tooltip_tab_description"></span>
            <p class="description" style="display:none;">
                <?php esc_html_e( 'Enter start date for downloading invoice template', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
            </p>
         </td>
        </tr>
        <tr valign="top">
          <th class="titledesc"  scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('End Date',$plugin_text_domain)?><span class="required-star">*</span></label></th>
          <td class="forminp" >
            <input type="text" class="pipsfw_datepicker" name="end_date" value="" placeholder="End Date" autocomplete="off" required/>
            <span class="pipsfw_tooltip_tab_description"></span>
            <p class="description" style="display:none;">
                <?php esc_html_e( 'Enter end date for downloading invoice template', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
            </p>
         </td>
        </tr>
        <tr>
          <td class="forminp" colspan="2">
            <input type="hidden" name="page" value="pdf_invoices_packing_slips_bulk_download">
          	<input type="submit" name="submit" class="button button-primary" value="download">
          </td>
    		</tr>
    	</tbody>
    </table>
  </form>
</div>
<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$plugin_text_domain = PIPSFW_PLUGIN_TEXT_DOMAIN;
$invoice_settings_inputs=filter_input(INPUT_POST,'invoice',FILTER_SANITIZE_STRING,FILTER_REQUIRE_ARRAY);
if(!empty($invoice_settings_inputs)){
    update_option('invoice_settings_inputs',$invoice_settings_inputs);
}
$get_invoice_settings = get_option('invoice_settings_inputs');

if(isset($get_invoice_settings) && is_array($get_invoice_settings)){
    extract($get_invoice_settings); 
}

?>
<div class="wdpad-main-table res-cl">
    <h2><?php esc_html_e('Invoice Settings',$plugin_text_domain)?></h2>
    <form method="POST"  action="">
         <table class="form-table table-outer product-fee-table">
            <tbody>
                <tr valign="top">
                    <th class="titledesc" colspan="2" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Invoice Enable/Disable',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2">
                        <label class="switch">
                          <input type="checkbox" <?php echo isset($invoice_enable_diable) && $invoice_enable_diable==='on'?"checked":'' ?> name="invoice[invoice_enable_diable]">
                          <span class="slider round"></span>
                        </label>
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enable or Disable PDF Invoice and Packing slip Plugin using this button.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc" colspan="2" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Attached To',$plugin_text_domain)?></label>
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Attached Invoice for selected order status. If none is selected or leave blank, the invoice will be always attach with all order status.', PIPSFW_PLUGIN_TEXT_DOMAIN ); ?>
                        </p>
                    </th>
                    <td class="forminp" colspan="2">
                        <?php
                        $attached_options=Woocommerce_Pdf_Invoices_Packing_Slips::woocommerce_get_order_statuses();

                        foreach ($attached_options as $key => $value) {
                            if( 'wc-processing' === $key || 'wc-on-hold' === $key || 'wc-completed' === $key || 'wc-refunded' === $key ) {
                            ?>
                                <label class="attach_to">
                                    <input type="checkbox" <?php echo !empty($attachedto) && in_array($key,$attachedto,true)?"checked":'' ?> name="invoice[attachedto][]" value="<?php echo esc_attr($key) ?>"> <?php echo esc_html($value) ?>
                                </label><br>
                            <?php
                            }
                        }
                         ?>
                        
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc"  colspan="2" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Disable for',$plugin_text_domain)?></label>
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Disable Invoice for selected order status. If none is selected or leave blank, the invoice will be enable for all order status.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </th>
                    <td class="forminp" colspan="2">
                        <?php
                        $disablefor_options=Woocommerce_Pdf_Invoices_Packing_Slips::woocommerce_get_order_statuses();
                        foreach ($disablefor_options as $key => $value) {
                            ?>
                            <label class="disable_for">
                                <input type="checkbox" <?php echo !empty($disablefor) && in_array($key,$disablefor,true)?"checked":'' ?> name="invoice[disablefor][]" value="<?php echo esc_attr($key) ?>"> <?php echo esc_html($value) ?>
                            </label><br>
                            <?php
                        }
                         ?>
                        
                    </td>
                </tr>
               <tr valign="top">
                    <th class="titledesc" colspan="2" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Display Shipping Address',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2">
                          <input type="checkbox" <?php echo isset($enable_diable_shipping_address) && $enable_diable_shipping_address==='on'?"checked":'' ?> name="invoice[enable_diable_shipping_address]">
                          <span class="pipsfw_tooltip_tab_description"></span>
                          <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enable/Disable shipping address for PDF invoice.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                          </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc" colspan="2" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Display Email Address',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2">
                          <input type="checkbox" <?php echo isset($enable_diable_email_address) && $enable_diable_email_address==='on'?"checked":'' ?> name="invoice[enable_diable_email_address]">
                          <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enable/Disable email address for PDF invoice.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc" colspan="2" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Display Phone Number',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2">
                          <input type="checkbox" <?php echo isset($enable_diable_phone_number) && $enable_diable_phone_number==='on'?"checked":'' ?> name="invoice[enable_diable_phone_number]">
                          <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enable/Disable phone number for PDF invoice.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc" scope="row" colspan="2">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Display Invoice Date',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2">
                          <input type="checkbox" <?php echo isset($enable_diable_invoice_date) && $enable_diable_invoice_date==='on'?"checked":'' ?> name="invoice[enable_diable_invoice_date]">
                          <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enable/Disable invoice date for PDF invoice.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc" colspan="2" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Display Invoice Invoice Number',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2">
                          <input type="checkbox" <?php echo isset($enable_diable_invoice_number_column) && $enable_diable_invoice_number_column==='on'?"checked":'' ?> name="invoice[enable_diable_invoice_number_column]">
                          <span class="pipsfw_tooltip_tab_description"></span>
                          <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enable/Disable invoice number for PDF Invoice.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                          </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc" colspan="4" scope="row">
                        <label for="dpad_settings_product_dpad_title"><h2><?php esc_html_e('Other Settings',$plugin_text_domain)?></h2></label>
                    </th>
                </tr>
                 <tr valign="top">
                    <th class="titledesc" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Next Invoice Number(without prefix/suffix)',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2" colspan="2">
                          <input type="number" min="1" value="<?php echo isset($next_invoice_number) ? esc_attr($next_invoice_number) : '1'; ?>" name="invoice[next_invoice_number]" style="pointer-events: none;color: #7e8993;">
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc" scope="row" colspan="2">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Number Format',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2" colspan="2">    
                        <input type="text" placeholder="prefix" value="<?php echo isset($invoice_number_prefix) ? esc_attr($invoice_number_prefix) : ''; ?>" name="invoice[invoice_number_prefix]">
                        <input type="text" placeholder="sufix" value="<?php echo isset($invoice_number_sufix) ? esc_attr($invoice_number_sufix) : ''; ?>" name="invoice[invoice_number_sufix]">
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Insert sufix/prefix for pdf incoice number format.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc" colspan="2" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Allow My Account Invoice Downloiad',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2">
                        <select name="invoice[allow_my_account_invoice_download]">
                            <option <?php echo isset($allow_my_account_invoice_download) && $allow_my_account_invoice_download==='always'?"selected":'' ?> value="always">Always</option>
                            <option <?php echo isset($allow_my_account_invoice_download) && $allow_my_account_invoice_download==='never'?"selected":'' ?> value="never">Never</option>
                            
                        </select>
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enable/Disable PDF invoice attachment in My Account page.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc" colspan="2" scope="row">
                        <label for="dpad_settings_product_dpad_title"><?php esc_html_e('Enable Shipping List',$plugin_text_domain)?></label>
                    </th>
                    <td class="forminp" colspan="2">
                          <input type="checkbox" <?php echo isset($enable_disable_shipping_list_invoice) && $enable_disable_shipping_list_invoice==='on'?"checked":'' ?> name="invoice[enable_disable_shipping_list_invoice]">
                          <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enable/Disable shipping list for PDF Invoice.', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <input type="submit" class="button button-primary" name="">
    </form>
</div>

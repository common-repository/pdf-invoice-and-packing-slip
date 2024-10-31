<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$plugin_text_domain = PIPSFW_PLUGIN_TEXT_DOMAIN;
$template_settings_inputs=filter_input(INPUT_POST,'template',FILTER_SANITIZE_STRING,FILTER_REQUIRE_ARRAY);
if(!empty($template_settings_inputs)){
    update_option('template_settings_inputs',$template_settings_inputs);
}
$get_template_settings=get_option('template_settings_inputs');
if(isset($get_template_settings) && is_array($get_template_settings))
extract($get_template_settings);
?>
<div class="wdpad-main-table res-cl">
    <h2><?php esc_html_e('Template Settings',$plugin_text_domain)?></h2>
    <form method="POST"  action="">
        <input type="hidden" name="post_type" value="wc_dynamic_pricing">
        <input type="hidden" name="dpad_post_id" value="">
        <table class="form-table table-outer product-fee-table">
        	<tbody>
                <tr valign="top">
                    <th class="titledesc"  scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Shop Header/Logo',$plugin_text_domain)?></label></th>
                    <td class="forminp" >
                        <?php if(isset($logo_image)){
                            echo "<img width='200' class='logo_image_tag' src='".esc_url($logo_image)."'>";
                        } ?>
                        <input id="logo_image" value="<?php echo isset($logo_image) ? esc_attr($logo_image) : '' ?>" type="hidden" size="36" name="template[logo_image]" class="wpss_text wpss-file" /><br>
                        <input id="upload_logo_button" type="button" value="Upload Image" class="wpss-filebtnb" />
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Upload Shop Header/Logo for PDF Invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                    
                </tr>

                <tr valign="top">
                    <th class="titledesc"  scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Shop Name',$plugin_text_domain)?></label></th>
                    <td class="forminp" >
                        <input type="text" value="<?php echo isset($shop_name) ? esc_attr($shop_name) : ''; ?>" name="template[shop_name]">
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enter your shop name which you want to display in PDF invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc"  scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Shop VAT Number',$plugin_text_domain)?></label></th>
                    <td class="forminp" >
                        <input type="text" value="<?php echo isset($shop_vat_number) ? esc_attr($shop_vat_number) : ''; ?>" name="template[shop_vat_number]">
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enter your shop vat number which you want to display in PDF invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc"  scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Shop PAN Number',$plugin_text_domain)?></label></th>
                    <td class="forminp" >
                        <input type="text" value="<?php echo isset($shop_pan_number) ? esc_attr($shop_pan_number) : ''; ?>" name="template[shop_pan_number]">
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enter your shop pan number which you want to display in PDF invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc"  scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Shop GST Number',$plugin_text_domain)?></label></th>
                    <td class="forminp" >
                        <input type="text" value="<?php echo isset($shop_gst_number) ? esc_attr($shop_gst_number) : ''; ?>" name="template[shop_gst_number]">
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enter your shop GST number which you want to display in PDF invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>
                <tr valign="top">
                    <th class="titledesc"  scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Shop Address',$plugin_text_domain)?></label></th>
                    <td class="forminp" >
                        <textarea name="template[shop_address]"><?php echo isset($shop_address) ? esc_html__($shop_address ,$plugin_text_domain) : ''; ?></textarea>
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enter your shop address which you want to display in PDF invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr> 
                <tr valign="top">
                    <th class="titledesc" scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Bank Name',$plugin_text_domain)?></label></th>
                    <td class="forminp">
                        <input type="text" value="<?php echo isset($bank_name) ? esc_attr($bank_name) : ''; ?>" name="template[bank_name]">
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enter your bank name which you want to display in PDF invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>

                <tr valign="top">
                    <th class="titledesc" scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Bank Account Number',$plugin_text_domain)?></label></th>
                    <td class="forminp">
                        <input type="text" value="<?php echo isset($bank_account_number) ? esc_attr($bank_account_number) : ''; ?>" name="template[bank_account_number]">
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enter your bank account number which you want to display in PDF invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>

                <tr valign="top">
                    <th class="titledesc" scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Invoice notes',$plugin_text_domain)?></label></th>
                    <td class="forminp">
                        <input type="text" value="<?php echo isset($invoice_notes) ? esc_attr($invoice_notes) : ''; ?>" name="template[invoice_notes]">
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enter invoice note which you want to display in PDF invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>

                <tr valign="top">
                    <th class="titledesc" scope="row"><label for="dpad_settings_product_dpad_title"><?php esc_html_e('Footer(Terms/Consitions/Polices)',$plugin_text_domain)?></label></th>
                    <td class="forminp">
                        <textarea name="template[footer]"><?php echo isset($footer) ? esc_html__($footer,$plugin_text_domain) : ''; ?></textarea>
                        <span class="pipsfw_tooltip_tab_description"></span>
                        <p class="description" style="display:none;">
                            <?php esc_html_e( 'Enter your Terms/Consitions/Polices text which you want to display in PDF invoice. Default: Disable', PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                        </p>
                    </td>
                </tr>            
            </tbody>
        </table>
        <br>
        <input type="submit" class="button button-primary" name="">
    </form>
</div>
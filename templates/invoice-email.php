<?php 
    $settings=Woocommerce_Pdf_Invoices_Packing_Slips::get_settings();
    $order_data = $order->get_data();
    $invoice_number=get_post_meta($order_id,'inoice_number',true);
    $style_url = PIPSFW_PLUGIN_DIR_PATH."templates/template-style.css";
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="<?php echo esc_url($style_url); ?>">
<div id="invoice">
    <div class="invoice overflow-auto">
        <header>
            <table class="table" width="100%">
                <tr>
                    <td>
                        <?php if( isset($settings['template_settings']['logo_image']) && (!empty($settings['template_settings']['logo_image'])) ){    

                        $path_data =  $settings['template_settings']['logo_image']; 
                        $type_data = pathinfo($path_data, PATHINFO_EXTENSION);
                        $data = file_get_contents($path_data);
                        $base64 = 'data:image/' . $type_data . ';base64,' . base64_encode($data);
                         ?>
                        <a target="_blank" href="https://lobianijs.com">
                            <img class='invoice_logo' src="<?php echo esc_url($path_data); ?>" data-holder-rendered="true" />
                        </a>
                        <?php } ?>    

                    </td>
                    <td class="text-right">
                        <?php if( isset($settings['template_settings']['shop_name']) && (!empty($settings['template_settings']['shop_name'])) ){ ?>    
                            <h2 class="name">
                                <a target="_blank" href="https://lobianijs.com">
                                    <?php esc_html_e($settings['template_settings']['shop_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                </a>
                            </h2>
                        <?php } ?>

                        <?php if( isset($settings['template_settings']['shop_address']) && (!empty($settings['template_settings']['shop_address'])) ){ ?>    
                            <div><?php esc_html_e($settings['template_settings']['shop_address'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                        <?php } ?>

                        <?php if( isset($settings['template_settings']['shop_vat_number']) && (!empty($settings['template_settings']['shop_vat_number'])) ){ ?>    
                            <div><strong><?php esc_html_e('Vat Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_vat_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                        <?php } ?>

                        <?php if( isset($settings['template_settings']['shop_pan_number']) && (!empty($settings['template_settings']['shop_pan_number'])) ){ ?>    
                            <div><strong><?php esc_html_e('PAN Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_pan_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                        <?php } ?>

                        <?php if( isset($settings['template_settings']['shop_gst_number']) && (!empty($settings['template_settings']['shop_gst_number'])) ){ ?>    
                            <div><strong><?php esc_html_e('GST Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['shop_gst_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                        <?php } ?>

                        <?php if( isset($settings['template_settings']['bank_name']) && (!empty($settings['template_settings']['bank_name'])) ){ ?>    
                            <div><strong><?php esc_html_e('Bank Name: ',PIPSFW_PLUGIN_TEXT_DOMAIN)?></strong><?php esc_html_e($settings['template_settings']['bank_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                        <?php } ?>

                        <?php if( isset($settings['template_settings']['bank_account_number']) && (!empty($settings['template_settings']['bank_account_number'])) ){ ?>    
                            <div><strong><?php esc_html_e('A/c No: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong><?php esc_html_e($settings['template_settings']['bank_account_number'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                        <?php } ?>
                    </td>
                </tr>
            </table>
            <table class="table row contacts">
                <tr class="col invoice-to">
                    <td>
                        <h4 class="text-gray-light"><strong><?php esc_html_e('Invoice To:',PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </strong></h4>
                        <h4 class="to">
                            <label class="fname"><?php esc_html_e($order_data['billing']['first_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                            <label class="lname"><?php esc_html_e($order_data['billing']['last_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                        </h4>
                        <?php 
                            $state_code = $order_data['billing']['state'];
                            $country_code = $order_data['billing']['country'];

                            $state_name = WC()->countries->states[$country_code][$state_code];
                            $country_name = WC()->countries->countries[ $country_code ];
                        ?>
                        <div class="address">
                            <p><?php esc_html_e( $order_data['billing']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                            <p><?php esc_html_e( $order_data['billing']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                            <?php esc_html_e( $order_data['billing']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['billing']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                            <p><?php esc_html_e( $state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                            <?php esc_html_e( $country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                            <?php esc_html_e( $order_data['billing']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p> 
                        </div>
                        <?php if(isset($settings['invoice_settings']['enable_diable_phone_number'])){ ?>
                                <div class="tel"><?php esc_html_e('Tel: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?> <a href="<?php echo esc_url($order_data['billing']['phone']); ?>"><?php esc_html_e( $order_data['billing']['phone'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a></div>
                        <?php } ?>
                          <?php if(isset($settings['invoice_settings']['enable_diable_email_address'])){ ?>
                                <div class="email"><a href="<?php echo esc_url('mailto:john@example.com'); ?>"><?php esc_html_e($order_data['billing']['email'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></a></div>
                            <?php } ?>
                    </td>
                    <td>
                        <?php 
                        if(isset($settings['invoice_settings']['enable_diable_shipping_address']) && $settings['invoice_settings']['enable_diable_shipping_address']==='on'){ ?>

                            <h4 class="text-gray-light"><strong><?php esc_html_e('Shipping To:',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong> </h4>
                            <h4 class="to">
                                <label class="fname"><?php esc_html_e($order_data['shipping']['first_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                                <label class="lname"><?php esc_html_e($order_data['shipping']['last_name'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label>
                            </h4>
                            <?php 
                                $ship_state_code = $order_data['shipping']['state'];
                                $ship_country_code = $order_data['shipping']['country'];

                                $ship_state_name = WC()->countries->states[$ship_country_code][$ship_state_code];
                                $ship_country_name = WC()->countries->countries[ $ship_country_code ];
                            ?>
                            <?php if( empty($order_data['shipping']) ){ ?>
                                <div class="address">
                                    <p><?php esc_html_e( $order_data['billing']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                    <p><?php esc_html_e( $order_data['billing']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                    <?php esc_html_e( $order_data['billing']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['billing']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                    <p><?php esc_html_e( $state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                    <?php esc_html_e( $country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                    <?php esc_html_e( $order_data['billing']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p> 
                                </div>
                            <?php }else{ ?>
                                <div class="address">
                                    <p><?php esc_html_e( $order_data['shipping']['company'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>
                                    <p><?php esc_html_e( $order_data['shipping']['address_1'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
                                    <?php esc_html_e( $order_data['shipping']['address_2'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,<?php esc_html_e( $order_data['shipping']['city'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?> </p>
                                    <p><?php esc_html_e( $ship_state_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>,
                                    <?php esc_html_e( $ship_country_name, PIPSFW_PLUGIN_TEXT_DOMAIN); ?>- 
                                    <?php esc_html_e( $order_data['shipping']['postcode'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?></p>     
                                </div>
                            <?php } ?>
                        <?php } 
                        ?>
                    </td>

                    <td class="text-right">
                        <?php if(isset($settings['invoice_settings']['enable_diable_invoice_number_column'])){ ?>
                            <h4 class="invoice-id"><strong><?php esc_html_e('Invoice Number: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php echo isset($invoice_number) ? esc_html_e($invoice_number,PIPSFW_PLUGIN_TEXT_DOMAIN) : ""; ?></strong></h4></div>
                        <?php } ?>
                        <?php if(isset($settings['invoice_settings']['enable_diable_invoice_date'])){ ?>
                            <div class="date"><?php esc_html_e('Invoice Date: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e(date_format($order_data['date_created'],"Y/m/d H:i:s"),PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                        <?php } ?>
                        <div class="payment"><?php esc_html_e('Payment Method: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e($order_data['payment_method_title'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                        <div class="order_status"><?php esc_html_e('Order Status: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?><?php esc_html_e($order_data['status'],PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
                    </td>
                </tr>
            </table>
        </header>
        <table class="table text-right product-detail" border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-left"><?php esc_html_e('Name',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                    <th class="text-center"><?php esc_html_e('Rate',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                    <th class="text-center"><?php esc_html_e('Quantity',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                    <th class="text-center"><?php esc_html_e('Total',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $items = $order->get_items();
                $order_subtotal = $order->get_subtotal();
                $order_subtotal = number_format( $order_subtotal, 2 );
                foreach ( $items as $item_id => $item_data ) {
                    $_product = wc_get_product( $item_data['product_id'] ); ?>
                <tr>
                    <td class="no"><?php esc_html_e( $item_data['product_id'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                    <td class="text-left"><?php esc_html_e( $item_data['name'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                    <td class="unit"><?php esc_html_e( $_product->get_price(), PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                    <td class="qty"><?php esc_html_e( $item_data['quantity'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                    <td class="total"><?php esc_html_e( $item_data['total'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td></td><td></td><td></td>
                <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Subtotal',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></td>
                <td class="total"><?php esc_html_e( $order_subtotal, PIPSFW_PLUGIN_TEXT_DOMAIN ); ?></td>
            </tr>
            <?php 
            if(isset($settings['invoice_settings']['enable_disable_shipping_list_invoice'])){
                if(!empty($order_data['shipping_total'])){ ?>
                    <tr>
                        <td></td><td></td><td></td>
                        <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Shipping',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></strong></td>
                        <td class="total"><?php esc_html_e( $order_data['shipping_total'], PIPSFW_PLUGIN_TEXT_DOMAIN ); ?><</td>
                    </tr>
                    <?php
                } 
            } ?>
            <tr>
                <td></td><td></td><td></td>
                <td class="subtotal" style="text-align: left;"><strong><?php esc_html_e('Total',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></strong></td>
                <td class="total"><?php esc_html_e( $order_data['total'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?><</td>
            </tr>
            </tbody>
        </table>
        <div class="thanks"><?php esc_html_e('Thank you!',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>

        <?php if( isset($settings['template_settings']['invoice_notes']) && (!empty($settings['template_settings']['invoice_notes'])) ){ ?>     
            <div class="notices">
                <div class="notice"><label><?php esc_html_e('Notice: ',PIPSFW_PLUGIN_TEXT_DOMAIN); ?></label><?php esc_html_e($settings['template_settings']['invoice_notes'] ,PIPSFW_PLUGIN_TEXT_DOMAIN); ?></div>
            </div>
        <?php } ?>

        <?php if( isset($settings['template_settings']['footer']) && (!empty($settings['template_settings']['footer'])) ){ ?>     
            <footer>
                <?php esc_html_e($settings['template_settings']['footer'], PIPSFW_PLUGIN_TEXT_DOMAIN); ?>
            </footer>
        <?php } ?>
    </div>
    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
    <div></div>
</div>
<div style="page-break-before: always"></div>

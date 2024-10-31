<?php 
use Dompdf\Dompdf;
use Dompdf\Options;

class Woocommerce_Pdf_Invoices_Packing_Slips_Generator {

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public $order_ids;
	public function __construct($order_ids) {
        $this->order_ids=$order_ids;
    }
    public function get_orders_data(){
        $data=[];
        foreach ($this->order_ids as  $order_id) {
            $line_order=[];
            $order = new WC_Order( $order_id );
            $line_order['order_data'] = $order->get_data();
            $line_order['order_item_data']=$order->get_items();
            $data[]=$line_order;    
        }
        return $data;

    }
} 

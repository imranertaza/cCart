<?php namespace App\Libraries;

class Zone_shipping{

    private $inDhakaPrice;
    private $outDhakaPrice;

    /**
     * @description This method provides shipping method.
     * @return $this
     */
    public function getSettings(){
        $shipping_method_id = get_data_by_id('shipping_method_id','cc_shipping_method','code','zone');

        $table = DB()->table('cc_shipping_settings');
        $outputDhaka = $table->where('shipping_method_id',$shipping_method_id)->where('label','in_dhaka')->get()->getRow();

        $table2 = DB()->table('cc_shipping_settings');
        $outputOutDhaka = $table2->where('shipping_method_id',$shipping_method_id)->where('label','out_dhaka')->get()->getRow();

        $this->inDhakaPrice = $outputDhaka->value;
        $this->outDhakaPrice = $outputOutDhaka->value;

        return $this;
    }

    /**
     * @description This method provides calculate shipping rate.
     * @return string
     */
    public function calculateShipping($city){
        if ($city == 322){
            $shippingRate = $this->inDhakaPrice;
        }else{
            $shippingRate =  $this->outDhakaPrice;
        }

        $eligible_product_array = $this->get_shipping_eligible_product();
        if (empty($eligible_product_array)){
            return '0';
        }else {
            return $shippingRate;
        }
    }

    /**
     * @description This method provides product shipping eligible.
     * @return array
     */
    public function get_shipping_eligible_product(): array
    {
        $eligible_product = array();

        foreach (Cart()->contents() as $val){
            $table = DB()->table('cc_product_free_delivery');
            $exist = $table->where('product_id',$val['id'])->countAllResults();
            if (empty($exist)){
                $eligible_product[] = $val['id'];
            }
        }

        return $eligible_product;
    }

}
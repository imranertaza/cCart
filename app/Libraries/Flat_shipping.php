<?php

namespace App\Libraries;

class Flat_shipping
{
    private $flatRate;

    /**
     * @description This method provides shipping method.
     * @return $this
     */
    public function getSettings()
    {
        $shipping_method_id = get_data_by_id('shipping_method_id', 'cc_shipping_method', 'code', 'flat');
        $table              = DB()->table('cc_shipping_settings');
        $rate               = $table->where('shipping_method_id', $shipping_method_id)->where('label', 'flat_rate_price')->get()->getRow();
        $this->flatRate     = $rate->value;

        return $this;
    }

    /**
     * @description This method provides calculate shipping rate.
     * @return string
     */
    public function calculateShipping()
    {
        $eligible_product_array = $this->get_shipping_eligible_product();

        if (empty($eligible_product_array)) {
            return '0';
        } else {
            return $this->flatRate;
        }
    }

    /**
     * @description This method provides product shipping eligible.
     * @return array
     */
    public function get_shipping_eligible_product(): array
    {
        $eligible_product = [];

        foreach (Cart()->contents() as $val) {
            $table = DB()->table('cc_product_free_delivery');
            $exist = $table->where('product_id', $val['id'])->countAllResults();

            if (empty($exist)) {
                $eligible_product[] = $val['id'];
            }
        }

        return $eligible_product;
    }
}

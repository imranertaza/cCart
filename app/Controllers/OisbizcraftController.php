<?php

namespace App\Controllers;

use App\Libraries\Flat_shipping;
use App\Libraries\Mycart;
use App\Libraries\Weight_shipping;
use App\Libraries\Zone_shipping;
use App\Models\ProductsModel;
use CodeIgniter\HTTP\RedirectResponse;

class OisbizcraftController extends BaseController {

    protected $validation;
    protected $session;

    protected $weight_shipping;
    protected $flat_shipping;
    protected $zone_shipping;
    protected $productsModel;
    protected $cart;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->productsModel = new ProductsModel();
        $this->zone_shipping = new Zone_shipping();
        $this->flat_shipping = new Flat_shipping();
        $this->weight_shipping = new Weight_shipping();
        $this->cart = new Mycart();
    }

    /**
     * @description This method provides oisbizcraft page view
     * @return void
     */
    public function payment_oisbizcraft(){
        $array = $this->session_data();
        $this->session->set($array);

        // Payment details (these should come from user input or form submission)
        $amount = $this->request->getPost('amount');
        $currency = 'USD'; // Currency can be dynamic based on your needs

        $api_u = get_all_row_data_by_id('cc_payment_settings', 'label', 'ois_bizcraft_api_url');
        // OIS Bizcraft API endpoint
        $api_url = $api_u->value; // Example URL, replace with actual API URL
        $api_k = get_all_row_data_by_id('cc_payment_settings', 'label', 'api_key');
        $api_key = $api_k->value;



        // Payment request data
        $data = array(
            'amount' => 50000,
            'merchant_outlet_id' => "13",
            'terminal_id' => "001",
            'cust_code' => "001095",
            'user_fullname' => 'murad',
            'user_email' => 'murad@gmail.com',
            'description' => 'sdfjsdfksjd',
            'currency' => 'SGD',
            'optional_currency' => 'USD',
            'merchant_return_url' => base_url('oisbizcraft-success'), // Callback URL after payment
            'order_id' => "234234", // Generate a unique transaction ID
        );


        // Set API key and other required headers
        $string = $data['cust_code'].$data['merchant_outlet_id'].$data['terminal_id'].$data['merchant_return_url'].$data['description'].$data['currency'].$data['amount'].$data['order_id'].$data['user_fullname'];
        $data['hash'] = strtoupper(hash_hmac('SHA256', $string, $api_key));

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key,
        );



        // Initialize cURL session
        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Execute the request
        $response = curl_exec($ch);
        curl_close($ch);
        $response_data = json_decode($response);


//        print "<pre>";
//        var_dump(json_decode($response));
//        die();

        // Check if the request was successful
        if ($response_data->status === 200) {
            return redirect()->to($response_data->data->url);
        }else{
            $error = curl_error($ch);
            curl_close($ch);
            echo "Payment initialization failed: " . $error;
            return redirect()->to('checkout_failed');
        }
    }

    public function success() {
        $message = $this->request->getGet('message');
        $order_id = $this->request->getGet('order_id');
        $return_code = $this->request->getGet('return_code');
        $ref_order_id = $this->request->getGet('ref_order_id');
        print "Success";
    }

    public function notification(){

//        $api_k = get_all_row_data_by_id('cc_payment_settings', 'label', 'api_key');
//        $secret_key = $api_k->value;  // Replace with your actual secret key

        $input = file_get_contents('php://input');
        $data = json_decode($input);
        var_dump($data);
        die();
        /*$data = [
            'order_id' => '585a6sd2ASD65',
            'status' => 'A',
            'timestamp' => '1669179575',
            'amount_cent' => 10000,
            'currency' => 'SGD',
            'raw_response' => [ / raw response data / ],
            'hash' => 'D488ACB1B1D4568EC1F4312AF427B5996DB816E703941B9E22FE579E36860316'  // Provided hash
        ];*/


        $hash_string = $data['order_id'] . $data['status'] . $data['amount_cent'] . $data['currency'];

        $generated_hash = strtoupper(hash_hmac('SHA1', $hash_string, $secret_key));

        if ($generated_hash === $data['hash']) {
            return redirect()->to('oisbizcraft_payment_status');
        } else {
            http_response_code(400);  // Respond with 400 Bad Request
            return redirect()->to('checkout_failed');
        }
    }

    public function payment_status() {
        // Get the payment status and transaction details
        $status = $this->request->getGet('status');
        $transaction_id = $this->request->getGet('transaction_id');

        if ($status === 'success') {
            // Handle successful payment (e.g., update database, show success message)
            return redirect()->to('oisbizcraft_action');
        } else {
            // Handle failed payment (e.g., update database, show failure message)
            return redirect()->to('checkout_failed');
        }
    }


    /**
     * @description This method provides oisbizcraft checkout action execute
     * @return RedirectResponse
     */
    public function oisbizcraft_action(){

        $data['payment_firstname'] = $this->session->payment_firstname;
        $data['payment_lastname'] = $this->session->payment_lastname;
        $data['payment_phone'] = $this->session->payment_phone;
        $data['payment_email'] = $this->session->payment_email;
        $data['payment_country_id'] = $this->session->payment_country_id;
        $data['payment_city'] = $this->session->payment_city;
        $data['payment_postcode'] = $this->session->payment_postcode;
        $data['payment_address_1'] = $this->session->payment_address_1;
        $data['payment_address_2'] = $this->session->payment_address_2;

        $data['shipping_method'] = $this->session->shipping_method;
        $data['shipping_charge'] = $this->session->shipping_charge;
        $data['payment_method'] = $this->session->payment_method;

        $data['store_id'] = $this->session->store_id;

        $new_acc_create = $this->session->new_acc_create;

        $shipping_else = $this->session->shipping_else;


        DB()->transStart();
        if ($shipping_else == 'on') {
            $data['shipping_firstname'] = $this->session->shipping_firstname;
            $data['shipping_lastname'] = $this->session->shipping_lastname;
            $data['shipping_phone'] = $this->session->shipping_phone;
            $data['shipping_country_id'] = $this->session->shipping_country_id;
            $data['shipping_city'] = $this->session->shipping_city;
            $data['shipping_postcode'] = $this->session->shipping_postcode;
            $data['shipping_address_1'] = $this->session->shipping_address_1;
            $data['shipping_address_2'] = $this->session->shipping_address_2;
        } else {
            $data['shipping_firstname'] = $data['payment_firstname'];
            $data['shipping_lastname'] = $data['payment_lastname'];
            $data['shipping_phone'] = $data['payment_phone'];
            $data['shipping_country_id'] = $data['payment_country_id'];
            $data['shipping_city'] = $data['payment_city'];
            $data['shipping_postcode'] = $this->session->payment_postcode;
            $data['shipping_address_1'] = $data['payment_address_1'];
            $data['shipping_address_2'] = $data['payment_address_2'];
        }

        if (isset($this->session->cusUserId)) {
            $data['customer_id'] = $this->session->cusUserId;
        }
        $disc = null;
        if (isset($this->session->coupon_discount)) {
            $disc = round(($this->cart->total() * $this->session->coupon_discount) / 100);
        }
        $finalAmo = $this->cart->total() - $disc;
        if (!empty($data['shipping_charge'])) {
            $finalAmo = ($this->cart->total() + $data['shipping_charge']) - $disc;
        }

        $data['total'] = $this->cart->total();
        $data['discount'] = $disc;
        $data['final_amount'] = $finalAmo;


        $table = DB()->table('cc_order');
        $table->insert($data);
        $order_id = DB()->insertID();






        //order cc_order_history
        $order_status_id = get_data_by_id('order_status_id', 'cc_order_status', 'name', 'Pending');
        $dataOrderHistory['order_id'] = $order_id;
        $dataOrderHistory['order_status_id'] = $order_status_id;
        $tabHistOr = DB()->table('cc_order_history');
        $tabHistOr->insert($dataOrderHistory);




        foreach ($this->cart->contents() as $val) {
            $oldQty = get_data_by_id('quantity', 'cc_products', 'product_id', $val['id']);
            $dataOrder['order_id'] = $order_id;
            $dataOrder['product_id'] = $val['id'];
            $dataOrder['price'] = $val['price'];
            $dataOrder['quantity'] = $val['qty'];
            $dataOrder['total_price'] = $val['subtotal'];
            $dataOrder['final_price'] = $val['subtotal'];
            $tableOrder = DB()->table('cc_order_item');
            $tableOrder->insert($dataOrder);
            $order_item_id = DB()->insertID();

            $newqty['quantity'] = $oldQty - $val['qty'];
            $tablePro = DB()->table('cc_products');
            $tablePro->where('product_id', $val['id'])->update($newqty);

            foreach (get_all_data_array('cc_option') as $vl) {
                if (!empty($val['op_' . strtolower($vl->name)])) {
                    $data[strtolower($vl->name)] = $val['op_' . strtolower($vl->name)];

                    $table = DB()->table('cc_product_option');
                    $option = $table->where('option_value_id', $data[strtolower($vl->name)])->where('product_id', $val['id'])->get()->getRow();

                    if (!empty($option)) {
                        $dataOptino['order_id'] = $order_id;
                        $dataOptino['order_item_id'] = $order_item_id;
                        $dataOptino['product_id'] = $option->product_id;
                        $dataOptino['option_id'] = $option->option_id;
                        $dataOptino['option_value_id'] = $option->option_value_id;
                        $dataOptino['name'] = strtolower($vl->name);
                        $dataOptino['value'] = get_data_by_id('name', 'cc_option_value', 'option_value_id', $option->option_value_id);
                        $tableOption = DB()->table('cc_order_option');
                        $tableOption->insert($dataOptino);
                    }
                }
            }
        }


        DB()->transComplete();



        //email send customer
        $temMes = order_email_template($order_id);
        $subject = 'Product order';
        $message = $temMes;
        email_send($data['payment_email'], $subject, $message);


        //email send admin
        $email = get_lebel_by_value_in_settings('email');
        $subjectAd = 'Product order';
        $messageAd = $temMes;
        email_send($email, $subjectAd, $messageAd);

        unset($_SESSION['coupon_discount']);
        $this->cart->destroy();

        $this->sessionDestry();


        $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Your order has been successfully placed </div>');
        return redirect()->to('checkout_success');
    }

    /**
     * @description This method provides all data store session array.
     * @return array
     */
    private function session_data()
    {
        $data['payment_firstname'] = $this->request->getPost('payment_firstname');
        $data['payment_lastname'] = $this->request->getPost('payment_lastname');
        $data['payment_phone'] = $this->request->getPost('payment_phone');
        $data['payment_email'] = $this->request->getPost('payment_email');
        $data['payment_country_id'] = $this->request->getPost('payment_country_id');
        $data['payment_city'] = $this->request->getPost('payment_city');
        $data['payment_postcode'] = $this->request->getPost('payment_postcode');
        $data['payment_address_1'] = $this->request->getPost('payment_address_1');
        $data['payment_address_2'] = $this->request->getPost('payment_address_2');

        $data['shipping_method'] = $this->request->getPost('shipping_method');
        $data['shipping_charge'] = $this->request->getPost('shipping_charge');
        $data['payment_method'] = $this->request->getPost('payment_method');



        $data['store_id'] = get_data_by_id('store_id', 'cc_stores', 'is_default', '1');

        $data['new_acc_create'] = $this->request->getPost('new_acc_create');

        $data['shipping_else'] = $this->request->getPost('shipping_else');


        $data['shipping_firstname'] = $this->request->getPost('shipping_firstname');
        $data['shipping_lastname'] = $this->request->getPost('shipping_lastname');
        $data['shipping_phone'] = $this->request->getPost('shipping_phone');
        $data['shipping_country_id'] = $this->request->getPost('shipping_country_id');
        $data['shipping_city'] = $this->request->getPost('shipping_city');
        $data['shipping_postcode'] = $this->request->getPost('shipping_postcode');
        $data['shipping_address_1'] = $this->request->getPost('shipping_address_1');
        $data['shipping_address_2'] = $this->request->getPost('shipping_address_2');

        $data['t_amount'] = $this->request->getPost('amount');

        return $data;
    }

    /**
     * @description This method provides all data remove session array.
     * @return void
     */
    private function sessionDestry()
    {
        unset($_SESSION['payment_firstname']);
        unset($_SESSION['payment_lastname']);
        unset($_SESSION['payment_phone']);
        unset($_SESSION['payment_email']);
        unset($_SESSION['payment_country_id']);
        unset($_SESSION['payment_city']);
        unset($_SESSION['payment_postcode']);
        unset($_SESSION['payment_address_1']);
        unset($_SESSION['payment_address_2']);

        unset($_SESSION['shipping_method']);
        unset($_SESSION['shipping_charge']);
        unset($_SESSION['payment_method']);

        unset($_SESSION['store_id']);
        unset($_SESSION['new_acc_create']);
        unset($_SESSION['shipping_else']);


        unset($_SESSION['shipping_firstname']);
        unset($_SESSION['shipping_lastname']);
        unset($_SESSION['shipping_phone']);
        unset($_SESSION['shipping_country_id']);
        unset($_SESSION['shipping_city']);
        unset($_SESSION['shipping_postcode']);
        unset($_SESSION['shipping_address_1']);
        unset($_SESSION['shipping_address_2']);

        unset($_SESSION['t_amount']);
    }


}
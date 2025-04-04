<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;

class Dashboard extends BaseController
{
    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session    = \Config\Services::session();
    }

    /**
     * @description This method provides dashboard page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInCustomer = $this->session->isLoggedInCustomer;

        if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != true) {
            return redirect()->to(site_url('Login'));
        } else {
            $settings = get_settings();
            $table    = DB()->table('cc_order');
            $order    = $table->where('customer_id', $this->session->cusUserId)->get()->getLastRow();

            $data['order'] = $table->where('customer_id', $this->session->cusUserId)->get()->getResult();

            $data['orderItem'] = [];

            if (!empty($order->order_id)) {
                $tableItem         = DB()->table('cc_order_item');
                $data['orderItem'] = $tableItem->where('order_id', $order->order_id)->get()->getResult();
            }

            $data['keywords']    = $settings['meta_keyword'];
            $data['description'] = $settings['meta_description'];
            $data['title']       = 'Dashboard';
            $data['page_title']  = 'Dashboard';
            $data['menu_active'] = 'dashboard';
            echo view('Theme/' . $settings['Theme'] . '/header', $data);
            echo view('Theme/' . $settings['Theme'] . '/Customer/menu');
            echo view('Theme/' . $settings['Theme'] . '/Customer/dashboard');
            echo view('Theme/' . $settings['Theme'] . '/footer');
        }
    }

    /**
     * @description This method provides wishlist data store.
     * @return void
     */
    public function addtoWishlist()
    {
        $data['product_id']  = $this->request->getPost('product_id');
        $data['customer_id'] = $this->session->cusUserId;
        $check               = is_exists_double_condition('cc_customer_wishlist', 'product_id', $data['product_id'], 'customer_id', $data['customer_id']);

        if ($check == true) {
            $table = DB()->table('cc_customer_wishlist');
            $table->insert($data);
            print 'Successfully add to Wishlist';
        } else {
            print 'Already exists';
        }
    }
}

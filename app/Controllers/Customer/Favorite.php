<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\FavoriteModel;
use CodeIgniter\HTTP\RedirectResponse;

class Favorite extends BaseController
{
    protected $validation;
    protected $session;
    protected $favoriteModel;

    public function __construct()
    {
        $this->validation    = \Config\Services::validation();
        $this->session       = \Config\Services::session();
        $this->favoriteModel = new FavoriteModel();
    }

    /**
     * @description This method provides favorite page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInCustomer = $this->session->isLoggedInCustomer;

        if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != true) {
            return redirect()->to(site_url('Login'));
        } else {
            $settings        = get_settings();
            $data['allProd'] = $this->favoriteModel->where('cc_customer_wishlist.customer_id', $this->session->cusUserId)->query()->paginate(10);
            $data['pager']   = $this->favoriteModel->pager;
            $data['links']   = $data['pager']->links('default', 'custome_link');


            $data['keywords']    = $settings['meta_keyword'];
            $data['description'] = $settings['meta_description'];
            $data['title']       = 'Favorite';

            $data['menu_active'] = 'favorite';
            $data['page_title']  = 'Favorite';
            echo view('Theme/' . $settings['Theme'] . '/header', $data);
            echo view('Theme/' . $settings['Theme'] . '/Customer/menu');
            echo view('Theme/' . $settings['Theme'] . '/Customer/favorite', $data);
            echo view('Theme/' . $settings['Theme'] . '/footer');
        }
    }

    /**
     * @description This method provides wishlist data remove.
     * @return void
     */
    public function removeToWishlist()
    {
        $product_id = $this->request->getPost('product_id');
        $table      = DB()->table('cc_customer_wishlist');
        $table->where('customer_id', $this->session->cusUserId)->where('product_id', $product_id)->delete();
        print 'Successfully removed to wishlist';
    }
}

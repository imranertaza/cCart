<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use App\Models\FavoriteModel;

class Favorite extends BaseController
{

    protected $validation;
    protected $session;
    protected $favoriteModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->favoriteModel = new FavoriteModel();
    }

    public function index()
    {
        $isLoggedInCustomer = $this->session->isLoggedInCustomer;
        if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) {
            return redirect()->to(site_url('Login'));
        } else {

            $data['allProd'] = $this->favoriteModel->where('cc_customer_wishlist.customer_id',$this->session->cusUserId)->query()->paginate(10);
            $data['pager'] = $this->favoriteModel->pager;
            $data['links'] = $data['pager']->links('default','custome_link');


            $data['keywords'] = get_lebel_by_value_in_settings('meta_keyword');
            $data['description'] = get_lebel_by_value_in_settings('meta_description');
            $data['title'] = 'Favorite';

            $data['menu_active'] = 'favorite';
            $data['page_title'] = 'Favorite';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/menu');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/favorite',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
        }
    }

    public function removeToWishlist(){
        $product_id = $this->request->getPost('product_id');
        $table = DB()->table('cc_customer_wishlist');
        $table->where('customer_id',$this->session->cusUserId)->where('product_id',$product_id)->delete();
        print 'Successfully removed to wishlist';
    }

}

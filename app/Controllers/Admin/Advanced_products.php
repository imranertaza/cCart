<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use App\Models\ProductsModel;
use CodeIgniter\HTTP\RedirectResponse;

class Advanced_products extends BaseController
{

    protected $validation;
    protected $session;
    protected $permission;
    protected $crop;
    protected $productsModel;
    private $module_name = 'Advanced_products';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->permission = new Permission();
        $this->crop = \Config\Services::image();
        $this->productsModel = new ProductsModel();
    }

    public function old_index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $module_id = get_data_by_id('module_id', 'cc_modules', 'module_key', 'bulk_edit_products');
            $data['moduleSettings'] = get_array_data_by_id('cc_module_settings', 'module_id', $module_id);
            $data['module_id'] = $module_id;


            $table = DB()->table('cc_products');
            $table->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id');
            $data['product'] = $table->get()->getResult();

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Advanced_products/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    /**
     * @description This method provides bulk edit page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $uri = service('uri');
            $urlString = $uri->getPath() . '?' . $this->request->getServer('QUERY_STRING');
            setcookie('bulk_url_path',$urlString,time()+86400, "/");

            $length = $this->request->getGet('length');
            $keyWord = $this->request->getGet('keyWord');
            $pageNum = $this->request->getGet('page');

            $perPage = !empty($length)?$length:10;
            if (empty($keyWord)) {
                $data['product'] = $this->productsModel->bulk_product_list()->paginate($perPage);
            }else{
                $data['product'] = $this->productsModel->search_data_bulk($keyWord)->paginate($perPage);
            }

            $data['pager'] = $this->productsModel->pager;
            $data['links'] = $data['pager']->links('default','custom_pagination');



            $data['keyWord'] = $keyWord;
            $data['length'] = $length;



            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Advanced_products/list', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method provides bulk status update
     * @return void
     */
    public function bulk_status_update()
{
    $module_settings_id = $this->request->getPost('module_settings_id');
    $oldStutas = get_data_by_id('value', 'cc_module_settings', 'module_settings_id', $module_settings_id);
    if ($oldStutas == '1') {
        $data['value'] = '0';
    } else {
        $data['value'] = '1';
    }

    $table = DB()->table('cc_module_settings');
    $table->where('module_settings_id', $module_settings_id)->update($data);

    print '<div class="alert alert-success alert-dismissible" role="alert">Bulk Status Update Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

    /**
     * @description This method provides bulk data update
     * @return void
     */
    public function bulk_data_update()
    {

        $product_id = $this->request->getPost('product_id');
        $name = $this->request->getPost('name');
        $model = $this->request->getPost('model');
        $price = $this->request->getPost('price');
        $quantity = $this->request->getPost('quantity');

        if (!empty($name)) {
            $dataSearch['name'] = $name;
        }
        if (!empty($model)) {
            $dataSearch['model'] = $model;
        }
        if (!empty($price)) {
            $dataSearch['price'] = $price;
        }
        if (!empty($quantity)) {
            $dataSearch['quantity'] = $quantity;
        }

        $table = DB()->table('cc_products');
        $table->where('product_id', $product_id)->update($dataSearch);

        $table2 = DB()->table('cc_products');
        $data['val'] = $table2->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id')->where('cc_products.product_id', $product_id)->get()->getRow();

        echo view('Admin/Advanced_products/row', $data);


    }

    /**
     * @description This method provides bulk description update
     * @return void
     */
    public function description_data_update(){
        $product_desc_id = $this->request->getPost('product_desc_id');
        $meta_title = $this->request->getPost('meta_title');
        $meta_description = $this->request->getPost('meta_description');
        $meta_keyword = $this->request->getPost('meta_keyword');

        if (isset($meta_title)) {
            $data2['meta_title'] = !empty($meta_title)?$meta_title:null;
        }

        if (isset($meta_description)) {
            $data2['meta_description'] = !empty($meta_description)?$meta_description:null;
        }

        if (isset($meta_keyword)) {
            $data2['meta_keyword'] = !empty($meta_keyword)?$meta_keyword:null;
        }

        //update date
        $table = DB()->table('cc_product_description');
        $table->where('product_desc_id', $product_desc_id)->update($data2);


        //data view query
        $product_id = get_data_by_id('product_id','cc_product_description','product_desc_id',$product_desc_id);
        $table2 = DB()->table('cc_products');
        $data['val'] = $table2->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id')->where('cc_products.product_id', $product_id)->get()->getRow();

        echo view('Admin/Advanced_products/row', $data);
    }

    /**
     * @description This method provides bulk all status update
     * @return void
     */
    public function bulk_all_status_update()
    {
        $product_id = $this->request->getPost('product_id');
        $field = $this->request->getPost('fieldName');
        $value = $this->request->getPost('value');

        $data[$field] = $value;
        //update data
        $table = DB()->table('cc_products');
        $table->where('product_id', $product_id)->update($data);

        //data view query
        $table2 = DB()->table('cc_products');
        $data['val'] = $table2->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id')->where('cc_products.product_id', $product_id)->get()->getRow();

        echo view('Admin/Advanced_products/row', $data);
    }

    /**
     * @description This method provides bulk category view
     * @return void
     */
    public function bulk_category_view()
    {
        $product_id = $this->request->getPost('product_id');
        $table = DB()->table('cc_product_category');
        $data['prodCat'] = $table->get()->getResult();

        $tablecat = DB()->table('cc_product_to_category');
        $data['prodCatSel'] = $tablecat->where('product_id', $product_id)->get()->getResult();

        $data['product_id'] = $product_id;



        echo view('Admin/Advanced_products/category', $data);
    }

    /**
     * @description This method provides bulk category update
     * @return void
     */
    public function bulk_category_update()
    {
        $product_id = $this->request->getPost('product_id');
        $category = $this->request->getPost('categorys[]');


        $catTableDel = DB()->table('cc_product_to_category');
        $catTableDel->where('product_id', $product_id)->delete();


        $catData = [];
        foreach ($category as $key => $cat) {
            $catData[$key] = [
                'product_id' => $product_id,
                'category_id' => $cat,
            ];
        }
        $catTable = DB()->table('cc_product_to_category');
        $catTable->insertBatch($catData);


        $table2 = DB()->table('cc_products');
        $data['val'] = $table2->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id')->where('cc_products.product_id', $product_id)->get()->getRow();

        echo view('Admin/Advanced_products/row', $data);
    }

    /**
     * @description This method provides bulk option view
     * @return void
     */
    public function bulk_option_view(){
        $product_id = $this->request->getPost('product_id');
        $data['product_id'] = $product_id;

        $table = DB()->table('cc_product_option');
        $data['prodOption'] = $table->where('product_id', $product_id)->groupBy('option_id')->get()->getResult();
        echo view('Admin/Advanced_products/option', $data);
    }

    /**
     * @description This method provides bulk option update
     * @return void
     */
    public function bulk_option_update(){
        $product_id = $this->request->getPost('product_id');

        $option = $this->request->getPost('option[]');
        $opValue = $this->request->getPost('opValue[]');
        $qty = $this->request->getPost('qty[]');
        $subtract = $this->request->getPost('subtract[]');
        $price_op = $this->request->getPost('price_op[]');

        $optionTableDel = DB()->table('cc_product_option');
        $optionTableDel->where('product_id',$product_id)->delete();

        if (!empty($qty)){
            $optionData = [];
            foreach ($qty as $key => $val){
                $optionData[$key] = [
                    'product_id' => $product_id,
                    'option_id' => $option[$key],
                    'option_value_id' => $opValue[$key],
                    'quantity' => $qty[$key],
                    'subtract' => ($subtract[$key] == 'plus')?null:1,
                    'price' => $price_op[$key],
                ];
            }
            $optionTable = DB()->table('cc_product_option');
            $optionTable->insertBatch($optionData);
        }



        $table2 = DB()->table('cc_products');
        $data['val'] = $table2->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id')->where('cc_products.product_id', $product_id)->get()->getRow();

        echo view('Admin/Advanced_products/row', $data);
    }

    /**
     * @description This method provides bulk multi option edit
     * @return RedirectResponse|void
     */
    public function multi_option_edit(){
        $allProductId =  $this->request->getPost('productId[]');
        if (!empty($allProductId)){

            $data['all_product'] = $allProductId;

            $table = DB()->table('cc_product_option');
            $data['prodOption'] = $table->groupBy('option_id')->get()->getResult();


            echo view('Admin/Advanced_products/multi_option', $data);
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Please select any product <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->back();
        }
    }

    /**
     * @description This method provides bulk multi option update
     * @return RedirectResponse
     */
    public function multi_option_action(){
        $redirect_url = isset($_COOKIE['bulk_url_path']) ? $_COOKIE['bulk_url_path'] : '';
        $all_product = $this->request->getPost('productId[]');

        $option = $this->request->getPost('option[]');
        $opValue = $this->request->getPost('opValue[]');
        $qty = $this->request->getPost('qty[]');
        $subtract = $this->request->getPost('subtract[]');
        $price_op = $this->request->getPost('price_op[]');



        if (!empty($qty)){
            foreach ($all_product as $p) {
                $optionTableDel = DB()->table('cc_product_option');
                $optionTableDel->where('product_id',$p)->delete();

                $optionData = [];
                foreach ($qty as $key => $val) {
                    $optionData[$key] = [
                         'product_id' => $p,
                         'option_id' => $option[$key],
                         'option_value_id' => $opValue[$key],
                         'quantity' => $qty[$key],
                         'subtract' => ($subtract[$key] == 'plus') ? null : 1,
                         'price' => $price_op[$key],
                    ];
                }
                $optionTable = DB()->table('cc_product_option');
                $optionTable->insertBatch($optionData);
            }
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Multi Option Update Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to($redirect_url);

        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Invalid input! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to($redirect_url);
        }

    }

    /**
     * @description This method provides bulk multi attribute view
     * @return RedirectResponse|void
     */
    public function multi_attribute_edit(){
        $allProductId =  $this->request->getPost('productId[]');
        if (!empty($allProductId)){

            $data['all_product'] = $allProductId;

            $table = DB()->table('cc_product_option');
            $data['prodOption'] = $table->groupBy('option_id')->get()->getResult();


            echo view('Admin/Advanced_products/multi_attribute', $data);
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Please select any product <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->back();
        }
    }

    /**
     * @description This method provides bulk multi attribute update
     * @return RedirectResponse
     */
    public function multi_attribute_action(){
        $redirect_url = isset($_COOKIE['bulk_url_path']) ? $_COOKIE['bulk_url_path'] : '';

        $all_product = $this->request->getPost('productId[]');

        $attribute_group_id = $this->request->getPost('attribute_group_id[]');
        $name = $this->request->getPost('name[]');
        $details = $this->request->getPost('details[]');

        if (!empty($attribute_group_id)){
            foreach ($all_product as $p) {
                $optionTableDel = DB()->table('cc_product_attribute');
                $optionTableDel->where('product_id', $p)->delete();

                foreach ($attribute_group_id as $key => $val) {
                    $attributeData['product_id'] = $p;
                    $attributeData['attribute_group_id'] = $attribute_group_id[$key];
                    $attributeData['name'] = $name[$key];
                    $attributeData['details'] = $details[$key];

                    $attributeTable = DB()->table('cc_product_attribute');
                    $attributeTable->insert($attributeData);
                }
            }

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Multi Attribute Update Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to($redirect_url);
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Invalid input! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to($redirect_url);
        }

    }

    /**
     * @description This method provides bulk multi category view
     * @return RedirectResponse|void
     */
    public function multi_category_edit(){
        $allProductId =  $this->request->getPost('productId[]');
        if (!empty($allProductId)){

            $data['all_product'] = $allProductId;

            $table = DB()->table('cc_product_category');
            $data['prodCat'] = $table->get()->getResult();


            echo view('Admin/Advanced_products/category_edit', $data);
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Please select any product <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->back();
        }
    }

    /**
     * @description This method provides bulk multi category update
     * @return RedirectResponse
     */
    public function multi_category_action(){
        $redirect_url = isset($_COOKIE['bulk_url_path']) ? $_COOKIE['bulk_url_path'] : '';

        $all_product = $this->request->getPost('productId[]');
        $categorys = $this->request->getPost('categorys[]');

        if (!empty($categorys)) {
            $arrayData = [];
            $catTable = DB()->table('cc_product_to_category');
            foreach ($all_product as $pro) {
                $catTable->where('product_id', $pro)->delete();
                foreach ($categorys as $cat) {
                    $arrayData[] = ['product_id' => $pro, 'category_id' => $cat];
                }
            }

            $catTable->insertBatch($arrayData);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Multi Category Update Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to($redirect_url);
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Please select any category <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to($redirect_url);
        }




    }







}

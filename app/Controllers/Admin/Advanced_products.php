<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Advanced_products extends BaseController
{

    protected $validation;
    protected $session;
    protected $permission;
    protected $crop;
    private $module_name = 'Advanced_products';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->permission = new Permission();
        $this->crop = \Config\Services::image();
    }

    public function index()
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

    print '<div class="alert alert-success alert-dismissible" role="alert">Update Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

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


        $table = DB()->table('cc_product_description');
        $table->where('product_desc_id', $product_desc_id)->update($data2);

        $product_id = get_data_by_id('product_id','cc_product_description','product_desc_id',$product_desc_id);
        $table2 = DB()->table('cc_products');
        $data['val'] = $table2->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id')->where('cc_products.product_id', $product_id)->get()->getRow();

        echo view('Admin/Advanced_products/row', $data);
    }

    public function bulk_all_status_update()
    {
        $product_id = $this->request->getPost('product_id');
        $field = $this->request->getPost('fieldName');
        $value = $this->request->getPost('value');

        $data[$field] = $value;

        $table = DB()->table('cc_products');
        $table->where('product_id', $product_id)->update($data);

        $table2 = DB()->table('cc_products');
        $data['val'] = $table2->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id')->where('cc_products.product_id', $product_id)->get()->getRow();

        echo view('Admin/Advanced_products/row', $data);
    }

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

    public function bulk_category_update()
    {
        $product_id = $this->request->getPost('product_id');
        $category = $this->request->getPost('categorys[]');


        $catTableDel = DB()->table('cc_product_to_category');
        $catTableDel->where('product_id', $product_id)->delete();

        foreach ($category as $cat) {
            $catData['product_id'] = $product_id;
            $catData['category_id'] = $cat;

            $catTable = DB()->table('cc_product_to_category');
            $catTable->insert($catData);
        }

        $table2 = DB()->table('cc_products');
        $data['val'] = $table2->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id')->where('cc_products.product_id', $product_id)->get()->getRow();

        echo view('Admin/Advanced_products/row', $data);
    }
}

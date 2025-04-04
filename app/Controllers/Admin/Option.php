<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use CodeIgniter\HTTP\RedirectResponse;

class Option extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Option';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session    = \Config\Services::session();
        $this->crop       = \Config\Services::image();
        $this->permission = new Permission();
    }

    /**
     * @description This method provides option page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId          = $this->session->adRoleId;

        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != true) {
            return redirect()->to(site_url('admin'));
        } else {
            $table          = DB()->table('cc_option');
            $data['option'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);

            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }

            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Option/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method provides create page view
     * @return RedirectResponse|void
     */
    public function create()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId          = $this->session->adRoleId;

        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != true) {
            return redirect()->to(site_url('admin'));
        } else {
            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);

            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }

            if (isset($data['create']) and $data['create'] == 1) {
                echo view('Admin/Option/create');
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method store option
     * @return RedirectResponse
     */
    public function create_action()
    {
        $data['name'] = $this->request->getPost('name');
        $data['type'] = $this->request->getPost('type');
        $value        = $this->request->getPost('value[]');

        $this->validation->setRules([
            'name' => ['label' => 'Name', 'rules' => 'required'],
            'type' => ['label' => 'Type', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == false) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/option');
        } else {
            $table = DB()->table('cc_option');
            $table->insert($data);
            $optionID = DB()->insertID();

            $dataval = [];

            foreach ($value as $key => $val) {
                $dataval[$key] = [
                    'option_id' => $optionID,
                    'name'      => $val,
                ];
            }
            $tableVal = DB()->table('cc_option_value');
            $tableVal->insertBatch($dataval);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Option Create Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/option');
        }
    }

    /**
     * @description This method provides update page view
     * @param int $option_id
     * @return RedirectResponse|void
     */
    public function update($option_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId          = $this->session->adRoleId;

        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != true) {
            return redirect()->to(site_url('admin'));
        } else {
            $table          = DB()->table('cc_option');
            $data['option'] = $table->where('option_id', $option_id)->get()->getRow();

            $tableVal          = DB()->table('cc_option_value');
            $data['optionVal'] = $tableVal->where('option_id', $option_id)->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);

            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }

            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Option/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method update option
     * @return RedirectResponse
     */
    public function update_action()
    {
        $option_id       = $this->request->getPost('option_id');
        $data['name']    = $this->request->getPost('name');
        $data['type']    = $this->request->getPost('type');
        $value           = $this->request->getPost('value[]');
        $option_value_id = $this->request->getPost('option_value_id[]');

        $this->validation->setRules([
            'name' => ['label' => 'Name', 'rules' => 'required'],
            'type' => ['label' => 'Type', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == false) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/option_update/' . $option_id);
        } else {
            if (!empty($value)) {
                $table = DB()->table('cc_option');
                $table->where('option_id', $option_id)->update($data);

                foreach ($value as $key => $val) {
                    $dataval['option_id'] = $option_id;
                    $dataval['name']      = $val;

                    if (!empty($option_value_id[$key])) {
                        $datavalUp['name'] = $val;
                        $tableValDel       = DB()->table('cc_option_value');
                        $tableValDel->where('option_value_id', $option_value_id[$key])->update($datavalUp);
                    } else {
                        $tableVal = DB()->table('cc_option_value');
                        $tableVal->insert($dataval);
                    }
                }

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Option Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                return redirect()->to('admin/option_update/' . $option_id);
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> Please Add Value ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                return redirect()->to('admin/option_update/' . $option_id);
            }
        }
    }

    /**
     * @description This method delete option
     * @param int $option_id
     * @return RedirectResponse
     */
    public function delete($option_id)
    {
        $tabOp = DB()->table('cc_product_option');
        $tabOp->where('option_id', $option_id)->delete();

        $tableVal = DB()->table('cc_option_value');
        $tableVal->where('option_id', $option_id)->delete();

        $table = DB()->table('cc_option');
        $table->where('option_id', $option_id)->delete();


        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Option Delete Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        return redirect()->to('admin/option');
    }

    /**
     * @description This method provides data remove
     * @return void
     */
    public function option_remove_action()
    {
        $option_value_id = $this->request->getPost('id');

        $tabOp = DB()->table('cc_product_option');
        $tabOp->where('option_value_id', $option_value_id)->delete();

        $tableValDel = DB()->table('cc_option_value');
        $tableValDel->where('option_value_id', $option_value_id)->delete();
    }
}

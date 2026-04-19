<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use CodeIgniter\HTTP\RedirectResponse;

class Page_settings extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Page_settings';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session    = \Config\Services::session();
        $this->crop       = \Config\Services::image();
        $this->permission = new Permission();
    }

    /**
     * @description This method provides brand page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId          = $this->session->adRoleId;

        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != true) {
            return redirect()->to(site_url('admin'));
        } else {
            $table         = DB()->table('cc_pages');
            $data['pages'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);

            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }

            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Page_settings/index', $data);
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
                echo view('Admin/Page_settings/create');
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method store page settings
     * @return RedirectResponse
     */
    public function create_action()
    {
        $data['page_title']       = $this->request->getPost('page_title');
        $data['slug']             = $this->request->getPost('slug');
        $data['temp']             = !empty($this->request->getPost('temp')) ? $this->request->getPost('temp') : null;
        $data['short_des']        = !empty($this->request->getPost('short_des')) ? $this->request->getPost('short_des') : null;
        $data['page_description'] = !empty($this->request->getPost('page_description')) ? $this->request->getPost('page_description') : null;
        $data['meta_title']       = $this->request->getPost('meta_title');
        $data['meta_keyword']     = $this->request->getPost('meta_keyword');
        $data['meta_description'] = $this->request->getPost('meta_description');

        $this->validation->setRules([
            'page_title' => ['label' => 'Page Title', 'rules' => 'required'],
            'slug'       => ['label' => 'Slug', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == false) {
            $this->session->setFlashdata('success', false);
            $this->session->setFlashdata('message', $this->validation->listErrors());

            return redirect()->to('admin/page_create');
        } else {
            $table = DB()->table('cc_pages');
            $table->insert($data);

            $this->session->setFlashdata('success', true);
            $this->session->setFlashdata('message', 'Page Settings Create Success!');

            return redirect()->to('admin/page_create');
        }
    }

    /**
     * @description This method provides update page view
     * @param int $page_id
     * @return RedirectResponse|void
     */
    public function update($page_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId          = $this->session->adRoleId;

        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != true) {
            return redirect()->to(site_url('admin'));
        } else {
            $table        = DB()->table('cc_pages');
            $data['page'] = $table->where('page_id', $page_id)->get()->getRow();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);

            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }

            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Page_settings/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method update page settings
     * @return RedirectResponse
     */
    public function update_action()
    {
        $page_id                  = $this->request->getPost('page_id');
        $data['page_title']       = $this->request->getPost('page_title');
        $data['slug']             = $this->request->getPost('slug');
        $data['temp']             = !empty($this->request->getPost('temp')) ? $this->request->getPost('temp') : null;
        $data['short_des']        = !empty($this->request->getPost('short_des')) ? $this->request->getPost('short_des') : null;
        $data['page_description'] = !empty($this->request->getPost('page_description')) ? $this->request->getPost('page_description') : null;

        $data['meta_title']       = $this->request->getPost('meta_title');
        $data['meta_keyword']     = $this->request->getPost('meta_keyword');
        $data['meta_description'] = $this->request->getPost('meta_description');

        $this->validation->setRules([
            'page_title' => ['label' => 'Page Title', 'rules' => 'required'],
            'slug'       => ['label' => 'Slug', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == false) {
            $this->session->setFlashdata('success', false);
            $this->session->setFlashdata('message', $this->validation->listErrors());

            return redirect()->to('admin/page_update/' . $page_id);
        } else {
            $table = DB()->table('cc_pages');
            $table->where('page_id', $page_id)->update($data);

            $this->session->setFlashdata('success', true);
            $this->session->setFlashdata('message', 'Page Settings Update Success!');

            return redirect()->to('admin/page_update/' . $page_id);
        }
    }

    /**
     * @description This method delete page settings
     * @param int $page_id
     * @return RedirectResponse
     */
    public function delete($page_id)
    {
        $table = DB()->table('cc_pages');
        $table->where('page_id', $page_id)->delete();

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Page Settings Delete Success!');

        return redirect()->to('admin/page_list');
    }
}

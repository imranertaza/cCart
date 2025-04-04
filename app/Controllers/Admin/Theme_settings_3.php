<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use CodeIgniter\HTTP\RedirectResponse;

class Theme_settings_3 extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Theme_settings';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session    = \Config\Services::session();
        $this->crop       = \Config\Services::image();
        $this->permission = new Permission();
    }

    /**
     * @description This method provides theme settings page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId          = $this->session->adRoleId;

        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != true) {
            return redirect()->to(site_url('admin'));
        } else {
            $table                  = DB()->table('cc_theme_settings');
            $data['theme_settings'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);

            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }

            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Theme_settings/theme_3', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method update header section one update
     * @return RedirectResponse
     */
    public function header_section_one_update()
    {
        $data['head_side_title_1']    = $this->request->getPost('head_side_title_1');
        $data['head_side_category_1'] = $this->request->getPost('head_side_category_1');

        if (!empty($_FILES['head_side_baner_1']['name'])) {
            $target_dir = FCPATH . '/uploads/top_side_baner/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('head_side_baner_1');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'head_side_baner_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(228, 199, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['head_side_baner_1'] = $news_img;
        }

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Header Section Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }

    /**
     * @description This method update header section two update
     * @return RedirectResponse
     */
    public function header_section_two_update()
    {
        $data['head_side_title_2']    = $this->request->getPost('head_side_title_2');
        $data['head_side_category_2'] = $this->request->getPost('head_side_category_2');

        if (!empty($_FILES['head_side_baner_2']['name'])) {
            $target_dir = FCPATH . '/uploads/top_side_baner/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('head_side_baner_2');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'head_side_baner_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(228, 199, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['head_side_baner_2'] = $news_img;
        }

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Header Section Two Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }

    /**
     * @description This method update home category update
     * @return RedirectResponse
     */
    public function home_category_update()
    {
        $prefix                                 = $this->request->getPost('prefix');
        $data['home_category_' . $prefix]       = $this->request->getPost('home_category_' . $prefix);
        $data['home_category_title_' . $prefix] = $this->request->getPost('home_category_title_' . $prefix);

        if (!empty($_FILES['home_category_baner_' . $prefix]['name'])) {
            $target_dir = FCPATH . '/uploads/home_category/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('home_category_baner_' . $prefix);
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'home_category_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(271, 590, 'center')->save($target_dir . $news_img, 100);
            unlink($target_dir . $namePic);
            $data['home_category_baner_' . $prefix] = $news_img;
        }

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Home Category Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }

    /**
     * @description This method update banner bottom update
     * @return RedirectResponse
     */
    public function banner_bottom_update()
    {
        if (!empty($_FILES['banner_bottom']['name'])) {
            $target_dir = FCPATH . '/uploads/banner_bottom/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('banner_bottom');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'banner_bottom_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(1116, 211, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['value'] = $news_img;


            $table = DB()->table('cc_theme_settings');
            $table->where('label', 'banner_bottom')->update($data);


            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Banner Bottom Update  Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings?sel=home_settings');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image field is required! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings?sel=home_settings');
        }
    }

    /**
     * @description This method update slider
     * @return RedirectResponse
     */
    public function slider_update()
    {
        $nameslider = $this->request->getPost('nameslider');

        if (!empty($_FILES['slider']['name'])) {
            $target_dir = FCPATH . '/uploads/slider/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('slider');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'slider_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(837, 394, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['value'] = $news_img;

            $table = DB()->table('cc_theme_settings');
            $table->where('label', $nameslider)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Slider Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings');
        }
    }

    /**
     * @description This method update logo
     * @return RedirectResponse
     */
    public function logo_update()
    {
        if (!empty($_FILES['side_logo']['name'])) {
            $target_dir = FCPATH . '/uploads/logo/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('side_logo');
            $namePic = 'logo_' . $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $data['value'] = $namePic;

            $table = DB()->table('cc_theme_settings');
            $table->where('label', 'side_logo')->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Logo Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Logo required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings');
        }
    }

    /**
     * @description This method update home category banner
     * @return RedirectResponse
     */
    public function home_category_banner()
    {
        if (!empty($_FILES['home_category_banner']['name'])) {
            $target_dir = FCPATH . '/uploads/category_banner/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('home_category_banner');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'banner_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(280, 440, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['value'] = $news_img;

            $table = DB()->table('cc_theme_settings');
            $table->where('label', 'home_category_banner')->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Category Banner Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Logo required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings');
        }
    }

    /**
     * @description This method update home category
     * @return RedirectResponse
     */
    public function home_category()
    {
        $data['value'] = $this->request->getPost('home_category');

        $this->validation->setRules([
            'value' => ['label' => 'Category', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == false) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings?sel=home_settings');
        } else {
            $table = DB()->table('cc_theme_settings');
            $table->where('label', 'home_category')->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Home Category Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings?sel=home_settings');
        }
    }

    /**
     * @description This method update settings
     * @return RedirectResponse
     */
    public function settings_update()
    {
        $data['value'] = $this->request->getPost('value');
        $label         = $this->request->getPost('label');

        $table = DB()->table('cc_theme_settings');
        $table->where('label', $label)->update($data);

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Settings Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

        return redirect()->to('admin/theme_settings?sel=home_settings');

        //new image uplode
        $pic     = $this->request->getFile('special_banner');
        $namePic = $pic->getRandomName();
        $pic->move($target_dir, $namePic);
        $news_img = 'sp_banner_' . $pic->getName();
        $this->crop->withFile($target_dir . $namePic)->fit(837, 190, 'center')->save($target_dir . $news_img);
        unlink($target_dir . $namePic);
        $data['value'] = $news_img;
    }

    /**
     * @description This method update home special banner
     * @return RedirectResponse
     */
    public function home_special_banner()
    {
        if (!empty($_FILES['special_banner']['name'])) {
            $target_dir = FCPATH . '/uploads/special_banner/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('special_banner');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'sp_banner_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(837, 190, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['value'] = $news_img;

            $table = DB()->table('cc_theme_settings');
            $table->where('label', 'special_banner')->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Special Banner Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings?sel=home_settings');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Special Banner required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings?sel=home_settings');
        }
    }

    /**
     * @description This method update home left side banner
     * @return RedirectResponse
     */
    public function home_left_side_banner()
    {
        $label = $this->request->getPost('label');

        if (!empty($_FILES['left_side_banner']['name'])) {
            $target_dir = FCPATH . '/uploads/left_side_banner/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('left_side_banner');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'left_banner_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(262, 420, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['value'] = $news_img;

            $table = DB()->table('cc_theme_settings');
            $table->where('label', $label)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Side Banner Update Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings?sel=home_settings');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Side Banner required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to('admin/theme_settings?sel=home_settings');
        }
    }
}

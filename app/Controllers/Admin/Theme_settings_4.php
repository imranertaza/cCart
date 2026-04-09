<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use App\Libraries\Theme_4;
use CodeIgniter\HTTP\RedirectResponse;

class Theme_settings_4 extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Theme_settings';

    public function __construct()
    {
        $this->validation    = \Config\Services::validation();
        $this->session       = \Config\Services::session();
        $this->crop          = \Config\Services::image();
        $this->permission    = new Permission();
        $this->theme_4       = new Theme_4();
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
                echo view('Admin/Theme_settings/theme_4', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method update header section one update
     * @return RedirectResponse
     */
    public function topCategorySectionOneUpdate()
    {
        $data['top_category_left_title']     = $this->request->getPost('top_category_left_title');
        $data['top_category_left_sub_title'] = $this->request->getPost('top_category_left_sub_title');
        $data['top_category_left_category']  = $this->request->getPost('top_category_left_category');

        if (!empty($_FILES['top_category_left_image']['name'])) {
            $target_dir = FCPATH . '/uploads/home_category/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('top_category_left_image');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'top_category_left_image_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(546, 162, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['top_category_left_image'] = $news_img;
        }

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $dataAltNameUpdate['alt_name'] = $this->request->getPost('alt_name');
        $table                         = DB()->table('cc_theme_settings');
        $table->where('label', 'top_category_left_image')->update($dataAltNameUpdate);

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Update Success!');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }
    public function topCategorySectionTwoUpdate()
    {
        $data['top_category_right_title']     = $this->request->getPost('top_category_right_title');
        $data['top_category_right_sub_title'] = $this->request->getPost('top_category_right_sub_title');
        $data['top_category_right_category']  = $this->request->getPost('top_category_right_category');

        if (!empty($_FILES['top_category_right_image']['name'])) {
            $target_dir = FCPATH . '/uploads/home_category/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('top_category_right_image');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'top_category_right_image_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(546, 162, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['top_category_right_image'] = $news_img;
        }

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $dataAltNameUpdate['alt_name'] = $this->request->getPost('alt_name');
        $table                         = DB()->table('cc_theme_settings');
        $table->where('label', 'top_category_right_image')->update($dataAltNameUpdate);

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Update Success!');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }
    public function recentProductUpdate()
    {
        $data['recent_product_title']     = $this->request->getPost('recent_product_title');
        $data['recent_product_sub_title'] = $this->request->getPost('recent_product_sub_title');
        $data['recent_product_category']  = $this->request->getPost('recent_product_category');

        if (!empty($_FILES['recent_product_image']['name'])) {
            $target_dir = FCPATH . '/uploads/home_category/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('recent_product_image');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'recent_product_image_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(361, 480, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['recent_product_image'] = $news_img;
        }

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $dataAltNameUpdate['alt_name'] = $this->request->getPost('alt_name');
        $table                         = DB()->table('cc_theme_settings');
        $table->where('label', 'recent_product_image')->update($dataAltNameUpdate);

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Update Success!');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }
    public function homeSectionOneUpdate()
    {
        $data['section_one_title']     = $this->request->getPost('section_one_title');
        $data['section_one_sub_title'] = $this->request->getPost('section_one_sub_title');
        $data['section_one_category']  = $this->request->getPost('section_one_category');

        if (!empty($_FILES['section_one_image']['name'])) {
            $target_dir = FCPATH . '/uploads/home_category/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('section_one_image');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'section_one_image_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(1116, 177, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['section_one_image'] = $news_img;
        }

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $dataAltNameUpdate['alt_name'] = $this->request->getPost('alt_name');
        $table                         = DB()->table('cc_theme_settings');
        $table->where('label', 'section_one_image')->update($dataAltNameUpdate);

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Update Success!');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }
    public function homeSectionTwoUpdate()
    {
        $data['section_two_title']     = $this->request->getPost('section_two_title');
        $data['section_two_sub_title'] = $this->request->getPost('section_two_sub_title');
        $data['section_two_category']  = $this->request->getPost('section_two_category');

        if (!empty($_FILES['section_two_image']['name'])) {
            $target_dir = FCPATH . '/uploads/home_category/';

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic     = $this->request->getFile('section_two_image');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'section_two_image_' . $pic->getName();
            $this->crop->withFile($target_dir . $namePic)->fit(1116, 177, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['section_two_image'] = $news_img;
        }

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $dataAltNameUpdate['alt_name'] = $this->request->getPost('alt_name');
        $table                         = DB()->table('cc_theme_settings');
        $table->where('label', 'section_two_image')->update($dataAltNameUpdate);

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Update Success!');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }
    public function offerViewUpdate()
    {
        $data['offer_view']    = $this->request->getPost('offer_view');

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Update Success!');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }
    public function popularThisWeekUpdate()
    {
        $data['popular_this_week']    = $this->request->getPost('popular_this_week');

        foreach ($data as $key => $val) {
            $dataUpdate['value'] = $val;
            $table               = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($dataUpdate);
        }

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Update Success!');

        return redirect()->to('admin/theme_settings?sel=home_settings');
    }
    public function sliderUpdateFour()
    {
        $nameslider       = $this->request->getPost('nameslider');
        $data['alt_name'] = $this->request->getPost('alt_name');

        $suk                               = $this->request->getPost('suk');
        $lable['slider4_text_' . $suk]     = $this->request->getPost('title');
        $lable['slider4_sub_text_' . $suk] = $this->request->getPost('subTitle');
        $lable['slider4_category_' . $suk] = $this->request->getPost('category');


        $theme          = get_lebel_by_value_in_settings('Theme');
        $themeLibraries = ($theme === 'Theme_4') ? $this->theme_4 : null;

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
            $this->crop->withFile($target_dir . $namePic)->fit($themeLibraries->slider_width, $themeLibraries->slider_height, 'center')->save($target_dir . $news_img);
            unlink($target_dir . $namePic);
            $data['value'] = $news_img;
        }

        $table = DB()->table('cc_theme_settings');
        $table->where('label', $nameslider)->update($data);

        foreach ($lable as $key => $val) {
            $value['value'] = $val;
            $table          = DB()->table('cc_theme_settings');
            $table->where('label', $key)->update($value);
        }

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Slider Update Success!');

        return redirect()->to('admin/theme_settings?sel=slider');
    }
}

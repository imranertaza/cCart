<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Image_processing;
use App\Libraries\Permission;
use CodeIgniter\HTTP\RedirectResponse;

class Blog extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    protected $imageProcessing;
    private $module_name = 'Blog';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
        $this->permission = new Permission();
        $this->imageProcessing = new Image_processing();
    }

    /**
     * @description This method provides album page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_blog');
            $data['blog'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Blog/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method provides album create page view
     * @return RedirectResponse|void
     */
    public function create(){
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_category');
            $data['category'] = $table->get()->getResult();

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            if (isset($data['create']) and $data['create'] == 1) {
                echo view('Admin/Blog/create',$data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method provides album create action
     * @return RedirectResponse
     */
    public function create_action()
    {
        $data['blog_title'] = $this->request->getPost('blog_title');
        $data['slug'] = $this->request->getPost('slug');
        $data['cat_id'] = $this->request->getPost('cat_id');
        $data['short_des'] = $this->request->getPost('short_des');
        $data['description'] = $this->request->getPost('description');
        $data['meta_title'] = $this->request->getPost('meta_title');
        $data['meta_keyword'] = $this->request->getPost('meta_keyword');
        $data['meta_description'] = $this->request->getPost('meta_description');
        $data['createdBy'] = $this->session->adUserId;

        $this->validation->setRules([
            'blog_title' => ['label' => 'Title', 'rules' => 'required'],
            'slug' => ['label' => 'Slug', 'rules' => 'required'],
            'cat_id' => ['label' => 'Category', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/blog_create');
        } else {

            $table = DB()->table('cc_blog');
            $table->insert($data);
            $blogId = DB()->insertID();

            //image size array
            $this->imageProcessing->sizeArray = [ ['width'=>'100', 'height'=>'100', ],['width'=>'300', 'height'=>'300', ],['width'=>'880', 'height'=>'400', ],];

            if (!empty($_FILES['image']['name'])) {
                $target_dir = FCPATH . '/uploads/blog/'.$blogId.'/';
                $this->imageProcessing->directory_create($target_dir);

                //new image upload
                $pic = $this->request->getFile('image');

                $news_img = $this->imageProcessing->image_upload_and_crop_all_size($pic,$target_dir);

                $dataImg['image'] = $news_img;

                $albumTable = DB()->table('cc_blog');
                $albumTable->where('blog_id',$blogId)->update($dataImg);
            }
            //album table data insert(end)


            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/blog_create');
        }
    }

    /**
     * @description This method provides album update page view
     * @param int $album_id
     * @return RedirectResponse|void
     */
    public function update($blog_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {
            $tableCat = DB()->table('cc_category');
            $data['category'] = $tableCat->get()->getResult();


            $table = DB()->table('cc_blog');
            $data['blog'] = $table->where('blog_id', $blog_id)->get()->getRow();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Blog/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method provides color family update action
     * @return RedirectResponse
     */
    public function update_action()
    {
        $blog_id = $this->request->getPost('blog_id');
        $data['blog_title'] = $this->request->getPost('blog_title');
        $data['slug'] = $this->request->getPost('slug');
        $data['cat_id'] = $this->request->getPost('cat_id');
        $data['short_des'] = $this->request->getPost('short_des');
        $data['description'] = $this->request->getPost('description');
        $data['meta_title'] = $this->request->getPost('meta_title');
        $data['meta_keyword'] = $this->request->getPost('meta_keyword');
        $data['meta_description'] = $this->request->getPost('meta_description');
        $data['status'] = $this->request->getPost('status');

        $this->validation->setRules([
            'blog_title' => ['label' => 'Title', 'rules' => 'required'],
            'slug' => ['label' => 'Slug', 'rules' => 'required'],
            'cat_id' => ['label' => 'Category', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/blog_update/' . $blog_id);
        } else {

            $table = DB()->table('cc_blog');
            $table->where('blog_id', $blog_id)->update($data);

            //image size array
            $this->imageProcessing->sizeArray = [ ['width'=>'100', 'height'=>'100', ],['width'=>'300', 'height'=>'300', ],['width'=>'880', 'height'=>'400', ],];

            if (!empty($_FILES['image']['name'])) {
                $target_dir = FCPATH . '/uploads/blog/'.$blog_id.'/';
                //unlink
                $oldImg = get_data_by_id('image','cc_blog','blog_id',$blog_id);
                $pic = $this->request->getFile('image');
                $news_img = $this->imageProcessing->single_product_image_unlink($target_dir,$oldImg)->directory_create($target_dir)->image_upload_and_crop_all_size($pic,$target_dir);

                $dataImg['image'] = $news_img;

                $proUpTable = DB()->table('cc_blog');
                $proUpTable->where('blog_id',$blog_id)->update($dataImg);
            }
            //product table data insert(end)



            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/blog_update/' . $blog_id);

        }
    }

    /**
     * @description This method provides color family delete
     * @param int $color_family_id
     * @return RedirectResponse
     */
    public function delete($blog_id){

        helper('filesystem');

        DB()->transStart();

        $target_dir = FCPATH . '/uploads/blog/'.$blog_id;
        if (file_exists($target_dir)) {
            delete_files($target_dir, TRUE);
            rmdir($target_dir);
        }
        $table = DB()->table('cc_blog');
        $table->where('blog_id', $blog_id)->delete();

        DB()->transComplete();


        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('admin/blog');
    }





}

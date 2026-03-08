<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Image_processing;
use App\Libraries\Permission;
use CodeIgniter\HTTP\RedirectResponse;

class Album extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    protected $imageProcessing;
    private $module_name = 'Album';

    public function __construct()
    {
        $this->validation      = \Config\Services::validation();
        $this->session         = \Config\Services::session();
        $this->crop            = \Config\Services::image();
        $this->permission      = new Permission();
        $this->imageProcessing = new Image_processing();
    }

    /**
     * @description This method provides album page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId          = $this->session->adRoleId;

        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != true) {
            return redirect()->to(site_url('admin'));
        } else {
            $table         = DB()->table('cc_album');
            $data['album'] = $table->orderBy('album_id', 'DESC')->get()->getResult();



            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);

            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }

            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Album/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method provides album create page view
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
                echo view('Admin/Album/create');
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
        $data['name']          = $this->request->getPost('name');
        $data['alt_name']      = $this->request->getPost('name');
        $data['createdBy']     = $this->session->adUserId;

        $this->validation->setRules([
            'name' => ['label' => 'Name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == false) {
            $this->session->setFlashdata('success', false);
            $this->session->setFlashdata('message', $this->validation->listErrors());
            return redirect()->to('admin/album_create');
        } else {
            $table = DB()->table('cc_album');
            $table->insert($data);
            $albumId = DB()->insertID();



            //album table data insert(end)
            $image = $this->request->getPost('image');
            if (!empty($image)) {

                $ext = pathinfo($image, PATHINFO_EXTENSION);
                $mainImagePath = FCPATH . '/' . $image;
                $targetDir = FCPATH . '/uploads/album/' . $albumId . '/';
                $saveImageName = 'pro_' . rand() . '.' . $ext;

                $this->imageProcessing->directory_create($targetDir);
                $this->imageProcessing->manager_image_crop($mainImagePath, $targetDir, $saveImageName);

                $dataImg['main_image'] = $image;
                $dataImg['thumb'] = 'uploads/album/' . $albumId . '/wm_600_'.$saveImageName;

                $albumTable = DB()->table('cc_album');
                $albumTable->where('album_id', $albumId)->update($dataImg);
            }
            //album table data insert(end)

            //multi image upload(start)
            $multiImage = $this->request->getPost('multiImage');
            if ($multiImage) {
                foreach ($multiImage as $file) {
                    $dataMultiImg['album_id'] = $albumId;
                    $dataMultiImg['alt_name'] = $data['name'];
                    $albumImgTable            = DB()->table('cc_album_details');
                    $albumImgTable->insert($dataMultiImg);
                    $albumImgId = DB()->insertID();

                    $targetDirMul = FCPATH . '/uploads/album/' . $albumId . '/' . $albumImgId . '/';
                    $this->imageProcessing->directory_create($targetDirMul);

                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    $mainImagePath = FCPATH . '/' . $file;
                    $saveImageName = 'pro_' . rand() . '.' . $ext;

                    $this->imageProcessing->manager_image_crop($mainImagePath, $targetDirMul, $saveImageName);

                    $dataMultiImg2['main_image'] = $file;
                    $dataMultiImg2['image'] = 'uploads/album/' . $albumId . '/' . $albumImgId . '/wm_600_'.$saveImageName;

                    $proImgUpTable = DB()->table('cc_album_details');
                    $proImgUpTable->where('album_details_id', $albumImgId)->update($dataMultiImg2);
                }
            }
            //multi image upload(start)

            $this->session->setFlashdata('success', true);
            $this->session->setFlashdata('message', 'Album Create Success!');
            return redirect()->to('admin/album_create');
        }
    }

    /**
     * @description This method provides album update page view
     * @param int $album_id
     * @return RedirectResponse|void
     */
    public function update($album_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId          = $this->session->adRoleId;

        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != true) {
            return redirect()->to(site_url('admin'));
        } else {
            $table         = DB()->table('cc_album');
            $data['album'] = $table->where('album_id', $album_id)->get()->getRow();

            $tableAl          = DB()->table('cc_album_details');
            $data['albumAll'] = $tableAl->where('album_id', $album_id)->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);

            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }

            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Album/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    /**
     * @description This method provides album update action
     * @return RedirectResponse
     */
    public function update_action()
    {
        $album_id               = $this->request->getPost('album_id');
        $data['name']           = $this->request->getPost('name');
        $data['alt_name']       = $this->request->getPost('alt_name');
        $data['sort_order']     = $this->request->getPost('sort_order_al');

        $this->validation->setRules([
            'name' => ['label' => 'Name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == false) {

            $this->session->setFlashdata('success', false);
            $this->session->setFlashdata('message', $this->validation->listErrors());
            return redirect()->to('admin/album_update/' . $album_id);
        } else {
            $table = DB()->table('cc_album');
            $table->where('album_id', $album_id)->update($data);



            //image size array
            $image = $this->request->getPost('image');
            if (!empty($image)) {
                $oldImg   = get_data_by_id('thumb', 'cc_album', 'album_id', $album_id);

                $ext = pathinfo($image, PATHINFO_EXTENSION);
                $mainImagePath = FCPATH . '/' . $image;
                $targetDir = FCPATH . '/uploads/album/' . $album_id . '/';
                $saveImageName = 'pro_' . rand() . '.' . $ext;

                $this->imageProcessing->directory_create($targetDir);
                $this->imageProcessing->manager_single_product_image_unlink($oldImg)->manager_image_crop($mainImagePath, $targetDir, $saveImageName);

                $dataImg['main_image'] = $image;
                $dataImg['thumb'] = 'uploads/album/' . $album_id . '/wm_600_'.$saveImageName;

                $proUpTable = DB()->table('cc_album');
                $proUpTable->where('album_id', $album_id)->update($dataImg);
            }
            //product table data insert(end)

            //multi image upload(start)
            $multiImage = $this->request->getPost('multiImage');
            if ($multiImage) {
                foreach ($multiImage as $file) {
                    $dataMultiImg['album_id'] = $album_id;
                    $dataMultiImg['alt_name'] = $data['alt_name'];
                    $proImgTable              = DB()->table('cc_album_details');
                    $proImgTable->insert($dataMultiImg);
                    $albumImgId = DB()->insertID();

                    $targetDirMul = FCPATH . '/uploads/album/' . $album_id . '/' . $albumImgId . '/';
                    $this->imageProcessing->directory_create($targetDirMul);

                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    $mainImagePath = FCPATH . '/' . $file;
                    $saveImageName = 'pro_' . rand() . '.' . $ext;

                    $this->imageProcessing->manager_image_crop($mainImagePath, $targetDirMul, $saveImageName);

                    $dataMultiImg2['main_image'] = $file;
                    $dataMultiImg2['image'] = 'uploads/album/' . $album_id . '/' . $albumImgId . '/wm_600_'.$saveImageName;

                    $proImgUpTable = DB()->table('cc_album_details');
                    $proImgUpTable->where('album_details_id', $albumImgId)->update($dataMultiImg2);
                }
            }
            //multi image upload(start)


            $this->session->setFlashdata('success', true);
            $this->session->setFlashdata('message', 'Album Update Success!');

            return redirect()->to('admin/album_update/' . $album_id);
        }
    }

    /**
     * @description This method provides album delete
     * @param int $album_id
     * @return RedirectResponse
     */
    public function delete($album_id)
    {
        helper('filesystem');

        DB()->transStart();

        $target_dir = FCPATH . '/uploads/album/' . $album_id;

        if (file_exists($target_dir)) {
            delete_files($target_dir, true);
            rmdir($target_dir);
        }

        $targetDirCache = FCPATH . '/cache/uploads/album/' . $album_id;

        if (file_exists($targetDirCache)) {
            delete_files($targetDirCache, true);
            rmdir($targetDirCache);
        }

        $table = DB()->table('cc_album');
        $table->where('album_id', $album_id)->delete();

        $tableDetail = DB()->table('cc_album_details');
        $tableDetail->where('album_id', $album_id)->delete();

        DB()->transComplete();

        $this->session->setFlashdata('success', true);
        $this->session->setFlashdata('message', 'Album Delete Success!');
        return redirect()->back();
    }

    /**
     * @description This method provides album sort action
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function album_image_sort_action()
    {
        $album_details_id =  $this->request->getPost('album_details_id');

        $data['sort_order'] = $this->request->getPost('value');
        $table              = DB()->table('cc_album_details');
        $table->where('album_details_id', $album_details_id)->update($data);

        return $this->response->setHeader('X-CSRF-TOKEN', csrf_hash());
    }

    /**
     * @description This method provides album image delete
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function image_delete()
    {
        helper('filesystem');

        $album_details_id = $this->request->getPost('album_details_id');
        $table            = DB()->table('cc_album_details');
        $data             = $table->where('album_details_id', $album_details_id)->get()->getRow();

        $target_dir = FCPATH . '/uploads/album/' . $data->album_id . '/' . $album_details_id;

        if (file_exists($target_dir)) {
            delete_files($target_dir, true);
            rmdir($target_dir);
        }

        $targetDirCache = FCPATH . '/cache/uploads/album/' . $data->album_id . '/' . $album_details_id;

        if (file_exists($targetDirCache)) {
            delete_files($targetDirCache, true);
            rmdir($targetDirCache);
        }

        $table->where('album_details_id', $album_details_id)->delete();
        $message = '<div class="alert alert-success alert-dismissible" role="alert">Album Image Delete Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        return $this->response
            ->setHeader('X-CSRF-TOKEN', csrf_hash())
            ->setBody($message);
    }

    /**
     * @description This method provides album alt name action
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function albumImageAltNameAction()
    {
        $album_details_id = $this->request->getPost('album_details_id');

        $data['alt_name'] = $this->request->getPost('value');
        $table            = DB()->table('cc_album_details');
        $table->where('album_details_id', $album_details_id)->update($data);

        return $this->response->setHeader('X-CSRF-TOKEN', csrf_hash());
    }
}

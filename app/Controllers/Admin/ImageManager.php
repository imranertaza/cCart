<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Image_processing;
use App\Libraries\Permission;
use CodeIgniter\HTTP\RedirectResponse;

class ImageManager extends BaseController
{
    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    protected $imageProcessing;
    private $module_name = 'Album';
    private $basePath;

    public function __construct()
    {
        $this->validation      = \Config\Services::validation();
        $this->session         = \Config\Services::session();
        $this->crop            = \Config\Services::image();
        $this->permission      = new Permission();
        $this->imageProcessing = new Image_processing();
        $this->basePath        = realpath(FCPATH . 'uploads/manager');
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
            $dir         = $this->request->getGet('dir') ?? '';
            $currentPath = realpath($this->basePath . '/' . $dir);

            // 🔐 Security: prevent directory traversal
            if ($currentPath === false || strpos($currentPath, $this->basePath) !== 0) {
                $currentPath = $this->basePath;
                $dir         = '';
            }

            $folders = [];
            $images  = [];

            foreach (scandir($currentPath) as $item) {
                if ($item === '.' || $item === '..') {
                    continue;
                }

                $full = $currentPath . '/' . $item;

                if (is_dir($full)) {
                    $folders[] = $item;
                } elseif (in_array(strtolower(pathinfo($item, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp'])) {
                    $images[] = $item;
                }
            }

            $data['dir']     = $dir;
            $data['folders'] = $folders;
            $data['images']  = $images;

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);

            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }

            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/ImageManager/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
        }
    }

    public function upload()
    {
        $dir  = $this->request->getPost('dir') ?? '';
        $path = realpath($this->basePath . '/' . $dir);

        if ($path === false || strpos($path, $this->basePath) !== 0) {
            return $this->response->setJSON([
                'error' => 'Invalid folder',
                'csrf'  => csrf_hash(),
            ]);
        }

        $file = $this->request->getFile('image');

        if (!$file || !$file->isValid()) {
            return $this->response->setJSON([
                'error' => 'Invalid image',
                'csrf'  => csrf_hash(),
            ]);
        }

        $newName = $file->getRandomName();
        $file->move($path, $newName);

        return $this->response->setJSON([
            'success' => true,
            'csrf'    => csrf_hash(),
        ]);
    }

    public function createFolder()
    {
        $dir  = $this->request->getPost('dir') ?? '';
        $name = trim($this->request->getPost('name'));

        if (!$name) {
            return $this->response->setJSON([
                'error' => 'Folder name required',
                'csrf'  => csrf_hash(),
            ]);
        }

        $path = realpath($this->basePath . '/' . $dir);

        if ($path === false || strpos($path, $this->basePath) !== 0) {
            return $this->response->setJSON([
                'error' => 'Invalid path',
                'csrf'  => csrf_hash(),
            ]);
        }

        $new = $path . '/' . preg_replace('/[^a-zA-Z0-9_-]/', '', $name);

        if (!mkdir($new, 0777)) {
            return $this->response->setJSON([
                'error' => 'Folder create failed',
                'csrf'  => csrf_hash(),
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'csrf'    => csrf_hash(),
        ]);
    }

    public function deleteFolder()
    {
        helper('filesystem');

        $dir = $this->request->getPost('dir');

        $path = realpath($this->basePath . '/' . $dir);

        if ($path === false || strpos($path, $this->basePath) !== 0) {
            return $this->response->setJSON([
                'error' => 'Invalid folder',
                'csrf'  => csrf_hash(),
            ]);
        }

        if (count(scandir($path)) > 2) {
            return $this->response->setJSON([
                'error' => 'Folder not empty',
                'csrf'  => csrf_hash(),
            ]);
        }

        rmdir($path);

        return $this->response->setJSON([
            'success' => true,
            'csrf'    => csrf_hash(),
        ]);
    }

    public function deleteImage()
    {
        $file = $this->request->getPost('file');

        $path = realpath($this->basePath . '/' . $file);

        if ($path === false || strpos($path, $this->basePath) !== 0) {
            return $this->response->setJSON(['error' => 'Invalid image']);
        }

        unlink($path);

        return $this->response->setJSON([
            'success' => true,
            'csrf'    => csrf_hash(),
        ]);
    }

    public function modalView()
    {
        $showId      = $this->request->getGet('showId') ?? '';
        $type        = $this->request->getGet('type')   ?? '';
        $dir         = $this->request->getGet('dir')    ?? '';
        $currentPath = realpath($this->basePath . '/' . $dir);

        // 🔐 Security: prevent directory traversal
        if ($currentPath === false || strpos($currentPath, $this->basePath) !== 0) {
            $currentPath = $this->basePath;
            $dir         = '';
        }

        $folders = [];
        $images  = [];

        foreach (scandir($currentPath) as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $full = $currentPath . '/' . $item;

            if (is_dir($full)) {
                $folders[] = $item;
            } elseif (in_array(strtolower(pathinfo($item, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp'])) {
                $images[] = $item;
            }
        }

        $data['showId']  = $showId;
        $data['type']    = $type;
        $data['dir']     = $dir;
        $data['folders'] = $folders;
        $data['images']  = $images;

        echo view('Admin/ImageManager/manager', $data);
    }
    public function modalViewUpdate()
    {
        $dir         = $this->request->getGet('dir') ?? '';
        $currentPath = realpath($this->basePath . '/' . $dir);

        // 🔐 Security: prevent directory traversal
        if ($currentPath === false || strpos($currentPath, $this->basePath) !== 0) {
            $currentPath = $this->basePath;
            $dir         = '';
        }

        $folders = [];
        $images  = [];

        foreach (scandir($currentPath) as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $full = $currentPath . '/' . $item;

            if (is_dir($full)) {
                $folders[] = $item;
            } elseif (in_array(strtolower(pathinfo($item, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp'])) {
                $images[] = $item;
            }
        }

        $data['dir']     = $dir;
        $data['folders'] = $folders;
        $data['images']  = $images;

        echo view('Admin/ImageManager/managerUpdate', $data);
    }

    public function imageFolderShow()
    {
        $dir         = $this->request->getGet('dir') ?? '';
        $currentPath = realpath($this->basePath . '/' . $dir);

        // 🔐 Security: prevent directory traversal
        if ($currentPath === false || strpos($currentPath, $this->basePath) !== 0) {
            $currentPath = $this->basePath;
            $dir         = '';
        }

        $folders = [];
        $images  = [];

        foreach (scandir($currentPath) as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $full = $currentPath . '/' . $item;

            if (is_dir($full)) {
                $folders[] = $item;
            } elseif (in_array(strtolower(pathinfo($item, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp'])) {
                $images[] = $item;
            }
        }

        $data['dir']     = $dir;
        $data['folders'] = $folders;
        $data['images']  = $images;

        echo view('Admin/ImageManager/managerUpdate', $data);
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;

class Login extends BaseController
{
    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session    = \Config\Services::session();
    }

    /**
     * @description This method provides login page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;

        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != true) {
            echo view('Admin/login');
        } else {
            return redirect()->to(site_url('admin/dashboard'));
        }
    }

    /**
     * @description This method provides login action execute
     * @return RedirectResponse
     */
    public function login_action()
    {
        $this->validation->setRule('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->validation->setRule('password', 'Password', 'required|max_length[32]');

        if ($this->validation->withRequest($this->request)->run() == false) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">All field is required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            return redirect()->to(site_url('admin'));
        } else {
            $email    = strtolower($this->request->getPost('email'));
            $password = $this->request->getPost('password');

            $result = $this->loginMe($email, $password);

            if (!empty($result)) {
                // Remember me (Remembering the user email and password) Start
                if (!empty($this->request->getPost("remember"))) {
                    setcookie('login_email', $email, time() + (86400 * 30), "/");
                    setcookie('login_password', $password, time() + (86400 * 30), "/");
                } else {
                    if (isset($_COOKIE['login_email'])) {
                        setcookie('login_email', '', 0, "/");
                    }

                    if (isset($_COOKIE['login_password'])) {
                        setcookie('login_password', '', 0, "/");
                    }
                }
                // Remember me (Remembering the user email and password) End



                $sessionArray = ['adUserId' => $result->user_id,
                    'adName'                => $result->name,
                    'adRoleId'              => $result->role_id,
                    'adminAll'              => $result,
                    'isLoggedInEcAdmin'     => true,
                    'resetDatatable'        => true,
                ];
                $this->session->set($sessionArray);

                return redirect()->to(site_url('admin/dashboard'));
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Your login detail not match <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                return redirect()->to(site_url('admin'));
            }
        }
    }

    /**
     * @description This method provides login data check
     * @param string $email
     * @param string $password
     * @return array|mixed|object|\stdClass
     */
    private function loginMe($email, $password)
    {
        $table = DB()->table('cc_users');
        $user  = $table->where('email', $email)->where('status', '1')->get()->getRow();

        if (!empty($user)) {
            if (SHA1($password) == $user->password) {
                return $user;
            } else {
                return [];
            }
        } else {
            return [];
        }
    }

    /**
     * @description This method provides login data remove
     * @return RedirectResponse
     */
    public function logout()
    {
        unset($_SESSION['adUserId']);
        unset($_SESSION['adName']);
        unset($_SESSION['adminAll']);
        unset($_SESSION['adRoleId']);
        unset($_SESSION['isLoggedInEcAdmin']);
        unset($_SESSION['resetDatatable']);

        //        $this->session->destroy();
        return redirect()->to('admin');
    }
}

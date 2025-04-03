<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Blog extends BaseController
{
    protected $validation;
    protected $session;
    protected $blogModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->blogModel = new BlogModel();
    }

    /**
     * @description This method provides Qc picture page view
     * @return void
     */
    public function index()
    {
        $settings = get_settings();

        $data['blog'] = $this->blogModel->where('status', '1')->orderBy('blog_id', 'ASC')->paginate(12);
        $data['pager'] = $this->blogModel->pager;
        $data['links'] = $data['pager']->links('default', 'custome_link');



        $data['keywords'] = $settings['meta_keyword'];
        $data['description'] = $settings['meta_description'];
        $data['title'] = !empty($settings['meta_title']) ? $settings['meta_title'] : $settings['store_name'];

        echo view('Theme/'.$settings['Theme'].'/header', $data);
        echo view('Theme/'.$settings['Theme'].'/Blog/index', $data);
        echo view('Theme/'.$settings['Theme'].'/footer');
    }

    /**
     * @description This method provides Qc picture detail page view
     * @param int $album_id
     * @return void
     */
    public function view($blog_id)
    {
        $settings = get_settings();

        $table = DB()->table('cc_blog');
        $data['blog'] = $table->where('blog_id', $blog_id)->get()->getRow();

        $data['keywords'] = $settings['meta_keyword'];
        $data['description'] = $settings['meta_description'];
        $data['title'] = !empty($settings['meta_title']) ? $settings['meta_title'] : $settings['store_name'];

        echo view('Theme/'.$settings['Theme'].'/header', $data);
        echo view('Theme/'.$settings['Theme'].'/Blog/view', $data);
        echo view('Theme/'.$settings['Theme'].'/footer');
    }



}

<?php

namespace App\Controllers;

use App\Models\AlbumModel;

class Album extends BaseController
{
    protected $validation;
    protected $session;
    protected $albumModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session    = \Config\Services::session();
        $this->albumModel = new AlbumModel();
    }

    /**
     * @description This method provides Qc picture page view
     * @return void
     */
    public function index()
    {
        $settings = get_settings();

        $data['qcpicture'] = $this->albumModel->orderBy('name', 'ASC')->paginate(20);
        $data['pager']     = $this->albumModel->pager;
        $data['links']     = $data['pager']->links('default', 'custome_link');


        $data['keywords']    = $settings['meta_keyword'];
        $data['description'] = $settings['meta_description'];
        $data['title']       = ! empty($settings['meta_title']) ? $settings['meta_title'] : $settings['store_name'];

        echo view('Theme/' . $settings['Theme'] . '/header', $data);
        echo view('Theme/' . $settings['Theme'] . '/Album/index', $data);
        echo view('Theme/' . $settings['Theme'] . '/footer');
    }

    /**
     * @description This method provides Qc picture detail page view
     * @param int $album_id
     * @return void
     */
    public function view($album_id)
    {
        $settings = get_settings();

        $table         = DB()->table('cc_album');
        $data['album'] = $table->where('album_id', $album_id)->get()->getRow();

        $tableAll         = DB()->table('cc_album_details');
        $data['albumAll'] = $tableAll->where('album_id', $album_id)->orderBy(
            'album_details_id',
            'ASC'
        )->get()->getResult();

        $data['keywords']    = $settings['meta_keyword'];
        $data['description'] = $settings['meta_description'];
        $data['title']       = ! empty($settings['meta_title']) ? $settings['meta_title'] : $settings['store_name'];

        echo view('Theme/' . $settings['Theme'] . '/header', $data);
        echo view('Theme/' . $settings['Theme'] . '/Album/view', $data);
        echo view('Theme/' . $settings['Theme'] . '/footer');
    }
}

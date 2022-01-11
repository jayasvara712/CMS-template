<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Models\MediaModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Banner extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-banner');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->bannerModel = new BannerModel();
        $this->mediaModel = new MediaModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */

    public function index()
    {
        echo view('admin/banner') . $this->menu . $this->header;
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        // $data['']
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        session();
        echo view('admin/banner/add') . $this->menu . $this->header;
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */

    public function create()
    {
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_banner = 'null')
    {
        $banner = $this->bannerModel->where('id_banner', $id_banner)->first();
        $media = $this->mediaModel->findAll();
        session();
        $data = [
            'banner' => $banner,
            'media' => $media,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($banner)) {
            $data['banner'] = $banner;
            echo view('admin/banner', $data) . $this->menu . $this->header;
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id_banner = null)
    {
        $validation = $this->validate([
            'keterangan_banner' => [
                'required',
                'errors' => [
                    'required' => 'Masukkan Keterangan Hero Image / Banner!'
                ]
            ],

        ]);
        // 'Galeri/edit/' . $this->request->getPost('slug_k')
        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());
        }

        $data = [
            'keterangan_banner' => $this->request->getPost('keterangan_banner'),
            'img_banner' =>  $this->request->getPost('img_banner'),
        ];
        $this->bannerModel->update($id_banner, $data);
        return redirect()->to(site_url('banner/edit/1'))->with('success', 'Banner Berhasil Dirubah');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
    }
}

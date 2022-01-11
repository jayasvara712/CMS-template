<?php

namespace App\Controllers;

use App\Models\GaleriModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use App\Models\MediaModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Galeri extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-galeri');</script>";
    private $header = "<script language=\"javascript\">menu('m-mediaall');</script>";
    function __construct()
    {
        $this->galeriModel = new GaleriModel;
        $this->mediaModel = new MediaModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */

    public function index()
    {
        $data['galeri'] = $this->galeriModel->findAll();
        $galeri = array();
        foreach ($data['galeri'] as $key => $value) :
            $coba1 = new GaleriModel();
            $coba1 = $value;
            $coba1->gambar_media_galeri = $this->mediaModel->where('id_media', $value->gambar_galeri)->first();
            array_push($galeri, $coba1);
        endforeach;
        $data['galeri'] = $galeri;
        echo view('admin/galeri', $data) . $this->menu . $this->header;
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
        $data1 = [
            'validation' => \Config\Services::validation()
        ];
        $data['media'] = $this->mediaModel->findAll();
        echo view('admin/galeri/add', $data) . $this->menu . $this->header;
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */

    public function create()
    {
        $validation = $this->validate([
            'judul_galeri' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul Galeri!'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->to(site_url('/galeri/new'))->withInput()->with('error', $this->validator->getErrors());
        } else {

            $data = [
                'judul_galeri' => $this->request->getPost('judul_galeri'),
                'deskripsi_galeri' => $this->request->getPost('deskripsi_galeri'),
                'gambar_galeri' =>  $this->request->getPost('gambar_galeri')

            ];
            $this->galeriModel->insert($data);
            return redirect()->to(site_url('galeri'))->with('success', 'Galeri Berhasil Ditambahkan');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_galeri = null)
    {
        $galeri = $this->galeriModel->where('id_galeri', $id_galeri)->first();
        $media = $this->mediaModel->findAll();
        session();
        $data = [
            'galeri' => $galeri,
            'media' => $media,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($galeri)) {
            $data['galeri'] = $galeri;
            $data['media'] = $media;
            echo view('admin/galeri/edit', $data) . $this->menu . $this->header;
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
    public function update($id_galeri = null)
    {
        $validation = $this->validate([
            'judul_galeri' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul Galeri!'
                ]
            ],

        ]);
        // 'Galeri/edit/' . $this->request->getPost('slug_k')
        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());
        }

        $data = [
            'judul_galeri' => $this->request->getPost('judul_galeri'),
            'deskripsi_galeri' => $this->request->getPost('deskripsi_galeri'),
            'gambar_galeri' =>  $this->request->getPost('gambar_galeri')
        ];
        $this->galeriModel->update($id_galeri, $data);
        return redirect()->to(site_url('galeri'))->with('success', 'Galeri Berhasil Dirubah');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id_galeri = null)
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
    public function delete($id_galeri = null)
    {
        $this->galeriModel->where('id_galeri', $id_galeri)->delete();
        return redirect()->to(site_url('galeri'))->with('success', 'Gambar Berhasil Dihapus');
    }
}

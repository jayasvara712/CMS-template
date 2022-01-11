<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourcePresenter;

class Profil extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-profil');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->profilModel = new ProfilModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */

    public function index()
    {
        echo view('admin/profil') . $this->menu . $this->header;
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
        echo view('admin/profil/add') . $this->menu . $this->header;
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
    public function edit($id = 'null')
    {
        $profil = $this->profilModel->where('id_profil', $id)->first();
        session();
        $data = [
            'profil' => $profil,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($profil)) {
            $data['profil'] = $profil;
            echo view('admin/profil', $data) . $this->menu . $this->header;
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
    public function update($id_profil = null)
    {
        $validation = $this->validate([
            'nama_profil' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Nama Organisasi / Perusahaan!'
                ]
            ],
            'isi_profil' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Nama Organisasi / Perusahaan!'
                ]
            ],
            'alamat_profil' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Nama Organisasi / Perusahaan!'
                ]
            ],
            'web_profil' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Nama Organisasi / Perusahaan!'
                ]
            ],
            'telp_profil' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Nama Organisasi / Perusahaan!'
                ]
            ],
            'email_profil' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Nama Organisasi / Perusahaan!'
                ]
            ],
            'map_profil' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Nama Organisasi / Perusahaan!'
                ]
            ],

        ]);
        // 'Galeri/edit/' . $this->request->getPost('slug_k')
        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());
        }

        $data = [
            'nama_profil' => $this->request->getPost('nama_profil'),
            'singkatan_profil' => $this->request->getPost('singkatan_profil'),
            'tagline_profil' => $this->request->getPost('tagline_profil'),
            'web_profil' => $this->request->getPost('web_profil'),
            'email_profil' => $this->request->getPost('email_profil'),
            'telp_profil' => $this->request->getPost('telp_profil'),
            'fax_profil' => $this->request->getPost('fax_profil'),
            'fb_profil' => $this->request->getPost('fb_profil'),
            'twit_profil' => $this->request->getPost('twit_profil'),
            'ig_profil' => $this->request->getPost('ig_profil'),
            'isi_profil' => $this->request->getPost('isi_profil'),
            'alamat_profil' => $this->request->getPost('alamat_profil'),
            'map_profil' => $this->request->getPost('map_profil'),
        ];
        $this->profilModel->update($id_profil, $data);
        return redirect()->to(site_url('profil/edit/1'))->with('success', 'Profil Berhasil Dirubah');
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

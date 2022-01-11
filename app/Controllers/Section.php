<?php

namespace App\Controllers;

use App\Models\SectionModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use App\Models\MediaModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Section extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-section');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->sectionModel = new SectionModel();
        $this->mediaModel = new MediaModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */

    public function index()
    {
        $data['section'] = $this->sectionModel->findAll();
        echo view('admin/section', $data) . $this->menu . $this->header;
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
            'validation' => \Config\Services::validation(),
        ];
        $data['media'] = $this->mediaModel->findAll();
        echo view('admin/section/add', $data) . $this->menu . $this->header;
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
            'judul' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul Konten!'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->to(site_url('/section/new'))->withInput()->with('error', $this->validator->getErrors());
        } else {

            $data = [
                'layout' => $this->request->getPost('layout'),
                'judul' => $this->request->getPost('judul'),
                'url' => $this->request->getPost('url'),
                'tgl_publish' => $this->request->getPost('tgl_publish'),
                'status' => $this->request->getPost('status'),
                'gambar' =>  $this->request->getPost('gambar'),
                'slug' => $this->request->getPost('slug'),
                'isi_konten' => $this->request->getPost('isi_konten'),

            ];
            $this->sectionModel->insert($data);
            return redirect()->to(site_url('section'))->with('success', 'Section Berhasil Ditambahkan');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_section = null)
    {
        $section = $this->sectionModel->where('id_section', $id_section)->first();
        $media = $this->mediaModel->findAll();

        session();
        $data = [
            'section' => $section,
            'media' => $media,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($section)) {
            $data['section'] = $section;
            echo view('admin/section/edit', $data) . $this->menu . $this->header;
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
    public function update($id_section = null)
    {
        $validation = $this->validate([
            'judul' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul!'
                ]
            ]

        ]);
        // 'media/edit/' . $this->request->getPost('slug_k')
        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());
        }
        $data = [
            'layout' => $this->request->getPost('layout'),
            'judul' => $this->request->getPost('judul'),
            'url' => $this->request->getPost('url'),
            'tgl_publish' => $this->request->getPost('tgl_publish'),
            'status' => $this->request->getPost('status'),
            'gambar' =>  $this->request->getPost('gambar'),
            'isi_konten' => $this->request->getPost('isi_konten')
        ];
        $this->sectionModel->update($id_section, $data);
        return redirect()->to(site_url('section'))->with('success', 'Section Berhasil Dirubah');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id_section = null)
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
    public function delete($id_section = null)
    {

        $this->sectionModel->where('id_section', $id_section)->delete();
        return redirect()->to(site_url('section'))->with('success', 'Section Berhasil Dihapus');
    }
}

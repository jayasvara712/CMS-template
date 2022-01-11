<?php

namespace App\Controllers;

use App\Models\FaqModel;
use CodeIgniter\HTTP\Request;
use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourcePresenter;

class Faq extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-faq');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->faqModel = new FaqModel;
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */

    public function index()
    {
        $data['faq'] = $this->faqModel->findAll();
        echo view('admin/faq', $data) . $this->menu . $this->header;
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id_faq = null)
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
        $data = [
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/faq/add', $data) . $this->menu . $this->header;
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
            'judul_faq' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul FAQ!'
                ]
            ],
            'deskripsi_faq' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Isi FAQ!'
                ]
            ],

        ]);

        if (!$validation) {
            return redirect()->to(site_url('/faq/new'))->withInput()->with('error', '$this->validator->getErrors()');
        } else {

            $data = [
                'judul_faq' => $this->request->getPost('judul_faq'),
                'deskripsi_faq' => $this->request->getPost('deskripsi_faq')
            ];
            $this->faqModel->insert($data);
            return redirect()->to(site_url('faq'))->with('success', 'FAQ Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_faq = null)
    {
        $faq = $this->faqModel->where('id_faq', $id_faq)->first();
        session();
        $data = [
            'faq' => $faq,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($faq)) {
            $data['faq'] = $faq;
            echo view('admin/faq/edit', $data) . $this->menu . $this->header;
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
    public function update($id_faq = null)
    {
        $validation = $this->validate([
            'judul_faq' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul FAQ!'
                ]
            ],
            'deskripsi_faq' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Isi FAQ!'
                ]
            ],

        ]);
        // 'Galeri/edit/' . $this->request->getPost('slug_k')
        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());
        }

        $data = [
            'judul_faq' => $this->request->getPost('judul_faq'),
            'deskripsi_faq' => $this->request->getPost('deskripsi_faq')
        ];
        $this->faqModel->update($id_faq, $data);
        return redirect()->to(site_url('faq'))->with('success', 'FAQ Berhasil Dirubah');
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
    public function delete($id_faq = null)
    {
        $this->faqModel->where('id_faq', $id_faq)->delete();
        return redirect()->to(site_url('faq'))->with('success', 'FAQ Berhasil Dihapus');
    }
}

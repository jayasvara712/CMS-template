<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use App\Models\TestimonialModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Testimonial extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-testi');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->testimonialModel = new TestimonialModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */

    public function index()
    {
        $data['testimonial'] = $this->testimonialModel->findAll();
        echo view('admin/testimonial', $data) . $this->menu . $this->header;
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
        $data = [
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/testimonial/add', $data) . $this->menu . $this->header;
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
            'nama_testimonial' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Nama Testimonial!'
                ]
            ],
            'keterangan_testimonial' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Keterangan Testimonial!'
                ]
            ],
            'gambar_testimonial' => [
                'mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => 'Extension tidak sesuai!'
                ]
            ],
        ]);

        if (!$validation) {
            return redirect()->to(site_url('/testimonial/new'))->withInput()->with('error', $this->validator->getErrors());
        } else {

            $imageFile = $this->request->getFile('gambar');

            if ($imageFile->isValid()) {
                //upload  ke public folder
                $newName = $imageFile->getRandomName();
                $imageFile->move('uploads/media/testi', $newName);
            } else {
                $nameFile = 'no-image.png';
            }
            //upload ke writeable  folder
            // $imageFile->move(WRITEPATH . 'uploads/Galeri');

            $data = [
                'nama_testimonial' => $this->request->getPost('nama_testimonial'),
                'keterangan_testimonial' => $this->request->getPost('keterangan_testimonial'),
                'gambar_testimonial' =>  $newName

            ];
            $this->testimonialModel->insert($data);
            return redirect()->to(site_url('testimonial'))->with('success', 'Testimonial Berhasil Ditambahkan');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_testimonial = null)
    {
        $testimonial = $this->testimonialModel->where('id_testimonial', $id_testimonial)->first();
        session();
        $data = [
            'testimonial' => $testimonial,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($testimonial)) {
            $data['testimonial'] = $testimonial;
            echo view('admin/testimonial/edit', $data) . $this->menu . $this->header;
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
    public function update($id_testimonial = null)
    {
        $validation = $this->validate([
            'nama_testimonial' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Nama Testimonial!'
                ]
            ],
            'keterangan_testimonial' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Keterangan Testimonial!'
                ]
            ],
            'gambar_testimonial' => [
                'mime_in[gambar,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => 'Extension tidak sesuai!'
                ]
            ],

        ]);
        // 'Galeri/edit/' . $this->request->getPost('slug_k')
        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('gambar');
        if ($imageFile->getError() == 4) {
            $newName = $this->request->getPost('gambar_lama');
        } else {
            $newName = $imageFile->getRandomName();
            $imageFile->move('uploads/media/testi', $newName);
            //jika gambar default
            if ($this->request->getPost('gambar_lama') != 'no-image.png') {
                unlink('uploads/media/testi/' . $this->request->getPost('gambar_lama'));
            }
        }
        $data = [
            'nama_testimonial' => $this->request->getPost('nama_testimonial'),
            'keterangan_testimonial' => $this->request->getPost('keterangan_testimonial'),
            'gambar_testimonial' =>  $newName
        ];
        $this->testimonialModel->update($id_testimonial, $data);
        return redirect()->to(site_url('testimonial'))->with('success', 'Testimonial Berhasil Dirubah');
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
    public function delete($id_testimonial = null)
    {
        //img
        if ($this->request->getPost('gambar') != 'no-image.png') {
            unlink('uploads/media/testi/' . $this->request->getPost('gambar'));
        }
        $this->testimonialModel->where('id_testimonial', $id_testimonial)->delete();
        return redirect()->to(site_url('testimonial'))->with('success', 'Testimonial Berhasil Dihapus');
    }
}

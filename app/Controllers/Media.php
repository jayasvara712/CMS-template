<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use App\Models\MediaModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Media extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-media');</script>";
    private $header = "<script language=\"javascript\">menu('m-mediaall');</script>";
    function __construct()
    {
        $this->mediaModel = new MediaModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */

    public function index()
    {
        $data['media'] = $this->mediaModel->findAll();
        echo view('admin/media', $data) . $this->menu . $this->header;
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
        echo view('admin/media/add', $data) . $this->menu . $this->header;
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
            'judul_media' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul Media!'
                ]
            ],
            'file_media' => [
                'mime_in[file_media,image/png,image/jpg,image/jpeg,application/pdf]',
                'max_size[file_media,5000]',
                'errors' => [
                    'mime_in' => 'Extension tidak sesuai!'
                ]
            ],
        ]);

        if (!$validation) {
            return redirect()->to(site_url('/media/new'))->withInput()->with('error', $this->validator->getErrors());
        } else {

            $file = $this->request->getFile('file_media');

            if ($file->isValid()) {
                //upload  ke public folder
                $newName = $file->getRandomName();
                $file->move('uploads/media', $newName);
            } else {
                $newName = 'no-image.png';
            }
            //upload ke writeable  folder
            // $imageFile->move(WRITEPATH . 'uploads/Galeri');

            $data = [
                'judul_media' => $this->request->getPost('judul_media'),
                'deskripsi_media' => $this->request->getPost('deskripsi_media'),
                'file_media' =>  $newName

            ];
            $this->mediaModel->insert($data);
            return redirect()->to(site_url('media'))->with('success', 'Media Berhasil Ditambahkan');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_media = null)
    {
        $media = $this->mediaModel->where('id_media', $id_media)->first();
        session();
        $data = [
            'media' => $media,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($media)) {
            $data['media'] = $media;
            echo view('admin/media/edit', $data) . $this->menu . $this->header;
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
    public function update($id_media = null)
    {
        $validation = $this->validate([
            'judul_media' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul Media!'
                ]
            ],
            'file_media' => [
                'mime_in[file_media,image/png,image/jpg,image/jpeg,application/pdf]',
                'max_size[file_media,5000]',
                'errors' => [
                    'mime_in' => 'Extension tidak sesuai!'
                ]
            ],

        ]);
        // 'Galeri/edit/' . $this->request->getPost('slug_k')
        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());
        }

        $file = $this->request->getFile('file_media');
        if ($file->getError() == 4) {
            $newName = $this->request->getPost('file_lama');
        } else {
            $newName = $file->getRandomName();
            $file->move('uploads/media', $newName);
            //jika gambar default
            if ($this->request->getPost('file_lama') != 'no-image.png') {
                unlink('uploads/media/' . $this->request->getPost('file_lama'));
            }
        }
        $data = [
            'judul_media' => $this->request->getPost('judul_media'),
            'deskripsi_media' => $this->request->getPost('deskripsi_media'),
            'file_media' =>  $newName
        ];
        $this->mediaModel->update($id_media, $data);
        return redirect()->to(site_url('media'))->with('success', 'Media Berhasil Dirubah');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id_media = null)
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
    public function delete($id_media = null)
    {
        //img
        if ($this->request->getPost('file_media') != 'no-image.png') {
            unlink('uploads/media/' . $this->request->getPost('file_media'));
        }
        $this->mediaModel->where('id_media', $id_media)->delete();
        return redirect()->to(site_url('media'))->with('success', 'Media Berhasil Dihapus');
    }
}

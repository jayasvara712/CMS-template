<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;
use App\Models\MediaModel;
use App\Models\PriceModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Price extends ResourcePresenter
{
    private $menu = "<script language=\"javascript\">menu('m-price');</script>";
    private $header = "<script language=\"javascript\">menu('m-page');</script>";
    function __construct()
    {
        $this->priceModel = new PriceModel();
        $this->mediaModel = new MediaModel();
    }
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */

    public function index()
    {
        $data['price'] = $this->priceModel->findAll();
        echo view('admin/price', $data) . $this->menu . $this->header;
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id_price = null)
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
        echo view('admin/price/add', $data) . $this->menu . $this->header;
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
            'judul_price' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul Harga!'
                ]
            ],
            'deskripsi_price' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Keterangan Harga!'
                ]
            ],
            'harga' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Harga!'
                ]
            ],

        ]);

        if (!$validation) {
            return redirect()->to(site_url('/price/new'))->withInput()->with('error', '$this->validator->getErrors()');
        } else {

            $data = [
                'judul_price' => $this->request->getPost('judul_price'),
                'deskripsi_price' => $this->request->getPost('deskripsi_price'),
                'gambar_price' => $this->request->getPost('gambar'),
                'harga' => $this->request->getPost('harga'),
                'harga_diskon' => $this->request->getPost('harga_diskon')

            ];
            $this->priceModel->insert($data);
            return redirect()->to(site_url('price'))->with('success', 'Price Berhasil Ditambah');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id_price = null)
    {
        $price = $this->priceModel->where('id_price', $id_price)->first();
        $media = $this->mediaModel->findAll();
        session();
        $data = [
            'price' => $price,
            'media' => $media,
            'validation' => \Config\Services::validation()
        ];
        if (is_object($price)) {
            $data['price'] = $price;
            $data['media'] = $media;
            echo view('admin/price/edit', $data) . $this->menu . $this->header;
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
    public function update($id_price = null)
    {
        $validation = $this->validate([
            'judul_price' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Judul Harga!'
                ]
            ],
            'deskripsi_price' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Keterangan Harga!'
                ]
            ],
            'harga' => [
                'required',
                'errors' => [
                    'required' => 'Masukan Harga!'
                ]
            ],

        ]);
        // 'Galeri/edit/' . $this->request->getPost('slug_k')
        if (!$validation) {
            return redirect()->to(previous_url())->withInput()->with('error', $this->validator->getErrors());
        }

        $data = [
            'judul_price' => $this->request->getPost('judul_price'),
            'deskripsi_price' => $this->request->getPost('deskripsi_price'),
            'gambar_price' =>  $this->request->getPost('gambar_price'),
            'harga' => $this->request->getPost('harga'),
            'harga_diskon' => $this->request->getPost('harga_diskon')
        ];
        $this->priceModel->update($id_price, $data);
        return redirect()->to(site_url('price'))->with('success', 'Price Berhasil Dirubah');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id_price = null)
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
    public function delete($id_price = null)
    {
        $this->priceModel->where('id_price', $id_price)->delete();
        return redirect()->to(site_url('price'))->with('success', 'Price Berhasil Dihapus');
    }
}

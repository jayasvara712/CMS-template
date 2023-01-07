<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\FaqModel;
use App\Models\GaleriModel;
use App\Models\MediaModel;
use App\Models\PriceModel;
use App\Models\SectionModel;
use App\Models\TestimonialModel;

// use App\Models\KategoriModel;
// // use App\Models\SubkategoriModel;
// use CodeIgniter\RESTful\ResourceController;
// // use CodeIgniter\RESTful\ResourcePresenter;
// use CodeIgniter\API\ResponseTrait;

class Dashboard extends BaseController
{
    private $menu = "<script language=\"javascript\">menu('m-dashboard');</script>";

    function __construct()
    {
        $this->faqModel = new FaqModel();
        $this->bannerModel = new BannerModel();
        $this->galeriModel = new GaleriModel();
        $this->mediaModel = new MediaModel();
        $this->priceModel = new PriceModel();
        $this->sectionModel = new SectionModel();
        $this->testiModel = new TestimonialModel();
    }
    public function index()
    {
        $data['faq'] = $this->faqModel->count_all();
        $data['banner'] = $this->bannerModel->count_all();
        $data['galeri'] = $this->galeriModel->count_all();
        $data['media'] = $this->mediaModel->count_all();
        $data['price'] = $this->priceModel->count_all();
        $data['section'] = $this->sectionModel->count_all();
        $data['testimonial'] = $this->testiModel->count_all();
        echo view('admin/dashboard', $data) . $this->menu;
    }
}

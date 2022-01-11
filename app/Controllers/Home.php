<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\FaqModel;
use App\Models\GaleriModel;
use App\Models\MediaModel;
use App\Models\PriceModel;
use App\Models\ProfilModel;
use App\Models\SectionModel;
use App\Models\TestimonialModel;

class Home extends BaseController
{
    function __construct()
    {
        $this->faqModel = new FaqModel();
        $this->galeriModel = new GaleriModel();
        $this->priceModel = new PriceModel();
        $this->bannerModel = new BannerModel();
        $this->profilModel = new ProfilModel();
        $this->sectionModel = new SectionModel();
        $this->testimonialModel = new TestimonialModel();
        $this->mediaModel = new MediaModel();
    }

    public function index($gambar_price = null, $img_banner = null)
    {
        $data['faq'] = $this->faqModel->findAll();
        $data['galeri'] = $this->galeriModel->findAll();
        $data['price'] = $this->priceModel->findAll();
        $data['banner'] = $this->bannerModel->findAll();
        // $data['profil'] = $this->profilModel->getId();
        $data['section'] = $this->sectionModel->findAll();
        $data['testimonial'] = $this->testimonialModel->findAll();
        $data['profil'] = $this->profilModel->where('id_profil', 1)->first();
        // $data['banner'] = $this->bannerModel->where('id_banner', 1)->first();
        $data['gambar'] = $this->galeriModel->find($gambar_price);
        $data['gambar'] = $this->galeriModel->find($img_banner);

        // hero image
        $heroimg = array();
        foreach ($data['banner'] as $key => $value) :
            $coba1 = new BannerModel();
            $coba1 = $value;
            $coba1->gambar_media_banner = $this->mediaModel->where('id_media', $value->img_banner)->first();
            array_push($heroimg, $coba1);
        endforeach;
        $data['banner'] = $heroimg;

        // section image
        $sectionimg = array();
        foreach ($data['section'] as $key => $value) :
            $coba1 = new BannerModel();
            $coba1 = $value;
            $coba1->gambar_media_section = $this->mediaModel->where('id_media', $value->gambar)->first();
            array_push($sectionimg, $coba1);
        endforeach;
        $data['section'] = $sectionimg;

        // galeri image
        $galeriimg = array();
        foreach ($data['galeri'] as $key => $value) :
            $coba1 = new GaleriModel();
            $coba1 = $value;
            $coba1->gambar_media_galeri = $this->mediaModel->where('id_media', $value->gambar_galeri)->first();
            array_push($galeriimg, $coba1);
        endforeach;
        $data['galeri'] = $galeriimg;

        $cobaArray = array();
        foreach ($data['price'] as $key => $value) :
            $coba = new PriceModel();
            $coba = $value;
            $coba->gambar_media_price = $this->mediaModel->where('id_media', $value->gambar_price)->first();
            array_push($cobaArray, $coba);
        endforeach;
        $data['price'] = $cobaArray;
        echo view('index', $data);
    }
}

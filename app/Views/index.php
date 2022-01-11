<?= $this->extend('template_landing'); ?>
<?= $this->section('content'); ?>

<!-- navbar -->
<!-- <header>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="#">Projasa CMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feature">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galery">Galery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary tombol" href="#contact-us">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header> -->

<nav id="navbar-landingpage" class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">Projasa</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="#workingspace">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#galery">Galery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#price">Price List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#testimoni">Testimoni</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#faq">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact-us">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>
<!-- end navbar -->

<!-- Hero Image -->
<section id="home">
    <?php foreach ($banner as $key => $value) : ?>
        <div class="jumbotron jumbotron-fluid" style="background-image: url('<?= base_url('/uploads/media') . "/" ?><?= $value->gambar_media_banner->file_media ?>')">
            <div class="container">
                <h1 class="display-4"> <?= $value->keterangan_banner ?> </h1>
                <a href="#" class="btn btn-primary tombol">Begins</a>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<!-- end hero image -->

<!-- content -->
<div class="container">
    <div data-spy="scroll" data-target="#navbar-landingpage" data-offset="0">

        <!-- info panel -->
        <!-- <section id="info-panel">
            <div class="row justify-content-center">
                <div class="col-10 info-panel">
                    <div class="row">
                        <div class="col-lg">
                            <img src="<?= base_url() ?>/stisla/assets/img/products/product-1-50.png" class="float-left">
                            <h4>Lorem, ipsum.</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="col-lg">
                            <img src="<?= base_url() ?>/stisla/assets/img/products/product-2-50.png" class="float-left">
                            <h4>Lorem, ipsum.</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="col-lg">
                            <img src="<?= base_url() ?>/stisla/assets/img/products/product-3-50.png" class="float-left">
                            <h4>Lorem, ipsum.</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- end info -->

        <!-- feature -->
        <section class="feature" id="feature">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <h2>
                        Feature
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="card-deck">
                        <div class="card">
                            <img src="<?= base_url() ?>/stisla/assets/img/products/product-2-50.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?= base_url() ?>/stisla/assets/img/products/product-2-50.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                        <div class="card">
                            <img src="<?= base_url() ?>/stisla/assets/img/products/product-2-50.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end feature -->

        <!-- workingspace -->
        <?php if ($profil != null) { ?>
            <section class="workingspace" id="workingspace">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="<?= base_url() ?>/stisla/assets/img/products/product-2-50.png" alt="working space" class="img-fluid">
                    </div>
                    <div class="col-lg-5">
                        <h3><?= $profil->nama_profil ?></h3>
                        <?= $profil->isi_profil ?>
                        <a href="#galery" class="btn btn-primary tombol">Gallery</a>
                    </div>
                </div>
            </section>
        <?php } ?>
        <!-- end workingspace -->

        <?php if ($section != null) { ?>
            <?php foreach ($section as $key => $value) : ?>
                <?php if ($value->layout == 1 && $value->status == "publikasi") { ?>
                    <section class="section" id="<?= $value->url ?>">
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <h2>
                                    <?= $value->judul ?>
                                </h2>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <img src="<?= base_url() ?>/uploads/media/<?= $value->gambar_media_section->file_media ?>" class="image_section img-fluid">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <?= $value->isi_konten ?>
                            </div>
                        </div>
                    </section>
                <?php } else if ($value->layout == 2 && $value->status == "publikasi") { ?>
                    <!-- 2 column -->
                    <section class="section" id="<?= $value->url ?>">
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <h2>
                                    <?= $value->judul ?>
                                </h2>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <img src="<?= base_url() ?>/uploads/media/<?= $value->gambar_media_section->file_media ?>" class="image_section img-fluid">
                            </div>
                            <div class="col-lg-7">
                                <?= $value->isi_konten ?>
                            </div>
                        </div>
                    </section>
                <?php } else if ($value->layout == 3 && $value->status == "publikasi") { ?>
                    <section class="section" id="<?= $value->url ?>">
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <h2>
                                    <?= $value->judul ?>
                                </h2>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <?= $value->isi_konten ?>
                            </div>
                            <div class="col-lg-4 row justify-content-center">
                                <img src="<?= base_url() ?>/uploads/media/<?= $value->gambar_media_section->file_media ?>" class="image_section img-fluid">
                            </div>
                            <div class="col-lg-4">
                                <?= $value->isi_konten ?>
                            </div>
                        </div>
                    </section>
                <?php } ?>
            <?php endforeach ?>
        <?php } ?>

        <!-- galery -->
        <?php if ($galeri != null) { ?>
            <section class="galery" id="galery">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <h2>
                            Galery
                        </h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-11 col-lg-11 col-lg-11">
                        <div class="card ">
                            <div class="card-body">
                                <div class="gallery">
                                    <?php $total = count($galeri);
                                    foreach ($galeri as $key => $value) : ?>
                                        <?php if ($key < 8 || (($total - 1) == $key && $key < 9)) { ?>
                                            <div class="gallery-item" data-image="<?= base_url('/uploads/media') . "/" ?><?= $value->gambar_media_galeri->file_media ?>" data-title="<?= $value->deskripsi_galeri ?>"></div>
                                            <?php } else {
                                            if ($key == 8) { ?>
                                                <div class="gallery-item gallery-more" data-image="<?= base_url('/uploads/media') . "/" ?><<?= $value->gambar_media_galeri->file_media ?>" data-title="<?= $value->deskripsi_galeri ?>">
                                                    <div>+<?= $total - 8 ?></div>
                                                </div>

                                            <?php } else { ?>
                                                <div class="gallery-item gallery-hide" data-image="<?= base_url('/uploads/media') . "/" ?><?= $value->gambar_media_galeri->file_media ?>" data-title=" <?= $value->deskripsi_galeri ?>"></div>
                                        <?php }
                                        } ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <!-- end galery -->

        <!-- pricelist -->
        <?php if ($price != null) { ?>
            <section class="price" id="price">
                <div class=" row justify-content-center">
                    <div class="col-lg-11">
                        <h2>
                            Price List
                        </h2>
                    </div>
                </div>

                <div class="row">

                    <div id="price-list" class="owl-carousel owl-loaded owl-drag">
                        <?php foreach ($price as $key => $value) : ?>
                            <div>
                                <div class="pricing">
                                    <div class="pricing-title">
                                        <?= $value->judul_price ?>
                                    </div>

                                    <div class="pricing-image">
                                        <img src="<?= base_url('/uploads/media') . "/" ?><?= $value->gambar_media_price->file_media ?>" alt="">
                                    </div>

                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <?php if ($value->harga_diskon == 0) { ?>
                                                <h5>&nbsp;</h5>
                                                <h4> Rp.<?= $value->harga ?></h4>
                                            <?php } else { ?>
                                                <h4><s>Rp.<?= $value->harga ?></s></h4>
                                                <h5>Rp.<?= $value->harga_diskon ?></h5>
                                            <?php } ?>
                                        </div>
                                        <div class="pricing-details">
                                            <?= $value->deskripsi_price ?>
                                            <!-- <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                            <div class="pricing-item-label">1 user agent</div> -->
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="#">Pesan <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
        <?php } ?>
        <!-- end pricelist -->

        <!-- testimoni -->
        <?php if ($testimonial != null) { ?>
            <section class="testimonial" id="testimoni">
                <div class=" row justify-content-center">
                    <div class="col-lg-11">
                        <h2>
                            Testimoni
                        </h2>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div id="customer-testi" class="owl-carousel owl-theme">
                            <?php foreach ($testimonial as $key => $value) : ?>
                                <div class="item">
                                    <div class="shadow-effect">
                                        <img class="img-circle" src="<?= base_url('/uploads/galeri') . "/" ?><?= $value->gambar_testimonial ?>" alt="">
                                        <p><?= $value->keterangan_testimonial ?></p>
                                    </div>
                                    <div class="testimonial-name">
                                        <?= $value->nama_testimonial ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

            </section>
        <?php } ?>
        <!-- end testimoni -->

        <!-- FAQ -->
        <?php if ($faq != null) { ?>
            <section class="faq" id="faq">
                <div class="row justify-content-center">
                    <div class="col-11 col-md-11 col-lg-11">
                        <div class="card">
                            <div class="card-header justify-content-center">
                                <h2>FAQ</h2>
                            </div>
                            <div class="card-body">
                                <div id="accordion">
                                    <?php foreach ($faq as $key => $value) : ?>
                                        <div class="accordion">
                                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-<?= $key ?>" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <h4><?= $value->judul_faq ?></h4>
                                                    </div>
                                                    <div class="col-lg-1 text-right">
                                                        <i class="fas fa-chevron-right"></i>
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="accordion-body collapse" id="panel-body-<?= $key ?>" data-parent="#accordion">
                                                <p class="mb-0"><?= $value->deskripsi_faq ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <!-- end FAQ -->

        <!-- contact us -->
        <section class="contact-us" id="contact-us">

            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="card card-primary">
                        <div class="row">
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <div class="card-header text-center">
                                    <h2>Contact Us</h2>
                                </div>

                                <div class="card-body">
                                    <div id="accordion-contact">
                                        <div class="accordion">
                                            <?php if ($profil->telp_profil != null && $profil->telp_profil != '0') { ?>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#contact-us-1" aria-expanded="true">
                                                            <h4>Form</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#contact-us-2">
                                                            <h4>Whatsapp</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="accordion-body collapse show" id="contact-us-1" data-parent="#accordion-contact">
                                                <form method="POST" action="">
                                                    <div class="form-group floating-addon">
                                                        <label>Nama</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fa fa-user"></i>
                                                                </div>
                                                            </div>
                                                            <input id="name" type="text" class="form-control" name="name" autofocus placeholder="Name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group floating-addon">
                                                        <label>Email</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fa fa-envelope"></i>
                                                                </div>
                                                            </div>
                                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Pesan</label>
                                                        <textarea class="form-control" placeholder="Type your message" data-height="150"></textarea>
                                                    </div>

                                                    <div class="form-group text-right">
                                                        <button type="submit" class="btn btn-round btn-lg btn-primary">
                                                            Kirim Pesan
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="accordion-body collapse" id="contact-us-2" data-parent="#accordion-contact">
                                                <div class="form-group text-center">
                                                    <a href="https://api.whatsapp.com/send?phone=+<?= $profil->telp_profil ?>" class="btn btn-round btn-lg btn-success"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- map -->
                            <div class="col-lg-7 col-md-12 col-sm-12">
                                <?= $profil->map_profil ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- end contact us -->
    </div>
</div>
<!-- end content -->

<?= $this->endSection(); ?>
<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fas fa-columns"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"><?= $section ?></div>
                                                    <div>Section</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="section">
                                            <div class="card-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fas fa-columns"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"><?= $price ?></div>
                                                    <div>Price List</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="price">
                                            <div class="card-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fas fa-columns"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"><?= $testimonial ?></div>
                                                    <div>Testimonial</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="testimonial">
                                            <div class="card-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fas fa-columns"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"><?= $faq ?></div>
                                                    <div>FAQ</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="faq">
                                            <div class="card-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fas fa-columns"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"><?= $media ?></div>
                                                    <div>Media</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="media">
                                            <div class="card-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fas fa-columns"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge"><?= $galeri ?></div>
                                                    <div>Galeri</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="galeri">
                                            <div class="card-footer">
                                                <span class="pull-left">View Details</span>
                                                <span class="pull-right"><i class="fas fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?= $this->endSection(); ?>
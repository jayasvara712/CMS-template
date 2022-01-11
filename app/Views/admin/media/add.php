<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Media</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Konten</a></div>
                <div class="breadcrumb-item">Media</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= site_url('media') ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="judul_media">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" name="deskripsi_media"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File Media</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="col-4">
                                            <img src="/uploads/galeri/no-image.png" alt="" srcset="" class="image-thumbnail img-preview" width="150px">
                                        </div>
                                        <div class="col-12">
                                            <input type="file" id="gambar" name="file_media" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : '' ?>" onchange="imagePreview()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('gambar') ?>
                                            </div>
                                            <label for="gambar" class="custom-file-label gambar-label">Tambah File</label>
                                            <p>File Format PNG/JPG/JPEG/PDF | Max Size 5mb</p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($validation->getErrors()) :  ?>
                                    <div>
                                        <p class="invalid"><?= $validation->getError('judul_media') ?></p>
                                        <p class="invalid"><?= $validation->getError('file_media') ?></p>
                                    </div>
                                <?php endif ?>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?= $this->endSection(); ?>
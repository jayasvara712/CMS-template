<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Testimonial</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Konten</a></div>
        <div class="breadcrumb-item">Testimonial</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="<?= site_url('testimonial/update/' . $testimonial->id_testimonial) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="gambar_lama" value="<?= $testimonial->gambar_testimonial ?>">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="nama_testimonial" value="<?= $testimonial->nama_testimonial ?>">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote" name="keterangan_testimonial"><?= $testimonial->keterangan_testimonial ?></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                  <div class="col-sm-12 col-md-7">
                    <div class="col-4">
                      <img src="<?= base_url() ?>/uploads/media/testi/<?= $testimonial->gambar_testimonial ?>" alt="" srcset="" class="image-thumbnail img-preview" width="150px">
                    </div>
                    <div class="col-12">
                      <input type="file" id="gambar" name="gambar" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : '' ?>" onchange="imagePreview()">
                      <div class="invalid-feedback">
                        <?= $validation->getError('gambar') ?>
                      </div>
                      <label for="gambar" class="custom-file-label gambar-label"><?= $testimonial->gambar_testimonial ?></label>
                      <p>Gambar Format PNG/JPG/JPEG</p>
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button type=" submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-danger"><i class="fas fa-undo"></i> Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>

<?= $this->endSection(); ?>
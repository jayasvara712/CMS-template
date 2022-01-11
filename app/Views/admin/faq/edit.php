<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit FAQ</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Konten</a></div>
        <div class="breadcrumb-item">FAQ</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="<?= site_url('faq/update/' . $faq->id_faq) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="judul_faq" value="<?= $faq->judul_faq ?>">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote" name="deskripsi_faq"><?= $faq->deskripsi_faq ?></textarea>
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
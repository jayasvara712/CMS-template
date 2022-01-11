<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>List Galeri</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Konten</a></div>
        <div class="breadcrumb-item">Galeri</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <?php if (session()->getFlashdata('success')) : ?>
              <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">x</button>
                  <?= session()->getFlashdata('success') ?>
                </div>
              </div>
            <?php endif ?>
            <div class="card-header">
              <p class="btn-group">
                <a href="<?= site_url("galeri/new") ?>" class="btn btn-success btn-lg">
                  <i class="fas fa-plus"></i> Tambah Galeri</a>
              </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Gambar</th>
                      <th>Deskripsi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($galeri as $key => $value) : ?>
                      <tr>
                        <td>
                          <?= $key + 1 ?>
                        </td>
                        <td><?= $value->judul_galeri ?></td>
                        <td>
                          <img alt="image" src="<?= base_url() ?>/uploads/media/<?= $value->gambar_media_galeri->file_media ?>" class="rounded-circle" data-toggle="tooltip" width="100px" height="100px" title="<?= $value->judul_galeri ?>">
                        </td>
                        <td><?= $value->deskripsi_galeri ?></td>
                        <td>
                          <a href="<?= site_url('galeri/edit/' .  $value->id_galeri) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <form action="<?= site_url('galeri/delete/') . $value->id_galeri ?>" class="d-inline" method="post">
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>

<?= $this->endSection(); ?>
<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>List FAQ</h1>
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
                <a href="<?= site_url("faq/new") ?>" class="btn btn-success btn-lg">
                  <i class="fas fa-plus"></i> Tambah FAQ</a>
              </p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($faq as $key => $value) : ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td>
                          <?= $value->judul_faq ?>
                        </td>
                        <td>
                          <?= $value->deskripsi_faq ?>
                        </td>
                        <td>
                          <a href="<?= site_url('faq/edit/' .  $value->id_faq) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <form action="<?= site_url('faq/delete/') . $value->id_faq ?>" class="d-inline" method="post">
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
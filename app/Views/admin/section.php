<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>List Section</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Konten</a></div>
        <div class="breadcrumb-item">Section</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <p class="btn-group">
                <a href="<?= site_url("section/new") ?>" class="btn btn-success btn-lg">
                  <i class="fas fa-plus"></i> Tambah Section
                </a>
                <!-- <button class="btn btn-primary" type="submit" name="publish" onClick="check();">
                  <i class="fas fa-check"></i> Publikasikan
                </button>
                <button class="btn btn-warning" type="submit" name="draft" onClick="check();">
                  <i class="fas fa-times"></i> Jangan Publikasikan
                </button> -->
              </p>
              <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <?= session()->getFlashdata('success') ?>
                  </div>
                </div>
              <?php endif ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      <th class="text-center">
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                          <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                        </div>
                      </th>
                      <th>Judul</th>
                      <th>Tanggal Publish</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($section as $key => $value) : ?>
                      <tr>
                        <td class="text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td>
                          <?= $value->judul ?>
                        </td>
                        <td>
                          <?= $value->tgl_publish ?>
                        </td>
                        <td>
                          <?php if ($value->status == "publikasi") { ?>
                            <div class="badge badge-success"><i class="fas fa-check"></i> <?= $value->status ?></div>
                          <?php } else { ?>
                            <div class="badge badge-warning"><i class="fas fa-copy"></i> <?= $value->status ?></div>
                          <?php } ?>
                        </td>
                        <td>
                          <a href="<?= base_url('#' . $value->url) ?>" class="btn btn-info" target="blank_"><i class="fas fa-eye"></i></a>
                          <a href="<?= site_url('section/edit/' .  $value->id_section) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <form action="<?= site_url('section/delete/') . $value->id_section ?>" class="d-inline" method="post">
                            <input type="hidden" name="gambar" value="<?= $value->gambar ?>">
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
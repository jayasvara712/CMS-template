<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Media</h1>
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
                                <a href="<?= site_url("media/new") ?>" class="btn btn-success btn-lg">
                                    <i class="fas fa-plus"></i> Tambah Media</a>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>File</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($media as $key => $value) : ?>
                                            <tr>
                                                <td>
                                                    <?= $key + 1 ?>
                                                </td>
                                                <td><?= $value->judul_media ?></td>
                                                <td>
                                                    <?php
                                                    $data = $value->file_media;
                                                    if (strpos($data, ".png") || strpos($data, ".jpg") || strpos($data, ".jpeg") !== false) {
                                                    ?>
                                                        <img alt="image" src="<?= base_url('/uploads/media/') . "/" ?><?= $value->file_media ?>" class="rounded-circle" data-toggle="tooltip" width="100px" height="100px" title="<?= $value->judul_media ?>">
                                                    <?php
                                                    } else if (strpos($data, ".pdf") !== false) {
                                                    ?>
                                                        <div class="badge badge-info rounded-circle" data-toggle="tooltip" style="width: 100px; height:100px;" title="<?= $value->judul_media ?>"><i class="fas fa-file-pdf" style="font-size:50px; padding:15px;"></i></div>
                                                    <?php
                                                    } ?>
                                                </td>
                                                <td><?= $value->deskripsi_media ?></td>
                                                <td>
                                                    <a href="<?= site_url('media/edit/' .  $value->id_media) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    <form action="<?= site_url('media/delete/') . $value->id_media ?>" class="d-inline" method="post">
                                                        <input type="hidden" name="file_media" value="<?= $value->file_media ?>">
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
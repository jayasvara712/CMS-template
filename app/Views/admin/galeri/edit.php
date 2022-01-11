<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Galeri</h1>
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
            <div class="card-body">
              <form action="<?= site_url('galeri/update/' . $galeri->id_galeri) ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="gambar_lama" value="<?= $galeri->gambar_galeri ?>">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="judul_galeri" value="<?= $galeri->judul_galeri ?>">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="form-control" name="deskripsi_galeri"><?= $galeri->deskripsi_galeri ?></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar Konten</label>
                  <div class="col-sm-12 col-md-7">
                    <div class="row" id="samar_samar">
                    </div>
                    <button class="btn view_data" type="button" title="View Data" target="_blank">
                      <img src="<?= base_url() ?>/uploads/asset/add-image.png" alt="" srcset="" width="100%">
                    </button>
                    <input type="hidden" name="gambar_galeri" id="txt_gambar" class="input_gambar" value="<?= $galeri->gambar_galeri ?>">
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

<div class="modal fade" tabindex="-1" role="dialog" id="view_galeri">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <?php
            $data_gambar = explode(",", $galeri->gambar_galeri);
            $d_gambar = array($data_gambar);
            ?>
            <?php foreach ($media as $key => $raw) : ?>
              <?php
              $data = $raw->file_media;
              if (strpos($data, ".png") || strpos($data, ".jpg") || strpos($data, ".jpeg") !== false) {
              ?>
                <div class="col-lg-3 img-selection">
                  <img class="img-thumbnail rounded pilihan <?php if (in_array($raw->id_media, $d_gambar[0])) {
                                                              echo 'img-onclick';
                                                            } ?>" src="<?= base_url() ?>/uploads/media/<?= $raw->file_media ?>" id="img_<?= $raw->id_media ?>" onclick="imgclick(<?= $raw->id_media ?>)">
                </div>
              <?php } ?>

            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="img_save()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
  window.onload = function() {
    var y = document.getElementsByClassName('pilihan');
    var x = document.getElementById("samar_samar");
    var z = document.getElementById("txt_gambar").value;
    x.innerHTML = "";
    let choice = '';
    for (let index = 0; index < y.length; index++) {
      if (y[index].classList.contains("img-onclick")) {
        var div = document.createElement("div");
        div.className += "col-lg-3 img-selection";
        var cln = y[index].cloneNode(true);
        cln.id = "img_bayangan_" + index;
        cln.classList.remove("img-onclick");
        cln.classList.remove("pilihan");
        div.appendChild(cln);
        x.appendChild(div);
      }
    }
    z.value = choice;
    $('#view_galeri').modal('hide');
  };
</script>

<?= $this->endSection(); ?>
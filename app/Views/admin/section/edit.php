<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Section</h1>
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
            <form action="<?= site_url('section/update/' . $section->id_section) ?>" method="post" autocomplete="off" enctype="multipart/form-data" id="sectionForm">
              <div class="card-body">

                <div class="tab">
                  <div class="form-group row justify-content-center">
                    <label class="col-form-label text-center col-12 col-md-3 col-lg-3">Layout</label>
                  </div>

                  <div class="col-sm-12 col-md-12 col-12">
                    <div class="container-fluid">
                      <div class="row justify-content-center">
                        <div class="col-lg-1 img-selection">
                          <img class="img-thumbnail rounded pilihan <?php if ($section->layout == 1) echo "layout-onclick"; ?>" src="<?= base_url() ?>/uploads/asset/1-columns.png" id="layout_1" onclick="layoutselect(1)">
                        </div>
                        <div class="col-lg-1 img-selection">
                          <img class="img-thumbnail rounded pilihan <?php if ($section->layout == 2) echo "layout-onclick"; ?>" src="<?= base_url() ?>/uploads/asset/2-columns.png" id="layout_2" onclick="layoutselect(2)">
                        </div>
                        <div class="col-lg-1 img-selection">
                          <img class="img-thumbnail rounded pilihan <?php if ($section->layout == 3) echo "layout-onclick"; ?>" src="<?= base_url() ?>/uploads/asset/3-columns.png" id="layout_3" onclick="layoutselect(3)">
                        </div>
                        <input type="hidden" name="layout" id="txt_layout" class="input_layout" value="<?= $section->layout ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab">
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Konten</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="judul" id="judul" onkeyup="urlmaker()" value="<?= $section->judul ?>">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Url</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="url" id="url" value="<?= $section->url ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Publish</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="date" class="form-control" name="tgl_publish" value="<?= $section->tgl_publish ?>">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Konten</label>
                    <div class="col-sm-12 col-md-7">
                      <select class="form-control" name="status">
                        <option value="publikasi" <?php if ('publikasi' == $section->status) {
                                                    echo 'Selected';
                                                  } ?>>Publikasikan</option>
                        <option value="draft" <?php if ('draft' == $section->status) {
                                                echo 'Selected';
                                              } ?>>Masukkan Draft</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar Konten</label>
                    <div class="col-sm-12 col-md-7">
                      <div class="row" id="samar_samar" onload="img_show(<?= $section->gambar ?>)">
                      </div>
                      <button class="btn view_data" type="button" title="View Data" target="_blank">
                        <img src="<?= base_url() ?>/uploads/asset/add-image.png" alt="" srcset="" width="100%">
                      </button>
                      <input type="hidden" name="gambar" id="txt_gambar" class="input_gambar" value="<?= $section->gambar ?>">
                      <!-- <input type="file" class="form-control" name="gambar"> -->
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Konten</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="summernote" name="isi_konten"><?= $section->isi_konten ?></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    <button class="btn btn-primary" id="saveBtn">Publish</button>
                  </div>
                </div>

                <div style="text-align:center;margin-top:40px;">
                  <span class="step"></span>
                  <span class="step"></span>
                </div>

              </div>
            </form>
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
        <h5 class="modal-title">Galeri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <?php
            $data_gambar = explode(",", $section->gambar);
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
<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profil Perusahaan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Konten</a></div>
        <div class="breadcrumb-item">Profil</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form action="<?= site_url('profil/update/' . $profil->id_profil) ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="">
                    Isi
                  </label>
                  <textarea name="isi_profil" id="isi_profil" class="summernote" placeholder="Isi Profil"><?= $profil->isi_profil ?></textarea>
                </div>

                <div class="form-group">
                  <label for="">
                    Alamat
                  </label>
                  <textarea name="alamat_profil" id="alamat_profil" class="summernote" placeholder="Alamat Perusahaan"><?= $profil->alamat_profil ?></textarea>
                </div>

                <div class="form-row">
                  <div class="col-md-6">
                    <h3>Informasi Umum</h3>
                    <hr>
                    <div class="form-group">
                      <label for="">Nama Perusahaan</label>
                      <input type="text" name="nama_profil" placeholder="Nama Organisasi / Perusahaan" value="<?= $profil->nama_profil ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Nama Singkatan Singkatan</label>
                      <input type="text" name="singkatan_profil" placeholder="Nama Singkatan Organisasi / Perusahaan" value="<?= $profil->singkatan_profil ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Tagline / Motto</label>
                      <input type="text" name="tagline_profil" placeholder="Tagline / Motto" value="<?= $profil->tagline_profil ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Website Address</label>
                      <input type="text" name="web_profil" placeholder="Alamat Website Organisasi / Perusahaan" value="<?= $profil->web_profil ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Email Perusahaan</label>
                      <input type="email" name="email_profil" placeholder="youremail@mail.com" value="<?= $profil->email_profil ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">No Telepon</label>
                      <input type="text" name="telp_profil" placeholder="021-111-111" value="<?= $profil->telp_profil ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Fax</label>
                      <input type="text" name="fax_profil" placeholder="021-000-111" value="<?= $profil->fax_profil ?>" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <h3>Social network</h3>
                    <hr>

                    <div class="form-group">
                      <label>Facebook <i class="fas fa-facebook"></i></label>
                      <input type="url" name="fb_profil" placeholder="http://facebook.com/nama" value="<?= $profil->fb_profil ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Twitter <i class="fas fa-twitter"></i></label>
                      <input type="url" name="twit_profil" placeholder="http://twitter.com/nama" value="<?= $profil->twit_profil ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Instagram <i class="fas fa-instagram"></i></label>
                      <input type="url" name="ig_profil" placeholder="http://instagram.com/nama" value="<?= $profil->ig_profil ?>" class="form-control">
                    </div>

                    <h3>Google Map</h3>
                    <hr>
                    <div class="form-group">
                      <label>Google Map</label>
                      <textarea name="map_profil" rows="5" class="form-control" placeholder="Kode dari Google Map"><?= $profil->map_profil ?></textarea>
                    </div>

                    <div class="form-group map">
                      <style type="text/css" media="screen">
                        iframe {
                          width: 100%;
                          max-height: 200px;
                        }
                      </style>
                      <?= $profil->map_profil ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button class="btn btn-primary">Publish</button>
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
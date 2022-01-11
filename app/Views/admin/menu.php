<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>

  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="<?= base_url() ?>/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Admin</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="#" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="#" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="logout" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url() ?>">Template CMS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">CMS</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item" id="m-dashboard">
        <a href="<?= site_url("/dashboard") ?>" class="nav-link"><i class="fas fa-chart-bar"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Konten</li>

      <li class="nav-item dropdown" id="m-page">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-passport"></i> <span>Pages</span></a>
        <ul class="dropdown-menu">
          <li class="nav-link" id="m-section">
            <a href="<?= site_url("/section") ?>" class="nav-link"><i class="fas fa-columns"></i><span>Section</span></a>
          </li>
          <li class="nav-link" id="m-banner">
            <a href="<?= site_url("/banner/edit/1") ?>" class="nav-link"><i class="fas fa-fire"></i><span>Banner</span></a>
          </li>
          <li class="nav-link" id="m-profil">
            <a href="<?= site_url("/profil/edit/1") ?>" class="nav-link"><i class="fas fa-building"></i><span>Profil</span></a>
          </li>
          <li class="nav-link" id="m-price">
            <a href="<?= site_url("/price") ?>" class="nav-link"><i class="fas fa-tags"></i><span>Pricelist</span></a>
          </li>
          <li class="nav-link" id="m-testi">
            <a href="<?= site_url("/testimonial") ?>" class="nav-link"><i class="fas fa-award"></i><span>Testimoni</span></a>
          </li>
          <li class="nav-link" id="m-faq">
            <a href="<?= site_url("/faq") ?>" class="nav-link"><i class="fas fa-question-circle"></i><span>FAQ</span></a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown" id="m-mediaall">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder-open"></i> <span>Media</span></a>
        <ul class="dropdown-menu">
          <li class="nav-link" id="m-media">
            <a href="<?= site_url("/media") ?>" class="nav-link"><i class="fas fa-image"></i><span>Media</span></a>
          </li>
          <li class="nav-link" id="m-galeri">
            <a href="<?= site_url("/galeri") ?>" class="nav-link"><i class="fas fa-image"></i><span>Galeri</span></a>
          </li>
        </ul>
      </li>

    </ul>
  </aside>
</div>
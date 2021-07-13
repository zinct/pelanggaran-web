<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sistem Informasi Pelanggaran | <?= $halaman ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/dropify/dropify.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url() ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata('nama_user') ?> (<?= $this->session->userdata('level') ?>)</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">User Menu</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('login/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Pelanggaran Siswa</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PS</a>
          </div>
          <ul class="sidebar-menu">
              <li>
                <a class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'text-primary' : '' ?>" href="<?= base_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
              </li>
              <li class="menu-header">Master Data</li>
              <li class="nav-item dropdown <?= in_array($this->uri->segment(1), ['siswa', 'kelas', 'jurusan', 'tahun']) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-graduation-cap"></i> <span>Siswa</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link <?= $this->uri->segment(1) == 'siswa' ? 'text-primary' : '' ?>" href="<?= base_url('Siswa') ?>">Data Siswa</a></li>
                  <li><a class="nav-link <?= $this->uri->segment(1) == 'kelas' ? 'text-primary' : '' ?>" href="<?= base_url('Kelas') ?>">Data Kelas</a></li>
                  <li><a class="nav-link <?= $this->uri->segment(1) == 'jurusan' ? 'text-primary' : '' ?>" href="<?= base_url('Jurusan') ?>">Data Jurusan</a></li>
                  <li><a class="nav-link <?= $this->uri->segment(1) == 'tahun' ? 'text-primary' : '' ?>" href="<?= base_url('Tahun') ?>">Data Tahun</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown <?= in_array($this->uri->segment(1), ['pelanggaran', 'jenis_pelanggaran', 'kategori_pelanggaran']) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-exclamation-triangle"></i> <span>Pelanggaran</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link <?= $this->uri->segment(1) == 'pelanggaran' ? 'text-primary' : '' ?>" href="<?= base_url('Pelanggaran') ?>">Pelanggaran</a></li>
                  <li><a class="nav-link <?= $this->uri->segment(1) == 'jenis_pelanggaran' ? 'text-primary' : '' ?>" href="<?= base_url('jenis_pelanggaran') ?>">Jenis Pelanggaran</a></li>
                  <li><a class="nav-link <?= $this->uri->segment(1) == 'kategori_pelanggaran' ? 'text-primary' : '' ?>" href="<?= base_url('kategori_pelanggaran') ?>">Kategori Pelanggaran</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown <?= in_array($this->uri->segment(1), ['sanksi', 'kategori_sanksi']) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-archive"></i> <span>Sanksi</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link <?= $this->uri->segment(1) == 'sanksi' ? 'text-primary' : '' ?>" href="<?= base_url('Sanksi') ?>">Sanksi</a></li>
                  <li><a class="nav-link <?= $this->uri->segment(1) == 'kategori_sanksi' ? 'text-primary' : '' ?>" href="<?= base_url('kategori_sanksi') ?>">Kategori Sanksi</a></li>
                </ul>
              </li>
              <li class="menu-header">User Manajemen</li>
              <li>
                <a class="nav-link <?= $this->uri->segment(1) == 'user' ? 'text-primary' : '' ?>" href="<?= base_url('user') ?>"><i class="fas fa-user"></i> <span>User</span></a>
              </li>
            </ul>
        </aside>
      </div>
      <div class="main-content">
        <?= $contents ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
        Copyright © SMK Bakti Nusantara 666 @<?php echo date("Y") ; ?>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>assets/js/custom.js"></script>
  
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    <?php if($this->session->flashdata('success')) : ?>
      iziToast.success({
        title: 'Success',
        message: '<?= $this->session->flashdata('success') ?>',
        position: 'topRight',
      });
    <?php endif; ?>
  </script>
  <script>
    $(document).ready( function () {
        $('.dataTable').DataTable();
    });
  </script>
  <script src="<?= base_url() ?>assets/vendor/dropify/dropify.js"></script>
  <script>
    $('.dropify').dropify();
  </script>
</body>
</html>
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
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/select2.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/izitoast/css/iziToast.css" />
  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.checkboxes.css" rel="stylesheet">

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <script src="<?= base_url() ?>assets/js/select2.full.min.js"></script>
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
        <?php if(in_array($this->session->userdata('level'), ['admin', 'kesiswaan'])) : ?>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifikasi
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <?php 
                  $notifikasi = $this->Pelanggaran_data_model->get_Pelanggaran($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun, 5, true);
                ?>
                <?php foreach($notifikasi as $row) : ?>
                  <a href="<?= base_url("verifikasi_pelanggaran/create?nis={$row->nis}") ?>" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                      <i class="fas fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b><?= $row->nama_siswa ?> | <?= $row->nama_kelas ?></b>
                      <p class="text-muted"><?= $row->nama_pelanggaran ?></p>
                      <div class="time"><?= date('Y-m-d', strtotime($row->tgl))  ?></div>
                    </div>
                  </a>
                <?php endforeach; ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="javascript:void(0)">Selengkapnya <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
        </li>
        <?php endif; ?>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= base_url() ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata('nama_user') ?> (<?= $this->session->userdata('level') ?>)</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
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
            <img class="img-fluid mr-5 mt-3" src="<?= base_url('assets/img/smk.png') ?>" style="max-width: 150px;">
            <a class="" href="<?= base_url('home') ?>">Pelanggaran Siswa</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PS</a>
          </div>
          <ul class="sidebar-menu pb-5 mt-3">
            <li>
              <a class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'text-primary' : '' ?>" href="<?= base_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Entry Data</li>
            <li>
              <a class="nav-link bg-primary text-white" href="<?= base_url('Pelanggaran_data') ?>">
                  <i class="fas fa-fw fa-plus-circle"></i><span>Entri Pelanggaran</span>
              </a>
            </li>
            <?php if(in_array($this->session->userdata('level'), ['admin', 'kesiswaan'])) : ?>
            <li>
              <a class="nav-link <?= $this->uri->segment(1) == 'verifikasi_pelanggaran' ? 'text-primary' : '' ?>" href="<?= base_url('Verifikasi_pelanggaran') ?>"><i class="fas fa-check"></i> <span>Verifikasi Pelanggaran</span></a>
            </li>
            <?php endif; ?>
            <?php if($this->session->userdata('level') != 'walikelas') : ?>
              <li class="menu-header">Master Data</li>
              <?php if($this->session->userdata('level') == 'admin') : ?>
                <li class="nav-item dropdown <?= in_array($this->uri->segment(1), ['ptk', 'siswa', 'kelas', 'jurusan', 'tahun']) ? 'active' : '' ?>">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Data Master</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link <?= $this->uri->segment(1) == 'ptk' ? 'text-primary' : '' ?>" href="<?= base_url('Ptk') ?>"><i class="fas fa-graduation-cap"></i> Data PTK</a></li>
                    <li><a class="nav-link <?= $this->uri->segment(1) == 'siswa' ? 'text-primary' : '' ?>" href="<?= base_url('Siswa') ?>"><i class="fas fa-users"></i> Data Siswa</a></li>
                    <li><a class="nav-link <?= $this->uri->segment(1) == 'kelas' ? 'text-primary' : '' ?>" href="<?= base_url('Kelas') ?>"><i class="fas fa-building"></i> Data Kelas</a></li>
                    <li><a class="nav-link <?= $this->uri->segment(1) == 'jurusan' ? 'text-primary' : '' ?>" href="<?= base_url('Jurusan') ?>"><i class="fas fa-university"></i> Data Jurusan</a></li>
                    <li><a class="nav-link <?= $this->uri->segment(1) == 'tahun' ? 'text-primary' : '' ?>" href="<?= base_url('Tahun') ?>"><i class="fas fa-calendar"></i> Data Tahun</a></li>
                  </ul>
                </li>
              <?php endif; ?>
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
              <?php if($this->session->userdata('level') == 'admin') : ?>
                <li class="menu-header">User Manajemen</li>
                <li>
                  <a class="nav-link <?= $this->uri->segment(1) == 'user' ? 'text-primary' : '' ?>" href="<?= base_url('user') ?>"><i class="fas fa-user"></i> <span>Pengguna</span></a>
                </li>
                <?php endif; ?>
            <li class="menu-header">Laporan</li>
            <li class="nav-item dropdown <?= in_array($this->uri->segment(1), ['laporan_pelanggaran', 'laporan_pelanggaran_siswa', 'laporan_pelanggaran_kelas']) ? 'active' : '' ?>">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link <?= $this->uri->segment(1) == 'laporan_pelanggaran' ? 'text-primary' : '' ?>" href="<?= base_url('laporan_pelanggaran') ?>">Pelanggaran</a></li>
                <li><a class="nav-link <?= $this->uri->segment(1) == 'laporan_pelanggaran_siswa' ? 'text-primary' : '' ?>" href="<?= base_url('laporan_pelanggaran_siswa') ?>">Pelanggaran Siswa</a></li>
                <li><a class="nav-link <?= $this->uri->segment(1) == 'laporan_pelanggaran_kelas' ? 'text-primary' : '' ?>" href="<?= base_url('laporan_pelanggaran_kelas') ?>">Pelanggaran Kelas</a></li>
              </ul>
            </li>
            <?php endif; ?>

          </ul>
        </aside>
      </div>
      <div class="main-content">
        <?= $contents ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright © SMK Bakti Nusantara 666 @<?php echo date("Y"); ?>
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
  <script src="<?= base_url() ?>assets/js/select2.full.min.js"></script>

  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.checkboxes.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url() ?>assets/vendor/izitoast/js/iziToast.js"></script>
  <script>
    <?php if ($this->session->flashdata('success')) : ?>
      iziToast.success({
        title: 'Berhasil',
        message: '<?= $this->session->flashdata('success') ?>',
        position: 'topRight',
      });
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
      iziToast.error({
        title: 'Gagal',
        message: '<?= $this->session->flashdata('error') ?>',
        position: 'topRight',
      });
    <?php endif; ?>
  </script>
  <script>
    $(document).ready(function() {
      $('.dataTable').DataTable();
    });
  </script>
  <script src="<?= base_url() ?>assets/vendor/dropify/dropify.js"></script>
  <script>
    $('.dropify').dropify();
  </script>
</body>

</html>
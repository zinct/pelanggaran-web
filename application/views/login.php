<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Halaman Login | Sistem Informasi Penilaian Staff,Dosen dan Mahasiswa - STMIK "AMIKBANDUNG"</title>
    <link href="<?php echo base_url(); ?>/assets/css/sb-admin.css" rel="stylesheet" />
</head>
<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form action="<?php echo base_url()?>login/login" method="POST">
                                        <div id="notifications">
                                            <?php 
                                            if ($this->session->flashdata('message')!=null) {
                                                echo $this->session->flashdata('message');
                                                $this->session->unset_userdata('message');
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">NIPY/NIS</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="text" name="pengguna" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Kata Sandi</label>
                                            <input class="form-control py-4" id="inputPassword" type="password" name="katasandi" />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="<?php echo base_url()."login/password"; ?>">Lupa Kata Sandi?</a>
                                            <input type="submit" value="Masuk" class=" btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="card-footer text-center">
                                    <div class="small">Silahkan Hubungin BAAK Untuk Bantuan Akun Anda</div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="<?php echo base_url(); ?>/assets/js/scripts.js">
    </script>
    <script type="text/javascript">
        $('.alert').alert('close');
    </script>
</body>
</html>

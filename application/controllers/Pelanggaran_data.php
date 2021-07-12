<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran_data extends CI_Controller {
  function __construct(){
    parent::__construct();

    $this->load->model('Kesiswaan_model');
    $this->load->model('Siswa_model');
    $this->load->model('Pelanggaran_model');
    $this->load->model('Pelanggaran_data_model');
  }

  public function index($cari = null){
    if (($this->session->userdata('role') != "Kesiswaan") AND ($this->session->userdata('role') != "siswa")) {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon fa fa-warning"></i> Silahkan Login Terlebih Dahulu.
        </div>
        ');
      redirect(base_url()."login");
    }

    elseif (!is_null($this->session->userdata('nipy'))) {
      $nipy = $this->session->userdata('nipy');
      $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);

      $nipy = $this->session->userdata('nipy');
      $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);
      $data = array('nipy' => $data_staff->nipy,
        'nama_staff' => $data_staff->nama,
        'jabatan' => $data_staff->jabatan,
      );

      $cari = str_replace("%20", " ", $cari);
      $data['cari'] = $cari;

      $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_Data_Pelanggaran($cari)->result();

      $data['halaman'] = "Data Pelanggaran";
      $this->template->load('template/template_kesiswaan', 'pelanggaran_data/index', $data);
    }


    elseif (!is_null($this->session->userdata('nis'))) {
      $nis = $this->session->userdata('nis');
      $data_siswa = $this->Siswa_model->get_Siswa($nis)->row();
      $data['nis'] = $data_siswa->nis;
      $data['siswa'] = $this->Siswa_model->get_Siswa($nis)->row();

      $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_Data_Pelanggaran($nis)->result();

      $data['halaman'] = "Data Pelanggaran";
      $this->template->load('template/template_siswa', 'pelanggaran_data/siswa/index', $data);
    }
  }

  public function detail($kd_data_pelanggaran){
    if (($this->session->userdata('role') != "Kesiswaan") AND ($this->session->userdata('role') != "siswa")) {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon fa fa-warning"></i> Silahkan Login Terlebih Dahulu.
        </div>
        ');
      redirect(base_url()."login");
    }

    elseif (!is_null($this->session->userdata('nipy'))) {
      $nipy = $this->session->userdata('nipy');
      $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);

      $nipy = $this->session->userdata('nipy');
      $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);
      $data = array('nipy' => $data_staff->nipy,
        'nama_staff' => $data_staff->nama,
        'jabatan' => $data_staff->jabatan,
      );

      $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_Data_Pelanggaran($kd_data_pelanggaran)->row();

      $data['halaman'] = "Data Pelanggaran";
      $this->template->load('template/template_kesiswaan', 'pelanggaran_data/detail', $data);
    }


    elseif (!is_null($this->session->userdata('nis'))) {
      $nis = $this->session->userdata('nis');
      $data_siswa = $this->Siswa_model->get_Siswa($nis)->row();
      $data['nis'] = $data_siswa->nis;
      $data['siswa'] = $this->Siswa_model->get_Siswa($nis)->row();

      $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_Data_Pelanggaran($kd_data_pelanggaran)->row();

      $data['halaman'] = "Data Pelanggaran";
      $this->template->load('template/template_siswa', 'pelanggaran_data/siswa/detail', $data);
    }
  }

  public function form(){
    if ($this->session->userdata('role') != "Kesiswaan") {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon fa fa-warning"></i> Silahkan Login Terlebih Dahulu.
        </div>
        ');
      redirect(base_url()."login");
    }

    $nipy = $this->session->userdata('nipy');
    $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);

    $nipy = $this->session->userdata('nipy');
    $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);
    $data = array('nipy' => $data_staff->nipy,
      'nama_staff' => $data_staff->nama,
      'jabatan' => $data_staff->jabatan,
    );

    $data['siswa'] = $this->Siswa_model->get_Siswa()->result();

    $data['pelanggaran'] = $this->Pelanggaran_model->get_Pelanggaran()->result();

    $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_Data_Pelanggaran()->result();

    $data['halaman'] = "Data Pelanggaran";
    $this->template->load('template/template_kesiswaan', 'pelanggaran_data/form', $data);
  }

  public function tambah(){
    if ($this->session->userdata('role') != "Kesiswaan") {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon fa fa-warning"></i> Silahkan Login Terlebih Dahulu.
        </div>
        ');
      redirect(base_url()."login");
    }

    $nipy = $this->session->userdata('nipy');
    $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);

    $nipy = $this->session->userdata('nipy');
    $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);
    $data = array('nipy' => $data_staff->nipy,
      'nama_staff' => $data_staff->nama,
      'jabatan' => $data_staff->jabatan,
    );

    $kd_data_pelanggaran =  "PEL" . date("YmdHis");
    echo $pelaku = $this->input->post("pelaku", TRUE);
    $pelanggaran = $this->input->post("pelanggaran", TRUE);
    $tanggal_pelanggaran = $this->input->post("tanggal_pelanggaran", TRUE);
    $status_pelanggaran = "Menunggu Tindak Lanjut";

    // $data = array('kd_data_pelanggaran' => "PEL" . date("YmdHis"),
    //               'kd_pelanggaran' => $this->input->post("pelanggaran", TRUE),
    //               'pelaku' => $this->input->post("pelaku", TRUE),
    //               'tanggal_pelanggaran' => $this->input->post("tanggal_pelanggaran", TRUE),
    //               'status_pelanggaran' => "Menunggu Tindak Lanjut",
    //               'keterangan' => $this->input->post("keterangan", TRUE),
    //               );

    // $this->Pelanggaran_data_model->input_Data_Pelanggaran($data);

    // redirect(base_url()."pelanggaran_data");
  }
}
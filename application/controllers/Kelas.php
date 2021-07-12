<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
  function __construct(){
    parent::__construct();

    $this->load->model('Kesiswaan_model');
    $this->load->model('Kelas_model');
  }

  public function index(){
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

    $data['tahun'] = $this->Kelas_model->get_Tahun()->result();

    $data['halaman'] = "Kelas";
    $this->template->load('template/template_kesiswaan', 'kelas/index', $data);
  }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanksi extends CI_Controller {
  function __construct(){
    parent::__construct();

    $this->load->model('Kesiswaan_model');
    $this->load->model('Sanksi_model');
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

    $data['ringan'] = $this->Sanksi_model->get_Sanksi("Ringan")->result();

    $data['sedang'] = $this->Sanksi_model->get_Sanksi("Sedang")->result();

    $data['berat'] = $this->Sanksi_model->get_Sanksi("Berat")->result();

    $data['halaman'] = "Sanksi";
    $this->template->load('template/template_kesiswaan', 'sanksi/index', $data);
  }
}
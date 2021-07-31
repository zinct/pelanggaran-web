<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pelanggaran extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
        redirect('login');        
    
    $this->load->model('Pelanggaran_Data_model');
  }

  public function index() {
    $data['halaman'] = "Laporan Pelanggaran";
    $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_pelanggaran($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
    $this->template->load('template/admin', 'laporan_pelanggaran/index', $data);
  }
}
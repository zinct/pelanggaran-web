<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pelanggaran_kelas extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
        redirect('login');        
  }

  public function index() {
    $data['halaman'] = "Laporan Pelanggaran Kelas";
    $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_laporan_pelanggaran_kelas($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
    $this->template->load('template/admin', 'laporan_pelanggaran_kelas/index', $data);
  }
}
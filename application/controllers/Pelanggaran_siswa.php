<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran_siswa extends CI_Controller {
	function __construct()
    {
		parent::__construct();
		  if(!$this->session->userdata('login'))
		  	redirect('login');
		  if($this->session->userdata('level') != 'siswa')
		  	redirect('dashboard');
      
      $this->load->model('pelanggaran_data_model');
    }

	public function index(){
		$data['halaman'] = "Dashboard";
    $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_pelanggaran_siswa($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun, $this->session->userdata('id_siswa'));
		$this->template->load('template/admin', 'pelanggaran_siswa', $data);
	}
}
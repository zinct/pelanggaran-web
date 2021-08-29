<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
    {
		parent::__construct();
		if(!$this->session->userdata('login'))
			redirect('login');
		
		if($this->session->userdata('level') == 'siswa')
			redirect('pelanggaran_siswa');
    }

	public function index(){
		$data['halaman'] = "Dashboard";
		
		if($this->session->userdata('level') == 'walikelas') {
      $data['aktifitas'] = $this->Pelanggaran_data_model->get_pelanggaran_kelas($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun, $this->session->userdata('id_kelas'), 3);
    } else {
      $data['aktifitas'] = $this->Pelanggaran_data_model->get_pelanggaran($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun, 3);
    }

		$data['jumlah_pelanggaran'] = $this->db->where('status', 'Disetujui')->count_all_results('pelanggaran_data');
		$data['jumlah_pelanggaran_pending'] = $this->db->where('status', 'Jatuh Sanksi')->count_all_results('pelanggaran_data');
		$data['jumlah_siswa'] = $this->db->count_all_results('siswa');
		$data['jumlah_ptk'] = $this->db->count_all_results('ptk');

		$data['pelanggaran'] = $this->Pelanggaran_data_model->get_pelanggaran_statistik($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
		$data['kelas12'] = $this->Pelanggaran_data_model->get_pelanggaran_kelas12($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
		$data['kelas11'] = $this->Pelanggaran_data_model->get_pelanggaran_kelas11($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
		$data['kelas10'] = $this->Pelanggaran_data_model->get_pelanggaran_kelas10($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);

		$this->template->load('template/admin', 'dashboard', $data);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
    $data['pelanggaran'] = $this->Pelanggaran_data_model->get_pelanggaran_statistik($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
		$data['kelas12'] = $this->Pelanggaran_data_model->get_pelanggaran_kelas12($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
		$data['kelas11'] = $this->Pelanggaran_data_model->get_pelanggaran_kelas11($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
		$data['kelas10'] = $this->Pelanggaran_data_model->get_pelanggaran_kelas10($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
		$this->template->load('template/user', 'home/index', $data);
	}
}
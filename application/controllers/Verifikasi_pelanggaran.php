<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_pelanggaran extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
      redirect('login');
      
    if(!in_array($this->session->userdata('level'), ['admin', 'kesiswaan']))
      redirect('dashboard');

    $this->load->model('Siswa_model');
    $this->load->model('Pelanggaran_data_model');
  }

  public function index(){
    $data['halaman'] = "Verifikasi Pelanggaran";
    $this->template->load('template/admin', 'verifikasi_pelanggaran/index', $data);
  }

  public function create() {
    $nis = $this->input->get('nis');
    $siswa = $this->Siswa_model->find_nis($nis);
    
    if(!$siswa) {
      $this->session->set_flashdata('error', 'NIS Tidak Ditemukan.');
      redirect('/verifikasi_pelanggaran/index');  
    }
    
    $pelanggaran = $this->Pelanggaran_data_model->get_pelanggaran_siswa($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun, $siswa->id_siswa);
    $poin = $this->Siswa_model->get_poin($siswa->id_siswa);
    $poin_pelanggaran = $this->Siswa_model->get_poin_pelanggaran($siswa->id_siswa);

    $this->template->load('template/admin', 'verifikasi_pelanggaran/create', compact('siswa', 'pelanggaran', 'poin', 'poin_pelanggaran'));
  }

  public function verifikasi($id_pelanggaran_data) {
    $status = $this->input->post('status');

    $this->db->where('id_pelanggaran_data', $id_pelanggaran_data);
    $this->db->update('pelanggaran_data', compact('status'));

    $data = $this->db->join('siswa', 'pelanggaran_data.id_siswa = siswa.id_siswa')->get_where('pelanggaran_data', compact('id_pelanggaran_data'))->row();

    $this->session->set_flashdata('success', 'Berhasil verifikasi data.');
    redirect("/verifikasi_pelanggaran/create?nis={$data->nis}");  
  }
}
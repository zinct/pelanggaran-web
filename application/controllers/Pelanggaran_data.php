<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran_data extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Pelanggaran_data_model');

    if(!$this->session->userdata('login'))
				redirect('login');
        if($this->session->userdata('level') == 'siswa')
			redirect('pelanggaran_siswa');
  }

  public function index(){
    $data['halaman'] = "Entri Pelanggaran";

    if($this->session->userdata('level') == 'walikelas') {
      $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_pelanggaran_kelas($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun, $this->session->userdata('id_kelas'));
    } else {
      $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_pelanggaran($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
    }

    $data['jenis_pelanggaran'] = $this->db->get('jenis_pelanggaran')->result();
    $data['kategori_pelanggaran'] = $this->db->get('kategori_pelanggaran')->result();
    $this->template->load('template/admin', 'pelanggaran_data/index', $data);
  }

  public function show($id) {
    $pelanggaran = $this->db->get_where('pelanggaran_data', ['id_pelanggaran_data' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($pelanggaran);
  }

  public function store() {
    $data = [
      'id_pelanggaran' => $this->input->post('id_pelanggaran'),
      'id_siswa' => $this->input->post('id_siswa'),
      'id_ptk' => $this->session->userdata('id_ref'),
      'tgl' => date('Y-m-d H:i:s'),
      'poin' => $this->input->post('poin'),
      'catatan' => $this->input->post('catatan'),
      'id_tahun' => $this->Pelanggaran_data_model->get_TahunAktif()->id_tahun,
      'id_sanksi' => $this->input->post('id_sanksi'),
      'id_kelas' => $this->input->post('id_kelas'),
    ];

    $this->db->insert('pelanggaran_data', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/pelanggaran_data');
  }

  // public function update($id) {
  //   $data = [
  //     'nama_pelanggaran' => $this->input->post('nama_pelanggaran'),
  //     'kategori_pelanggaran_id' => $this->input->post('kategori_pelanggaran_id'),
  //     'jenis_pelanggaran_id' => $this->input->post('jenis_pelanggaran_id'),
  //     'poin' => $this->input->post('poin'),
  //   ];

  //   $this->db->where('id_pelanggaran', $id);
  //   $this->db->update('pelanggaran', $data);

  //   $this->session->set_flashdata('success', 'Berhasil mengubah data.');
  //   redirect('/pelanggaran');
  // }

  // public function delete($id) {
  //   $this->db->where('id_pelanggaran', $id);
  //   $this->db->delete('pelanggaran');

  //   $this->session->set_flashdata('success', 'Berhasil menghapus data.');
  //   redirect('/pelanggaran');
  // }
}
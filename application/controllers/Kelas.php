<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
				redirect('login');
        
    $this->load->model('Kelas_model');
  }

  public function index(){
    $data['halaman'] = "Kelas";
    $data['kelas'] = $this->Kelas_model->get_Kelas();
    $data['jurusan'] = $this->db->get('jurusan')->result();
    $data['tahun'] = $this->db->get('tahun')->result();
    $this->template->load('template/admin', 'kelas/index', $data);
  }

  public function show($id) {
    $kelas = $this->Kelas_model->find($id);
    header('Content-Type: application/json');
    echo json_encode($kelas);
  }

  public function store() {
    $data = [
      'nama_kelas' => $this->input->post('nama_kelas'),
      'jurusan_id' => $this->input->post('jurusan_id'),
      'tahun_id' => $this->input->post('tahun_id'),
    ];

    $this->db->insert('kelas', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/kelas');
  }

  public function update($id) {
    $data = [
      'nama_kelas' => $this->input->post('nama_kelas'),
      'jurusan_id' => $this->input->post('jurusan_id'),
      'tahun_id' => $this->input->post('tahun_id'),
    ];

    $this->db->where('id_kelas', $id);
    $this->db->update('kelas', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/kelas');
  }

  public function delete($id) {
    $this->db->where('id_kelas', $id);
    $this->db->delete('kelas');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/kelas');
  }
}
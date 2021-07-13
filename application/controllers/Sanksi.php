<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanksi extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Sanksi_model');
  }

  public function index(){
    $data['halaman'] = "Sanksi";
    $data['sanksi'] = $this->Sanksi_model->get_sanksi();
    $data['kategori_sanksi'] = $this->db->get('kategori_sanksi')->result();
    $this->template->load('template/admin', 'sanksi/index', $data);
  }

  public function show($id) {
    $sanksi = $this->db->get_where('sanksi', ['id_sanksi' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($sanksi);
  }

  public function store() {
    $data = [
      'nama_sanksi' => $this->input->post('nama_sanksi'),
      'kategori_sanksi_id' => $this->input->post('kategori_sanksi_id'),
      'min_poin' => $this->input->post('min_poin'),
      'max_poin' => $this->input->post('max_poin'),
    ];

    $this->db->insert('sanksi', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/sanksi');
  }

  public function update($id) {
    $data = [
      'nama_sanksi' => $this->input->post('nama_sanksi'),
      'kategori_sanksi_id' => $this->input->post('kategori_sanksi_id'),
      'min_poin' => $this->input->post('min_poin'),
      'max_poin' => $this->input->post('max_poin'),
    ];

    $this->db->where('id_sanksi', $id);
    $this->db->update('sanksi', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/sanksi');
  }

  public function delete($id) {
    $this->db->where('id_sanksi', $id);
    $this->db->delete('sanksi');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/sanksi');
  }
}
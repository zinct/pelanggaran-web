<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Pelanggaran_model');
  }

  public function index(){
    $data['halaman'] = "Pelanggaran";
    $data['pelanggaran'] = $this->Pelanggaran_model->get_pelanggaran();
    $data['jenis_pelanggaran'] = $this->db->get('jenis_pelanggaran')->result();
    $data['kategori_pelanggaran'] = $this->db->get('kategori_pelanggaran')->result();
    $this->template->load('template/admin', 'pelanggaran/index', $data);
  }

  public function show($id) {
    $pelanggaran = $this->db->get_where('pelanggaran', ['id_pelanggaran' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($pelanggaran);
  }

  public function store() {
    $data = [
      'nama_pelanggaran' => $this->input->post('nama_pelanggaran'),
      'kategori_pelanggaran_id' => $this->input->post('kategori_pelanggaran_id'),
      'jenis_pelanggaran_id' => $this->input->post('jenis_pelanggaran_id'),
      'poin' => $this->input->post('poin'),
    ];

    $this->db->insert('pelanggaran', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/pelanggaran');
  }

  public function update($id) {
    $data = [
      'nama_pelanggaran' => $this->input->post('nama_pelanggaran'),
      'kategori_pelanggaran_id' => $this->input->post('kategori_pelanggaran_id'),
      'jenis_pelanggaran_id' => $this->input->post('jenis_pelanggaran_id'),
      'poin' => $this->input->post('poin'),
    ];

    $this->db->where('id_pelanggaran', $id);
    $this->db->update('pelanggaran', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/pelanggaran');
  }

  public function delete($id) {
    $this->db->where('id_pelanggaran', $id);
    $this->db->delete('pelanggaran');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/pelanggaran');
  }
}
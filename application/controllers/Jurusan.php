<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
  function __construct(){
    parent::__construct();

    if ($this->session->userdata('role') != "Kesiswaan") {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon fa fa-warning"></i> Silahkan Login Terlebih Dahulu.
        </div>
        ');
      redirect(base_url()."login");
    }

    $this->load->model('Kesiswaan_model');
    $this->load->model('Kelas_model');
  }

  public function index(){
    $data['halaman'] = "Kelas";
    $data['jurusan'] = $this->db->get('jurusan')->result();
    $this->template->load('template/admin', 'jurusan/index', $data);
  }

  public function show($id) {
    $jurusan = $this->db->get_where('jurusan', ['id_jurusan' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($jurusan);
  }

  public function store() {
    $this->db->insert('jurusan', [
      'nama_jurusan' => $this->input->post('nama_jurusan'),
    ]);

    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/jurusan');
  }

  public function update($id) {
    $data = [
      'nama_jurusan' => $this->input->post('nama_jurusan'),
    ];

    $this->db->where('id_jurusan', $id);
    $this->db->update('jurusan', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/jurusan');
  }

  public function delete($id) {
    $this->db->where('id_jurusan', $id);
    $this->db->delete('jurusan');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/jurusan');
  }
}
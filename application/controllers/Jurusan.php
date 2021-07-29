<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
				redirect('login');
  }

  public function index(){
    if($this->session->userdata('level')!='admin'){
      redirect('login');
    }
  
    $data['halaman'] = "Jurusan";
    $data['jurusan'] = $this->db->get('jurusan')->result();
    $this->template->load('template/admin', 'jurusan/index', $data);
  }

  public function show($id) {
    $jurusan = $this->db->get_where('jurusan', ['id_jurusan' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($jurusan);
  }

  public function store() {
    $data = [
      'nama_jurusan' => $this->input->post('nama_jurusan'),
    ];

    $this->db->insert('jurusan', $data);
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
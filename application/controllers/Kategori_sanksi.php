<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_sanksi extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
				redirect('login');

        if($this->session->userdata('level') == 'walikelas')
        redirect('login');      
  }

  public function index(){
    $data['halaman'] = "Kategori Sanksi";
    $data['kategori_sanksi'] = $this->db->get('kategori_sanksi')->result();
    $this->template->load('template/admin', 'kategori_sanksi/index', $data);
  }

  public function show($id) {
    $kategori_sanksi = $this->db->get_where('kategori_sanksi', ['id_kategori_sanksi' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($kategori_sanksi);
  }

  public function store() {
    $data = [
      'nama_kategori_sanksi' => $this->input->post('nama_kategori_sanksi'),
    ];

    $this->db->insert('kategori_sanksi', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/kategori_sanksi');
  }

  public function update($id) {
    $data = [
      'nama_kategori_sanksi' => $this->input->post('nama_kategori_sanksi'),
    ];

    $this->db->where('id_kategori_sanksi', $id);
    $this->db->update('kategori_sanksi', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/kategori_sanksi');
  }

  public function delete($id) {
    $this->db->where('id_kategori_sanksi', $id);
    $this->db->delete('kategori_sanksi');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/kategori_sanksi');
  }
}
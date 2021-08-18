<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_pelanggaran extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
				redirect('login');
        if($this->session->userdata('level') == 'walikelas')
        redirect('login');      
  }

  public function index(){
    $data['halaman'] = "Kategori Pelanggaran";
    $data['kategori_pelanggaran'] = $this->db->get('kategori_pelanggaran')->result();
    $this->template->load('template/admin', 'kategori_pelanggaran/index', $data);
  }

  public function show($id) {
    $kategori_pelanggaran = $this->db->get_where('kategori_pelanggaran', ['id_kategori_pelanggaran' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($kategori_pelanggaran);
  }

  public function all()
  {
    $kategori_pelanggaran = $this->db->get('kategori_pelanggaran')->result();
    header('Content-Type: application/json');
    echo json_encode($kategori_pelanggaran);
  }

  public function store() {
    $data = [
      'nama_kategori_pelanggaran' => $this->input->post('nama_kategori_pelanggaran'),
    ];

    $this->db->insert('kategori_pelanggaran', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/kategori_pelanggaran');
  }

  public function update($id) {
    $data = [
      'nama_kategori_pelanggaran' => $this->input->post('nama_kategori_pelanggaran'),
    ];

    $this->db->where('id_kategori_pelanggaran', $id);
    $this->db->update('kategori_pelanggaran', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/kategori_pelanggaran');
  }

  public function delete($id) {
    $this->db->where('id_kategori_pelanggaran', $id);
    $this->db->delete('kategori_pelanggaran');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/kategori_pelanggaran');
  }
}
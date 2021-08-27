<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
				redirect('login');
        if($this->session->userdata('level') == 'siswa')
			redirect('pelanggaran_siswa');
  }

  public function index(){
    if($this->session->userdata('level')!='admin'){
      redirect('login');
    }
  
    $data['halaman'] = "Tahun";
    $data['tahun'] = $this->db->get('tahun')->result();
    $this->template->load('template/admin', 'tahun/index', $data);
  }

  public function show($id) {
    $tahun = $this->db->get_where('tahun', ['id_tahun' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($tahun);
  }

  public function store() {
    $data = [
      'nama_tahun' => $this->input->post('nama_tahun'),
      'is_aktif' => $this->input->post('is_aktif'),
    ];
    
    if ($this->input->post('is_aktif')==1) {
      $this->db->update('tahun', ['is_aktif' => 0]);
    }
    
    $this->db->insert('tahun', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/tahun');
  }
  
  public function update($id) {
    $data = [
      'nama_tahun' => $this->input->post('nama_tahun'),
      'is_aktif' => $this->input->post('is_aktif'),
    ];

    if ($this->input->post('is_aktif')==1) {
      $this->db->update('tahun', ['is_aktif' => 0]);
    }

    $this->db->where('id_tahun', $id);
    $this->db->update('tahun', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/tahun');
  }

  public function delete($id) {
    $this->db->where('id_tahun', $id);
    $this->db->delete('tahun');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/tahun');
  }
}
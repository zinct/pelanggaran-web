<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pelanggaran extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
				redirect('login');

        if($this->session->userdata('level') == 'walikelas')
        redirect('login');      
  }

  public function index(){
    $data['halaman'] = "Jenis Pelanggaran";
    $data['kategori_pelanggaran'] = $this->db->get('kategori_pelanggaran')->result();
    $data['jenis_pelanggaran'] = $this->db->join('kategori_pelanggaran','kategori_pelanggaran.id_kategori_pelanggaran=jenis_pelanggaran.id_kategori_pelanggaran')->get('jenis_pelanggaran')->result();
    $this->template->load('template/admin', 'jenis_pelanggaran/index', $data);
  }

  public function show($id) {
    $jenis_pelanggaran = $this->db->get_where('jenis_pelanggaran', ['id_jenis_pelanggaran' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($jenis_pelanggaran);
  }

  public function all()
  {
    $jenis_pelanggaran = $this->db->get('jenis_pelanggaran')->result();
    header('Content-Type: application/json');
    echo json_encode($jenis_pelanggaran);
  }

  public function search($id_kategori_pelanggaran)
  {
    $jenis_pelanggaran = $this->db->get_where('jenis_pelanggaran',['id_kategori_pelanggaran'=>$id_kategori_pelanggaran])->result();
    header('Content-Type: application/json');
    echo json_encode($jenis_pelanggaran);
  }

  public function store() {
    $data = [
      'nama_jenis_pelanggaran' => $this->input->post('nama_jenis_pelanggaran'),
      'id_kategori_pelanggaran' => $this->input->post('kategori_pelanggaran_id'),
    ];
    
    $this->db->insert('jenis_pelanggaran', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/jenis_pelanggaran');
  }
  
  public function update($id) {
    $data = [
      'nama_jenis_pelanggaran' => $this->input->post('nama_jenis_pelanggaran'),
      'id_kategori_pelanggaran' => $this->input->post('kategori_pelanggaran_id'),
    ];

    $this->db->where('id_jenis_pelanggaran', $id);
    $this->db->update('jenis_pelanggaran', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/jenis_pelanggaran');
  }

  public function delete($id) {
    $this->db->where('id_jenis_pelanggaran', $id);
    $this->db->delete('jenis_pelanggaran');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/jenis_pelanggaran');
  }
}
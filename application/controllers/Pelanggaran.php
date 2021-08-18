<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Pelanggaran_model');

    if(!$this->session->userdata('login'))
				redirect('login');
        if($this->session->userdata('level') == 'walikelas')
        redirect('login');      
  }

  public function index(){
    $data['halaman'] = "Pelanggaran";
    $data['pelanggaran'] = $this->Pelanggaran_model->get_pelanggaran();
    $data['kategori_pelanggaran'] =  $this->db->get('kategori_pelanggaran')->result();
    $data['jenis_pelanggaran'] = $this->db->get('jenis_pelanggaran')->result();
    $this->template->load('template/admin', 'pelanggaran/index', $data);
  }

  public function show($id) {
    $this->db->select('pelanggaran.id_pelanggaran, pelanggaran.nama_pelanggaran, pelanggaran.id_jenis_pelanggaran, jenis_pelanggaran.id_kategori_pelanggaran, pelanggaran.poin');
    $this->db->join('jenis_pelanggaran', 'pelanggaran.id_jenis_pelanggaran=jenis_pelanggaran.id_jenis_pelanggaran');
    $pelanggaran = $this->db->get_where('pelanggaran', ['id_pelanggaran' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($pelanggaran);
  }

  public function search($id_jenis_pelanggaran)
  {
    $pelanggaran = $this->db->get_where(
      'pelanggaran',
      ['id_jenis_pelanggaran'=>$id_jenis_pelanggaran,])
      ->result();
    header('Content-Type: application/json');
    echo json_encode($pelanggaran);
  }

  public function store() {
    $data = [
      'nama_pelanggaran' => $this->input->post('nama_pelanggaran'),
      'id_jenis_pelanggaran' => $this->input->post('jenis_pelanggaran_id'),
      'poin' => $this->input->post('poin'),
    ];

    $this->db->insert('pelanggaran', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/pelanggaran');
  }

  public function update($id) {
    $data = [
      'nama_pelanggaran' => $this->input->post('nama_pelanggaran'),
      'id_jenis_pelanggaran' => $this->input->post('jenis_pelanggaran_id'),
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
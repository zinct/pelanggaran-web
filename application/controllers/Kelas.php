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
    if($this->session->userdata('level')!='admin'){
      redirect('login');
    }
  
    $data['halaman'] = "Kelas";
    $data['kelas'] = $this->Kelas_model->get_Kelas($this->Kelas_model->get_TahunAktif()->id_tahun);
    $data['jurusan'] = $this->db->get('jurusan')->result();
    $data['ptk'] = $this->db->get('ptk')->result();
    $data['tingkat'] = ['10','11','12'];
    $data['tahun'] = $this->Kelas_model->get_TahunAktif();
    $data['tahuns'] = $this->Kelas_model->get_TahunAll();
    $this->template->load('template/admin', 'kelas/index', $data);
  }

  public function show($id) {
    $kelas = $this->Kelas_model->find($id);
    header('Content-Type: application/json');
    echo json_encode($kelas);
  }
  
  public function edit($id) {
    if($this->session->userdata('level')!='admin'){
      redirect('login');
    }
  
    $data['kelas'] = $this->Kelas_model->find($id);
    $data['siswa'] = $this->Kelas_model->get_Siswa($id);
    $data['siswa_no_kelas'] = $this->Kelas_model->get_SiswaNoKelas($this->Kelas_model->get_TahunAktif()->id_tahun);
    $this->template->load('template/admin', 'kelas/edit', $data);
  }

  public function store() {
    $data = [
      'nama_kelas' => $this->input->post('nama_kelas'),
      'id_jurusan' => $this->input->post('id_jurusan'),
      'tingkat' => $this->input->post('tingkat'),
      'id_tahun' => $this->input->post('id_tahun'),
    ];

    $this->db->insert('kelas', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/kelas');
  }

  public function update($id_kelas) {

    if($this->input->post('submit_remove')!==null){
      foreach($this->input->post('id_siswa_remove') as $id_siswa){ 

        echo "<script>console.log('ID: ".$id_siswa."')</script>";
        
        $this->db->where(['id_kelas'=> $id_kelas, 'id_siswa'=> $id_siswa]);
        $this->db->delete('kelas_siswa');
        
      }
      echo "<script>console.log('Keluarkan')</script>";
    }
    if($this->input->post('submit_add')!==null){
      foreach($this->input->post('id_siswa_add') as $id_siswa){ 

        echo "<script>console.log('ID: ".$id_siswa."')</script>";
        
        $this->db->insert('kelas_siswa', ['id_siswa'=>$id_siswa,'id_kelas'=>$id_kelas]);

      }
      echo "<script>console.log('Tambahkan')</script>";
    }

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/kelas/edit/'.$id_kelas);
  }

  public function delete($id) {
    $this->db->where('id_kelas', $id);
    $this->db->delete('kelas');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/kelas');
  }
}
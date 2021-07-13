<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
  function __construct(){
    parent::__construct();

    $this->load->model('Kesiswaan_model');
    $this->load->model('Siswa_model');
    $this->load->model('Kelas_model');

    $this->load->model('Pelanggaran_data_model');
  }

  public function index(){
    $data['siswa'] = $this->Siswa_model->get_Siswa();

    $data['halaman'] = "Dashboard";
    $this->template->load('template/admin', 'siswa/index', $data);
  }

  public function create() {
    $data['kelas'] = $this->db->get('kelas')->result();
    $this->template->load('template/admin', 'siswa/create', $data);
  }

  public function edit($id) {
    $data['siswa'] = $this->Siswa_model->find($id);
    $data['kelas'] = $this->db->get('kelas')->result();
    $data['kelamin'] = ['L', 'P'];
    $this->template->load('template/admin', 'siswa/edit', $data);
  }

  public function store() {
    $this->db->insert('siswa', [
      'nis' => $this->input->post('nis'),
      'nama_siswa' => $this->input->post('nama_siswa'),
      'kelas_id' => $this->input->post('kelas_id'),
      'kata_sandi' => $this->input->post('kata_sandi'),
      'kelamin' => $this->input->post('kelamin'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
    ]);

    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/siswa');
  }

  public function update($id) {
    $data = [
      'nis' => $this->input->post('nis'),
      'nama_siswa' => $this->input->post('nama_siswa'),
      'kelas_id' => $this->input->post('kelas_id'),
      'kelamin' => $this->input->post('kelamin'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
    ];

    if($this->input->post('kata_sandi') != '')
      $data['kata_sandi'] = $this->input->post('kata_sandi');

    $this->db->where('id_siswa', $id);
    $this->db->update('siswa', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/siswa');
  }

  public function detail($nis){
    if ($this->session->userdata('role') != "Kesiswaan") {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon fa fa-warning"></i> Silahkan Login Terlebih Dahulu.
        </div>
        ');
      redirect(base_url()."login");
    }

    $nipy = $this->session->userdata('nipy');
    $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);

    $nipy = $this->session->userdata('nipy');
    $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);
    $data = array('nipy' => $data_staff->nipy,
      'nama_staff' => $data_staff->nama,
      'jabatan' => $data_staff->jabatan,
    );

    $data['siswa'] = $this->Siswa_model->get_Siswa($nis)->row();

    $data['halaman'] = "Siswa";
    $this->template->load('template/template_kesiswaan', 'siswa/detail', $data);
  }

  public function delete($id) {
    $this->db->where('id_siswa', $id);
    $this->db->delete('siswa');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/siswa');
  }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('login'))
      redirect('login');

    $this->load->model('Siswa_model');
  }

  public function index()
  {
    if ($this->session->userdata('level') != 'admin') {
      redirect('login');
    }

    $data['siswa'] = $this->Siswa_model->get_Siswa();
    $data['tahun'] = $this->Siswa_model->get_Tahun();
    $data['siswa_no_kelas'] = $this->Siswa_model->get_SiswaNoKelas($this->Siswa_model->get_Tahun()->id_tahun);

    $data['halaman'] = "Siswa";
    $this->template->load('template/admin', 'siswa/index', $data);
  }

  public function show($id)
  {
    if ($this->session->userdata('level') != 'admin') {
      redirect('login');
    }

    $data['siswa'] = $this->Siswa_model->find($id);
    $data['jenis_kelamin'] = ['L', 'P'];

    $data['halaman'] = "Siswa";
    $this->template->load('template/admin', 'siswa/show', $data);
  }

  public function all()
  {
    $siswa = $this->Siswa_model->get_Siswa();
    header('Content-Type: application/json');
    echo json_encode($siswa);
  }

  public function getPoin($id_siswa)
  {
    $poin = $this->Siswa_model->get_poin($id_siswa);
    header('Content-Type: application/json');
    echo json_encode(compact('poin'));
  }

  public function create()
  {
    if ($this->session->userdata('level') != 'admin') {
      redirect('login');
    }

    $data['kelas'] = $this->db->get('kelas')->result();
    $this->template->load('template/admin', 'siswa/create', $data);
  }

  public function edit($id)
  {
    if ($this->session->userdata('level') != 'admin') {
      redirect('login');
    }

    $data['siswa'] = $this->Siswa_model->find($id);
    $data['jenis_kelamin'] = ['L', 'P'];
    $this->template->load('template/admin', 'siswa/edit', $data);
  }

  public function store()
  {
    $this->db->insert('siswa', [
      'nis' => $this->input->post('nis'),
      'nama_siswa' => $this->input->post('nama_siswa'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
    ]);

    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/siswa');
  }

  public function update($id)
  {
    $data = [
      'nis' => $this->input->post('nis'),
      'nama_siswa' => $this->input->post('nama_siswa'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
    ];

    $this->db->where('id_siswa', $id);
    $this->db->update('siswa', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/siswa');
  }

  // public function detail($nis){
  //   if ($this->session->userdata('role') != "Kesiswaan") {
  //     $this->session->set_flashdata('message', '
  //       <div class="alert alert-danger alert-dismissible fade show" role="alert">
  //       <i class="icon fa fa-warning"></i> Silahkan Login Terlebih Dahulu.
  //       </div>
  //       ');
  //     redirect(base_url()."login");
  //   }

  //   $nipy = $this->session->userdata('nipy');
  //   $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);

  //   $nipy = $this->session->userdata('nipy');
  //   $data_staff = $this->Kesiswaan_model->get_Kesiswaan($nipy);
  //   $data = array('nipy' => $data_staff->nipy,
  //     'nama_staff' => $data_staff->nama,
  //     'jabatan' => $data_staff->jabatan,
  //   );

  //   $data['siswa'] = $this->Siswa_model->get_Siswa($nis)->row();

  //   $data['halaman'] = "Siswa";
  //   $this->template->load('template/template_kesiswaan', 'siswa/detail', $data);
  // }

  public function delete($id)
  {
    $this->db->where('id_siswa', $id);
    $this->db->delete('siswa');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/siswa');
  }
}

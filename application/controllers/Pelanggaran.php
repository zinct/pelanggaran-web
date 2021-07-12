<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Controller {
  function __construct(){
    parent::__construct();

    $this->load->model('Kesiswaan_model');
    $this->load->model('Pelanggaran_model');
    $this->load->model('Pelanggaran_data_model');
  }

  public function index(){
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

    $data['ketertiban'] = $this->Pelanggaran_model->get_Pelanggaran("Ketertiban")->result();
    $data['rokok'] = $this->Pelanggaran_model->get_Pelanggaran("Rokok")->result();
    $data['porno'] = $this->Pelanggaran_model->get_Pelanggaran("Buku, Majalan, atau Kaset Terlarang")->result();
    $data['senjata'] = $this->Pelanggaran_model->get_Pelanggaran("Senjata")->result();
    $data['mabok'] = $this->Pelanggaran_model->get_Pelanggaran("Obat / Minuman Terlarang")->result();
    $data['perkelahian'] = $this->Pelanggaran_model->get_Pelanggaran("Perkelahian")->result();
    $data['pelanggaran'] = $this->Pelanggaran_model->get_Pelanggaran("Pelanggaran Terhadap Kepala Sekolah, Guru dan Karyawan")->result();

    $data['keterlambatan'] = $this->Pelanggaran_model->get_Pelanggaran("Keterlambatan")->result();
    $data['kehadiran'] = $this->Pelanggaran_model->get_Pelanggaran("kehadiran")->result();

    $data['pakaian'] = $this->Pelanggaran_model->get_Pelanggaran("Pakaian")->result();
    $data['rambut'] = $this->Pelanggaran_model->get_Pelanggaran("Rambut")->result();
    $data['badan'] = $this->Pelanggaran_model->get_Pelanggaran("Badan")->result();

    $data['halaman'] = "Pelanggaran";
    $this->template->load('template/template_kesiswaan', 'pelanggaran/index', $data);
  }
}
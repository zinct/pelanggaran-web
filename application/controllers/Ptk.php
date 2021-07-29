<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ptk extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
				redirect('login');
        
        $this->load->model('Ptk_model');
      }
      
  public function index(){
    if($this->session->userdata('level')!='admin'){
      redirect('login');
    }
  
    $data['ptk'] = $this->Ptk_model->get_Ptk();

    $data['halaman'] = "PTK";
    $this->template->load('template/admin', 'ptk/index', $data);
  }

  public function show($id) {
    $data['ptk'] = $this->Ptk_model->find($id);

    $data['halaman'] = "PTK";
    $this->template->load('template/admin', 'ptk/show', $data);
  }

  public function all()
  {
    $ptk = $this->db->get('ptk')->result();
    header('Content-Type: application/json');
    echo json_encode($ptk);
  }

  public function create() {
    if($this->session->userdata('level')!='admin'){
      redirect('login');
    }
    $this->template->load('template/admin', 'ptk/create');
  }

  public function edit($id) {
    if($this->session->userdata('level')!='admin'){
      redirect('login');
    }
    $data['ptk'] = $this->Ptk_model->find($id);
    $this->template->load('template/admin', 'ptk/edit', $data);
  }

  public function store() {
    $this->db->insert('ptk', [
      'nama_ptk' => $this->input->post('nama_ptk')
    ]);

    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/ptk');
  }

  public function update($id) {
    $data = [
      'nama_ptk' => $this->input->post('nama_ptk'),
    ];

    $this->db->where('id_ptk', $id);
    $this->db->update('ptk', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/ptk');
  }

  // public function detail($nis){
  //   if ($this->session->userdata('role') != "Keptkan") {
  //     $this->session->set_flashdata('message', '
  //       <div class="alert alert-danger alert-dismissible fade show" role="alert">
  //       <i class="icon fa fa-warning"></i> Silahkan Login Terlebih Dahulu.
  //       </div>
  //       ');
  //     redirect(base_url()."login");
  //   }

  //   $nipy = $this->session->userdata('nipy');
  //   $data_staff = $this->Keptkan_model->get_Keptkan($nipy);

  //   $nipy = $this->session->userdata('nipy');
  //   $data_staff = $this->Keptkan_model->get_Keptkan($nipy);
  //   $data = array('nipy' => $data_staff->nipy,
  //     'nama_staff' => $data_staff->nama,
  //     'jabatan' => $data_staff->jabatan,
  //   );

  //   $data['ptk'] = $this->Ptk_model->get_Ptk($nis)->row();

  //   $data['halaman'] = "Ptk";
  //   $this->template->load('template/template_keptkan', 'ptk/detail', $data);
  // }

  public function delete($id) {
    $this->db->where('id_ptk', $id);
    $this->db->delete('ptk');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/ptk');
  }
}
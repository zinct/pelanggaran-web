<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ptk extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
				redirect('login');
        if($this->session->userdata('level') == 'siswa')
			redirect('pelanggaran_siswa');

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
    $data['jenis_kelamin'] = ['L', 'P'];

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
    $data['jenis_kelamin'] = ['L', 'P'];
    $data['ptk'] = $this->Ptk_model->find($id);
    $this->template->load('template/admin', 'ptk/edit', $data);
  }

  public function store() {
    $img = $this->do_upload();
    $this->db->insert('ptk', [
      'nama_ptk' => $this->input->post('nama_ptk'),
      'image' => $img,
      'nipy' => $this->input->post('nipy'),
      'nipy' => $this->input->post('nipy'),
      'jk' => $this->input->post('jk'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
    ]);

    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/ptk');
  }

  public function do_upload(){
    $config['upload_path'] = "./upload/img/ptk/";
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 2000;

    $this->load->library('upload', $config);
    $this->upload->do_upload('avatar');
    return $this->upload->data()['file_name'];
  }

  public function update($id) {
    $data = [
      'nama_ptk' => $this->input->post('nama_ptk'),
      'nipy' => $this->input->post('nipy'),
      'nipy' => $this->input->post('nipy'),
      'jk' => $this->input->post('jk'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
    ];

    $img = $this->do_upload();
    if($img) $data['image'] = $img;   

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

  public function import()
  {
      if(isset($_FILES["import"]["name"])){
            // upload
          $file_tmp = $_FILES['import']['tmp_name'];
          $file_name = $_FILES['import']['name'];
          $file_size =$_FILES['import']['size'];
          $file_type=$_FILES['import']['type'];
          // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
          
          $object = PHPExcel_IOFactory::load($file_tmp);

          $data = [];
  
          foreach($object->getWorksheetIterator() as $worksheet){
  
              $highestRow = $worksheet->getHighestRow();
              $highestColumn = $worksheet->getHighestColumn();
  
              for($row=2; $row <= $highestRow; $row++){

                  array_push($data, array(
                      'nipy' => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
                      'nama_ptk' => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
                      'jk' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
                      'tempat_lahir' => $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
                      'tanggal_lahir' => date('Y-m-d', strtotime($worksheet->getCellByColumnAndRow(4, $row)->getValue())),
                      'telp' => $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
                      'alamat' => $worksheet->getCellByColumnAndRow(6, $row)->getValue(),
                  ));
  
              } 
  
            }
            
          $this->db->insert_batch('ptk', $data);
  
          $this->session->set_flashdata('success', 'Berhasil menimport data.');
          redirect('/ptk');
      }
      else
      {
        $this->session->set_flashdata('error', 'Gagal mengubah data.');
        redirect('/siswa');
      }
  }
}
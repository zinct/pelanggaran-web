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
    $data['status'] = [1 , 0 ];

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
    $data['status'] = [1 , 0 ];
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
      'keterangan' => $this->input->post('keterangan'),
      'status' => $this->input->post('status'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    ]);

    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/siswa');
  }

  public function update($id)
  {
    $data = [
      'nis' => $this->input->post('nis'),
      'nama_siswa' => $this->input->post('nama_siswa'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telp'),
      'keterangan' => $this->input->post('keterangan'),
      'status' => $this->input->post('status'),
    ];

    if ($this->input->post('password') != '')
      $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

    $this->db->where('id_siswa', $id);
    $this->db->update('siswa', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/siswa');
  }

  public function delete($id)
  {
    $this->db->where('id_siswa', $id);
    $this->db->delete('siswa');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/siswa');
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
                            'nis' => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
                            'nama_siswa' => $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
                            'jenis_kelamin' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
                            'tempat_lahir' => $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
                            'tanggal_lahir' => date('Y-m-d', strtotime($worksheet->getCellByColumnAndRow(4, $row)->getValue())),
                            'telp' => $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
                            'password' => password_hash($worksheet->getCellByColumnAndRow(6, $row)->getValue(), PASSWORD_DEFAULT),
                            'status' => $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
                            'alamat' => $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
                            'keterangan' => $worksheet->getCellByColumnAndRow(9, $row)->getValue(),
                        ));
        
                    } 
        
                  }
                  
                $this->db->insert_batch('siswa', $data);
        
                $this->session->set_flashdata('success', 'Berhasil menimport data.');
                redirect('/siswa');
            }
            else
            {
              $this->session->set_flashdata('error', 'Gagal mengubah data.');
              redirect('/siswa');
            }
        }
}

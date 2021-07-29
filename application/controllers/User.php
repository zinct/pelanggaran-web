<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    if (!$this->session->userdata('login'))
      redirect('login');
  }

  public function index()
  {
    if($this->session->userdata('level')!='admin'){
      redirect('login');
    }
  
    $data['halaman'] = "Pengguna";
    // $data['user'] = $this->db->get('user')->result();
    $data['user'] = $this->db->query("SELECT 
    user.*,
    IF(user.level!='siswa',ptk.nama_ptk,siswa.nama_siswa) AS nama_user
  FROM
    `user`
    LEFT JOIN ptk ON ptk.id_ptk = user.id_ref
    LEFT JOIN siswa ON siswa.id_siswa = user.id_ref
    ORDER BY level")->result();
    $this->template->load('template/admin', 'user/index', $data);
  }

  public function show($id)
  {
    $user = $this->db->query("SELECT 
    user.*,
    IF(user.level!='siswa',ptk.nama_ptk,siswa.nama_siswa) AS nama_user
  FROM
    `user`
    LEFT JOIN ptk ON ptk.id_ptk = user.id_ref
    LEFT JOIN siswa ON siswa.id_siswa = user.id_ref
    WHERE id_user='$id'")->row();
    header('Content-Type: application/json');
    echo json_encode($user);
  }

  public function store()
  {
    $data = [
      'username' => $this->input->post('username'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'level' => $this->input->post('level'),
      'id_ref' => $this->input->post('id_ref'),
    ];

    $this->db->insert('user', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/user');
  }

  public function update($id)
  {
    $data = [
      'username' => $this->input->post('username'),
      'level' => $this->input->post('level'),
      'id_ref' => $this->input->post('id_ref'),
    ];

    if ($this->input->post('password') != '')
      $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

    $this->db->where('id_user', $id);
    $this->db->update('user', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/user');
  }

  public function delete($id)
  {
    $this->db->where('id_user', $id);
    $this->db->delete('user');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/user');
  }
}

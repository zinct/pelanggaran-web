<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
				redirect('login');
  }

  public function index(){
    $data['halaman'] = "User";
    $data['user'] = $this->db->get('user')->result();
    $this->template->load('template/admin', 'user/index', $data);
  }

  public function show($id) {
    $user = $this->db->get_where('user', ['id_user' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($user);
  }

  public function store() {
    $data = [
      'nama_user' => $this->input->post('nama_user'),
      'username' => $this->input->post('username'),
      'level' => $this->input->post('level'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    ];

    $this->db->insert('user', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/user');
  }

  public function update($id) {
    $data = [
      'nama_user' => $this->input->post('nama_user'),
      'username' => $this->input->post('username'),
      'level' => $this->input->post('level'),
    ];

    if($this->input->post('password') != '')
      $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

    $this->db->where('id_user', $id);
    $this->db->update('user', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/user');
  }

  public function delete($id) {
    $this->db->where('id_user', $id);
    $this->db->delete('user');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/user');
  }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('form_validation');
	}

	public function index(){
		$this->load->view('login');
	}

	public function password(){
		$this->load->view('password');
	}

	public function reset_password(){
		$pengguna = $this->input->post('pengguna',true);
		$email = $this->input->post('email',true);

		$password_siswa = $this->Login_model->get_reset_password_siswa($pengguna,$email);
		$password_dosen = $this->Login_model->get_reset_password_dosen($pengguna,$email);
		$password_staff = $this->Login_model->get_reset_password_staff($pengguna,$email);
		if ($password_mahasiswa) {
			$data = array('pengguna' => $password_mahasiswa->nim,
						  'jenis' => 'mahasiswa',
						  'email' => $email,
			);
			$this->load->view('password_reset', $data);
		}
		elseif ($password_dosen) {
			$data = array('pengguna' => $password_dosen->nip,
						  'jenis' => 'dosen',
						  'email' => $email,
			);
			$this->load->view('password_reset', $data);

		}
		elseif ($password_staff) {
			$data = array('pengguna' => $password_staff->nip,
						  'jenis' => 'staff',
						  'email' => $email,
			);
			$this->load->view('password_reset', $data);
		}
		else{
			$this->session->set_flashdata('message', '
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="icon fa fa-warning"></i> Kombinasi NIM/NIP dan Email Tidak Cocok.
					</div>
					');
				redirect(base_url()."login/password");
		}
	}

	public function reset_password_2($pengguna){
		$password_mahasiswa = $this->Login_model->get_reset_password_mahasiswa_2($pengguna);
		$password_dosen = $this->Login_model->get_reset_password_dosen_2($pengguna);
		$password_staff = $this->Login_model->get_reset_password_staff_2($pengguna);
		if ($password_mahasiswa) {
			$data = array('pengguna' => $password_mahasiswa->nim,
						  'jenis' => 'mahasiswa',
						  'email' => $password_mahasiswa->email,
			);
		}
		elseif ($password_dosen) {
			$data = array('pengguna' => $password_dosen->nip,
						  'jenis' => 'dosen',
						  'email' => $password_dosen->nim,
			);

		}
		elseif ($password_staff) {
			$data = array('pengguna' => $password_staff->nip,
						  'jenis' => 'staff',
						  'email' => $password_staff->nim,
			);
		}
		$this->load->view('password_reset', $data);
	}

	public function reset_password_proses(){
		$pengguna = $this->input->post('pengguna',true);
		$jenis = $this->input->post('jenis',true);
		$email = $this->input->post('email',true);
		$password = $this->input->post('password',true);
		$password2 = $this->input->post('password2',true);

		$data = array('kata_sandi' => $password);

		if ($password == $password2) {
			if ($jenis == "mahasiswa") {
				$this->Login_model->ubah_password_mahasiswa($pengguna,$data);
			}
			elseif ($jenis == "dosen") {
				$this->Login_model->ubah_password_dosen($pengguna,$data);
			}
			elseif ($jenis == "staff") {
				$this->Login_model->ubah_password_staff($pengguna,$data);
			}
			$this->session->set_flashdata('message', '
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="icon fa fa-success"></i> Kata Sandi Berhasil Diubah
				'.validation_errors().'
				</button>
				</div>
				');
			redirect(base_url()."login");
		}
		else{
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<i class="icon fa fa-warning"></i> Masukan Kata Sandi yang Sama
				'.validation_errors().'
				</button>
				</div>
				');
			redirect(base_url()."login/reset_password_2/".$pengguna);
		}
	}

	public function login(){
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<i class="icon fa fa-warning"></i> Silahkan Isi NIP/NIM dan Katasandi
				'.validation_errors().'
				</button>
				</div>
				');
			redirect(base_url()."login");
		} else {
			$pengguna = $this->input->post('pengguna',true);
			$katasandi = $this->input->post('katasandi',true);
			$login_siswa = $this->Login_model->get_login_siswa($pengguna,$katasandi);
			$login_staff = $this->Login_model->get_login_staff($pengguna,$katasandi);
			$login_dosen = $this->Login_model->get_login_siswa($pengguna,$katasandi);
			if ($login_siswa) {
				$row = $this->Login_model->get_login_siswa($pengguna,$katasandi);
				if (isset($row->nis)) {
					$data = array(
						'nis' => $row->nis,
						'role' => "siswa",
					);
				}
				$this->session->set_userdata($data);
				$this->session->set_flashdata('message', '
					<div class="alert alert-success">
					<h4><i class="icon fa fa-check-circle"></i> Sukses</h4>
					Silahkan melanjutkan.
					</div>
					');
				redirect(base_url()."siswa");
			}
			else if ($login_staff) {
				$row = $this->Login_model->get_login_staff($pengguna,$katasandi);
				if (isset($row->nipy)) {
					$data = array(
						'nipy' => $row->nipy,
						'role' => $row->jabatan,
					);
				}
				$this->session->set_userdata($data);
				$this->session->set_flashdata('message', '
					<div class="alert alert-success">
					<h4><i class="icon fa fa-check-circle"></i> Sukses</h4>
					Silahkan melanjutkan.
					</div>
					');
				if ($row->jabatan == "Kesiswaan") {
					redirect(base_url()."kesiswaan");

				}
				else{
					redirect(base_url()."staff");
				}
			}
			else if($login_walikelas){
				$row = $this->Login_model->get_login_dosen($pengguna,$katasandi);
				if (isset($row->nip)) {
					$data = array(
						'nipy' => $row->nipy,
						'role' => $row->jabatan,
					);
				}
				$this->session->set_userdata($data);
				$this->session->set_flashdata('message', '
					<div class="alert alert-success">
					<h4><i class="icon fa fa-check-circle"></i> Sukses</h4>
					Silahkan melanjutkan.
					</div>
					');
				redirect(base_url()."walikelas");
			}

			else{
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="icon fa fa-warning"></i> NIS/NIPY dan Katasandi Tidak Cocok.
					</div>
					');
				redirect(base_url()."login");
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."login");
	}
	public function _rules(){
		$this->form_validation->set_message('required', '{field} harus diisi.');
		$this->form_validation->set_message('is_unique', '{field} telah digunakan.');
		$this->form_validation->set_message('matches', '{field} harus sama.');
		$this->form_validation->set_message('cek_select','{field} harus dipilih.');

		$this->form_validation->set_rules('pengguna', 'pengguna', 'trim|required');
		$this->form_validation->set_rules('katasandi', 'katasandi', 'trim|required');
	}
}
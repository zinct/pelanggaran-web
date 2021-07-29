<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('login'))
			redirect('dashboard');

		$this->load->view('login/index');
	}

	public function password()
	{
		$this->load->view('password');
	}

	// public function reset_password(){
	// 	$pengguna = $this->input->post('pengguna',true);
	// 	$email = $this->input->post('email',true);

	// 	$password_siswa = $this->Login_model->get_reset_password_siswa($pengguna,$email);
	// 	$password_dosen = $this->Login_model->get_reset_password_dosen($pengguna,$email);
	// 	$password_staff = $this->Login_model->get_reset_password_staff($pengguna,$email);
	// 	if ($password_mahasiswa) {
	// 		$data = array('pengguna' => $password_mahasiswa->nim,
	// 					  'jenis' => 'mahasiswa',
	// 					  'email' => $email,
	// 		);
	// 		$this->load->view('password_reset', $data);
	// 	}
	// 	elseif ($password_dosen) {
	// 		$data = array('pengguna' => $password_dosen->nip,
	// 					  'jenis' => 'dosen',
	// 					  'email' => $email,
	// 		);
	// 		$this->load->view('password_reset', $data);

	// 	}
	// 	elseif ($password_staff) {
	// 		$data = array('pengguna' => $password_staff->nip,
	// 					  'jenis' => 'staff',
	// 					  'email' => $email,
	// 		);
	// 		$this->load->view('password_reset', $data);
	// 	}
	// 	else{
	// 		$this->session->set_flashdata('message', '
	// 				<div class="alert alert-danger alert-dismissible fade show" role="alert">
	// 				<i class="icon fa fa-warning"></i> Kombinasi NIM/NIP dan Email Tidak Cocok.
	// 				</div>
	// 				');
	// 			redirect(base_url()."login/password");
	// 	}
	// }

	// public function reset_password_2($pengguna){
	// 	$password_mahasiswa = $this->Login_model->get_reset_password_mahasiswa_2($pengguna);
	// 	$password_dosen = $this->Login_model->get_reset_password_dosen_2($pengguna);
	// 	$password_staff = $this->Login_model->get_reset_password_staff_2($pengguna);
	// 	if ($password_mahasiswa) {
	// 		$data = array('pengguna' => $password_mahasiswa->nim,
	// 					  'jenis' => 'mahasiswa',
	// 					  'email' => $password_mahasiswa->email,
	// 		);
	// 	}
	// 	elseif ($password_dosen) {
	// 		$data = array('pengguna' => $password_dosen->nip,
	// 					  'jenis' => 'dosen',
	// 					  'email' => $password_dosen->nim,
	// 		);

	// 	}
	// 	elseif ($password_staff) {
	// 		$data = array('pengguna' => $password_staff->nip,
	// 					  'jenis' => 'staff',
	// 					  'email' => $password_staff->nim,
	// 		);
	// 	}
	// 	$this->load->view('password_reset', $data);
	// }

	// public function reset_password_proses(){
	// 	$pengguna = $this->input->post('pengguna',true);
	// 	$jenis = $this->input->post('jenis',true);
	// 	$email = $this->input->post('email',true);
	// 	$password = $this->input->post('password',true);
	// 	$password2 = $this->input->post('password2',true);

	// 	$data = array('kata_sandi' => $password);

	// 	if ($password == $password2) {
	// 		if ($jenis == "mahasiswa") {
	// 			$this->Login_model->ubah_password_mahasiswa($pengguna,$data);
	// 		}
	// 		elseif ($jenis == "dosen") {
	// 			$this->Login_model->ubah_password_dosen($pengguna,$data);
	// 		}
	// 		elseif ($jenis == "staff") {
	// 			$this->Login_model->ubah_password_staff($pengguna,$data);
	// 		}
	// 		$this->session->set_flashdata('message', '
	// 			<div class="alert alert-success alert-dismissible fade show" role="alert">
	// 			<i class="icon fa fa-success"></i> Kata Sandi Berhasil Diubah
	// 			'.validation_errors().'
	// 			</button>
	// 			</div>
	// 			');
	// 		redirect(base_url()."login");
	// 	}
	// 	else{
	// 		$this->session->set_flashdata('message', '
	// 			<div class="alert alert-danger alert-dismissible fade show" role="alert">
	// 			<i class="icon fa fa-warning"></i> Masukan Kata Sandi yang Sama
	// 			'.validation_errors().'
	// 			</button>
	// 			</div>
	// 			');
	// 		redirect(base_url()."login/reset_password_2/".$pengguna);
	// 	}
	// }

	public function login()
	{
		$session = $this->session->userdata('login');
		if ($session) {
			redirect('dashboard');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Pengecekan Staff
		$user = $this->db->get_where('user', ['username' => $username]);
		if ($user->num_rows() > 0) {

			$user = $user->row();

			if (password_verify($password, $user->password)) {
				$nama_user = "";
				if ($user->level != 'siswa') {
					$this->db->join('ptk', 'ptk.id_ptk=user.id_ref');
					$ptk = $this->db->get_where('user', ['username' => $username, 'id_ref' => $user->id_ref])->row();
					$nama_user = $ptk->nama_ptk;
				} else {
					$this->db->join('siswa', 'siswa.id_siswa=user.id_ref');
					$siswa = $this->db->get_where('user', ['username' => $username, 'id_ref' => $user->id_ref])->row();
					$nama_user = $siswa->nama_siswa;
				}


				$session = array(
					'login'  => TRUE,
					'id' => $user->id_user,
					'id_ref' => $user->id_ref,
					'nama_user' => $nama_user,
					'level' => $user->level
				);

				$this->session->set_userdata($session);
				redirect('dashboard');
			}
		}

		// Pengecekan Siswa
		// $user = $this->db->get_where('siswa', ['nisn' => $username]);

		// if($user->num_rows() > 0) {

		//   $user = $user->row();

		//   if($user->nis == $password) {
		//     $session = array(
		//       'login'  => TRUE,
		//       'nis' => $user->nis,            
		//       'nama_user' => $user->nama_siswa,            
		//       'level' => 'Siswa',
		//     );

		//     $this->session->set_userdata($session);
		//     redirect("pembayaran/detail");
		//   }

		// }

		$this->session->set_flashdata('error', 'Username Atau Password Salah!');
		redirect('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function _rules()
	{
		$this->form_validation->set_message('required', '{field} harus diisi.');
		$this->form_validation->set_message('is_unique', '{field} telah digunakan.');
		$this->form_validation->set_message('matches', '{field} harus sama.');
		$this->form_validation->set_message('cek_select', '{field} harus dipilih.');

		$this->form_validation->set_rules('pengguna', 'pengguna', 'trim|required');
		$this->form_validation->set_rules('katasandi', 'katasandi', 'trim|required');
	}
}

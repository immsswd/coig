<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_Controller
{
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('Model_register');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		# Untuk melakukan Login lakukan validasi terlebih dahulu.
		if ($this->form_validation->run() != true) { // jika masukkan ada salah satu yang salah maka tetap tampilkan halaman login, jik benar semua lanjut ke mthod _login.
			# page title
			$data['page_title'] = "Login page";

			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		}else{
			# jia validasi di atas sukses, lalu kita gunakan method login di halman ini juga.
			$this->_login(); //bikin method private dengan tanda _
		}
	}

	private function _login() // kita cari ada gak email/password dari input form di dalam db kita.
	{
		$email 		= $this->input->post('email');
		$password  	= $this->input->post('password');

		$user		= $this->db->get_where('user', [
			'email'	 => $email,
		])->row(); 

		# jika user ada dan aktif
		if ($user) {
			// echo $user->is_active;
			if ($user->is_active == 1) {
				# jika aktif kita check password
				if (password_verify($password, $user->password)) {
					# jika benar kita siapkan pengguna yang verified ke dalam session. untuk digunakan
					# didalam halaman yang dituju.
					$data = [
						'email' => $user->email,
						'role_id' => $user->role_id
					];
					# ini termasuk yang krusial, masukan data diatas ke dalam session
					$this->session->set_userdata($data);
					if ($user->role_id == 1) {
						# code...
						redirect('administrator');
					}elseif ($user->role_id == 2) {
						# code...
						redirect('user');
					}else{
						redirect('auth/register');
					}
				}else{
					$this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible">Your password is wrong! please type carefully.</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible">This Email is not being  activated yet</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-warning alert-dismissible">Email is not registered!</div>');
			redirect('auth');
		}
	}

	public function register()
	{

		# rules
		// set trim: to remove whitespace before/after

		$this->form_validation->set_rules('name', 'Fullname', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]|trim', [
			'is_unique' => 'This Email has been registered, please use another email.'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password didn\'t match!',
			'min_length' => 'Password is too short min 3'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run()==false) {
			# code...
			$data['page_title'] = 'Register Account Page';
			# code...
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('template/auth_footer');
		}else{
			$this->Model_register->addData();
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible">Congrats!, your account is registered!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		# hapus semua session pada saat login
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible">You\'re Logged out!</div>');
		redirect('auth');
	}

	public function block()
	{
		# code...
		// echo "your access is denied!";
		$data['title'] = "404";
		$this->load->view('template/auth_header', $data);
		$this->load->view('auth/blocked');
		$this->load->view('template/auth_footer');
	}

}
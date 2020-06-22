<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		# jika sesi tidak ada, keluarkan user tidak berhak dari halaman ini.
		is_logged_in();
	}

	public function index()
	{

		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')
		])->row();

		$data['title'] = "My Profile";
		$this->load->view('template/user_template/user_header', $data);
		$this->load->view('template/user_template/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/user_template/user_footer');
	}
}
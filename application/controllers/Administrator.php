<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Untuk melakuka restriction access check sesi di bagian __construct()
 */
class Administrator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		# jika sesi tidak ada, keluarkan user tidak berhak dari halaman ini. pake helper
		is_logged_in();
		# Session
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')
		])->row();

		$data['title'] = "Dashboard";
		$this->load->view('template/user_template/user_header', $data);
		$this->load->view('template/user_template/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/user_template/user_footer');
	}

	public function role()
	{
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')
		])->row();

		$data['title'] = "Role";
		$this->load->view('template/user_template/user_header', $data);
		$this->load->view('template/user_template/sidebar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('template/user_template/user_footer');
	}
}
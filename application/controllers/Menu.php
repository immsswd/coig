<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		# jika sesi tidak ada, keluarkan user tidak berhak dari halaman ini.
		is_logged_in();
	}

	public function index()
	{
		# session
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')
		])->row();

		// bisa dilakukan di model atau disini saja karena simple
		$data['menu'] = $this->db->get('user_menu')->result();

		# set rules
		$this->form_validation->set_rules('menu', 'Menu', 'required|trim');
		# do validate form
		if ($this->form_validation->run() == false){
			$data['title'] = "Menu Management";
			$this->load->view('template/user_template/user_header', $data);
			$this->load->view('template/user_template/sidebar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('template/user_template/user_footer');

		}else{
			$this->db->insert('user_menu', [
				'menu' => ucfirst($this->input->post('menu', true)),
			]);
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible">You had been added new menu.</div>');
			redirect('menu');
		}
	}

	public function submenu()
	{
		$this->load->model('Model_menu', 'menu');
		# session
		$data['user'] = $this->db->get_where('user', [
			'email' => $this->session->userdata('email')
		])->row();
		$data['title'] = "Submenu Management";
		$data['menu'] = $this->db->get('user_menu')->result();

		$this->form_validation->set_rules('menu_title', 'Title', 'required|trim');
		$this->form_validation->set_rules('user_menu_id', 'Menu', 'required|trim');
		$this->form_validation->set_rules('url', 'URL', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');
		
		$data['submenu'] = $this->menu->getSubMenu();
		
		if ($this->form_validation->run() == false) {
			$this->load->view('template/user_template/user_header', $data);
			$this->load->view('template/user_template/sidebar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('template/user_template/user_footer');
		}else{
			$this->menu->addSubmenu();
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible">Submenu was added!</div>');
			redirect('menu/submenu');
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_menu');
		$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible">Menu deleted.</div>');
		redirect('menu');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Model_menu extends CI_Model
{
	public function getSubMenu()
	{
		# code...
		$query = 'SELECT 
					ums.*,
					um.menu
				  FROM 
				  	user_menu_sub as ums,
				  	user_menu as um
				  WHERE 
				  	ums.user_menu_id = um.id
				  ORDER BY um.menu asc';
	return	$rslt = $this->db->query($query)->result();
	
	}

	public function addSubmenu()
	{
		# array data from inut post
		$data = [
			'menu_title' => $this->input->post('menu_title'),
			'user_menu_id' => $this->input->post('user_menu_id'),
			'url' => $this->input->post('url'),
			'icon' => $this->input->post('icon'),
			'is_active' => $this->input->post('is_active'),
		];

		$this->db->insert('user_menu_sub', $data);
	}
}
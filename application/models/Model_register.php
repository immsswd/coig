<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Model_register extends CI_Model
{
	public function addData()
	{
		# abmil data dari input dengan method post, masukkan ke dalam array di bawah:
		$data = [
			'name' => htmlspecialchars($this->input->post('name')),
			'email' => htmlspecialchars($this->input->post('email')),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id'  => 2,
			'is_active' => 1,
			'date_created' => time()
		];

		$this->db->insert('user', $data);
	}
}
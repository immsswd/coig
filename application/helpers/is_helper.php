<?php

/*
step:
1 check si pengguna sudah login apa belum?
2 check role si pengguna admin/user/guest?
3 kita lagi berusha akses menu yang mana?
*/
function is_logged_in()
{
	$ci =& get_instance(); //penggantinya $this
	
	if (!$ci->session->userdata('email') && (!$ci->session->userdata('role_id'))) {
			# redirect to auth
			redirect('auth');
	} else {
		# ambil sessi role_id
		$user_role_id = $ci->session->userdata('role_id');
		
		# ambil nama url di segmen ke berapa, untuk mengambil nama menu/controller
		$menu = $ci->uri->segment(1);

		# ambil semua di database 'user_menu' yang menu nya sama dengan nama segmen url tadi
		$query_user_menu = $ci->db->get_where('user_menu', [
			// 'menu' => $menu,
			'menu' => ucfirst($menu)
		])->row();

		# dari hasil query tepat di atas ini, ambil id nya masukkan ke var $user_menu_id
		$user_menu_id	= $query_user_menu->id;

		# ambil semua dari table user_access_menu berdasarkan/yang sesuai isi sesi sekarang.
		$query_user_access_menu = $ci->db->get_where('user_access_menu', [
			'user_role_id' => $user_role_id,
			'user_menu_id' => $user_menu_id
		])->num_rows();

		# jika hasil query 0 / tidak ada block atau 404 not found
		if ($query_user_access_menu < 1) {
			redirect('auth/block');
		}
	}
}
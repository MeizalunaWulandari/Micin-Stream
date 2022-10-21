<?php 

	function check_already_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('user_id');
		if ($user_session) {
			redirect(base_url('home'));
		}
	}
	function check_not_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('user_id');
		if (!$user_session) {
			redirect(base_url('auth/signin'));
		}
	}
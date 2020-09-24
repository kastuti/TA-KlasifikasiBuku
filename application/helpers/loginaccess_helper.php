<?php

function login_in_admin ()
{
	$ci = get_instance(); 
	if (!$ci->session->userdata('email')) {
		redirect('c_auth');
	}else{
		if ($ci->session->userdata('role_id') == 2) {
			redirect('c_dashboard/blocked');
		}
	}
}

function login_in_s_admin ()
{
	$ci = get_instance(); 
	if (!$ci->session->userdata('email')) {
		redirect('c_auth');
	}else{
		if ($ci->session->userdata('role_id') == 1) {
			redirect('c_s_dashboard/blocked');
		}
	}
}
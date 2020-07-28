<?php

function login_in_admin ()
{
	$ci = get_instance(); 
	if (!$ci->session->userdata('email')) {
		redirect('c_auth');
	}
	else
	{
		if ($ci->session->userdata('id_admin')) {
			redirect('c_dashboard/blocked');
		}
	}
}
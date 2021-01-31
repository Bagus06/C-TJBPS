<?php defined('BASEPATH') or exit('No direct script access allowed');

function is_admin()
{
	return check_role(1);
}

function is_member()
{
	return check_role(2);
}

function is_root()
{
	return check_role('root');
}


function get_user()
{
	$link = str_replace('/', '_', base_url());
	$user = $_SESSION[$link . '_logged_in'];
	return $user;
}

function check_role($role = '')
{
	$output = FALSE;
	if (!empty($role)) {
		$link = str_replace('/', '_', base_url());
		$user = $_SESSION[$link . '_logged_in']['role'];
		$output = false;
		foreach ($user as $key => $value) {
			if ($value['level'] == $role) {
				$output = TRUE;
			}
		}
	}
	return $output;
}

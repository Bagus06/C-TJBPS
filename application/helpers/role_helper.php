<?php defined('BASEPATH') or exit('No direct script access allowed');

function is_admin()
{
	return check_role('admin');
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
	$output = false;
	if (!empty($role)) {
		$link = str_replace('/', '_', base_url());
		$user = $_SESSION[$link . '_logged_in']['role'];
		$output = false;
		foreach ($user as $key => $value) {
			if ($value['title'] == $role) {
				$output = true;
			}
		}
	}
	return $output;
}

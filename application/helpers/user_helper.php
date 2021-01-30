<?php defined('BASEPATH') or exit('No direct script access allowed');

function get_profile($id = 0)
{
    $ci = &get_instance();
    $user_profile = $ci->db->get_where('user_profile', ['user_id' => $id])->row_array();
    return $user_profile;
}

function get_name($id = 0)
{
    $ci = &get_instance();
    $ci->db->select('nama');
    $ci->db->where('user_id', $id);
    $user_name = $ci->db->get('user_profile')->row_array();
    $name = $user_name['nama'];
    return $name;
}

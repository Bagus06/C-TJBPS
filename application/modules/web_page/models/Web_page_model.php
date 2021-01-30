<?php defined('BASEPATH') or exit('No direct script access allowed');

class Web_page_model extends CI_Model
{
	public function all()
	{
		$msg = [];
		$this->db->select_sum('total_money');
		$msg['saving_amount'] = $this->db->get('account_mutation')->row();
		$this->db->select('user_has_role.id');
		$this->db->from('user_has_role');
		$this->db->join('user_role', 'user_role.id=user_has_role.user_role_id');
		$this->db->where('user_role.level', 2);
		$msg['total_employees'] = $this->db->get()->num_rows();
		$msg['data'] = $this->db->get('web_page')->result_array();
		return $msg;
	}
	public function save()
	{
		$msg = [];
		if (!empty($this->input->post())) {
			$msg = ['status' => 'danger', 'msg' => 'Data input failed'];
			$data_post = $this->input->post();
			$data = array(
				array(
					'content_title' => 'background-coperative',
					'content' => $data_post['background-coperative'],
				),
				array(
					'content_title' => 'vision',
					'content' => $data_post['vission'],
				),
				array(
					'content_title' => 'mission',
					'content' => $data_post['mission'],
				),
				array(
					'content_title' => 'history',
					'content' => $data_post['history'],
				),
				array(
					'content_title' => 'email',
					'content' => $data_post['email'],
				),
				array(
					'content_title' => 'phone',
					'content' => $data_post['phone'],
				),
				array(
					'content_title' => 'address',
					'content' => $data_post['address'],
				),
			);
			if (!empty($data)) {
				if ($this->db->empty_table('web_page')) {
					if ($this->db->insert_batch('web_page', $data)) {
						$msg = ['status' => 'success', 'msg' => 'Data has been successfully inputted'];
					}
				} else {
					$msg['msgs'][] = 'Old data wipe failed';
				}
			}
		}
		$msg['data'] = $this->db->get('web_page')->result_array();
		return $msg;
	}
}

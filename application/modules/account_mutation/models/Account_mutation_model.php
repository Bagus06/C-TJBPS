<?php defined('BASEPATH') or exit('No direct script access allowed');

class Account_mutation_model extends CI_Model
{
	public function all()
	{
		$this->db->select('account_mutation.id, a.name as customer, b.name as entered, user.email, account_mutation.total_money, account_mutation.status, account_mutation.created_at');
		$this->db->from('account_mutation');
		$this->db->join('user_profile as a', 'a.user_id=account_mutation.user_id');
		$this->db->join('user_profile as b', 'b.user_id=account_mutation.entered_data');
		$this->db->join('user', 'user.id=account_mutation.user_id');
		return $this->db->get()->result_array();
	}
	public function save($id = 0)
	{
		$msg = [];
		$user_id = get_user()['id'];
		if (!empty($this->input->post())) {
			$msg = ['status' => 'danger', 'msg' => 'Data input failed'];
			$data_post = $this->input->post();
			$data = [
				'total_money' => $data_post['total_money'],
				'status' => $data_post['status'],
				'user_id' => $data_post['customer'],
				'entered_data' => $user_id
			];
			if (!empty($id)) {
				$this->db->select('id');
				$exist = $this->db->get_where('account_mutation', ['user_id' => $data['user_id']])->row_array();
				$current_user = $this->db->get_where('account_mutation', ['id' => $id])->row_array();
				if ($current_user['id'] == $exist['id'] || empty($exist)) {
					$this->db->where('id', $id);
					if ($this->db->update('account_mutation', $data)) {
						$msg = ['status' => 'success', 'msg' => 'Data has been successfully inputted'];
					}
				} else {
					$msg['msgs'][] = 'Data has been inputted';
				}
			} else {
				if ($this->db->insert('account_mutation', $data)) {
					$msg = ['status' => 'success', 'msg' => 'Data has been successfully inputted'];
				}
			}
		}
		if (!empty($id)) {
			$msg['data'] = $this->db->get_where('account_mutation', ['id' => $id])->row_array();
		}
		return $msg;
	}
	public function delete($id = 0)
	{
		if (!empty($id)) {
			if ($this->db->delete('account_mutation', ['id' => $id])) {
				return ['status' => 'success', 'msg' => 'Data deleted successfully'];
			} else {
				return ['status' => 'danger', 'msg' => 'Data failed to delete'];
			}
		}
	}

	public function status()
	{
		$msg = [
			[
				'id' => 1,
				'title' => 'admission fee'
			],
			[
				'id' => 2,
				'title' => 'money out'
			]
		];
		return $msg;
	}

	public function saving_amount()
	{
		$this->db->select_sum('total_money');
		$result = $this->db->get('account_mutation')->row();
		print_r($result);
		die;
		return $result;
	}
}

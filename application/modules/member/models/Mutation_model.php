<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mutation_model extends CI_Model
{
	public function all()
	{
		$this->db->select('account_mutation.id, b.name as entered, account_mutation.total_money, account_mutation.status, account_mutation.created_at');
		$this->db->from('account_mutation');
		$this->db->join('user_profile as b', 'b.user_id=account_mutation.entered_data');
		$this->db->where('account_mutation.user_id', get_user()['id']);
		return $this->db->get()->result_array();
	}

	public function saving_amount()
	{
		$this->db->select_sum('total_money');
		$this->db->where('account_mutation.user_id', get_user()['id']);
		return $this->db->get('account_mutation')->row();
	}
}

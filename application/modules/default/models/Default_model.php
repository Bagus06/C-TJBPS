<?php defined('BASEPATH') or exit('No direct script access allowed');

class Default_model extends CI_Model
{
	public function all()
	{
		return $this->db->get('your_table')->result_array();
	}
	public function save($id = 0)
	{
		$msg = [];
		if (!empty($this->input->post())) {
			$msg = ['status' => 'danger', 'msg' => 'Data input failed'];
			$data = $this->input->post();
			if (!empty($id)) {
				$this->db->select('id');
				$exist = $this->db->get_where('your_table', ['name' => $data['name']])->row_array();
				$current_user = $this->db->get_where('your_table', ['id' => $id])->row_array();
				if ($current_user['id'] == $exist['id'] || empty($exist)) {
					$this->db->where('id', $id);
					if ($this->db->update('your_table', $data)) {
						$msg = ['status' => 'success', 'msg' => 'Data has been successfully inputted'];
					}
				} else {
					$msg['msgs'][] = 'Data has been inputted';
				}
			} else {
				$this->db->select('id');
				$exist = $this->db->get_where('your_table', ['name' => $data['name']])->row_array();
				if (empty($exist)) {
					if ($this->db->insert('your_table', $data)) {
						$msg = ['status' => 'success', 'msg' => 'Data has been successfully inputted'];
					}
				} else {
					$msg['msgs'][] = 'Data has been inputted';
				}
			}
		}
		if (!empty($id)) {
			$msg['data'] = $this->db->get_where('your_table', ['id' => $id])->row_array();
		}
		return $msg;
	}
	public function delete($id = 0)
	{
		if (!empty($id)) {
			if ($this->db->delete('your_table', ['id' => $id])) {
				return ['status' => 'success', 'msg' => 'Data deleted successfully'];
			} else {
				return ['status' => 'danger', 'msg' => 'Data failed to delete'];
			}
		}
	}
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
	public function check_login()
	{
		if (empty($this->session->userdata(str_replace('/', '_', base_url() . '_logged_in')))) {
			$curent_url = base_url($_SERVER['PATH_INFO']);
			$curent_url = urlencode($curent_url);
			redirect(base_url('login?redirect_to=' . $curent_url));
		} else {
			if ($this->uri->rsegments[2]  == 'login') {
				$url = 'dashboard/main_page';
				redirect($url);
			}
			if (!empty($_COOKIE[base_url() . '_username'])) {
				$data['username'] = @$_COOKIE[base_url() . '_username'];
				$data['password'] = @$_COOKIE[base_url() . '_password'];
				$data['remember_me'] = @$_COOKIE[base_url() . '_remember_me'];
				$this->set_cookie($data);
				$user = $this->CI->db->query('SELECT * FROM user WHERE username = ? LIMIT 1', @$data['username'])->row_array();
				if (!empty($user)) {
					if (decrypt($data['password'], $user['password'])) {
						$url = @$_GET['redirect_to'];
						if (!empty($url)) {
							$url = urldecode($url);
						} else {
							$url = 'admin/index';
						}
						$role = $this->CI->db->query('SELECT level,title FROM user_role WHERE id = ? LIMIT 1', @$user['user_role_id'])->row_array();
						if (!empty($role)) {
							$user['role'] = @$role['title'];
							$user['level'] = @$role['level'];
						} else {
							$user['role'] = 'user';
						}
						$this->CI->session->set_userdata(base_url() . '_logged_in', $user);
						$this->save_ip($user['id']);
					}
				}
			}
		}
	}

	public function login()
	{
		$data = $this->input->post();
		$msg = [];
		if (!empty($data)) {
			$user = $this->db->query('SELECT * FROM user WHERE username = ?', $data['username'])->row_array();
			if (!empty($user)) {
				if (!decrypt($data['password'], $user['password'])) {
					$msg = ['status' => 'danger', 'msg' => 'Incorrect password'];
				} else {
					$url = @$_GET['redirect_to'];
					if (!empty($url)) {
						$url = urldecode($url);
					} else {
						$url = base_url('dashboard/main_page');
					}
					$tmp_role = $this->role_all();
					$role = [];
					if (!empty($tmp_role)) {
						foreach ($tmp_role as $key => $value) {
							$role[$value['id']] = $value['title'];
						}
					}

					$user_role = $this->db->get_where('user_has_role', ['user_id' => $user['id']])->result_array();
					foreach ($user_role as $key => $value) {
						$user['role'][] = ['id' => $value['user_role_id'], 'title' => $role[$value['user_role_id']]];
					}
					$this->session->set_userdata(str_replace('/', '_', base_url() . '_logged_in'), $user);
					redirect($url);
				}
			} else {
				$msg = ['status' => 'danger', 'msg' => 'Username unknown'];
			}
		}
		return $msg;
	}

	public function save($id = 0, $data = array())
	{
		$msg = [];
		if (!empty($this->input->post())) {
			$msg = ['status' => 'danger', 'msg' => 'User failed to save'];
			if (empty($data)) {
				$data = $this->input->post();
			}

			if (!empty($id)) {
				$this->db->select('id');
				$exist = $this->db->get_where('user', ['username' => $data['username']])->row_array();
				$current_user = $this->db->get_where('user', ['id' => $id])->row_array();
				if ($current_user['id'] == $exist['id'] || empty($exist)) {
					if (empty($data['password'])) {
						$pass = $current_user['password'];
					} elseif (!empty($data['password'])) {
						$pass = encrypt($data['password']);
					}
					$this->db->where('id', $id);
					if ($this->db->update('user', [
						'password' => $pass,
						'username' => $data['username'],
						'email' => @$data['email'],
					])) {
						$msg = ['status' => 'success', 'msg' => 'User saved successfully'];
						$this->db->select('*');
						$this->db->where(['user_id' => $id]);
						$current_role = $this->db->get('user_has_role')->result_array();

						if (!empty($data['role'])) {
							$q_delete = [];
							foreach ($current_role as $key => $value) {
								if (!in_array($value['user_role_id'], $data['role'])) {
									$q_delete[] = $value['id'];
								} else {
									$role_key = array_search($value['user_role_id'], $data['role']);
									unset($data['role'][$role_key]);
								}
							}
							$q = [];
							foreach ($data['role'] as $key => $value) {
								$q[] = ['user_id' => $id, 'user_role_id' => $value];
							}
							if (!empty($q)) {
								if (!$this->db->insert_batch('user_has_role', $q)) {
									$msg['msgs'][] = 'Role failed to save';
								}
							}
							foreach ($q_delete as $key => $value) {
								$this->db->delete('user_has_role', ['id' => $value]);
							}
						} else {
							$this->db->delete('user_has_role', ['user_id' => $id]);
						}
					}
				} else {
					$msg['msgs'][] = 'Username already exists';
				}
			} else {
				$this->db->select('id');
				$exist = $this->db->get_where('user', ['username' => $data['username']])->row_array();
				if (empty($exist)) {
					if ($this->db->insert('user', [
						'password' => encrypt($data['password']),
						'username' => $data['username'],
						'email' => @$data['email'],
					])) {
						$msg = ['status' => 'success', 'msg' => 'User saved successfully'];
						$last_id = $this->db->insert_id();
						$this->db->insert('user_profile', [
							'user_id' => $last_id,
							'nik' => '-',
							'name' => $data['name'],
							'religion' => 0,
							'gender' => null,
							'date_of_birth' => '-',
							'address' => '-',
							'photo' => '-',
							'job_title' => '-',
						]);
						$msg['user_id'] = $last_id;
						$q = [];
						foreach ($data['role'] as $key => $value) {
							$q[] = ['user_id' => $last_id, 'user_role_id' => $value];
						}
						if (!$this->db->insert_batch('user_has_role', $q)) {
							$msg['msgs'][] = 'Role failed to save';
						}
					}
				} else {
					$msg['msgs'][] = 'Username already exists';
				}
			}
		}
		if (!empty($id)) {
			$this->db->where(['user.id' => $id]);
			$msg['user'] = $this->db->get('user')->row_array();

			$this->db->select('user_role_id');
			$tmp_user_role = $this->db->get_where('user_has_role', ['user_id' => $id])->result_array();
			foreach ($tmp_user_role as $key => $value) {
				$msg['user_role'][] = $value['user_role_id'];
			}
		}
		return $msg;
	}

	public function role_save($id = 0)
	{
		$msg = [];
		if (!empty($this->input->post())) {
			$msg = ['status' => 'danger', 'msg' => 'User failed to save'];
			$data = $this->input->post();
			if (!empty($id)) {
				$this->db->select('id');
				$exist = $this->db->get_where('user_role', ['title' => $data['title']])->row_array();
				$current_user = $this->db->get_where('user_role', ['id' => $id])->row_array();
				if ($current_user['id'] == $exist['id'] || empty($exist)) {
					$this->db->where('id', $id);
					if ($this->db->update('user_role', $data)) {
						$msg = ['status' => 'success', 'msg' => 'User role saved successfully'];
					}
				} else {
					$msg['msgs'][] = 'The title already exists';
				}
			} else {
				$this->db->select('id');
				$exist = $this->db->get_where('user_role', ['title' => $data['title']])->row_array();
				if (empty($exist)) {
					if ($this->db->insert('user_role', $data)) {
						$msg = ['status' => 'success', 'msg' => 'User role saved successfully'];
					}
				} else {
					$msg['msgs'][] = 'The title already exists';
				}
			}
		}
		if (!empty($id)) {
			$msg['data'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
		}
		return $msg;
	}

	public function all()
	{
		return $this->db->get('user')->result_array();
	}

	public function role_all()
	{
		return $this->db->get('user_role')->result_array();
	}

	public function role_delete($id)
	{
		if (!empty($id)) {
			if ($this->db->delete('user_role', ['id' => $id])) {
				return ['status' => 'success', 'msg' => 'Data deleted successfully'];
			} else {
				return ['status' => 'danger', 'msg' => 'Data failed to delete'];
			}
		}
	}

	public function delete($id = 0)
	{
		if (!empty($id)) {
			if ($this->db->delete('user', ['id' => $id])) {
				return ['status' => 'success', 'msg' => 'Data deleted successfully'];
			} else {
				return ['status' => 'danger', 'msg' => 'Data failed to delete'];
			}
		}
	}
	public function user_not_admin()
	{
		$this->db->select('user_profile.name, user_profile.user_id');
		$this->db->from('user_has_role');
		$this->db->join('user_profile', 'user_profile.user_id=user_has_role.user_id');
		$this->db->join('user_role', 'user_role.id=user_has_role.user_role_id');
		$this->db->where('user_role.level', 2);
		return $this->db->get()->result_array();
	}
}

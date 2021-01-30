<?php defined('BASEPATH') or exit('No direct script access allowed');

class Account_mutation extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_mutation_model');
		$this->load->model('../user_model');
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function main_page()
	{
		$data['data'] = $this->account_mutation_model->all();
		$this->load->view('index', ['data' => $data]);
	}

	public function edit($id = 0)
	{
		$data_edit = $this->account_mutation_model->save($id);
		$user_not_admin = $this->user_model->user_not_admin();
		$status = $this->account_mutation_model->status();
		$this->load->view('index', ['edit' => $data_edit, 'user_not_admin' => $user_not_admin, 'status' => $status]);
	}
	public function delete($id = 0)
	{
		if (!empty($id)) {
			$data = $this->account_mutation_model->delete($id);
			$this->load->view('index', ['data' => $data]);
		}
	}
}

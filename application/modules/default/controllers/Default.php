<?php defined('BASEPATH') or exit('No direct script access allowed');

class Default extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('default_model');
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function main_page()
	{
		$data = $this->default_model->save();
		$data['data'] = $this->default_model->all();
		$this->load->view('index', ['data' => $data]);
	}

	public function edit($id = 0)
	{
		$data = $this->default_model->save($id);
		$this->load->view('index', ['data' => $data]);
	}
	public function delete($id = 0)
	{
		if (!empty($id)) {
			$data = $this->default_model->delete($id);
			$this->load->view('index', ['data' => $data]);
		}
	}
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Web_page extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('web_page_model');
	}
	public function section()
	{
		$data = $this->web_page_model->all();
		$this->load->view('index', ['data' => $data]);
	}

	public function edit($id = 0)
	{
		$data = $this->web_page_model->save();
		$this->load->view('index', ['data' => $data]);
	}
}

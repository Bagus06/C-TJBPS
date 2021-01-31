<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('../models/mutation_model');
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function main_page()
	{
		$data['data'] = $this->mutation_model->all();
		$data['saving_amount'] = $this->mutation_model->saving_amount();
		$this->load->view('index', ['data' => $data]);
	}
}

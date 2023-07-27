<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_kos', 'model_kos');
	}


	public function index()
	{
		$data = array(
			'list'      => $this->model_kos->getkos()
		);
		$this->load->view('welcome_message', $data);
	}
}

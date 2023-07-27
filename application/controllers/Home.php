<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('security') !== 'Login') {
            $this->session->set_flashdata('gagal', 'Silahkan login terlebih dahulu.');
            redirect(site_url() . 'welcome');
        }
        $this->load->model('Model_kos', 'model_kos');
        $this->load->model('Model_auth', 'model_auth');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Dashboard',
            'content'   => 'v_dashboard',
            'list'      => $this->model_kos->getAll(),
            'user'      => $this->model_auth->getDet()->row()
        );
        $this->load->view('layout/template', $data, FALSE);
    }
}

/* End of file Home.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('security') !== 'Login') {
        //     $this->session->set_flashdata('gagal', 'Silahkan login terlebih dahulu.');
        //     redirect(site_url() . 'welcome');
        // }
        $this->load->model('Model_kos', 'model_kos');
    }


    public function index()
    {
        $data = array(
            'title'     => 'Peta',
            'content'   => 'v_peta',
            'list'      => $this->model_kos->getkos()
        );
        $this->load->view('layout/template_website', $data);
    }
    public function lokasi()
    {
        $id = $this->uri->segment(3);

        $data = array(
            'title'     => 'Peta',
            'content'   => 'v_lokasi_kos',
            'list'      => $this->model_kos->detail($id)->row()
        );
        $this->load->view('layout/template_website', $data);
    }
}

/* End of file Peta.php */

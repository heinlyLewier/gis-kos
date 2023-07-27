<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Terbaru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('security') !== 'Login') {
            $this->session->set_flashdata('gagal', 'Silahkan login terlebih dahulu.');
            redirect(site_url() . 'welcome');
        }
        $this->load->model('Model_admin', 'model_admin');
        $this->load->model('Model_kos', 'model_kos');
    }

    public function index()
    {
        $keyword = $this->input->post('keyword');
        $data = array(
            'keyword'   => $keyword,
            'content'   => 'v_kos_terbaru',
            'user'      => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row(),
            'list'      => $this->model_admin->getAll(),
            'list'      => $this->model_admin->cari_kos($keyword)
        );
        $this->load->view('layout/template_website', $data);
    }
    public function tentang()
    {
        $data = array(
            'content'   => 'v_tentang_kos',
            'user'      => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row()
        );
        $this->load->view('layout/template_website', $data);
    }

    public function detail()
    {
        $id = $this->uri->segment(3);

        $data = array(
            'user'      => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row(),
            'list'      => $this->model_kos->detail($id)->row()
        );
        $this->load->view('v_detail_terbaru_kos', $data);
    }
}

/* End of file Terbaru.php */

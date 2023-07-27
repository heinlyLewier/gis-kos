<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('security') !== 'Login') {
            $this->session->set_flashdata('gagal', 'Silahkan login terlebih dahulu.');
            redirect(site_url() . 'welcome');
        }
        $this->load->model('Model_admin', 'model_admin');
        $this->load->model('Model_auth', 'model_auth');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Dashboard',
            'content'   => 'admin/v_dashboard',
            'list'      => $this->model_admin->getAllKos(),
            'total_user' => $this->model_admin->getAllUser(),
            'user'      => $this->model_auth->getDet()->row()
        );
        $this->load->view('layout/template', $data, FALSE);
    }

    public function kos()
    {
        $data = array(
            'title'     => 'Data Kos',
            'content'   => 'admin/v_data_kos',
            'user'      => $this->model_admin->getDet()->row(),
            'list'      => $this->model_admin->getAllKos()
        );
        $this->load->view('layout/template', $data, FALSE);
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $gambar = $this->uri->segment(4);
        $target_file = './uploads/kos/' . $gambar;
        unlink($target_file);

        $this->model_admin->delete($id);
        $this->session->set_flashdata('pesan', 'Data kos berhasil dihapus.');
        redirect(site_url('admin/kos'));
    }

    public function user()
    {
        $data = array(
            'title'     => 'Data User',
            'content'   => 'admin/v_data_user',
            'user'      => $this->model_admin->getDet()->row(),
            'list'      => $this->model_admin->getAllUser()
        );
        $this->load->view('layout/template', $data, FALSE);
    }

    public function delete_user()
    {

        $id = $this->uri->segment(3);
        $gambar = $this->uri->segment(4);
        $target_file = './uploads/profil/' . $gambar;
        unlink($target_file);

        $this->model_admin->delete_user($id);
        $this->session->set_flashdata('pesan', 'Data user berhasil dihapus.');
        redirect(site_url('admin/user'));
    }
}

/* End of file Admin.php */

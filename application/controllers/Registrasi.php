<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_auth');
    }


    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[konfir_password]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'trim|required|matches[password]');


        if ($this->form_validation->run() ==  FALSE) {
            $data = array(
                'title'     => 'Daftar Akun',
                'content'   => 'v_registrasi'
            );
            $this->load->view('layout/template_auth', $data, FALSE);
        } else {
            $this->proses_regis();
        }
    }

    public function proses_regis()
    {
        $data = array(
            'nama'      => htmlspecialchars(ucwords($this->input->post('nama'))),
            'username'  => htmlspecialchars($this->input->post('username')),
            'password'  => htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT)),
            'level'     => 'User',
            'status'    => 'Aktif',
            'img'       => null
        );
        $this->Model_auth->save($data);
        $this->session->set_flashdata('pesan', 'User berhasil ditambahkan.');
        redirect('registrasi');
    }
}
    
    /* End of file Registrasi.php */

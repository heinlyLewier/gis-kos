<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('security') !== 'Login') {
            $this->session->set_flashdata('gagal', 'Silahkan login terlebih dahulu.');
            redirect(site_url() . 'welcome');
        }
        $this->load->model('Model_auth', 'model_auth');
    }
    public function update_profil()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        $id = $this->input->post('id_user');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'     => 'Profil',
                'content'   => 'v_profil',
                'user'      => $this->model_auth->getDet()->row()
            );
            $this->load->view('layout/template', $data, FALSE);
        } else {
            $data = array(
                'nama'      => htmlspecialchars(ucwords($this->input->post('nama'))),
                'username'  => htmlspecialchars($this->input->post('username'))
            );

            $this->model_auth->update($data, $id);
            $this->session->set_flashdata('pesan', 'Profil berhasil diubah.');
            redirect(site_url('profil/update_profil'));
        }
    }

    public function update_foto()
    {
        $id = $this->uri->segment(3);
        $image_lama = $_POST['image_lama'];
        $config['upload_path']          = './uploads/profil/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (@$_FILES['image']['name'] != null) {
            if ($this->upload->do_upload('image')) {
                $target_file = './uploads/profil/' . $image_lama;
                unlink($target_file);
                $gambar =   $_POST['image'] = $this->upload->data('file_name');
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('gagal', $error);
                redirect(site_url('profil'));
            }
        } else {
            $gambar = $image_lama;
        }
        $data = array(
            'img'       => $gambar
        );
        $this->model_auth->update($data, $id);
        $this->session->set_flashdata('pesan', 'Foto profil berhasil diubah.');
        redirect(site_url('profil/update_profil'));
    }

    public function update_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'min_length[5]|matches[konfir_password]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'matches[password]');

        $id = $this->input->post('id_user');

        if ($this->form_validation->run() ==  FALSE) {
            $data = array(
                'title'     => 'Profil',
                'content'   => 'v_profil',
                'user'      => $this->model_auth->getDet()->row()
            );
            $this->load->view('layout/template', $data, FALSE);
        } else {
            $password = htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT));
            $data = array(
                'password'  => $password
            );
            $this->model_auth->update($data, $id);
            $this->session->set_flashdata('pesan', 'Password berhasil diubah.' . $password);
            redirect(site_url('profil/update_profil'));
        }
    }
}
    
    /* End of file Profil.php */

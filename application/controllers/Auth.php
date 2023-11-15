<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Login',
				'content' => 'v_login',
			);
			$this->load->view('layout/template_auth', $data, FALSE);
		} else {
			$this->_proses_login();
		}
	}

	private function _proses_login()
	{
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

		$query = $this->db->get_where('tb_users', ['username' => $username])->row();

		if ($query) {
			if (password_verify($password, $query->password)) {
				$data = array('status' => 'Aktif');
				$this->db->update('tb_users', $data, ['username' => $username]);

				if ($query->level == 'Admin') {
					$data = array(
						'username' => $query->username,
						'id_user' => $query->id_user,
						'level' => $query->level,
						'status'	=> $query->status,
						'security' => 'Login'
					);
					$this->session->set_userdata($data);
					redirect(site_url() . 'admin');
				} elseif ($query->level == 'User') {
					$data = array(
						'username' => $query->username,
						'id_user' => $query->id_user,
						'level' => $query->level,
						'security' => 'Login'
					);
					$this->session->set_userdata($data);
					redirect(site_url() . 'terbaru');
				}
			} else {
				$this->session->set_flashdata('pesan', 'Password anda salah.');
				redirect(site_url() . 'auth');
			}
		} else {
			$this->session->set_flashdata('pesan', 'Username belum terdaftar.');
			redirect(site_url() . 'auth');
		}
	}

	public function logout()
	{
		$data = array('status' => 'Tidak Aktif');
		$this->db->update('tb_users', $data, ['id_user' => $this->session->userdata('id_user')]);

		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_user');
		$this->session->sess_destroy();
		redirect(site_url() . 'welcome');
	}
}

/* End of file Auth.php */
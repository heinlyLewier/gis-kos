<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_Model
{
    public function save($data)
    {
        return $this->db->insert('tb_users', $data);
    }
    public function update($data, $id)
    {
        return $this->db->update('tb_users', $data, ['id_user' => $id]);
    }

    public function getDet()
    {

        return $this->db->get_where('tb_users', ['id_user' => $this->session->userdata('id_user')]);
    }
}

/* End of file Model_auth.php */

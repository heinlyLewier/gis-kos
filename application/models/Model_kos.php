<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_kos extends CI_Model
{
    public function getAll()
    {
        $user = $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row();

        $this->db->order_by('id_kos', 'desc');
        return $this->db->get_where('tb_kos', ['id_user' => $user->id_user]);
    }
    public function getkos()
    {
        $this->db->order_by('id_kos', 'desc');
        $this->db->limit(3);
        return $this->db->get('tb_kos');
    }

    public function save($data)
    {
        return $this->db->insert('tb_kos', $data);
    }

    public function detail($id)
    {
        return $this->db->get_where('tb_kos', ['id_kos' => $id]);
    }

    public function update($data, $id)
    {
        return $this->db->update('tb_kos', $data, ['id_kos' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('tb_kos', ['id_kos' => $id]);
    }
}

/* End of file Model_kos.php */

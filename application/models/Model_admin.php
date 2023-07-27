<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin  extends CI_Model
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

    public function getAllUser()
    {
        $this->db->order_by('id_user', 'desc');
        return $this->db->get('tb_users');
    }
    public function delete_user($id)
    {
        return $this->db->delete('tb_users', ['id_user' => $id]);
    }
    public function getAllKos()
    {
        $this->db->order_by('id_kos', 'desc');
        return $this->db->get('tb_kos');
    }

    public function delete($id)
    {
        return $this->db->delete('tb_kos', ['id_kos' => $id]);
    }

    public function getAll()
    {
        $this->db->order_by('id_kos', 'asc');
        return $this->db->get('tb_kos');
    }

    public function cari_kos($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('tb_kos');
        if (!empty($keyword)) {
            $this->db->like('alamat_kos', $keyword);
        }
        return $this->db->get();
    }
}

/* End of file Model_admin .php */

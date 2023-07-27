<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kos extends CI_Controller
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
            'title'     => 'Data Kos',
            'content'   => 'v_kos',
            'user'      => $this->model_auth->getDet()->row(),
            'list'      => $this->model_kos->getAll()
        );
        $this->load->view('layout/template', $data, FALSE);
    }

    public function add()
    {

        $this->form_validation->set_rules('pemilik_kos', 'Pemilik Kos', 'trim|required');
        $this->form_validation->set_rules('nama_kos', 'Nama Kos', 'trim|required');
        $this->form_validation->set_rules('jenis_kos', 'Jenis Kos', 'trim|required');
        $this->form_validation->set_rules('jumlah_kamar', 'Jumlah Kamar', 'trim|required');
        $this->form_validation->set_rules('sisa_kamar', 'Sisa Kamar', 'trim|required');
        $this->form_validation->set_rules('biaya_kos', 'Biaya Kos', 'trim|required');
        $this->form_validation->set_rules('no_wa', 'Nomor Whatsapp', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('alamat_kos', 'Alamat Kos', 'trim|required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'     => 'Tambah Kos',
                'content'   => 'v_add_kos',
                'user'      => $this->model_auth->getDet()->row(),
            );
            $this->load->view('layout/template', $data, FALSE);
        } else {
            $this->proses_add_kos();
        }
    }
    public function proses_add_kos()
    {
        $fasilitas = implode(',', $this->input->post('fasilitas'));
        $id_user = $_REQUEST['id_user'];


        $no_wa = htmlspecialchars($this->input->post('no_wa'));
        if (!preg_match("/[^+0-9]/", trim($no_wa))) {
            // cek apakah no hp karakter ke 1 dan 2 adalah angka 62
            if (substr(trim($no_wa), 0, 2) == "62") {
                $hp    = trim($no_wa);
            }
            // cek apakah no hp karakter ke 1 adalah angka 0
            else if (substr(trim($no_wa), 0, 1) == "0") {
                $hp    = "62" . substr(trim($no_wa), 1);
            }
            // cek apakah no hp karakter ke 1 adalah angka 8
            else if (substr(trim($no_wa), 0, 1) == "8") {
                $hp    = "628" . substr(trim($no_wa), 1);
            }
        }
        $config['upload_path']          = './uploads/kos/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']            = 'kos-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (@$_FILES['image']['name'] != null) {
            if ($this->upload->do_upload('image')) {
                $gambar =   $_POST['image'] = $this->upload->data('file_name');
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('gagal', $error);
                redirect(site_url('kos/add'));
            }
        } else {
            $gambar =   $_POST['image'] = null;
        }
        $data = array(
            'id_user'       => $id_user,
            'pemilik_kos'   => htmlspecialchars(ucwords($this->input->post('pemilik_kos'))),
            'nama_kos'      => htmlspecialchars(ucwords($this->input->post('nama_kos'))),
            'jenis_kos'     => htmlspecialchars($this->input->post('jenis_kos')),
            'jumlah_kamar'  => htmlspecialchars($this->input->post('jumlah_kamar')),
            'sisa_kamar'    => htmlspecialchars($this->input->post('sisa_kamar')),
            'kecamatan'     => htmlspecialchars(ucwords($this->input->post('kecamatan'))),
            'alamat_kos'    => htmlspecialchars(ucfirst($this->input->post('alamat_kos'))),
            'deskripsi'     => htmlspecialchars(ucfirst($this->input->post('deskripsi'))),
            'biaya_kos'     => htmlspecialchars($this->input->post('biaya_kos')),
            'no_wa'         => $hp,
            'latitude'      => htmlspecialchars($this->input->post('latitude')),
            'longitude'     => htmlspecialchars($this->input->post('longitude')),
            'fasilitas'     => $fasilitas,
            'gambar1'       => $gambar
        );
        $this->model_kos->save($data);
        $this->session->set_flashdata('pesan', 'Data kos berhasil disimpan.');
        redirect(site_url('kos/add'));
    }

    public function detail()
    {
        $id = $this->uri->segment(3);

        $data = array(
            'title'     => 'Detail Kos',
            'content'   => 'v_detail_kos',
            'user'      => $this->model_auth->getDet()->row(),
            'list'      => $this->model_kos->detail($id)->row()
        );
        $this->load->view('layout/template', $data, FALSE);
    }

    public function update()
    {
        $id = $this->uri->segment(3);

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'     => 'Update Kos',
                'content'   => 'v_update_kos',
                'user'      => $this->model_auth->getDet()->row(),
                'list'      => $this->model_kos->detail($id)->row()
            );
            $this->load->view('layout/template', $data, FALSE);
        } else {
            $this->proses_update_kos();
        }
    }

    public function proses_update_kos()
    {
        $id = $this->uri->segment(3);
        $image_lama = $_POST['image_lama'];
        $fasilitas = implode(',', $this->input->post('fasilitas'));
        $no_wa = htmlspecialchars($this->input->post('no_wa'));
        if (!preg_match("/[^+0-9]/", trim($no_wa))) {
            // cek apakah no hp karakter ke 1 dan 2 adalah angka 62
            if (substr(trim($no_wa), 0, 2) == "62") {
                $hp    = trim($no_wa);
            }
            // cek apakah no hp karakter ke 1 adalah angka 0
            else if (substr(trim($no_wa), 0, 1) == "0") {
                $hp    = "62" . substr(trim($no_wa), 1);
            }
            // cek apakah no hp karakter ke 1 adalah angka 8
            else if (substr(trim($no_wa), 0, 1) == "8") {
                $hp    = "628" . substr(trim($no_wa), 1);
            }
        }

        $config['upload_path']          = './uploads/kos/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']            = 'kos-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (@$_FILES['image']['name'] != null) {
            if ($this->upload->do_upload('image')) {
                $target_file = './uploads/kos/' . $image_lama;
                unlink($target_file);
                $gambar =   $_POST['image'] = $this->upload->data('file_name');
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('gagal', $error);
                redirect(site_url('kos/update/' . $id));
            }
        } else {
            $gambar = $image_lama;
        }
        $data = array(
            'pemilik_kos'   => htmlspecialchars(ucwords($this->input->post('pemilik_kos'))),
            'nama_kos'      => htmlspecialchars(ucwords($this->input->post('nama_kos'))),
            'jenis_kos'     => htmlspecialchars($this->input->post('jenis_kos')),
            'jumlah_kamar'  => htmlspecialchars($this->input->post('jumlah_kamar')),
            'sisa_kamar'    => htmlspecialchars($this->input->post('sisa_kamar')),
            'kecamatan'     => htmlspecialchars(ucwords($this->input->post('kecamatan'))),
            'alamat_kos'    => htmlspecialchars(ucfirst($this->input->post('alamat_kos'))),
            'deskripsi'     => htmlspecialchars(ucfirst($this->input->post('deskripsi'))),
            'biaya_kos'     => htmlspecialchars($this->input->post('biaya_kos')),
            'no_wa'         => $hp,
            'latitude'      => htmlspecialchars($this->input->post('latitude')),
            'longitude'     => htmlspecialchars($this->input->post('longitude')),
            'fasilitas'     => $fasilitas,
            'gambar1'       => $gambar
        );
        $this->model_kos->update($data, $id);
        $this->session->set_flashdata('pesan', 'Data kos berhasil diubah.');
        redirect(site_url('kos/update/' . $id));
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $gambar = $this->uri->segment(4);
        $target_file = './uploads/kos/' . $gambar;
        unlink($target_file);

        $this->model_kos->delete($id);
        $this->session->set_flashdata('pesan', 'Data kos berhasil dihapus.');
        redirect(site_url('kos'));
    }
}

/* End of file Kos.php */

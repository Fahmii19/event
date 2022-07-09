<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KatKegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_Kegiatan");
        $this->load->library('form_validation');

        if ($this->session->userdata('role') == NULL) {
            echo "<script> alert('Anda belum login, silahkan login terlebih dahulu!');
            history.go(-1); </script>";
        } else if ($this->session->userdata('role') == "public") {
            echo "<script> alert('Anda sedang login sebagai " . $this->session->userdata('role') . ", silahkan logout terlebih dahulu!');
            history.go(-1); </script>";
        }
    }

    public function index()
    {

        $data['kegiatan'] = $this->Kategori_Kegiatan->getAll();

        $data['judul'] = 'Form Mahasiswa';

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('kat_kegiatan/kat_kegiatan', $data);
        $this->load->view('partial/footer');
    }

    public function save_kegiatan()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run() == true) {
            $data['nama'] = $this->input->post('nama');

            $this->Kategori_Kegiatan->save_kegiatan($data);
            redirect('KatKegiatan');
        } else {
            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kat_kegiatan/kat_kegiatan');
            $this->load->view('partial/footer');
        }
    }


    public function delete()
    {
        $id = $this->input->get('id');

        $this->load->model('Kategori_Kegiatan', 'data');

        $this->data->delete([$id]);

        redirect(base_url() . 'KatKegiatan', 'refresh');
        return;
    }

    public function edit_katkegiatan($id)
    {
        $data['judul'] = 'Form Edit Kategori Kegiatan';
        $data['kegiatan'] = $this->Kategori_Kegiatan->getDataKegiatan($id);

        // var_dump($data);

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('kat_kegiatan/edit_katkegiatan', $data);
        $this->load->view('partial/footer');
    }

    public function aksi_edit()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $data['nama'] = $this->input->post('nama');

            $this->Kategori_Kegiatan->edit_kegiatan($id, $data);
            redirect('KatKegiatan');
        } else {
            $id = $this->input->post('id');
            $data['kegiatan'] = $this->Kategori_Kegiatan->getDataKegiatan($id);

            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kat_kegiatan/edit_katkegiatan', $data);
            $this->load->view('partial/footer');
        }
    }
}

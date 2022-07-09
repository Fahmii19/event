<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KatPeserta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("KatPeserta_model");
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

        $data['peserta'] = $this->KatPeserta_model->getAll();

        $data['judul'] = 'Form Mahasiswa';

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('kat_peserta/kat_peserta', $data);
        $this->load->view('partial/footer');
    }

    public function save_peserta()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run() == true) {
            $data['nama'] = $this->input->post('nama');

            $this->KatPeserta_model->save_peserta($data);
            redirect('katPeserta');
        } else {
            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kat_peserta/kat_peserta');
            $this->load->view('partial/footer');
        }
    }


    public function delete()
    {
        $id = $this->input->get('id');

        $this->load->model('KatPeserta_model', 'data');

        $this->data->delete([$id]);

        redirect(base_url() . 'KatPeserta', 'refresh');
        return;
    }

    public function edit_katpeserta($id)
    {
        $data['judul'] = 'Form Edit Kategori Peserta';
        $data['peserta'] = $this->KatPeserta_model->getDataPeserta($id);
        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('kat_peserta/edit_katpeserta', $data);
        $this->load->view('partial/footer');
    }

    public function aksi_edit()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $data['nama'] = $this->input->post('nama');

            $this->KatPeserta_model->edit_katpeserta($id, $data);
            redirect('KatPeserta');
        } else {
            $id = $this->input->post('id');
            $data['peserta'] = $this->KatPeserta_model->getDataPeserta($id);

            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kat_peserta/edit_katpeserta', $data);
            $this->load->view('partial/footer');
        }
    }
}

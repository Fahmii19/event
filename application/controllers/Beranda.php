<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("DataKegiatan");
        $this->load->model("DataDaftar");

        // if ($this->session->userdata('role') == NULL) {
        //     echo "<script> alert('Anda belum login, silahkan login terlebih dahulu!');
        //     history.go(-1); </script>";
        // } else if ($this->session->userdata('role') == "public") {
        //     echo "<script> alert('Anda sedang login sebagai " .$this->session->userdata('role'). ", silahkan logout terlebih dahulu!');
        //     history.go(-1); </script>";
        // }
    }

    public function index()
    {
        $data['kegiatan'] = $this->datakegiatan->getAll();

        $this->load->view('partial_user/header');
        $this->load->view('beranda', $data);
        $this->load->view('partial_user/footer');
    }

    public function detail()
    {
        $this->load->view('partial_user/header');
        $this->load->view('detail');
        $this->load->view('partial_user/footer');
    }
    public function details($id)
    {
        $data['data'] = $this->datakegiatan->getDetails($id);

        // var_dump($data);

        $this->load->view('partial_user/header');
        $this->load->view('detail', $data);
        $this->load->view('partial_user/footer');
    }

    public function save_beranda()
    {

        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('alasan', 'alasan', 'required');
        $this->form_validation->set_rules('kegiatan_id', 'kegiatan_id', 'required');
        $this->form_validation->set_rules('kategori_peserta_id', 'kategori_peserta_id', 'required');

        if ($this->form_validation->run() == true) {

            $data['users_id'] = $this->input->post('user_id');
            $data['tanggal_daftar'] = $this->input->post('tanggal');
            $data['alasan'] = $this->input->post('alasan');
            $data['kegiatan_id'] = $this->input->post('kegiatan_id');
            $data['kategori_peserta_id'] = $this->input->post('kategori_peserta_id');
            $data['nosertifikat'] = 'S-2022-VI-001';

            // var_dump($data);

            $this->datadaftar->save_daftar($data);
            redirect('beranda');
        } else {
            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kat_kegiatan/kat_kegiatan');
            $this->load->view('partial/footer');
        }
    }
}

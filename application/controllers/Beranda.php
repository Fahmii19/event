<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("datakegiatan");

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
}

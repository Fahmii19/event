<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // $this->load->model('auth');
        // $this->auth->cek_login();

        if ($this->session->userdata('role') == NULL) {
            echo "<script> alert('Anda belum login, silahkan login terlebih dahulu!');
            history.go(-1); </script>";
        } else if ($this->session->userdata('role') == "public") {
            echo "<script> alert('Anda sedang login sebagai " .$this->session->userdata('role'). ", silahkan logout terlebih dahulu!');
            history.go(-1); </script>";
        }
    }

    public function index()
    {
        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('dashboard');
        $this->load->view('partial/footer');
    }
}

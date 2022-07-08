<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $this->load->view('partial_user/header');
        $this->load->view('beranda');
        $this->load->view('partial_user/footer');
    }

    public function detail()
    {
        $this->load->view('partial_user/header');
        $this->load->view('detail');
        $this->load->view('partial_user/footer');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function index()
    {
        if ($this->session->userdata('role') != null) {
            echo "<script> alert('Anda sedang login sebagai " . $this->session->userdata('role') . ", silahkan logout terlebih dahulu!');
            history.go(-1); </script>";
        } else {
            $this->load->view('login');
        }
    }

    public function proses()
    {
        $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => md5($this->input->post('password', TRUE))
        );
        $hasil = $this->auth->cek_user($data);
        $query = $this->db->get_where('users', $data);
        if ($query->num_rows() > 0) {
            $sess = $query->row_array();
            $this->session->set_userdata($sess);
        }
        if ($this->session->userdata('role') == 'administrator') {
            redirect('dashboard');
        } elseif ($this->session->userdata('role') == 'public') {
            redirect('/');
        } else {
            $this->session->set_flashdata('error', 'Username & Password salah');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('is_login');
        redirect('login');
    }
}

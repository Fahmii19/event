<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("datadaftar");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['daftar'] = $this->datadaftar->getAll();

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('daftar/daftar', $data);
        $this->load->view('partial/footer');
    }

    public function create_daftar()
    {
        $data['judul'] = 'Form Tambah daftar';

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('daftar/create_daftar', $data);
        $this->load->view('partial/footer');
    }


    public function delete()
    {
        $id = $this->input->get('id');

        $this->load->model('datadaftar', 'data');
        $this->data->delete([$id]);

        redirect(base_url() . 'daftar', 'refresh');
        return;
    }

    public function save_daftar()
    {

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('created_at', 'created_at', 'required');
        $this->form_validation->set_rules('last_login', 'last_login', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == true) {
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['email'] = $this->input->post('email');
            $data['created_at'] = $this->input->post('created_at');
            $data['last_login'] = $this->input->post('last_login');
            $data['status'] = $this->input->post('status');
            $data['role'] = $this->input->post('role');

            $this->datauser->save_user($data);
            redirect('user');
        } else {
            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('user/user');
            $this->load->view('partial/footer');
        }
    }


    public function edit_daftar($id)
    {
        $data['daftar'] = $this->datadaftar->getDatadaftar($id);
        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('daftar/edit_daftar', $data);
        $this->load->view('partial/footer');
    }

    public function aksi_edit()
    {
        $this->form_validation->set_rules('tanggal_daftar', 'tanggal_daftar', 'required');
        $this->form_validation->set_rules('alasan', 'alasan', 'required');
        $this->form_validation->set_rules('nosertifikat', 'nosertifikat', 'required');

        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $data['tanggal_daftar'] = $this->input->post('tanggal_daftar');
            $data['alasan'] = $this->input->post('alasan');
            $data['nosertifikat'] = $this->input->post('nosertifikat');

            $this->datadaftar->edit_daftar($id, $data);
            redirect('daftar');
        } else {
            $id = $this->input->post('id');
            $data['daftar'] = $this->datadaftar->getDatadaftar($id);

            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('daftar/edit_daftar', $data);
            $this->load->view('partial/footer');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("datauser");
        $this->load->library('form_validation');

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

        $data['user'] = $this->datauser->getAll();

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('user/user', $data);
        $this->load->view('partial/footer');
    }

    public function create_user()
    {
        $data['judul'] = 'Form Tambah user';

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('user/create_user', $data);
        $this->load->view('partial/footer');
    }


    public function delete()
    {
        $id = $this->input->get('id');

        $this->load->model('datauser', 'data');
        $this->data->delete([$id]);

        redirect(base_url() . 'user', 'refresh');
        return;
    }

    public function save_user()
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


    public function edit_user($id)
    {
        $data['user'] = $this->datauser->getDatauser($id);
        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('user/edit_user', $data);
        $this->load->view('partial/footer');
    }

    public function aksi_edit()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('created_at', 'created_at', 'required');
        $this->form_validation->set_rules('last_login', 'last_login', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['email'] = $this->input->post('email');
            $data['created_at'] = $this->input->post('created_at');
            $data['last_login'] = $this->input->post('last_login');
            $data['status'] = $this->input->post('status');
            $data['role'] = $this->input->post('role');
            $this->datauser->edit_user($id, $data);
            redirect('user');
        } else {
            $id = $this->input->post('id');
            $data['user'] = $this->datauser->getDatauser($id);

            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('user/edit_user', $data);
            $this->load->view('partial/footer');
        }
    }
}

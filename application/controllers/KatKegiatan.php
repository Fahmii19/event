<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KatKegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("kategori_kegiatan");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['kegiatan'] = $this->kategori_kegiatan->getAll();

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

            $this->kategori_kegiatan->save_kegiatan($data);
            redirect('katkegiatan');
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

        $this->load->model('kategori_kegiatan', 'data');

        $this->data->delete([$id]);

        redirect(base_url() . 'katkegiatan', 'refresh');
        return;
    }

    public function edit_katkegiatan($id)
    {
        $data['judul'] = 'Form Edit Kategori Kegiatan';
        $data['kegiatan'] = $this->kategori_kegiatan->getDataKegiatan($id);

        var_dump($data);

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

            $this->kategori_kegiatan->edit_kegiatan($id, $data);
            redirect('katkegiatan');
        } else {
            $id = $this->input->post('id');
            $data['kegiatan'] = $this->kategori_kegiatan->getDataKegiatan($id);

            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kat_kegiatan/edit_katkegiatan', $data);
            $this->load->view('partial/footer');
        }
    }
}

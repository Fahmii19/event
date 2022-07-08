<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("datakegiatan");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['kegiatan'] = $this->datakegiatan->getAll();

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('kegiatan/kegiatan', $data);
        $this->load->view('partial/footer');
    }

    public function create_kegiatan()
    {
        $data['judul'] = 'Form Tambah Kegiatan';

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('kegiatan/create_kegiatan', $data);
        $this->load->view('partial/footer');
    }


    public function delete()
    {
        $id = $this->input->get('id');

        $this->load->model('datakegiatan', 'data');
        $this->data->delete([$id]);

        redirect(base_url() . 'kegiatan', 'refresh');
        return;
    }

    public function save_kegiatan()
    {

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required');
        $this->form_validation->set_rules('harga_tiket', 'harga_tiket', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('narasumber', 'narasumber', 'required');
        $this->form_validation->set_rules('tempat', 'tempat', 'required');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
        $this->form_validation->set_rules('foto_flyer', 'foto_flyer', 'required');
        $this->form_validation->set_rules('pic', 'pic', 'required');

        if ($this->form_validation->run() == true) {
            $data['judul'] = $this->input->post('judul');
            $data['kapasitas'] = $this->input->post('kapasitas');
            $data['harga_tiket'] = $this->input->post('harga_tiket');
            $data['tanggal'] = $this->input->post('tanggal');
            $data['narasumber'] = $this->input->post('narasumber');
            $data['tempat'] = $this->input->post('tempat');
            $data['jenis_id'] = $this->input->post('jenis_id');
            $data['foto_flyer'] = $this->input->post('foto_flyer');
            $data['pic'] = $this->input->post('pic');

            // var_dump($data);

            $this->datakegiatan->save_kegiatan($data);
            redirect('kegiatan');
        } else {
            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kegiatan/kegiatan');
            $this->load->view('partial/footer');
        }
    }


    public function edit_kegiatan($id)
    {
        $data['kegiatan'] = $this->datakegiatan->getDataKegiatan($id);
        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('kegiatan/edit_kegiatan', $data);
        $this->load->view('partial/footer');
    }

    public function aksi_edit()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required');
        $this->form_validation->set_rules('harga_tiket', 'harga_tiket', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('narasumber', 'narasumber', 'required');
        $this->form_validation->set_rules('tempat', 'tempat', 'required');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
        $this->form_validation->set_rules('foto_flyer', 'foto_flyer', 'required');
        $this->form_validation->set_rules('pic', 'pic', 'required');
        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $data['judul'] = $this->input->post('judul');
            $data['kapasitas'] = $this->input->post('kapasitas');
            $data['harga_tiket'] = $this->input->post('harga_tiket');
            $data['tanggal'] = $this->input->post('tanggal');
            $data['narasumber'] = $this->input->post('narasumber');
            $data['tempat'] = $this->input->post('tempat');
            $data['jenis_id'] = $this->input->post('jenis_id');
            $data['foto_flyer'] = $this->input->post('foto_flyer');
            $data['pic'] = $this->input->post('pic');
            $this->datakegiatan->edit_kegiatan($id, $data);
            redirect('kegiatan');
        } else {
            $id = $this->input->post('id');
            $data['kegiatan'] = $this->datakegiatan->getDataKegiatan($id);

            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kegiatan/edit_kegiatan', $data);
            $this->load->view('partial/footer');
        }
    }
}

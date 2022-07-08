<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("datakegiatan");
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

        $data['kegiatan'] = $this->datakegiatan->getAll();

        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('kegiatan/kegiatan', $data);
        $this->load->view('partial/footer');
    }

    public function create_kegiatan()
    {
        $datajdl['judul'] = 'Form Tambah Kegiatan';

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required');
        $this->form_validation->set_rules('harga_tiket', 'harga_tiket', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('narasumber', 'narasumber', 'required');
        $this->form_validation->set_rules('tempat', 'tempat', 'required');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
        // $this->form_validation->set_rules('foto_flyer', 'foto_flyer', 'required');
        $this->form_validation->set_rules('pic', 'pic', 'required');


        if ($this->form_validation->run() == true) {
            $config['upload_path']   = './uploads/flyer/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = 'flyer-'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload', $config);

            if(@$_FILES['foto_flyer']['name'] != null) {
                if ($this->upload->do_upload('foto_flyer')) {
                    $data['judul'] = $this->input->post('judul');
                    $data['kapasitas'] = $this->input->post('kapasitas');
                    $data['harga_tiket'] = $this->input->post('harga_tiket');
                    $data['tanggal'] = $this->input->post('tanggal');
                    $data['narasumber'] = $this->input->post('narasumber');
                    $data['tempat'] = $this->input->post('tempat');
                    $data['jenis_id'] = $this->input->post('jenis_id');
                    $data['pic'] = $this->input->post('pic');
                    $data['foto_flyer'] = $this->upload->data('file_name');
                    $this->datakegiatan->save_kegiatan($data);

                    if ($this->db->affected_rows() > 0) {
                        echo "<script> alert('Data berhasil disimpan!'); window.location='".site_url('kegiatan')."'; </script>";
                        // var_dump($data);
                    }
                } else {
                    $error = $this->upload->display_errors();
                    echo "<script> alert('Gagal menyimpan data! Error : ".$error."'); window.location='".site_url('kegiatan/create_kegiatan')."'; </script>";
                    // var_dump($data);
                }
            } else {
                echo "<script> alert('Gagal menyimpan data! Foto flyer belum terupload!'); window.location='".site_url('kegiatan/create_kegiatan')."'; </script>";
            }

            // var_dump($data);

            // $this->datakegiatan->save_kegiatan($data);
            // redirect('kegiatan');
        } else {
            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kegiatan/create_kegiatan', $datajdl);
            $this->load->view('partial/footer');
        }
    }


    public function delete()
    {
        $id = $this->input->get('id');

        $kegiatan = $this->datakegiatan->get($id)->row();
        if ($kegiatan->foto_flyer != null) {
            $target_file = './uploads/flyer/'.$kegiatan->foto_flyer;
            unlink($target_file);
        }
        
        $this->load->model('datakegiatan', 'data');
        $this->data->delete([$id]);


        redirect(base_url() . 'kegiatan', 'refresh');
        return;
    }

    // public function save_kegiatan()
    // { 

    //     $this->form_validation->set_rules('judul', 'judul', 'required');
    //     $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required');
    //     $this->form_validation->set_rules('harga_tiket', 'harga_tiket', 'required');
    //     $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    //     $this->form_validation->set_rules('narasumber', 'narasumber', 'required');
    //     $this->form_validation->set_rules('tempat', 'tempat', 'required');
    //     $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
    //     $this->form_validation->set_rules('foto_flyer', 'foto_flyer', 'required');
    //     $this->form_validation->set_rules('pic', 'pic', 'required');

    //     if ($this->form_validation->run() == true) {
    //         $config['upload_path']   = './uploads/flyer/';
    //         $config['allowed_types'] = 'gif|jpg|jpeg|png';
    //         $config['max_size']      = 2048;
    //         $config['file_name']     = 'flyer-'.date('ymd').'-'.substr(md5(rand()),0,10);
    //         $this->load->library('upload', $config);

    //         if(@$_FILES['foto_flyer']['name'] != null) {
    //             if ($this->upload->do_upload('foto_flyer')) {
    //                 $data['judul'] = $this->input->post('judul');
    //                 $data['kapasitas'] = $this->input->post('kapasitas');
    //                 $data['harga_tiket'] = $this->input->post('harga_tiket');
    //                 $data['tanggal'] = $this->input->post('tanggal');
    //                 $data['narasumber'] = $this->input->post('narasumber');
    //                 $data['tempat'] = $this->input->post('tempat');
    //                 $data['jenis_id'] = $this->input->post('jenis_id');
    //                 $data['pic'] = $this->input->post('pic');
    //                 $data['foto_flyer'] = $this->upload->data('file_name');
    //                 $this->datakegiatan->save_kegiatan($data);

    //                 if ($this->db->affected_rows() > 0) {
    //                     // echo "<script> alert('Data berhasil disimpan!'); redirect('kegiatan'); </script>";
    //                     var_dump($data);
    //                 }
    //             } else {
    //                 $error = $this->upload->display_errors();
    //                 // echo "<script> alert('Gagal menyimpan data! Error : ".$error."'); redirect('kegiatan'); </script>";
    //                 var_dump($data);
    //             }
    //         } else {
    //             echo "<script> alert('Gagal menyimpan data! Error :'); redirect('kegiatan'); </script>";
    //         }

    //         // var_dump($data);

    //         // $this->datakegiatan->save_kegiatan($data);
    //         // redirect('kegiatan');
    //     } else {
    //         $this->load->view('partial/header');
    //         $this->load->view('partial/sidebar');
    //         $this->load->view('kegiatan/create_kegiatan');
    //         $this->load->view('partial/footer');
    //     }
    // }


    public function edit_kegiatan($id)
    {
        $datajdl['kegiatan'] = $this->datakegiatan->getDataKegiatan($id);

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required');
        $this->form_validation->set_rules('harga_tiket', 'harga_tiket', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('narasumber', 'narasumber', 'required');
        $this->form_validation->set_rules('tempat', 'tempat', 'required');
        $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
        // $this->form_validation->set_rules('foto_flyer', 'foto_flyer', 'required');
        $this->form_validation->set_rules('pic', 'pic', 'required');


        if ($this->form_validation->run() == true) {
            $config['upload_path']   = './uploads/flyer/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = 'flyer-'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload', $config);

            if(@$_FILES['foto_flyer']['name'] != null) {
                $kegiatan = $this->datakegiatan->get($id)->row();
                if ($kegiatan->foto_flyer != null) {
                    $target_file = './uploads/flyer/'.$kegiatan->foto_flyer;
                    unlink($target_file);
                }

                if ($this->upload->do_upload('foto_flyer')) {
                    $id = $this->input->post('id');
                    $data['judul'] = $this->input->post('judul');
                    $data['kapasitas'] = $this->input->post('kapasitas');
                    $data['harga_tiket'] = $this->input->post('harga_tiket');
                    $data['tanggal'] = $this->input->post('tanggal');
                    $data['narasumber'] = $this->input->post('narasumber');
                    $data['tempat'] = $this->input->post('tempat');
                    $data['jenis_id'] = $this->input->post('jenis_id');
                    $data['pic'] = $this->input->post('pic');
                    $data['foto_flyer'] = $this->upload->data('file_name');
                    $this->datakegiatan->edit_kegiatan($id, $data);

                    if ($this->db->affected_rows() > 0) {
                        echo "<script> alert('Data berhasil diedit!'); window.location='".site_url('kegiatan')."'; </script>";
                        // var_dump($data);
                    }
                } else {
                    $error = $this->upload->display_errors();
                    echo "<script> alert('Gagal menyimpan data! Error : ".$error."'); history.go(-1); </script>";
                    // var_dump($data);
                }
            } else {
                echo "<script> alert('Gagal menyimpan data! Foto flyer belum terupload!'); history.go(-1); </script>";
            }

            // var_dump($data);

            // $this->datakegiatan->save_kegiatan($data);
            // redirect('kegiatan');
        } else {
            $id = $this->input->post('id');
            $data['kegiatan'] = $this->datakegiatan->getDataKegiatan($id);

            $this->load->view('partial/header');
            $this->load->view('partial/sidebar');
            $this->load->view('kegiatan/edit_kegiatan', $datajdl);
            $this->load->view('partial/footer');
        }
    }

    // public function aksi_edit()
    // {
    //     $this->form_validation->set_rules('judul', 'judul', 'required');
    //     $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required');
    //     $this->form_validation->set_rules('harga_tiket', 'harga_tiket', 'required');
    //     $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    //     $this->form_validation->set_rules('narasumber', 'narasumber', 'required');
    //     $this->form_validation->set_rules('tempat', 'tempat', 'required');
    //     $this->form_validation->set_rules('jenis_id', 'jenis_id', 'required');
    //     $this->form_validation->set_rules('foto_flyer', 'foto_flyer', 'required');
    //     $this->form_validation->set_rules('pic', 'pic', 'required');
    //     if ($this->form_validation->run() == true) {
    //         $id = $this->input->post('id');
    //         $data['judul'] = $this->input->post('judul');
    //         $data['kapasitas'] = $this->input->post('kapasitas');
    //         $data['harga_tiket'] = $this->input->post('harga_tiket');
    //         $data['tanggal'] = $this->input->post('tanggal');
    //         $data['narasumber'] = $this->input->post('narasumber');
    //         $data['tempat'] = $this->input->post('tempat');
    //         $data['jenis_id'] = $this->input->post('jenis_id');
    //         $data['foto_flyer'] = $this->input->post('foto_flyer');
    //         $data['pic'] = $this->input->post('pic');
    //         $this->datakegiatan->edit_kegiatan($id, $data);
    //         redirect('kegiatan');
    //     } else {
    //         $id = $this->input->post('id');
    //         $data['kegiatan'] = $this->datakegiatan->getDataKegiatan($id);

    //         $this->load->view('partial/header');
    //         $this->load->view('partial/sidebar');
    //         $this->load->view('kegiatan/edit_kegiatan', $data);
    //         $this->load->view('partial/footer');
    //     }
    // }
}

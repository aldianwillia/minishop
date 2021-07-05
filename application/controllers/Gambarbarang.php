<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambarbarang extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gambarbarang');
        $this->load->model('m_barang');
    }


    public function index()
    {
        $data = array(
            'title' => 'Gambar barang',
            'gambarbarang' => $this->m_gambarbarang->get_all_data(),
            'isi' => 'gambarbarang/v_index',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }


    public function add($id_barang)
    {
        $this->form_validation->set_rules(
            'keterangan',
            'Ket Gambar',
            'required',
            array('required' => '%s Harus Diisi')
        );

        // Validasi Upload gambar
        if ($this->form_validation->run() == TRUE) {

            //folder Upload 
            $config['upload_path'] = './assets/gambarbarang/';

            //type Gambar yang dibolehkan
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";

            //kondisi Gagal upload
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => ' Add Gambar barang',
                    'error_upload' => $this->upload->display_errors(),
                    'barang' => $this->m_barang->get_data($id_barang),
                    'gambar' => $this->m_gambarbarang->get_gambar($id_barang),
                    'isi' => 'gambarbarang/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                // Kondisi Berhasil Upload
                $upload_data = array('uploads' => $this->upload->data());

                //memanggil library image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambarbarang/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // post Data Barang ke Database
                $data = array(
                    'id_barang' => $id_barang,
                    'keterangan' => $this->input->post('keterangan'),
                    'gambar' => $upload_data['uploads']['file_name'],

                );

                //pesan tambah Barang berhasil
                $this->m_gambarbarang->add($data);
                $this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan');
                redirect('gambarbarang/add/' . $id_barang);
            }
        }

        //Menampilkan Halaman v_add
        $data = array(
            'title' => ' Add Gambar barang',
            'barang' => $this->m_barang->get_data($id_barang),
            'gambar' => $this->m_gambarbarang->get_gambar($id_barang),
            'isi' => 'gambarbarang/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete Data Barang
    public function delete($id_barang, $id_gambar)
    {
        // Hapus gambar upload
        $gambar = $this->m_gambarbarang->get_data($id_gambar);
        if ($gambar->gambar != "") {
            unlink('./assets/gambarbarang/' . $gambar->gambar);
        }
        // End hapus....

        $data = array('id_gambar' => $id_gambar);
        $this->m_gambarbarang->delete($data);
        $this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus');
        redirect('gambarbarang/add/' . $id_barang);
    }
}

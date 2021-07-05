<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_barang');
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Barang',
            'barang' => $this->m_barang->get_all_data(),
            'isi' => 'barang/v_barang',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }




    // Add Data Barang
    public function add()
    {

        // Validasi Pesan Jika Form Kosong
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules(
            'id_kategori',
            'kategori',
            'required',
            array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harus Diisi')
        );


        // Validasi Upload gambar
        if ($this->form_validation->run() == TRUE) {

            //folder Upload 
            $config['upload_path'] = './assets/gambar/';

            //type Gambar yang dibolehkan
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";

            //kondisi Gagal upload
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Barang',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'barang/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                // Kondisi Berhasil Upload
                $upload_data = array('uploads' => $this->upload->data());

                //memanggil library image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // post Data Barang ke Database
                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],

                );

                //pesan tambah Barang berhasil
                $this->m_barang->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
                redirect('barang');
            }
        }

        //Menampilkan Halaman v_add
        $data = array(
            'title' => 'Add Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'barang/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }






    //Edit Data Barang
    public function edit($id_barang = NULL)
    {

        // Validasi Pesan Jika Form Kosong
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules(
            'id_kategori',
            'kategori',
            'required',
            array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harus Diisi')
        );

        // validasi Upload Gambar
        if ($this->form_validation->run() == TRUE) {
            //folder upload
            $config['upload_path'] = './assets/gambar/';

            //type & Ukuran Gambar
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';

            $this->upload->initialize($config);

            //memberi variabel baru 
            $field_name = "gambar";

            //kondisi jika file gambar kosong
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Data Barang',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'barang' => $this->m_barang->get_data($id_barang),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'barang/v_edit',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {

                // Hapus gambar upload
                $barang = $this->m_barang->get_data($id_barang);
                if ($barang->gambar != "") {
                    unlink('./assets/gambar/' . $barang->gambar);
                }
                // End hapus....

                // jika Ganti Gambar
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                // post data barang
                $data = array(
                    'id_barang' => $id_barang,
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],

                );
                //refresh halaman data berhasil diedit
                $this->m_barang->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                redirect('barang');
            }

            // Jika tidak Ganti Gambar
            $data = array(
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi')

            );
            //pesan data berhasil diedit
            $this->m_barang->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            redirect('barang');
        }

        //Menampilkan Form edit Data Barang
        $data = array(
            'title' => 'Edit Data Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'barang' => $this->m_barang->get_data($id_barang),
            'isi' => 'barang/v_edit',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }




    //Delete Data Barang
    public function delete($id_barang = NULL)
    {
        // Hapus gambar upload
        $barang = $this->m_barang->get_data($id_barang);
        if ($barang->gambar != "") {
            unlink('./assets/gambar/' . $barang->gambar);
        }
        // End hapus....

        $data = array('id_barang' => $id_barang);
        $this->m_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('barang');
    }
}

/* End of file Barang.php */

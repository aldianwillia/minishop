<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'barang' => $this->m_home->get_all_data(),
            'isi' => 'v_home',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        
    }

    // function memanggil kategori berdasarkan id_kategori
    public function kategori($id_kategori)
    {
        // load data kategori m_home berdasarkan id_kategori kedalam variabel $kategori
        $kategori = $this->m_home->kategori($id_kategori);

        // menampung seluruh data barang berdasarkan id_kategori kedalam variabel data
        $data = array(
            'title' =>  $kategori->nama_kategori,
            'barang' => $this->m_home->get_all_data_barang($id_kategori),
            'isi' => 'v_kategori_barang',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        
    }
    
    // function Memanggil data detail barang berdasarkan id_barang //
    public function detail_barang($id_barang)
    {
        $data = array(
            'title' =>  'Detail Barang',
            'barang' => $this->m_home->detail_barang($id_barang),
            'isi' => 'v_detail',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
         
    }

}

/* End of file Home.php */

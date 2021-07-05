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

}

/* End of file Home.php */

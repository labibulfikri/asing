<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_perkara');
        $this->load->model('m_jadwal');
        $this->load->model('m_login');
        $this->load->model('m_berita');
        $this->load->library('session');        
    }

    function index()
    { 

    $tgl= date('Y-m-d'); 
    $tgl_akhir = date('Y-m-d', strtotime('+3 days', strtotime($tgl)));
      
    

    $get_data_perkara = $this->m_perkara->get_data_perkara();
    // $get_data_jadwal = $this->m_jadwal->get_data_jadwal($tgl);
    $get_data_jadwal_limit = $this->m_jadwal->get_data_jadwal_limit($tgl,$tgl_akhir);
    $get_data = $this->m_perkara->get_data_perkara();
       $getberita_limit= $this->m_berita->get_berita_limit();


    $data = array(
            'masterpage' => 'layout3',
            'header' => 'header',
            'sidebar' => 'sidebar',
            'footer' => 'footer',
            'v_content' => 'dashboard2',
            'title' => 'Data Perkara',  
            'get_data_perkara' => $get_data_perkara, 
            'get_data_jadwal_limit' => $get_data_jadwal_limit,
            'get_data' => $get_data, 
             'getberita_limit' => $getberita_limit
        );

        $this->load->view($data['masterpage'], $data);

    }

 
}



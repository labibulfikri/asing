<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jadwal extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_jadwal');
    // $this->load->library('session');
  }

  function index (){
     
	$tgl1= date('Y-m-d'); 
//	$tgl2 = date('Y-m-d', strtotime('+3 days', strtotime($tgl1)));
	$tgl2 = 0 ;
    if ( $tgl2 == null ){
		
    $get_data = $this->m_jadwal->get_data_jadwal_limit($tgl1);
	}else{
	$get_data = $this->m_jadwal->get_data_jadwal_limit($tgl1,$tgl2);
		
	}
    
    


    
    $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'jadwal/getdata_jadwal',
        'title' => 'Data Perkara',  
		'tgl1' => $tgl1,
		'tgl2' => $tgl2,
		
		'get_data' => $get_data, 
         
    );

    $this->load->view($data['masterpage'], $data);
  }

  function gethari ($hari){
    $harinya = $hari;
    
    switch($harinya){
      case 'Sun':
       $getHari = "Minggu";
      break;
      case 'Mon': 
       $getHari = "Senin";
      break;
      case 'Tue':
       $getHari = "Selasa";
      break;
      case 'Wed':
       $getHari = "Rabu";
      break;
      case 'Thu':
       $getHari = "Kamis";
      break;
      case 'Fri':
       $getHari = "Jumat";
      break;
      case 'Sat':
       $getHari = "Sabtu";
      break;
      default:
       $getHari = "Salah"; 
      break;
  }
return $getHari;
    

  }


  function search_bytgl(){
	  
	 
    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');
	
    $get_data = $this->m_jadwal->get_data_jadwal($tgl_awal,$tgl_akhir);

	
    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'jadwal/getdata_jadwal',
      'title' => 'Data Perkara',  
	  'tgl1' => $tgl_awal,
	  'tgl2' => $tgl_akhir,
      'get_data' => $get_data,  
  );

  $this->load->view($data['masterpage'], $data);

    
  }


  function detail_jadwal (){
  $id_jadwal = $this->input->get('jadwal_id');
  $jadwal_perkara_id = $this->input->get('perkara_id');
  $perkara_no =$this->input->get('perkara_no');

  $berkas = $this->m_jadwal->getberkas($jadwal_perkara_id);
  
  $detail = $this->m_jadwal->getjadwal_detail($jadwal_perkara_id,$id_jadwal);
  $getperkara_id = $this->m_jadwal->getjadwal_perkara($jadwal_perkara_id,$id_jadwal);
  $getperkara = $this->m_jadwal->get_perkara($jadwal_perkara_id);


    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'jadwal/jadwaldetail',
      // 'v_content' => 'jadwal/dashboard3',
      'title' => 'Data Perkara',  
      'detail' => $detail, 
      'getperkara_id' => $getperkara_id, 
      'getperkara' => $getperkara, 
      'berkas' => $berkas,
      'perkara_id' => $jadwal_perkara_id,
	  'perkara_no'=>$perkara_no
  );

  $this->load->view($data['masterpage'], $data);

  }
  
  
  
function print_jadwal(){
	
	$data['tgl1'] = $this->input->get('tgl1'); 
	$data['tgl2'] = $this->input->get('tgl2');
	
	
	
  $data['get_data'] = $this->m_jadwal->get_data_laporan($data['tgl1'],$data['tgl2']); 
  
  
  $data['get_data_tun'] = $this->m_jadwal->get_data_laporan_tun($data['tgl1'],$data['tgl2']); 
  $data['get_data_pn'] = $this->m_jadwal->get_data_laporan_pn($data['tgl1'],$data['tgl2']); 
  $data['get_data_lain'] = $this->m_jadwal->get_data_laporan_lain($data['tgl1'],$data['tgl2']); 
  $data['get_data_agama'] = $this->m_jadwal->get_data_laporan_agama($data['tgl1'],$data['tgl2']); 
  
  
  
  $this->load->view('laporan/print_jadwal',$data);


}

}
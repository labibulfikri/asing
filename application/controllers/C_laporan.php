<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_laporan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_laporan');
    // $this->load->library('session');
  }

  function index (){
    $tahun = date('Y');
    
    $bulan = $this->input->post('bulan');

    $get_data = $this->m_laporan->get_data_laporan($tahun,$bulan);

    
    $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'laporan/getdata_laporan',
        'title' => 'Data Laporan', 
		'bulan' => $bulan,
		'tahun'=>$tahun,		
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

function print_lap(){
    $tahun = $this->input->get('tahun');
    $bulan = $this->input->get('bulan');
    $bulannya = $this->input->get('bulan');
  
       
	if($bulan =="Januari"){
		$bulan = "01";
	}else if ($bulan =="Februari"){
		$bulan = "02";
	}else if($bulan =="Maret"){
		$bulan = "03";
	}else if($bulan =="April"){
		$bulan = "04";
	}else if($bulan =="Mei"){
		$bulan = "05";
	}else if ($bulan =="Juni"){
		$bulan = "06";
	}else if ($bulan =="Juli"){
		$bulan = "07";
	}else if ($bulan =="Agustus"){
		$bulan = "08";
	}else if ($bulan =="September"){
		$bulan = "09";
	}else if ($bulan =="Oktober"){
		$bulan = "10";
	}else if ($bulan =="November"){
		$bulan = "11";
	}else if ($bulan =="Desember"){
		$bulan = "12";
	}else{
		$bulan = "-";
  }
 
  $data['get_data'] = $this->m_laporan->get_data_laporan($tahun,$bulan);
  $data['bulannya'] = $bulannya; 
  $data['tahun'] = $tahun;

  $this->load->view('laporan/print_laporan',$data);


}
  function search_byperiode(){
    $tahun = $this->input->post('tahun');
    $bulan = $this->input->post('bulan');
	

    $get_data = $this->m_laporan->get_data_laporan($tahun,$bulan);

    
	if($bulan =="01"){
		$bulan = "Januari";
	}else if ($bulan =="02"){
		$bulan = "Februari";
	}else if($bulan =="03"){
		$bulan = "Maret";
	}else if($bulan =="04"){
		$bulan = "April";
	}else if($bulan =="05"){
		$bulan = "Mei";
	}else if ($bulan =="06"){
		$bulan = "Juni";
	}else if ($bulan =="07"){
		$bulan = "Juli";
	}else if ($bulan =="08"){
		$bulan = "Agustus";
	}else if ($bulan =="09"){
		$bulan = "September";
	}else if ($bulan =="10"){
		$bulan = "Oktober";
	}else if ($bulan =="11"){
		$bulan = "November";
	}else if ($bulan =="12"){
		$bulan = "Desember";
	}else{
		$bulan = "-";
	}
	
	
    $data = array(
		'masterpage' => 'layout3',
		'header' => 'header',
		'sidebar' => 'sidebar',
		'footer' => 'footer',
		'v_content' => 'laporan/getdata_laporan',
		'title' => 'Data Perkara', 
		'bulan' => $bulan,
		'tahun'=>$tahun,		  
		'get_data' => $get_data,  
  );

  $this->load->view($data['masterpage'], $data);

    
  }


  function detail_jadwal (){
  $id_jadwal = $this->input->get('jadwal_id');
  $jadwal_perkara_id = $this->input->get('perkara_id');

  $berkas = $this->m_laporan->getberkas($jadwal_perkara_id);
  
  $detail = $this->m_laporan->getjadwal_detail($jadwal_perkara_id,$id_jadwal);
  $getperkara_id = $this->m_laporan->getjadwal_perkara($jadwal_perkara_id,$id_jadwal);
  $getperkara = $this->m_laporan->get_perkara($jadwal_perkara_id);


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
      'perkara_id' => $jadwal_perkara_id
  );

  $this->load->view($data['masterpage'], $data);

  }

}
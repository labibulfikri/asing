<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_perkara extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_perkara');
    // $this->load->library('session');
  }

  function index (){
    
    $get_data = $this->m_perkara->get_data_perkara(); 
    // var_dump($get_data);
    // exit();
    // $get_dataperkara = $this->m_perkara->get_data_perkara_to();
 
    
    $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'perkara/getdata_perkara',
        'title' => 'Data Perkara',  
        'get_data' => $get_data, 
        // 'get_dataperkara' => $get_dataperkara
    );

    $this->load->view($data['masterpage'], $data);
  }


  
  function detail_perkara (){

    $perkara_id=$this->input->get('perkara_id');
	
    $perkara_no=$this->input->get('perkara_no');
    $berkas = $this->m_perkara->getberkas($perkara_id);
    $detail = $this->m_perkara->getjadwal_detail($perkara_id);
    $getperkara_id = $this->m_perkara->getjadwal_perkara($perkara_id);
 
    $getperkara = $this->m_perkara->get_perkara($perkara_id);
 
      $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'jadwal/jadwaldetail',
        'title' => 'Data Perkara',  
        'detail' => $detail, 
        'getperkara_id' => $getperkara_id, 
        'getperkara' => $getperkara, 
        'berkas' => $berkas,
		'perkara_no' => $perkara_no,
        'perkara_id' => $perkara_id, 
    );
  
    $this->load->view($data['masterpage'], $data);
  
  }


  function print_detail(){
  
    $perkara_id=$this->input->get('perkara_id');
    $data['berkas'] = $this->m_perkara->getberkas($perkara_id);
  
    $data['detail'] = $this->m_perkara->getjadwal_detail($perkara_id);
    $data['getperkara_id'] = $this->m_perkara->getjadwal_perkara($perkara_id);
    $data['getperkara'] = $this->m_perkara->get_perkara($perkara_id);
  
    $this->load->view('perkara/print_detail_perkara', $data);
  
    

  }

  function export_excel(){
    $perkara_id=$this->input->get('perkara_id');
    $data['perkara_no']=$this->input->get('perkara_no');

    $data['berkas'] = $this->m_perkara->getberkas($perkara_id);
  
    $data['detail'] = $this->m_perkara->getjadwal_detail($perkara_id);
    $data['getperkara_id'] = $this->m_perkara->getjadwal_perkara($perkara_id);
    $data['getperkara'] = $this->m_perkara->get_perkara($perkara_id);
  
    $this->load->view('perkara/export_excel', $data);
  
  }

  function tambah_data_perkara(){

    $get_data = $this->m_perkara->get_data_perkara();

    
    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'perkara/input_perkara',
      'title' => 'Form Input Data',  
      'get_data' => $get_data
  );

  $this->load->view($data['masterpage'], $data);

  }

  function tambah_putusan(){
	  
	

    $id_perkara=$this->input->get('perkara_id');
	$get_data_id = $this->m_perkara->get_data_perkara_id($id_perkara);
	
    //$get_data_id = $this->m_perkara->get_data_perkara_id();
	 
    $tergugat = $get_data_id->perkara_tergugat;
    $penggugat = $get_data_id->perkara_penggugat; 
    
    
    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'footer' => 'footer',
      'sidebar' => 'sidebar',
      'v_content' => 'perkara/input_putusan',
      'title' => 'Form Input Putusan',   
      'perkara_id' => $id_perkara,
      'penggugat' => $penggugat,
      'tergugat' => $tergugat
  );

  $this->load->view($data['masterpage'], $data);

  }

  function tambah_jadwal(){

    $id_perkara=$this->input->get('perkara_id');
    $get_data = $this->m_perkara->get_data_perkara();

    
    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'footer' => 'footer',
      'sidebar' => 'sidebar',
      'v_content' => 'perkara/input_jadwal',
      'title' => 'Form Input Jadwal', 
      'get_data' => $get_data,
      'perkara_id' => $id_perkara
  );

  $this->load->view($data['masterpage'], $data);

  }
 

function edit_jadwal(){

  $perkara_id = $this->input->get('perkara_id');
  $jadwal_id = $this->input->get('jadwal_id');
  
  $getjadwal = $this->m_perkara->get_jadwal_row($perkara_id,$jadwal_id);
    
  $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'perkara/edit_jadwal',
        'title' => 'Data Perkara',  
        'getjadwal' => $getjadwal, 
        'perkara_id' => $perkara_id
    );
  
    $this->load->view($data['masterpage'], $data);
  
  }


  
  function update_data_jadwal(){

    $id= $this->input->post('jadwal_id');
    $jadwal_perkara_id= $this->input->post('jadwal_perkara_id');

    $data = array(  'jadwal_judul' => $this->input->post('jadwal_agenda'),
                    'jadwal_tgl' => $this->input->post('jadwal_tgl'),
                    'jadwal_waktu' => $this->input->post('jadwal_waktu'),
                    'jadwal_keterangan' => $this->input->post('jadwal_keterangan')
                ); 

    
    $update= $this->m_perkara->update_jadwal($id,$jadwal_perkara_id, $data);
    if ($update > 0 ){
      echo $this->session->set_flashdata('pesan', "Data Berhasil di Update");
      redirect("C_perkara/getdata_jadwal?perkara_id=$jadwal_perkara_id",'refresh');
      
  
    }else {
      echo "Gagal"; 
    }       
  }

  function getdata_putusan(){

    $id_perkara=$this->input->get('perkara_id');
    $get_data_putusan = $this->m_perkara->get_data_putusan($id_perkara);
  
	$getupload = $this->m_perkara->get_upload($id_perkara);
    
    
    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'perkara/getdata_putusan',
      'getupload' => $getupload,
      'title' => 'Data Putusan Perkara', 
      'get_data_putusan' => $get_data_putusan,
      'perkara_id' => $id_perkara
  );
  $this->load->view($data['masterpage'], $data);

  }


  
  function getdata_nonlit(){

    $id_perkara=$this->input->get('perkara_id');
    $get_data_putusan = $this->m_perkara->get_data_nonlit($id_perkara);
  

    
    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'perkara/getdata_putusan',
      'title' => 'Data Putusan Perkara', 
      'get_data_putusan' => $get_data_putusan,
      'perkara_id' => $id_perkara
  );
  $this->load->view($data['masterpage'], $data);

  }

  
  function getdata_jadwal(){

    $id_perkara=$this->input->get('perkara_id');
    $get_data_jadwal = $this->m_perkara->get_data_jadwal($id_perkara);
	$perkoro_no = $this->m_perkara->get_noperkara($id_perkara);
	$perkaranya = $perkoro_no[0]->perkara_no;
	
		 	
	

	
    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer', 
	  'perkara_no' => $perkaranya,
      'v_content' => 'perkara/getdata_jadwal',
      'title' => 'Data Putusan Perkara', 
      'get_data_jadwal' => $get_data_jadwal,
      'perkara_id' => $id_perkara
  );
  $this->load->view($data['masterpage'], $data);

  }


  
  function insert_data_perkara(){
    
    $get_data = $this->m_perkara->get_data_perkara();

    $data_insert = array('perkara_no' => $this->input->post('perkara_no'),
                        'perkara_tgl_masuk' =>$this->input->post('perkara_tgl_masuk'),
                        'perkara_alamat' =>$this->input->post('perkara_alamat'),
                        'perkara_pihak' =>$this->input->post('perkara_pihak'),
                        'perkara_jenis' =>$this->input->post('perkara_jenis'),
                        'perkara_tergugat' =>$this->input->post('perkara_tergugat'),
                        'perkara_penggugat' =>$this->input->post('perkara_penggugat'),
                        'perkara_kuasa_hukum' =>$this->input->post('perkara_kuasa_hukum'),
                        'perkara_objek' =>$this->input->post('perkara_objek'),
                        'perkara_aktiv' =>"y",
                      ); 

    $insert = $this->m_perkara->insertdata($data_insert);
    if ($insert > 0 ){ 
	
	$data_insert_detail = array( 'perkaradet_perkara_id' => $insert,
									 'perkaradet_no' => $this->input->post('perkara_no'),
									 'perkaradet_tingkat' => "Tingkat 1",
									 'perkaradet_pihak' => $this->input->post('perkara_tergugat').";&nbsp; ".$this->input->post('perkara_penggugat'), 
									 'perkaradet_status' => "Proses",
									 'perkaradet_aktiv' => "y"
									 );
									 
		$insert_det = $this->m_perkara->insertdata_det2($data_insert_detail);
		if ( $insert_det > 0 ){
			
      echo $this->session->set_flashdata('pesan', "Data Berhasil ditambahkan");
      redirect('C_perkara');
		}

    } else{
      echo "gagal";

    }
  }


     
  function insert_data_jadwal(){ 

    $perkara_id = $this->input->post('perkara_id');
    
    

    $data_insert = array(   'jadwal_judul' => $this->input->post('jadwal_agenda'),
                            'jadwal_perkara_id' => $perkara_id,
                            'jadwal_tgl' =>$this->input->post('jadwal_tgl'),
                            'jadwal_waktu' =>$this->input->post('jadwal_waktu'),
                            'jadwal_aktiv' => "y"

    ); 
    
    $insert = $this->m_perkara->insertdata_jadwal($data_insert,$perkara_id);
    if ($insert > 0 ){ 
      
      echo $this->session->set_flashdata('pesan', "Data Berhasil di Tambahkan");
      redirect("C_perkara/getdata_jadwal?perkara_id=$insert",'refresh');
      
      
    } else{
      echo "gagal";

    }

  }


     
  function insert_data_putusan(){
    
    // $get_data = $this->m_perkara->get_data_perkara();

    $tgl = date('Y-m-d');
    $jenis = $this->input->post('putusan_tingkat'); 
    $putusan_no = $this->input->post('putusan_no'); 
    $perkara_id = $this->input->post('perkara_id');
    
    

    $data_insert = array(   'perkaradet_no' => $putusan_no,
                            'perkaradet_created_date' =>$tgl,
                            'perkaradet_created_by' =>$this->session->userdata('nama'),
                            'perkaradet_end_date' =>$this->input->post('perkara_pihak'),
                            'perkaradet_pihak' =>$this->input->post('putusan_pihak'),
                            'perkaradet_tingkat' =>$this->input->post('putusan_tingkat'),
                            'perkaradet_perkara_id' => $perkara_id,
                            'perkaradet_status' =>$this->input->post('putusan_status'),
                            'perkaradet_tgl_putusan' =>$this->input->post('putusan_tgl'),
                            'perkaradet_aktiv' => "y"

    ); 
 
    $insert = $this->m_perkara->insertdata_det($data_insert,$perkara_id);
    if ($insert > 0 ){ 
      
      echo $this->session->set_flashdata('pesan', "Data Berhasil di Tambahkan");
      redirect("C_perkara/getdata_putusan?perkara_id=$insert",'refresh');
      
      
    } else{
      echo "gagal";

    }

  }

  // function detail_perkara()
  // {

  //   $perkara_id = $this->input->get('perkara_id');     
    
  //   $detail = $this->m_perkara->getjadwal_detail($perkara_id);
  //   $getperkara_id = $this->m_perkara->getjadwal_perkara($perkara_id);
  //   $getperkara = $this->m_perkara->get_perkara($perkara_id);
  
  
  //     $data = array(
  //       'masterpage' => 'layout3',
  //       'header' => 'header',
  //       'sidebar' => 'sidebar',
  //       'footer' => 'footer',
  //       'v_content' => 'jadwal/jadwaldetail',
  //       'title' => 'Data Perkara',  
  //       'detail' => $detail, 
  //       'getperkara_id' => $getperkara_id, 
  //       'getperkara' => $getperkara, 
  //   );

  //   $this->load->view($data['masterpage'], $data);

  // }


function input_edit(){

$id_perkara = $this->input->get('perkara_id');

$getperkara = $this->m_perkara->get_perkara_row($id_perkara);
  
$data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'perkara/edit_perkara',
      'title' => 'Data Perkara',  
      'getperkara' => $getperkara, 
  );

  $this->load->view($data['masterpage'], $data);

}



function input_edit_putusan(){

  $id_perkara = $this->input->get('perkara_id');
  $perkaradet_id = $this->input->get('perkaradet_id');
  
  $getputusan = $this->m_perkara->get_data_putusan_row($id_perkara,$perkaradet_id);
    
  $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'perkara/edit_putusan',
        'title' => 'Edit Putusan',  
        'getputusan' => $getputusan, 
        'perkara_id' =>$id_perkara
    );
  
    $this->load->view($data['masterpage'], $data);
  
  }



  
  function update_data_putusan(){

    $status= $this->input->post('perkaradet_status');
  
    // $id = $this->input->post('perkaradet_perkara_id');
    $perkaradet_id = $this->input->post('perkaradet_id');
    $perkara_id = $this->input->post('perkaradet_perkara_id');
    $data = array(  'perkaradet_no' => $this->input->post('perkaradet_no'),
                    'perkaradet_tingkat' => $this->input->post('perkaradet_tingkat'),
                    'perkaradet_status' => $this->input->post('perkaradet_status'),
                    'perkaradet_tgl_putusan' => $this->input->post('perkaradet_tgl_putusan'),
                    'perkaradet_pihak' => $this->input->post('perkaradet_pihak'),
                    'perkaradet_keterangan' => $this->input->post('perkaradet_keterangan'),
                ); 

    
    $update= $this->m_perkara->update_putusan($perkaradet_id,$perkara_id, $data);
    if ($update > 0 ){
      echo $this->session->set_flashdata('pesan', "Data Berhasil di Update");
      redirect("C_perkara/getdata_putusan?perkara_id=$update",'refresh');
  
    }else {
      echo "Gagal"; 
    }       
  }
  
  
  function update_data_perkara(){

    $id= $this->input->post('perkara_id');
    $data = array(  'perkara_no' => $this->input->post('perkara_no'),
                    'perkara_alamat' => $this->input->post('perkara_alamat'),
                    'perkara_tgl_masuk' => $this->input->post('perkara_tgl_masuk'),
                    'perkara_penggugat' => $this->input->post('perkara_penggugat'),
                    'perkara_tergugat' => $this->input->post('perkara_tergugat'),
                    'perkara_jenis' => $this->input->post('perkara_jenis'),
                    'perkara_objek' => $this->input->post('perkara_objek'),
                    'perkara_kuasa_hukum' => $this->input->post('perkara_kuasa_hukum'),
                ); 

    
    $update= $this->m_perkara->update($id, $data);
    if ($update > 0 ){
      echo $this->session->set_flashdata('pesan', "Data Berhasil di Update");
      redirect('C_perkara','refresh');
      
  
    }else {
      echo "Gagal"; 
    }       
  }


  
  function upload_file(){

    $perkara_id = $this->input->get('perkara_id');
    $perkaradet_id = $this->input->get('perkaradet_id');
    
    $getupload = $this->m_perkara->get_upload($perkara_id,$perkaradet_id);
      
    $data = array(
          'masterpage' => 'layout3',
          'header' => 'header',
          'sidebar' => 'sidebar',
          'footer' => 'footer',
          'v_content' => 'perkara/upload_file',
          'title' => 'Edit Putusan',  
          'getupload' => $getupload,
          'perkara_id' => $perkara_id,
          'perkaradet_id' => $perkaradet_id,

      );
    
      $this->load->view($data['masterpage'], $data);
    
    }



  public function fileUpload(){
    $perkara_id = $this->input->post('perkara_id');
    $perkaradet_id = $this->input->post('perkaradet_id');

    
    if ($_FILES and $_FILES['userfile']['name']) {
        // Start uploading file

        $config = array(
            'upload_path' => './assets/upload/',
            'allowed_types' => 'jpeg|jpg|png|pdf',
            'max_size' => '200048',
            'max_width' => '2000',
            'max_height' => '2000'
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('userfile')) {
            @unlink($config['upload_path'] . $this->input->post('ex_userfile'));
            // Upload file
            $file = $this->upload->data();
            $token=$this->input->post('token_foto');

            $this->db->insert('t_upload',array(
                            'name_berkas'=>$file['file_name'], 
                            'berkas_perkara_id'=>$perkara_id,
                            'berkas_perkaradet_id'=>$perkaradet_id,
                            'token' => $token
                        ));     

        }
    }  
}


function upload_file_kronologi(){

  $perkara_id = $this->input->get('perkara_id');
  $perkaradet_id = $this->input->get('perkaradet_id');
  
  $getupload = $this->m_perkara->get_upload_kronologi($perkara_id,$perkaradet_id);
    
  $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'perkara/upload_kronologi',
        'title' => 'Kronologi',  
        'getupload' => $getupload,
        'perkara_id' => $perkara_id,
        'perkaradet_id' => $perkaradet_id,

    );
  
    $this->load->view($data['masterpage'], $data);
  
  }

public function fileUpload_kronologi(){
  $perkara_id = $this->input->post('perkara_id');
  $perkaradet_id = $this->input->post('perkaradet_id');

  
  if ($_FILES and $_FILES['userfile']['name']) {
      // Start uploading file

      $config = array(
          'upload_path' => './assets/upload_kronologi/',
          'allowed_types' => 'jpeg|jpg|png|pdf',
          'max_size' => '200048',
          'max_width' => '2000',
          'max_height' => '2000'
      );
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('userfile')) {
          @unlink($config['upload_path'] . $this->input->post('ex_userfile'));
          // Upload file
          $file = $this->upload->data();
          $token=$this->input->post('token_foto');

          $this->db->insert('t_kronologi',array(
                          'name_berkas'=>$file['file_name'], 
                          'kronologi_perkara_id'=>$perkara_id,
                          'kronologi_perkaradet_id'=>$perkaradet_id,
                          'token' => $token
                      ));     

      }
  }  
}

//Untuk menghapus foto
function remove_foto_kronologi(){

  //Ambil token foto
  $token=$this->input->post('token');

  
  $foto=$this->db->get_where('t_kronologi',array('token'=>$token));


  if($foto->num_rows()>0){
    $hasil=$foto->row();
    $name_berkas=$hasil->name_berkas;
    if(file_exists($file=FCPATH.'./assets/upload/'.$name_berkas)){
      unlink($file);
    }
    $this->db->delete('t_kronologi',array('token'=>$token));

  }


  echo "{}";
}


    //Untuk menghapus foto
    function remove_foto(){

      //Ambil token foto
      $token=$this->input->post('token');
  
      
      $foto=$this->db->get_where('t_upload',array('token'=>$token));
  
  
      if($foto->num_rows()>0){
        $hasil=$foto->row();
        $name_berkas=$hasil->name_berkas;
        if(file_exists($file=FCPATH.'./assets/upload/'.$name_berkas)){
          unlink($file);
        }
        $this->db->delete('t_upload',array('token'=>$token));
  
      }
  
  
      echo "{}";
    }


    
    function delete_putusan(){

      $perkara_id = $this->input->post('perkara_id');
      $perkaradet_id = $this->input->post('perkaradet_id');

      $del = $this->m_perkara->delete($perkara_id,$perkaradet_id);

 
    }

    function inkrah_putusan(){

      $perkara_id = $this->input->post('perkara_id');
      $perkaradet_id = $this->input->post('perkaradet_id');

      $del = $this->m_perkara->inkrah($perkara_id,$perkaradet_id);

 
    }



    function delete_jadwal(){

      $perkara_id = $this->input->post('perkara_id');
      $jadwal_id = $this->input->post('jadwal_id');

      $del = $this->m_perkara->delete_jadwal($perkara_id,$jadwal_id);

 
    }
 
    function delete_perkara(){

      $perkara_id = $this->input->post('perkara_id'); 

      $del = $this->m_perkara->delete_perkara($perkara_id);

 
    }
 
    function search_detail (){
      $no_perkara=$this->input->post('no_perkara');
      $objek_masalah=$this->input->post('objek_masalah');

      
      $get_data = $this->m_perkara->get_data_perkara_detail($no_perkara,$objek_masalah);
      
      $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'perkara/getdata_perkara',
        'title' => 'Data Perkara',  
        'get_data' => $get_data
        // 'detail' => $detail, 
        // 'getperkara_id' => $getperkara_id, 
        // 'getperkara' => $getperkara, 
        // 'berkas' => $berkas,
        // 'perkara_id' => $perkara_id
    );
  
    $this->load->view($data['masterpage'], $data);
  
    }
    function search_perkara (){

      $search=$this->input->post('search');

      $get_data = $this->m_perkara->get_data_perkara_search($search);
      // $perkara_id= $getsearch->perkara_id;


      // $berkas = $this->m_perkara->getberkas($perkara_id);
    
      // $detail = $this->m_perkara->getjadwal_detail($perkara_id);
      // $getperkara_id = $this->m_perkara->getjadwal_perkara($perkara_id);
      // $getperkara = $this->m_perkara->get_perkara($perkara_id);
    
    
        $data = array(
          'masterpage' => 'layout3',
          'header' => 'header',
          'sidebar' => 'sidebar',
          'footer' => 'footer',
          'v_content' => 'perkara/getdata_perkara',
          'title' => 'Data Perkara',  
          'get_data' => $get_data
          // 'detail' => $detail, 
          // 'getperkara_id' => $getperkara_id, 
          // 'getperkara' => $getperkara, 
          // 'berkas' => $berkas,
          // 'perkara_id' => $perkara_id
      );
    
      $this->load->view($data['masterpage'], $data);
    
    }


}
 
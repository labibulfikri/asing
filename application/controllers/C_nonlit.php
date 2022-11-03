<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_nonlit extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_nonlit');
    $this->load->helper(array('string','text'));
    $this->load->library('session');
	
	if($this->session->userdata('status')!= "login"){
	
      redirect(base_url("c_login"));
	}
  }

  function index (){
	if($this->session->userdata('status')!= "login"){
	
      redirect(base_url("c_login"));
	}else {					
    $tgl = date('Y-m-d'); 
    
    $data_nonlit =  $this->m_nonlit->get_data();
	
	
    $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'nonlitigasi/getdata_nonlit',
        'data_nonlit' => $data_nonlit,
	    'title' => 'Data Nonlitigasi',
   
         
    );

    $this->load->view($data['masterpage'], $data);
  }
  }

  function add(){
   
    
    $data = array(
        'masterpage' => 'layout3',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'nonlitigasi/nonlitadd',
        'title' => 'Tambah Data Non litigasi',   
         
    );

    $this->load->view($data['masterpage'], $data);
      
  }

  function doAdd(){

    $tgl = $this->input->post('tgl_nonlit'); 
    

    $tgl2 = $this->input->post('tgl_resume'); 

   

    $dataArray = array( 'permohonan_nonlit' => $this->input->post('permohonan_nonlit') ,
                          'tgl_nonlit'      => $tgl
                          );
    
    $insert = $this->db->insert("t_nonlit",$dataArray);
    if($insert){
      echo $this->session->set_flashdata('pesan', "Data Berhasil ditambahkan");
      
      redirect('c_nonlit');
    }else{

      echo $this->session->set_flashdata('pesan', "Data Gagal  ditambahkan");
      redirect('c_nonlit');

    }
  } 

  function doAddResume(){
  
   $idnonlit = $this->input->post('id_nonlit');
    $dataArray = array( 'id_nonlit'       => $idnonlit ,
                          'tgl_resume'    => $this->input->post('tgl_resume'),
                          'judul_resume'    => $this->input->post('judul_resume'),
                          'hasil_resume'    => $this->input->post('hasil_resume'),
                          'saran'    => $this->input->post('saran'),
                          );
    
    $insert = $this->db->insert("t_resume",$dataArray);
    if($insert){
      echo $this->session->set_flashdata('pesan', "Data Berhasil ditambahkan");
     
      // $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
      redirect("c_nonlit/daftarResume/$idnonlit",'refresh');
    }else{

      echo $this->session->set_flashdata('pesan', "Data Gagal  ditambahkan");
      redirect("c_nonlit/daftarResume/$idnonlit",'refresh');

    }


  } 

  function addresume ($id){

    $resume = $this->m_nonlit->get_resume($id);
    $resumeRow = $this->m_nonlit->get_nonlitrow($id);

 

    
    $data = array(
          'masterpage' => 'layout3',
          'header' => 'header',
          'sidebar' => 'sidebar',
          'footer' => 'footer',
          'v_content' => 'nonlitigasi/addResume',
          'title' => 'Tambah Resume',  
          'idNonlit' => $id,
          'data_resume' =>$resume,
          'resume_row' => $resumeRow
          
      );
    
      $this->load->view($data['masterpage'], $data);
   
  }


  function daftarResume ($id){
   
   if($this->session->userdata('status')== "login"){
	$resume = $this->m_nonlit->get_resume($id);
    $resumeRow = $this->m_nonlit->get_nonlitrow($id); 
    
      $data = array(
          'masterpage' => 'layout3',
          'header' => 'header',
          'sidebar' => 'sidebar',
          'footer' => 'footer',
          'v_content' => 'nonlitigasi/daftarResume',
          'title' => 'Daftar Resume',  
          'idNonlit' => $id,
          'data_resume' =>$resume,
          // 'berkasnya' => $this->m_nonlit->getberkas_resume_berkas($id_resume),
          // 'permohonan_nonlit' => $resumeRow->permohonan_nonlit,
          'resumeRow' => $resumeRow
          
      ); 
      $this->load->view($data['masterpage'], $data);
      
   }else{
	   
      redirect(base_url("c_login"));

   } 
    
  }

  function download_nonlit($id_resume){
	  
    $berkasnya = $this->m_nonlit->getberkas_resume_berkas($id_resume);
  
	  
  }

  function edit_resume (){
    $id = $this->input->get('id_resume'); 
    $resume = $this->m_nonlit->get_resumeRow($id);
    $id_resume = $resume->id_resume;
	
    $berkas = $this->m_nonlit->getberkas_resume($id_resume);
    $berkasnya = $this->m_nonlit->getberkas_resume_berkas($id_resume);
   
	 
    
    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'nonlitigasi/editResume',
      'title' => ' Edit Resume',  
	  'berkas' => $berkas,
	  'berkasnya' => $berkasnya,
      'resume' => $resume
  );
  
  $this->load->view($data['masterpage'], $data);   

  }

  function doEditResume (){

    $id_resume = $this->input->post('id_resume'); 
    $id_nonlit = $this->input->post('id_nonlit'); 
     
    $dataArray = array( 'judul_resume' => $this->input->post('judul_resume'),
                        'tgl_resume' => $this->input->post('tgl_resume'),
                        'saran' => $this->input->post('saran'),
                        'hasil_resume' => $this->input->post('hasil_resume'),
                        );
    $result = $this->m_nonlit->update_resume($id_resume, $dataArray);
    
    if($result){
      echo $this->session->set_flashdata('pesan', "Data Berhasil ditambahkan");
     
      // $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
      redirect("c_nonlit/daftarResume/$id_nonlit",'refresh');
    }else{

      echo $this->session->set_flashdata('pesan', "Data Gagal  ditambahkan");
      redirect("c_nonlit/daftarResume/$id_nonlit",'refresh');

    }
  }

  function edit_nonlit ($id){
	  
	  if ($this->session->userdata('status') != "login"){
		  redirect ('http://aseng.surabaya.go.id/c_login');
	  }
	  else{

    $nonlitRow = $this->m_nonlit->getnonlit_id($id);
	
	
    $data = array(
      'masterpage' => 'layout3',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'nonlitigasi/edit_nonlit',
      'title' => ' Edit Nonlitigasi',  
      'nonlitRow' => $nonlitRow
  );
  
  $this->load->view($data['masterpage'], $data);  
	  }  

  }

  public function doEdit(){

    $id = $this->input->post('id_nonlit');
    $dataArray = array(
                        'tgl_nonlit' => $this->input->post('tgl_nonlit'),  
                        'permohonan_nonlit' => $this->input->post('permohonan_nonlit')  
                      );
     
    $result = $this->m_nonlit->update($id, $dataArray);
    if($result >= 0 ){
      echo $this->session->set_flashdata('pesan', "Data Berhasil diperbarui");
     
      // $this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
      redirect("c_nonlit",'refresh');
    }else{

      echo $this->session->set_flashdata('pesan', "Data Gagal  ditambahkan");
      redirect("c_nonlit",'refresh');

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
    $id_resume = $this->input->post('id_resume');
    // $perkaradet_id = $this->input->post('perkaradet_id');

    
    if ($_FILES and $_FILES['userfile']['name']) {
        // Start uploading file

        $config = array(
            'upload_path' => './assets/berkas_nonlit/3/',
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

            $this->db->insert('t_upload_resume',array(
                            'name_berkas'=>$file['file_name'], 
                            'id_resume'=>$id_resume,
                            'token' => $token
                        ));     

        }
    }  
}

//Untuk menghapus foto
function remove_berkas_resume(){

    //Ambil token foto
    $token=$this->input->post('token'); 
     

    
    $foto=$this->db->get_where('t_upload_resume',array('token'=>$token));


    if($foto->num_rows()>0){
      $hasil=$foto->row();
      $name_berkas=$hasil->name_berkas;
      if(file_exists($file=FCPATH.'./assets/berkas_nonlit/'.$name_berkas)){
        unlink($file);
      }
      $this->db->delete('t_upload_resume',array('token'=>$token));

    }


    echo "{}";
  }
  
  
//Untuk menghapus foto
function remove_nonlit(){

    //Ambil token foto
    $id_nonlit=$this->input->post('id_nonlit'); 
     

    
    //$foto=$this->db->get_where('t_nonlit',array('id_nonlit'=>$token));


    //if($foto->num_rows()>0){
      
      $this->db->delete('t_nonlit',array('id_nonlit'=>$id_nonlit));

    //}
    echo "{}";


  }
 
 
}
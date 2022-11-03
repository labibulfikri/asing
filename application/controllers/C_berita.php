<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_berita extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_berita');
    $this->load->helper(array('string','text'));
    // $this->load->library('session');
  }

  function index (){
    $tgl = date('Y-m-d');
    
    // echo $harinya;
    
    
    $get_data =  $this->m_berita->get_berita();
    $berita_id =  $this->m_berita->last_id();
    
  

    foreach($berita_id as $key){
        $idnya = $key->idnya;
      }
    $data = array(
        'masterpage' => 'layout',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'berita/berita',
        'title' => 'Data Berita', 
        'berita_id' =>  $idnya,  
        'get_data' =>  $get_data,   
         
    );

    $this->load->view($data['masterpage'], $data);
  }

  function input_berita(){

    $berita_id =  $this->m_berita->last_id();

    foreach($berita_id as $key){
        $idnya = $key->idnya;
    }    
    
    $data = array(
        'masterpage' => 'layout',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'berita/berita_input',
        'title' => 'Data Perkara',  
        'berita_id' =>  $idnya, 
         
    );

    $this->load->view($data['masterpage'], $data);
      
  }
  
  function insert_data_berita(){
    
    // $get_data = $this->m_berita->get_data_perkara();

    $data_insert = array('berita_judul' => $this->input->post('berita_judul'),
                        'berita_tgl' =>$this->input->post('berita_tgl'),
                        'berita_isi' =>$this->input->post('berita_isi'),
                        'berita_aktiv' =>"y",
                      ); 
 

    $insert = $this->m_berita->insertdata($data_insert);
    if ($insert > 0 ){ 
      echo $this->session->set_flashdata('pesan', "Data Berhasil ditambahkan");
      redirect('C_berita');

    } else{
      echo "gagal";

    }
  }


  function update_data_berita(){

    $id = $this->input->post('berita_id');
     
    $data_update = array('berita_judul' => $this->input->post('berita_judul'),
                        'berita_tgl' =>$this->input->post('berita_tgl'),
                        'berita_isi' =>$this->input->post('berita_isi'),
                        'berita_aktiv' =>"y",
                      ); 
                     
 

    $update = $this->m_berita->update_berita($data_update,$id);
    if ($update > 0 ){ 
      echo $this->session->set_flashdata('pesan', "Data Berhasil ditambahkan");
      redirect('C_berita');

    } else{
      echo "gagal";

    }
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
      'masterpage' => 'layout',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'jadwal/getdata_jadwal',
      'title' => 'Data Perkara',  
      'get_data' => $get_data,  
  );

  $this->load->view($data['masterpage'], $data);

    
  }


  function detail_berita (){
  $berita_id = $this->input->get('berita_id');
  
  $getberita = $this->m_berita->get_berita_id_row($berita_id);
  
  $get_data =  $this->m_berita->get_berita();
 



    $data = array(
      'masterpage' => 'layout',
      'header' => 'header',
      'sidebar' => 'sidebar',
      'footer' => 'footer',
      'v_content' => 'berita/berita_view',
      'title' => 'Data Perkara',   
      'getberita' => $getberita,  
      'getdata' => $get_data,  
      
  );

  $this->load->view($data['masterpage'], $data);

  }


  function upload_file(){

    $perkara_id = $this->input->get('perkara_id');
    $perkaradet_id = $this->input->get('perkaradet_id');
    
    $getupload = $this->m_perkara->get_upload($perkara_id,$perkaradet_id);
      
    $data = array(
          'masterpage' => 'layout',
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
    $berita_id = $this->input->post('berita_id');
    // $perkaradet_id = $this->input->post('perkaradet_id');

    
    if ($_FILES and $_FILES['userfile']['name']) {
        // Start uploading file

        $config = array(
            'upload_path' => './assets/upload_berita/',
            'allowed_types' => 'jpeg|jpg|png|pdf',
            'max_size' => '2048',
            'max_width' => '2000',
            'max_height' => '2000'
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('userfile')) {
            @unlink($config['upload_path'] . $this->input->post('ex_userfile'));
            // Upload file
            $file = $this->upload->data();
            $token=$this->input->post('token_foto');

            $this->db->insert('t_foto_berita',array(
                            'name_berkas'=>$file['file_name'], 
                            'foto_berita_id'=>$berita_id,
                            'token' => $token
                        ));     

        }
    }  
}

//Untuk menghapus foto
function remove_foto(){

    //Ambil token foto
    $token=$this->input->post('token'); 
     

    
    $foto=$this->db->get_where('t_foto_berita',array('token'=>$token));


    if($foto->num_rows()>0){
      $hasil=$foto->row();
      $name_berkas=$hasil->name_berkas;
      if(file_exists($file=FCPATH.'./assets/upload_berita/'.$name_berkas)){
        unlink($file);
      }
      $this->db->delete('t_foto_berita',array('token'=>$token));

    }

    echo "{}";
  }

  function edit_berita(){

   $berita_id = $this->input->get('berita_id');
  //  $foto_id = $this->input->get('foto_id');

    $getdata = $this->m_berita->get_berita_id($berita_id); 
    $getfoto = $this->m_berita->get_berita_id_foto($berita_id); 


    $data = array(
        'masterpage' => 'layout',
        'header' => 'header',
        'sidebar' => 'sidebar',
        'footer' => 'footer',
        'v_content' => 'berita/berita_edit',
        'title' => 'Update data Berita',  
        'getdata' => $getdata,        
        'getfoto' => $getfoto,        
    );
   
   $this->load->view($data['masterpage'], $data);

  }


  
  function delete_berita(){

    $berita_id = $this->input->post('berita_id'); 

    $del = $this->m_berita->delete_berita($berita_id);


  }


}
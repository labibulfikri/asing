<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

 public function __construct()
    {
        parent::__construct();
    }
	function verify ($tabel,$where){
		return $this->db->get_where($tabel,$where);

    }
     

     function get_upload($perkara_id,$perkaradet_id)
     {
          $sql = $this->db->query("SELECT * from t_upload
                                   join t_perkara_detail on perkaradet_id = berkas_perkaradet_id
                                   WHERE berkas_perkara_id =$perkara_id and berkas_perkaradet_id= $perkaradet_id")->result();
          return $sql;
           
     }

     function get_upload_kronologi($perkara_id,$perkaradet_id)
     {
          $sql = $this->db->query("SELECT * from t_kronologi
                                   join t_perkara on perkara_id = kronologi_perkara_id
                                   WHERE kronologi_perkara_id =$perkara_id")->result();
          return $sql;
           
     }


     function get_data_putusan_row($id_perkara,$perkaradet_id)
     {
          $sql = $this->db->query("SELECT * from t_perkara
                                    join t_perkara_detail on perkaradet_perkara_id = perkara_id
                                    where perkara_id = $id_perkara and perkaradet_id = $perkaradet_id and perkaradet_aktiv !='t'")->row();
          return $sql;
           
     }


     function get_data_putusan($id_perkara)
     {
          $sql = $this->db->query("SELECT * from t_perkara
                                    join t_perkara_detail on perkaradet_perkara_id = perkara_id
                                    where perkara_id = $id_perkara and perkaradet_aktiv !='t'")->result();
          return $sql;
           
     }


     function get_data_nonlit($id_perkara)
     {
          $sql = $this->db->query("SELECT * from t_perkara
                                    join t_perkara_detail on perkaradet_perkara_id = perkara_id
                                    where perkara_id = $id_perkara and perkaradet_aktiv !='t'")->result();
          return $sql;
           
     }


     function get_data_jadwal($id_perkara)
     {
          $sql = $this->db->query("SELECT * from t_jadwal
                                    join t_perkara on perkara_id = jadwal_perkara_id
                                    where jadwal_perkara_id = $id_perkara and jadwal_aktiv= 'y'")->result();
          return $sql;
           
     }

     function insertdata($data){
        $exe = $this->db->insert('t_berita', $data);
        $berita_id = $this->db->insert_id();

        if ($exe) {
             return '1';
        } else {
             return '0';
        }

     }
     public function update_berita($data, $id)
       {
           $exe = $this->db->where('berita_id', $id);
           $exe = $this->db->update('t_berita', $data);
           if ($exe) {
               return '1';
           } else {
               return '0';
           }
       }



     function last_id(){

        $sql = $this->db->query("SELECT MAX(berita_id)+1 as idnya FROM t_berita")->result();
        return $sql;
     }


     function insertdata_jadwal($data,$id){
          $id = $id;
          $exe = $this->db->insert('t_jadwal', $data);
          $perkara_id = $this->db->insert_id();
          
          if ($exe) {
               return $id;
          } else {
               return '0';
          }
  
       }


     function insertdata_det($data,$id){
          $id_perkara = $id;
          $exe = $this->db->insert('t_perkara_detail', $data);
          $perkara_id = $this->db->insert_id();
  
          if ($exe) {
               return $id_perkara;
          } else {
               return '0';
          }
  
       }

      
      
       function get_berita ()
       {
           $sql = $this->db->query("SELECT * FROM t_berita 
                                   left join t_foto_berita on foto_berita_id = berita_id
                                    where berita_aktiv = 'y'
                                   group by berita_id ")->result();
           
           return $sql;           
       }

       function get_berita_limit ()
       {
           $sql = $this->db->query("SELECT * FROM t_berita 
                                left join t_foto_berita on foto_berita_id = berita_id
                                where berita_aktiv = 'y'
                                group by berita_id ORDER BY berita_tgl
                                desc limit 5 ")->result();
           
           return $sql;           
       }

       function get_berita_id ($berita_id)
       {
           $sql = $this->db->query("SELECT * FROM t_berita 
                                   left join t_foto_berita on foto_berita_id = berita_id
                                   where berita_id = $berita_id 
                                    group by berita_id")->result();
           return $sql;           
       }

       function get_berita_id_row ($berita_id)
       {
           $sql = $this->db->query("SELECT * FROM t_berita 
                                   left join t_foto_berita on foto_berita_id = berita_id
                                   where berita_id = $berita_id 
                                    group by berita_id")->row();
           return $sql;           
       }


       function get_berita_id_foto ($berita_id)
       {
           $sql = $this->db->query("SELECT * FROM t_foto_berita 
                                   where foto_berita_id = $berita_id 
                                    group by foto_berita_id")->result();
           return $sql;           
       }


       function delete_berita($berita_id)
       {
          $exe = $this->db->set('berita_aktiv', 't'); 
          $exe = $this->db->where('berita_id', $berita_id);
          $exe = $this->db->update('t_berita');

          
          if ($exe) {
              return '1';
          } else {
              return '0';
          }
  
       }


       function get_jadwal_row ($perkara_id,$jadwal_id)
       {
   
           $sql = $this->db->query("SELECT * FROM t_jadwal 
                                   where jadwal_perkara_id = $perkara_id and jadwal_id = $jadwal_id
                                   ")->row();
           return $sql;
           
       }
       


       public function update($id, $data)
       {
           $exe = $this->db->where('perkara_id', $id);
           $exe = $this->db->update('t_perkara', $data);
           if ($exe) {
               return '1';
           } else {
               return '0';
           }
       }

       
       public function update_putusan($id,$perkara_id, $data)
       {
          $perkara_id = $perkara_id;
           $exe = $this->db->where('perkaradet_id', $id);
           $exe = $this->db->update('t_perkara_detail', $data);
           if ($exe) {
               return $perkara_id;
           } else {
               return '0';
           }
       }
       
       public function update_jadwal($jadwal_id,$jadwal_perkara_id, $data)
       {
           $exe = $this->db->where('jadwal_id', $jadwal_id);
           $exe = $this->db->where('jadwal_perkara_id', $jadwal_perkara_id);
           $exe = $this->db->update('t_jadwal', $data);
           if ($exe) {
               return $jadwal_perkara_id;
           } else {
               return '0';
           }
       }


       function delete($perkara_id, $perkaradet_id)
       {
          $exe = $this->db->set('perkaradet_aktiv', 't');
          $exe = $this->db->where('perkaradet_id', $perkaradet_id);
          $exe = $this->db->where('perkaradet_perkara_id', $perkara_id);
          $exe = $this->db->update('t_perkara_detail');

          $a = $this->db->last_query($exe); 
          print_r($a);
           exit();
          
          if ($exe) {
              return '1';
          } else {
              return '0';
          }
  
       }

       
       function inkrah($perkara_id, $perkaradet_id)
       {
          $exe = $this->db->set('perkaradet_aktiv', 'inkrah');
          $exe = $this->db->where('perkaradet_id', $perkaradet_id);
          $exe = $this->db->where('perkaradet_perkara_id', $perkara_id);
          $exe = $this->db->update('t_perkara_detail');

          $a = $this->db->last_query($exe); 
          print_r($a);
           exit();
          
          if ($exe) {
              return '1';
          } else {
              return '0';
          }
  
       }

       function delete_jadwal($perkara_id, $jadwal_id)
       {
          $exe = $this->db->set('jadwal_aktiv', 't');
          $exe = $this->db->where('jadwal_id', $jadwal_id);
          $exe = $this->db->where('jadwal_perkara_id', $perkara_id);
          $exe = $this->db->update('t_jadwal');
          
          if ($exe) {
              return '1';
          } else {
              return '0';
          }
  
       }

       function delete_perkara($perkara_id)
       {
          $exe = $this->db->set('perkara_aktiv', 't'); 
          $exe = $this->db->where('perkara_id', $perkara_id);
          $exe = $this->db->update('t_perkara');

          
          if ($exe) {
              return '1';
          } else {
              return '0';
          }
  
       }


     function getjadwal_detail($perkara_id)
       {
   
           $sql = $this->db->query("SELECT * FROM t_jadwal
                                   join t_perkara on perkara_id = jadwal_perkara_id
                                   where jadwal_perkara_id=$perkara_id")->result();
           
           return $sql;
           
       }

       
    function getberkas($perkara_id)
    {
     $sql = $this->db->query("SELECT * from t_upload where berkas_perkara_id =$perkara_id")->result();
     
     return $sql;     
     }

     
    function getjadwal_perkara ($perkara_id)
    {

        $sql = $this->db->query("SELECT * FROM t_perkara 
                                join t_perkara_detail on perkaradet_perkara_id = perkara_id
                                where perkara_id= $perkara_id  
                                ")->result();
        
        return $sql;
        
    }

    function get_perkara_row ($perkara_id)
    {

        $sql = $this->db->query("SELECT * FROM t_perkara 
                                -- join t_perkara_detail on perkaradet_perkara_id = perkara_id
                                where perkara_id= $perkara_id  
                                ")->row();
        
        return $sql;
        
    }

    function get_data_search($search){

     $sql = $this->db->query("SELECT * FROM t_perkara 
                              join t_perkara_detail on perkaradet_perkara_id = perkara_id
                              where perkara_alamat LIKE '%$search%' or perkaradet_no LIKE '%$search%'  
     ")->result();
     
     return $sql;

    }
  

}
 
?>

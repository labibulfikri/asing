<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perkara extends CI_Model {

 public function __construct()
    {
        parent::__construct();
    }
	function verify ($tabel,$where){
		return $this->db->get_where($tabel,$where);

    }
    
     function get_data_perkara()
     {
			$sql = $this->db->query("SELECT 

								judul,
								tanggalnya,

								--  id,
									perkara_id,
									perkara_no,
									perkaradet_no,
									perkara_alamat,
									perkara_tergugat,
									perkara_objek,
									perkara_penggugat,
									perkara_kuasa_hukum,
									perkara_status,
									perkara_jenis,
									DATEDIFF(now(), perkara_tgl_masuk) AS telat2,
									DATEDIFF(
										now(),
										perkaradet_tgl_putusan
									) AS telat1,
									perkaradet_status,
									perkara_tgl_masuk,
									perkaradet_tingkat,
									perkaradet_id,
									CASE
									WHEN perkaradet_tingkat = 'PK'
								AND perkaradet_aktiv = 'y'  
								AND perkaradet_status != 'proses' THEN
									'Sudah Putusan PK'
								
								WHEN perkaradet_tingkat = 'Kasasi'
								AND perkaradet_aktiv = 'y'  
								AND perkaradet_status != 'proses' THEN
									'Sudah Putusan Kasasi'
								
								WHEN perkaradet_tingkat = 'Banding'
								AND perkaradet_aktiv = 'y'  
								AND perkaradet_status != 'proses' THEN
									'Sudah Putusan Banding' 
								
								WHEN perkaradet_tingkat = 'Tingkat 1'
								AND perkaradet_aktiv = 'y'  
								AND perkaradet_status != 'proses' THEN
									'Sudah Putusan Tingkat 1'
									
								WHEN perkaradet_tingkat = 'sela'
								AND perkaradet_aktiv = 'y' 
								AND perkaradet_status != 'proses' THEN
									'Sudah Putusan Sela'
									
								
								ELSE
									'Proses'
								END AS STATUS
								FROM
									t_perkara

								LEFT JOIN (
									SELECT
									MAX(jadwal_judul) as judul,
MAX(jadwal_id) as idnya,
								jadwal_perkara_id,
								MAX(jadwal_tgl) as tanggalnya ,
								jadwal_aktiv
									FROM
										t_jadwal
								where 
								jadwal_aktiv = 'y'

										GROUP BY
										jadwal_perkara_id,
										jadwal_id

									ORDER BY
 										jadwal_id desc
-- 								judul

								) t_jadwal ON (
									t_jadwal.jadwal_perkara_id = t_perkara.perkara_id
								)
								 

								LEFT JOIN (
									SELECT
										*
									FROM
										t_perkara_detail
									GROUP BY
										perkaradet_perkara_id,
										perkaradet_id
									ORDER BY
										perkaradet_id DESC
								) t_perkara_detail ON (
									t_perkara_detail.perkaradet_perkara_id = t_perkara.perkara_id
								)
								 
								-- LEFT JOIN t_jadwal on t_jadwal.jadwal_perkara_id = t_perkara.perkara_id

								WHERE
									perkara_aktiv = 'y'
								--  and jadwal_aktiv = 'y'
								-- and jadwal_id in (SELECT max(jadwal_id) from t_jadwal GROUP BY jadwal_perkara_id)

								GROUP BY

									perkaradet_perkara_id,
									perkara_id,
								jadwal_perkara_id

								ORDER BY 
								idnya desc,
								tanggalnya desc,
								perkaradet_id desc
")->result();

          return $sql;
           
     }
	 
	 
	 
     function get_data_perkara_id($id)
     {
          $sql = $this->db->query("SELECT perkara_id,
                                             perkara_no,
                                             perkaradet_no,
                                             perkara_alamat,
                                             perkara_tergugat,
                                             perkara_objek,
                                             perkara_penggugat,
											 perkara_kuasa_hukum,
                                             perkara_status,
                                             perkara_jenis,
                                             DATEDIFF(now(), perkara_tgl_masuk) AS telat2,
                                             DATEDIFF(now(), perkaradet_tgl_putusan) AS telat1,
                                             perkara_tgl_masuk,
                                        perkaradet_tingkat,
                                        perkaradet_id,

                                        CASE
                                             WHEN perkaradet_tingkat = 'Banding'
                                             AND perkaradet_aktiv = 'y'  
											 and perkaradet_status != 'proses' THEN
											 
                                                  'Sudah Putusan Banding'

                                             WHEN perkaradet_tingkat = 'Kasasi'
                                             AND perkaradet_aktiv = 'y'  
											 and perkaradet_status != 'proses' THEN
                                                  'Sudah Putusan Kasasi'

                                             WHEN perkaradet_tingkat = 'Tingkat 1'
                                             AND perkaradet_aktiv = 'y'  
											 and perkaradet_status != 'proses' THEN
                                                  'Sudah Putusan Tingkat 1'

											WHEN perkaradet_tingkat = 'sela'
											AND perkaradet_aktiv = 'y'  
											AND perkaradet_status != 'proses' THEN
												'Sudah Putusan Sela'
												
                                             WHEN perkaradet_tingkat = 'PK'
                                             AND perkaradet_aktiv = 'y' 
											 and perkaradet_status != 'proses' THEN
                                                  'Sudah Putusan PK'

                                             ELSE
                                                  'Proses'
                                             END AS status

                                                  
                                        FROM
                                             t_perkara 
                                        
                                        LEFT JOIN (
                                             SELECT
                                                  *
                                             FROM
                                                  t_perkara_detail 
                                             GROUP BY
                                             perkaradet_perkara_id, perkaradet_id
                                        
                                             ORDER BY
                                                  perkaradet_id desc
                                        
                                        ) t_perkara_detail ON (
                                             t_perkara_detail.perkaradet_perkara_id = t_perkara.perkara_id
                                        )
                                        where perkara_aktiv = 'y' and perkara_id = '$id'
                                        GROUP BY perkaradet_perkara_id,perkara_id
                                        ORDER BY perkaradet_id DESC")->row();

          return $sql;
           
     }

 function get_data_perkara_detail($no_perkara,$objek_masalah)
     {

          

          $sql = "SELECT perkara_id,
                                             perkara_no,
                                             perkara_alamat,
                                             perkara_tergugat,
                                             perkara_penggugat,
                                             perkara_status,
                                             perkara_jenis,
                                             perkara_objek,
                                             DATEDIFF(now(), perkara_tgl_masuk) AS telat2,
                                             DATEDIFF(now(), perkaradet_tgl_putusan) AS telat1,
                                             perkara_tgl_masuk,
                                        perkaradet_tingkat,
                                        perkaradet_id,

                                        CASE
                                             WHEN perkaradet_tingkat = 'Banding'
                                             AND perkaradet_aktiv = 'y' THEN
                                                  'Sudah Putusan Banding'

                                             WHEN perkaradet_tingkat = 'Kasasi'
                                             AND perkaradet_aktiv = 'y' THEN
                                                  'Sudah Putusan Kasasi'

                                             WHEN perkaradet_tingkat = 'Tingkat 1'
                                             AND perkaradet_aktiv = 'y' THEN
                                                  'Sudah Putusan Tingkat 1'

											WHEN perkaradet_tingkat = 'sela'
											AND perkaradet_aktiv = 'y' 
											AND perkaradet_status != 'proses' THEN
												'Sudah Putusan Sela'
												
                                             WHEN perkaradet_tingkat = 'PK'
                                             AND perkaradet_aktiv = 'y' THEN
                                                  'Sudah Putusan PK'

                                             ELSE
                                                  'Proses'
                                             END AS status

                                                  
                                        FROM
                                             t_perkara 
                                        
                                        LEFT JOIN (
                                             SELECT
                                                  *
                                             FROM
                                                  t_perkara_detail 
                                             GROUP BY
                                             perkaradet_perkara_id, perkaradet_id
                                        
                                             ORDER BY
                                                  perkaradet_id desc
                                        
                                        ) t_perkara_detail ON (
                                             t_perkara_detail.perkaradet_perkara_id = t_perkara.perkara_id
                                        )";
                                       
                                        
                                        if($no_perkara != "" && $objek_masalah != "" ) {

                                             $sql .="where perkara_no like '%$no_perkara%' 
                                                     and objek_masalah like '%$objek_masalah%";
                                        }else if ($objek_masalah != ""){
                                             $sql .="where perkara_alamat like '%$objek_masalah%'";
                                        
                                        }else{
                                             $sql .="where perkara_no like '%$no_perkara%'";
                                        }
                                        
                                        $sql .=" and perkara_aktiv ='y' GROUP BY perkaradet_perkara_id
                                        ORDER BY perkaradet_id DESC";

                                      
$sql2 = $this->db->query($sql)->result();
                                        
                                        
// $a = $this->db->last_query($sql);
// print_r($a);
// exit();
          return $sql2;
           
     }

     function get_data_perkara_search($search)
     {
          $sql = $this->db->query("SELECT perkara_id,
                                             perkara_no,
                                             perkara_alamat,
                                             perkara_tergugat,
                                             perkara_penggugat,
                                             perkara_status,
											 perkara_objek,
                                             perkara_jenis,
                                             DATEDIFF(now(), perkara_tgl_masuk) AS telat2,
                                             DATEDIFF(now(), perkaradet_tgl_putusan) AS telat1,
                                             perkara_tgl_masuk,
                                        perkaradet_tingkat,
                                        perkaradet_id,

                                        CASE
                                             WHEN perkaradet_tingkat = 'Banding'
                                             AND perkaradet_aktiv = 'y' THEN
                                                  'Sudah Putusan Banding'

                                             WHEN perkaradet_tingkat = 'Kasasi'
                                             AND perkaradet_aktiv = 'y' THEN
                                                  'Sudah Putusan Kasasi'

                                             WHEN perkaradet_tingkat = 'Tingkat 1'
                                             AND perkaradet_aktiv = 'y' THEN
                                                  'Sudah Putusan Tingkat 1'

                                             WHEN perkaradet_tingkat = 'PK'
                                             AND perkaradet_aktiv = 'y' THEN
                                                  'Sudah Putusan PK'

                                             ELSE
                                                  'Proses'
                                             END AS status

                                                  
                                        FROM
                                             t_perkara 
                                        
                                        LEFT JOIN (
                                             SELECT
                                                  *
                                             FROM
                                                  t_perkara_detail 
                                             GROUP BY
                                             perkaradet_perkara_id, perkaradet_id
                                        
                                             ORDER BY
                                                  perkaradet_id desc
                                        
                                        ) t_perkara_detail ON (
                                             t_perkara_detail.perkaradet_perkara_id = t_perkara.perkara_id
                                        )
                                        where perkara_aktiv = 'y'
                                        and perkara_alamat like '%$search%'
                                        --  or perkaradet_no like '%$search%' 
                                        GROUP BY perkaradet_perkara_id
                                        ORDER BY perkaradet_id DESC")->result();

// $a = $this->db->last_query($sql);
// print_r($a);
// exit();
          return $sql;
           
     }

     function get_upload($perkara_id)
     {
          $sql = $this->db->query("SELECT * from t_upload
                                   join t_perkara on perkara_id = berkas_perkara_id
                                   WHERE berkas_perkara_id =$perkara_id")->result();
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

     function get_data_jadwal($id_perkara)
     {
          $sql = $this->db->query("SELECT * from t_jadwal
                                   join t_perkara on perkara_id = jadwal_perkara_id
                                    where jadwal_perkara_id = $id_perkara and jadwal_aktiv= 'y' order by jadwal_tgl desc")->result();
									
			
			//echo $this->db->last_query(); 
          return $sql;
           
     }
	 
	  function get_noperkara($id_perkara)
     {
          $sql = $this->db->query("SELECT * from t_perkara
                                   where perkara_id = $id_perkara ")->result();
												
			//echo $this->db->last_query(); 
          return $sql;
           
     }

     function insertdata($data){
        $exe = $this->db->insert('t_perkara', $data);
        $perkara_id = $this->db->insert_id();

        if ($exe) {
             return $perkara_id ;
        } else {
             return '0';
        }

     }
	 
	   function insertdata_det2($data){
        $exe = $this->db->insert('t_perkara_detail', $data);
        $perkaradet_id = $this->db->insert_id();

        if ($exe) {
             return $perkaradet_id ;
        } else {
             return '0';
        }

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

      
      
       function get_perkara ($perkara_id)
       {
   
           $sql = $this->db->query("SELECT * FROM t_perkara 
                                    join t_perkara_detail on perkaradet_perkara_id = perkara_id
                                   where perkara_id= $perkara_id  
                                   ORDER BY perkaradet_id desc limit 1
								   ")->result();
           
           return $sql;
           
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
          $exe = $this->db->set('perkaradet_inkrah', '1');
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
                                   where jadwal_perkara_id=$perkara_id and jadwal_aktiv = 'y' order by jadwal_tgl desc")->result();
           
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
	
	function get_upload_kronologi($perkara_id,$perkaradet_id)
     {
          $sql = $this->db->query("SELECT * from t_kronologi
                                   join t_perkara on perkara_id = kronologi_perkara_id
                                   WHERE kronologi_perkara_id =$perkara_id")->result();
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

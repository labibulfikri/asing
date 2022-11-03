

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

 public function __construct()
    {
        parent::__construct();
    }
	
    function get_data_jadwal($tgl_awal,$tgl_akhir)
        {
            // $sql = $this->db->query("SELECT * from t_jadwal where jadwal_tgl ='$tgl' limit 6")->result();
            $sql = $this->db->query("SELECT * from t_jadwal
                                    join t_perkara on perkara_id = jadwal_perkara_id 
                                    where jadwal_tgl between '$tgl_awal' and '$tgl_akhir' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
									order by jadwal_tgl asc")->result();
            
            // $a = $this->db->last_query($sql);
            // print_r($a);
            // exit();
            return $sql;
            
        }

    function get_data_jadwal_limit($tgl)
    {
        // $sql = $this->db->query("SELECT * from t_jadwal where jadwal_tgl between $tgl_awal and $tgl_awal ")->num_rows();
        //$sql = $this->db->query("SELECT * from t_jadwal 
        //                         join t_perkara on perkara_id = jadwal_perkara_id 
        //                        where jadwal_tgl between '$tgl' and '$tgl_akhir'
		//					 order by jadwal_tgl asc")->result();
       $sql = $this->db->query("SELECT * from t_jadwal 
                                join t_perkara on perkara_id = jadwal_perkara_id 
                               where jadwal_tgl >= '$tgl' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
							order by jadwal_tgl asc")->result();
       
     
        
        return $sql;
        
    }

    function getberkas($perkara_id){
        $sql = $this->db->query("SELECT * from t_upload where berkas_perkara_id =$perkara_id")->result();
        
        return $sql;
        
    }


    function getjadwal_detail($perkara_id, $jadwal_id)
    {

        $sql = $this->db->query(" SELECT * FROM t_jadwal
                                join t_perkara on perkara_id = jadwal_perkara_id
                                -- join t_perkara_detail on perkaradet_perkara_id = perkara_id
                                where jadwal_perkara_id= $perkara_id  
								order by jadwal_tgl desc
                                ")->result();
        
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
	
	

    function get_perkara ($perkara_id)
    {

        $sql = $this->db->query("SELECT * FROM t_perkara 
                                    join t_perkara_detail on perkaradet_perkara_id = perkara_id
                                   where perkara_id= $perkara_id  
                                   ORDER BY perkaradet_id desc limit 1  
                                ")->result();
        
        return $sql;
        
    }
	
	
	 function get_data_laporan($tgl1,$tgl2)
        {
			
			if ($tgl2 == 0 ){
				
            $sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl >= '$tgl1' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
			order by jadwal_tgl asc")->result();
			}else{
            $sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl between '$tgl1' and '$tgl2' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
			order by jadwal_tgl asc")->result(); }
            return $sql;            
        }
		
	function get_data_laporan_tun($tgl1,$tgl2)
        {
			
            if ($tgl2 == 0){
			$sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl >= '$tgl1' and perkara_jenis = 'Keputusan Tata Usaha Negara' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
								 order by jadwal_tgl asc")->result();
            	
			}else{
			$sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl between '$tgl1' and '$tgl2' and perkara_jenis = 'Keputusan Tata Usaha Negara' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
								 order by jadwal_tgl asc")->result();
            	
			}
			return $sql;            
        }
		
	function get_data_laporan_pn($tgl1,$tgl2)
        {
			
			if ($tgl2 == 0) {
			$sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl >= '$tgl1' and perkara_jenis = 'Pengadilan Negeri' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
								 order by jadwal_tgl asc")->result();
            	
			}else {
            $sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl between '$tgl1' and '$tgl2' and perkara_jenis = 'Pengadilan Negeri' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
								 order by jadwal_tgl asc")->result();
			}
            return $sql;            
        }
		
	function get_data_laporan_lain($tgl1,$tgl2)
        {
			if ($tgl2 == 0 ) {
			
			$sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl >= '$tgl1' and perkara_jenis = 'komisi informasi' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
								 order by jadwal_tgl asc")->result();
								 
				
			}else{
            $sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl between '$tgl1' and '$tgl2' and perkara_jenis = 'komisi informasi' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
								 order by jadwal_tgl asc")->result();
								 
			}//$a = $this->db->last_query($sql);
            //print_r($a);
            // exit();
            return $sql;            
        }
		
		
	function get_data_laporan_agama($tgl1,$tgl2)
        {
			if ($tgl2 == 0 ) {
			$sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl >= '$tgl1' and perkara_jenis = 'Pengadilan Agama' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
								 order by jadwal_tgl asc")->result();
				
			}else {
            $sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl between '$tgl1' and '$tgl2' and perkara_jenis = 'Pengadilan Agama' and perkara_aktiv = 'y' and jadwal_aktiv = 'y'
								 order by jadwal_tgl asc")->result();
			}
								 
			//$a = $this->db->last_query($sql);
            //print_r($a);
            // exit();
            return $sql;            
        }

}
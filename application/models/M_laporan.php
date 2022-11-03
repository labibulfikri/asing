

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

 public function __construct()
    {
        parent::__construct();
    }
	
    function get_data_laporan($tahun,$bulan)
        {
            if ($tahun == "" || $tahun == "-" ){

                $sql = $this->db->query("SELECT * from t_perkara
                                         join t_perkara_detail on perkara_id = perkaradet_perkara_id 
                                        where month(perkara_tgl_masuk)='$bulan' group by perkara_no")->result();
            
            }else if ($bulan =="" || $bulan =="-"){
                $sql = $this->db->query("SELECT * from t_perkara
                                         join t_perkara_detail on perkara_id = perkaradet_perkara_id 
                                        where year(perkara_tgl_masuk) = '$tahun' group by perkara_no")->result();

            }else{

                $sql = $this->db->query("SELECT * from t_perkara
                                         join t_perkara_detail on perkara_id = perkaradet_perkara_id 
                                        where month(perkara_tgl_masuk)='$bulan' and year(perkara_tgl_masuk) = '$tahun' group by perkara_no")->result();
            
            }
            // $a = $this->db->last_query($sql);
            // print_r($a);
            // exit();
            return $sql;
            
        }

    function get_data_jadwal_limit($tahun,$bulan)
    {
        // $sql = $this->db->query("SELECT * from t_jadwal where jadwal_tgl between $tgl_awal and $tgl_awal ")->num_rows();
        $sql = $this->db->query("SELECT * from t_perkara
                                 join t_perkara_detail on perkara_id = perkaradet_perkara_id 
                                 where month(perkara_tgl_masuk)='$bulan' and year(perkara_tgl_masuk) = '$tahun'")->result();
        
        return $sql;
        
    }

    function get_data_jadwal_row($tgl,$tgl_akhir)
    {
        // $sql = $this->db->query("SELECT * from t_jadwal where jadwal_tgl between $tgl_awal and $tgl_awal ")->num_rows();
        $sql = $this->db->query("SELECT * from t_jadwal 
                                 join t_perkara on perkara_id = jadwal_perkara_id 
                                 where jadwal_tgl between '$tgl' and '$tgl_akhir'")->num_rows();
        
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
                                -- join t_perkara_detail on perkaradet_perkara_id = perkara_id
                                where perkara_id= $perkara_id  
                                ")->result();
        
        return $sql;
        
    }

}
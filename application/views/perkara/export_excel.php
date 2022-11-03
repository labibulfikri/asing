<html>
<head>
	<title> Export Excel </title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 

	<?php
$a = $perkara_no;
    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Perkara $a.xls");
	?>
  <div class="container margin_60"> 
            <br>
            <br>
			<div class="row">
				<div class="col-xl-8 col-lg-8">
				<div class="box_general_3 cart">
					<div class="message">
                    <h3>Data Umum</h3>
                    <p> <b> No Perkara :  <span> <?php foreach ($getperkara as $key ) { ?> <?php echo $key->perkara_no; ?> </b></span></p>
                        <!-- <a target="_blank" href="<?php echo base_url()?>C_perkara/export_excel?perkara_id=<?php echo $key->perkara_id  ?>">EXPORT KE EXCEL</a> -->
                    </div>
					<div class="row">
					<table class="table">
                        <tr><td VALIGN = Top Align = Left><b> Alamat </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkara_alamat?> </td></tr>
                        <tr><td VALIGN = Top Align = Left> <b> Nama Penggugat </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkara_penggugat?> </td></tr>
                        <tr><td VALIGN = Top Align = Left> <b> Nama tergugat </b> </td> <td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkara_tergugat?> </td></tr>
                        <tr><td VALIGN = Top Align = Left> <b> Perkara Jenis </b>  </td> <td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkara_jenis?> </td></tr>
                        <tr><td VALIGN = Top Align = Left><b> Perkara Petitum </b> </td> <td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkara_petitum?> </td></tr>
                    
                    </table>

                    <?php } ?>
                    </div>
					<hr> 
						<div class="row">
						<h3> Status Perkara </h3>
                        <table border="1|0" cellspacing="0" width="100%">
                        <thead>  
                        <tr> 
                            <td> <b> Tingkat </b> </td>
                            <td> <b> Status </b> </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($getperkara_id as $value) { ?>
                        <tr>
                            <td> <?php echo $value->perkaradet_tingkat ?> </td>
                            <td> <?php echo $value->perkaradet_status?></td>
                        
                        </tr>
                            
                            <?php } ?>
                                
                            
                        </tbody>
                    </table>			
                        </div> 
					<!-- /box_general -->			
            	<!-- /asdide -->
			</div>

            

			<!-- /row -->
            
            
		</div>

        <aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
                    <div class="table-responsive">
                    <h3> Jadwal Sidang</h3>
                    <table border="1|0" width="100%" cellspacing="0">
                        <thead>  
                        <tr> 
                            <td><b> Agenda </b> </td>
                            <td><b> Tanggal </b> </td>
                            <td><b> Pukul </b> </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($detail as $key) { ?>
                        <tr>
                            <td> <?php echo $key->jadwal_judul ?> </td>
                            <td> <?php echo $key->jadwal_tgl?></td>
                            <td> <?php echo $key->jadwal_waktu?></td>
                        
                        </tr>
                            
                            <?php } ?>
                                
                            
                        </tbody>
                    </table>			
					</div>
                </div>
    </body>
</html>
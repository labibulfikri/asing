 
		<!-- /breadcrumb -->
        <body onload="window.print();">
		<div class="container margin_60"> 
            <br>
            <br>
			<div class="row">
				<div class="col-xl-6 col-lg-6">
				<div class="box_general_3 cart">
					<div class="message">
                    <label> Laporan Perkara </label></br>
                    <label> Bulan : <?php echo $bulannya?></label> </br>
                    <label> Tahun : <?php echo $tahun ?></label>
                    
						<div class="row">
						<h3> Status Perkara </h3>
                        <table border="1|0" cellspacing="0" width="100%">
                        <thead>  
                        <tr> 
                            <td> No </td>
                            <td> <b> Nomor Perkara </b> </td>
                            <td> <b> Objek Permasalahan </b> </td>
                            <td> <b> Tanggal Masuk Perkara </b> </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; foreach ($get_data as $value) { ?>
                        <tr>
                            <td> <?php echo $i++ ?></td>
                            <td> <?php echo $value->perkara_no ?> </td>
                            <td> <?php echo $value->perkara_alamat?></td>
                            <td> <?php echo $value->perkara_tgl_masuk?></td>
                        
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
 
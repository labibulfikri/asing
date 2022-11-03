

<section class="hero-section inner-page">
      <div class="wave">

        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
              <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
            </g>
          </g>
        </svg>

      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row justify-content-center">
              <div class="col-md-7 text-center hero-text">
                <h1 data-aos="fade-up" data-aos-delay=""> Detail Perkara </h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
<div class="container margin_60">
    <div class="row">
            <br>
            <br> 
            
        <aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
                    <div class="table-responsive">
                    <h3> Jadwal Sidang</h3>
                    
					<table class="table table-bordered" width="100%" cellspacing="0">
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
                            <td> <?php echo date('d F Y', strtotime($key->jadwal_tgl));?></td>
                            <td> <?php echo $key->jadwal_waktu?></td>
                        
                        </tr>
                            
                            <?php } ?>
                                
                            
                        </tbody>
                    </table>

<!-- /box_general -->
              
                    			
					</div>
                </div>
				
				<?php if ($this->session->userdata('status') == "login") { ?> 
				
				
				<div class="box_general_3 booking">
                    <h3> Berkas </h3>
					<div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>  
                        <tr> 
                            <td><b> NO </b> </td>
                            <td><b> Berkas </b> </td>
                            <td><b> Unduh </b> </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;

                        foreach ($berkas as $key) { ?>
                        <tr>
                            <td> <?php echo $i++ ?> </td>
                            <td> <?php echo $key->name_berkas?></td>
                            <td>
							
                            <a class="btn btn-sm btn-success" target="_blank" href="<?php echo base_url()?>assets/upload/<?php echo $key->name_berkas ?>"> <i  data-toggle="tooltip" title="Download" class="icon-download-cloud"></i></a> 
                            
							</td>
                        
                        </tr>
                            
                            <?php } ?>
                                
                            
                        </tbody>
                    </table>	  
					</div>
                </div>	
				<?php } ?>				
					
        </aside>
 
        
            <div class="col-xl-8 col-lg-8">
            <a class="btn btn-warning btn-sm" href="<?php echo base_url('c_perkara')?>"> Kembali </a>
            <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>c_perkara/print_detail?perkara_id=<?php echo $perkara_id ?>" target="_blank"> Print </a>
            <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>c_perkara/export_excel?perkara_id=<?php echo $perkara_id ?>&perkara_no=<?php echo $perkara_no ?>" target="_blank"> Export Excel </a>
            <hr>
				<div class="box_general_3 cart">
					<div class="message">
                    <h3>Data Umum</h3>
                    <h3> <b> No Perkara :  <span> <?php foreach ($getperkara as $key ) { ?> <?php echo $key->perkara_no; ?> </b> <?php if ($key->perkaradet_status == "Proses"){ ?> 
                            <span class="btn btn-primary btn-sm"> Proses <?php echo $key->perkaradet_tingkat ?>  </span></td>
                        <?php } else { ?>
                    <span class="btn btn-success btn-sm ">Sudah Putusan <?php echo $key->perkaradet_tingkat;?> - Pemerintah Kota <?php echo $key->perkaradet_status;?></td>
                                        <?php } ?> </span></h3> 
					
					
					
                    </div>
					<div class="row">
					<table class="table">
                        <tr><td VALIGN = Top Align = Left><b> Objek Permasalahan </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkara_objek?> </td></tr>
                        <tr><td VALIGN = Top Align = Left> <b> Nama Penggugat </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkara_penggugat?> </td></tr>
                        <tr><td VALIGN = Top Align = Left> <b> Nama tergugat </b> </td> <td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkara_tergugat?> </td></tr>
                        <tr><td VALIGN = Top Align = Left> <b> Perkara Jenis </b>  </td> <td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkara_jenis?> </td></tr>
                        <tr><td VALIGN = Top Align = Left><b> Kuasa Hukum </b> </td> <td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkara_kuasa_hukum?> </td></tr>
                    
                    </table>

                    <?php } ?>
					<hr> 
        <div class="col-xl-12 col-lg-12">  
        <div class="panel">
            <!-- <div class="panel-body">                 -->
                <h3> Status Perkara </h3>
                <div class="example-box-wrapper">
                    <ul class="nav-responsive nav nav-tabs">
					
                        <li class="nav-item"><a class="nav-link" href="#tab5" data-toggle="tab"> Putusan Sela</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab1" data-toggle="tab"> Putusan I </a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Banding </a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Kasasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab4" data-toggle="tab">PK</a></li>
                        
                    </ul>
					
                    <div class="tab-content">
                        <div class="tab-pane" id="tab1">
                        <?php foreach ($getperkara_id as $key ) {
                                    if ($key->perkaradet_tingkat == "Tingkat 1"){ ?>

                                <table class="table">
                                    <tr><td VALIGN = Top Align = Left><b> No. Putusan </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkaradet_no?> </td></tr>
                                    <tr><td VALIGN = Top Align = Left><b> Tanggal Putusan </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left>
									<?php if ($key->perkaradet_tgl_putusan == null ){ ?>
								</td> - </tr>
									
								<?php } else{ ?>
									
								<?php echo date('d F Y', strtotime($key->perkaradet_tgl_putusan));?> </td></tr>
								<?php } ?> 
									
                                        <tr><td VALIGN = Top Align = Left> <b> Status Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_status?> </td></tr> 
                                    <tr><td VALIGN = Top Align = Left> <b> Amar Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_keterangan?> </td></tr>
                                    <?php if ($key->perkaradet_inkrah ==1){ ?>
                                    <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Ya </td></tr>
                                   
                                    <?php }else{ ?>
                                        <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Tidak </td></tr>
                                    <?php } ?>
                                </table>						
                                
                                    <?php } } ?>
                        </div>
                        <div class="tab-pane" id="tab2">
                        <?php foreach ($getperkara_id as $key ) {
                                 if ($key->perkaradet_tingkat == "Banding"){ ?>

                            <table class="table">
                                <tr><td VALIGN = Top Align = Left><b> No. Putusan Banding </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkaradet_no?> </td></tr>
                                <tr><td VALIGN = Top Align = Left><b> Tanggal Putusan </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left>
								
								<?php if ($key->perkaradet_tgl_putusan == null ){ ?>
								</td> - </tr>
									
								<?php } else{ ?>
									
								<?php echo date('d F Y', strtotime($key->perkaradet_tgl_putusan));?> </td></tr>
								<?php } ?> 
                                
								<tr><td VALIGN = Top Align = Left> <b> Status Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_status?> </td></tr> 
                                <tr><td VALIGN = Top Align = Left> <b> Amar Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_keterangan?> </td></tr>
                                <?php if ($key->perkaradet_inkrah ==1){ ?>
                                    <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Ya </td></tr>
                                   
                                    <?php }else{ ?>
                                        <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Tidak </td></tr>
                                    <?php } ?>
                            </table>						
                            
                                 <?php } } ?>
                        </div>
                        <div class="tab-pane" id="tab3">
                        <?php foreach ($getperkara_id as $key ) {
                                 if ($key->perkaradet_tingkat == "Kasasi"){ ?>

                            <table class="table">
                                <tr><td VALIGN = Top Align = Left><b> No. Putusan Kasasi </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkaradet_no?> </td></tr>
                                <tr><td VALIGN = Top Align = Left><b> Tanggal Putusan </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left>
								
								<?php if ($key->perkaradet_tgl_putusan == null ){ ?>
								</td> - </tr>
									
								<?php } else{ ?>
									
								<?php echo date('d F Y', strtotime($key->perkaradet_tgl_putusan));?> </td></tr>
								<?php } ?> 
								
								<tr><td VALIGN = Top Align = Left> <b> Status Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_status?> </td></tr> 
                                <tr><td VALIGN = Top Align = Left> <b> Amar Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_keterangan?> </td></tr>
                                <?php if ($key->perkaradet_inkrah ==1){ ?>
                                    <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Ya </td></tr>
                                   
                                    <?php }else{ ?>
                                        <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Tidak </td></tr>
                                    <?php } ?>
                            </table>						
                            
                                 <?php } } ?>
                        </div>
                        <div class="tab-pane" id="tab4">
                        <?php foreach ($getperkara_id as $key ) {
                                 if ($key->perkaradet_tingkat == "PK"){ ?>

                            <table class="table">
                                <tr><td VALIGN = Top Align = Left><b> No. Putusan PK  </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkaradet_no?> </td></tr>
                                <tr><td VALIGN = Top Align = Left><b> Tanggal Putusan </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left>
								
								<?php if ($key->perkaradet_tgl_putusan == null ){ ?>
								</td> - </tr>
									
								<?php } else{ ?>
									
								<?php echo date('d F Y', strtotime($key->perkaradet_tgl_putusan));?> </td></tr>
								<?php } ?> 
								
                                <tr><td VALIGN = Top Align = Left> <b> Status Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_status?> </td></tr> 
                                <tr><td VALIGN = Top Align = Left> <b> Amar Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_keterangan?> </td></tr> 
                                <?php if ($key->perkaradet_inkrah ==1){ ?>
                                    <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Ya </td></tr>
                                   
                                    <?php }else{ ?>
                                        <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Tidak </td></tr>
                                    <?php } ?>
                            </table>						
                            
                                 <?php } } ?>
                        </div>
						 
                        <div class="tab-pane" id="tab5">
                        <?php foreach ($getperkara_id as $key ) {
                                    if ($key->perkaradet_tingkat == "sela"){ ?>

                                <table class="table">
                                    <tr><td VALIGN = Top Align = Left><b> No. Putusan </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left><?php echo $key->perkaradet_no?> </td></tr>
                                    <tr><td VALIGN = Top Align = Left><b> Tanggal Putusan </b></td><td VALIGN = Top Align = Left> : </td><td VALIGN = Top Align = Left>
									<?php if ($key->perkaradet_tgl_putusan == null ){ ?>
								</td> - </tr>
									
								<?php } else{ ?>
									
								<?php echo date('d F Y', strtotime($key->perkaradet_tgl_putusan));?> </td></tr>
								<?php } ?> 
									
                                        <tr><td VALIGN = Top Align = Left> <b> Status Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_status?> </td></tr> 
                                    <tr><td VALIGN = Top Align = Left> <b> Amar Putusan </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left><?php echo $key->perkaradet_keterangan?> </td></tr>
                                    <?php if ($key->perkaradet_inkrah ==1){ ?>
                                    <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Ya </td></tr>
                                   
                                    <?php }else{ ?>
                                        <tr><td VALIGN = Top Align = Left> <b> Incracht </b> </td><td VALIGN = Top Align = Left> : </td> <td VALIGN = Top Align = Left> Tidak </td></tr>
                                    <?php } ?>
                                </table>						
                                
                                    <?php } } ?>
                        </div>
                    </div> 

            </div> 
            <hr>

                  
 
		<!-- /container --> 

 
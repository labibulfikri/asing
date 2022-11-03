<style>

ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {

    margin: 20px 0;
    padding-left: 70px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>

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
                <h1 data-aos="fade-up" data-aos-delay=""> Detail Permasalahan </h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </section> 
<div class="container margin_60">
    <h5> Detail Permasalahan</h5>
    <div class="row">
            <br>
            <br> 
            
        <aside class="col-xl-4 col-lg-4" id="sidebar">
			<div class="box_general_3 booking">
                <div class="table-responsive">
                    <h3> Data Nonlitigasi </h3>
                    <table class="table">
                        <thead>  
                        <?php if  ($resumeRow == null ) { ?>
                        <tr> <td><b> Permohonan :   <?php echo " - "; ?> </b></td></tr>
                        <tr> <td> <b> Tanggal : </b> <?php echo " - " ;?> </td> </tr>

                        <?php } else { ?> 
                            <tr> <td><b> Permohonan :  </b> <?php echo $resumeRow->permohonan_nonlit; ?>
                            <tr> <td><b> Tanggal : </b><?php echo date('d F Y', strtotime($resumeRow->tgl_nonlit)); } ?> </td></tr></td> </tr>
                        
                        </tr>
                        </thead>
                        <tbody>
                        
                             
                            
                        </tbody>
                    </table>			
					</div>
                </div>  
        </aside>
 
        
            <div class="col-xl-8 box_general_3">
			  <?php  if ($this->session->userdata("status") !="login") { ?>
			  <?php } else { ?>
            <a href="<?php echo base_url()?>c_nonlit/addResume/<?php echo $idNonlit ?>" class="btn btn-sm btn-primary"> Tambah</a> 
			  <?php } ?>
            
                            <h4> Progres Nonlitigasi </h4>
                            <ul class="timeline">

                            <?php foreach ($data_resume as $key ) { ?> 
                                
                                <li>
                                <div id="basicsAccordion">
                                                <!-- Card -->
                                                <div class="card mb-3">
                                                    <div class="card-header card-collapse" id="basicsHeading<?PHP echo $key->id_resume?>">
                                                    <button type="button" class="btn btn-link btn-block card-btn d-flex justify-content-between p-3"
                                                            data-toggle="collapse"
                                                            data-target="#basicsCollapse<?PHP echo $key->id_resume?>"
                                                            aria-expanded="true"
                                                            aria-controls="basicsCollapse<?PHP echo $key->id_resume?>">
                                                            <?php echo $key->judul_resume;  ?>

                                                        <span class="card-btn-toggle">
                                                        <span class="card-btn-toggle-default"> <?php echo date('d F Y', strtotime($key->tgl_resume));?> </span>
                                                        <!-- <span class="card-btn-toggle-active">−</span> -->
                                                        </span>
                                                    </button>
                                                    </div>
                                                    <div id="basicsCollapse<?PHP echo $key->id_resume?>" class="collapse"
                                                        aria-labelledby="basicsHeading<?PHP echo $key->id_resume?>"
                                                        data-parent="#basicsAccordion">
                                                    <div class="card-body"> 
                                                    <span>Hasil Resume: </span><?php echo $key->hasil_resume ?>
                                                    <hr>
                                                    <span>Saran: </span><?php echo $key->saran ?>
                                                    <hr>
                          <span> Berkas : </span>
                          <?php
                          
                          $sql ="SELECT * from t_upload_resume 
                          join t_resume on t_resume.id_resume = t_upload_resume.id_resume
                          where t_upload_resume.id_resume = $key->id_resume";
                          $query = $this->db->query($sql)->result(); 

                          ?>
													<table class="table table-bordered table-responsive"> 
															<thead> 
																<tr> 
																	<td>berkas </td>		
																	<td>action </td>
																</tr>
															</thead>
															<tbody>
                                <?php foreach ($query as $hmm ) { ?> 
															<tr>
																	<?php if ($this->session->userdata("status") !="login") { ?> 
																	<?php } else { ?>
																<td> <?php echo $hmm->name_berkas?></td>
																<td> 
																<a class="btn btn-sm btn-success" target="_blank" href="<?php echo base_url()?>assets/berkas_nonlit/3/<?php echo $hmm->name_berkas ?>"> <i  data-toggle="tooltip" title="Download" class="icon-download-cloud"></i>
																</a>
													<!--	<a class="btn btn-sm btn-success" href="<?php echo base_url("c_nonlit/download_nonlit/$key->id_resume")?>"> <i  data-toggle="tooltip" title="Download" class="icon-download-cloud"></i>
																</a>-->
														
																<button type="button" class="btn btn-sm btn-danger tombol_hapus" token="<?php echo $hmm->token ?>"> <i  data-toggle="tooltip" title="Hapus" class="icofont-trash"></i> </button>  
																	<?php } ?>
															</tr>
                              <?php } ?>
															</tbody>
													</table>
													<hr>
                                                    <!-- <a href="" class="btn btn-sm btn-warning"> edit</a> -->
                                                    <?php  if ($this->session->userdata("status") !="login") { ?>
													<?php } else { ?>
													<a href="<?php echo base_url("c_nonlit/edit_resume?id_resume=$key->id_resume")?>" class="btn btn-sm btn-warning"> edit</a>
                                                    <?php } ?>
													<!--  <a href="" class="btn btn-sm btn-danger"> Hapus</a> -->

                                                    </div>
                                                    </div>
                                                </div> 
                                </li>
                                
                           <?php } ?> 
                                 
                            </ul>
                       
        </div>
    </div>
	
	<script>
	
	
//Event ketika foto dihapus
$(document).on('click', '.tombol_hapus', function() { 
    var token = $(this).attr("token");
    console.log(token); 
	// var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('C_nonlit/remove_berkas_resume') ?>",
		cache:false,
		dataType: 'json',
		success: function(){
            // data_berkas();
			console.log("Foto terhapus");
            alert('data berhasil dihapus');
            location.reload();

            // pilih_data();
            // $('#EditModal').modal('hide');
		},
		error: function(){
			console.log("Error");

		}
	});
});


	</script>
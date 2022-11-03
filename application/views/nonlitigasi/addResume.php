
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
                <h1 data-aos="fade-up" data-aos-delay=""> Tambah Data Resume </h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
            
                <div class="container-fluid bg-white"> 
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="basic-tb-hd">
                            <!-- <div class="card-header">  -->
                                <!-- <h4 class="m-b-0 text-white"> Form Input Data </h4> -->
                            <!-- </div> -->
                            <div class="card-body"> 
                                
                                <form action="<?php echo base_url('C_nonlit/doAddResume')?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title">Input Data Resume</h3>
                                        
                                        <?php if ($resume_row == null) { ?>
                                            <span> # </span>
                                        <?php } else { ?> 
                                            <?php echo $resume_row->permohonan_nonlit?>
                                        <?php } ?>
                                        <hr>
                                        
                                        <div class="row p-t-20">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Berkas </label>
                                                    <div class="dropzone">  </div>
                                               
                                                     
                                                </div>                                                                                        
                                        </div>      
                                        <div class="col-md-6">                                                                                      
                                                
                                                <div class="form-group">
                                                    <label class="control-label"> Judul </label>
                                                    <input type="text" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="judul_resume">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label"> Tanggal Resume</label>
                                                    <!-- <input type="text" id="from-datepicker" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="tgl_resume" placeholder="Tanggal Berita "> -->
                                                    <input type="date" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="tgl_resume" placeholder="Tanggal Berita ">
                                                    <input type="hidden" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="id_nonlit" value="<?php echo $idNonlit?>">
                                                </div> 
                                        </div>

                                        
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                    <label class="control-label"> Resume </label>
                                                    <textarea type="text" class="ckeditor form-control" id="banding_keterangan_edit" name="hasil_resume" ></textarea>
                                                </div>
                                               
                                        </div>
                                        
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                    <label class="control-label"> Saran  </label>
                                                    <textarea type="text" class="ckeditor form-control" id="banding_keterangan_edit" name="saran" ></textarea>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="<?php echo base_url('c_berita') ?>" class="btn btn-warning">Kembali</a>
                                    
                                        
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            

<script> 
    $("#from-datepicker").datepicker({ 
        format: 'yyyy-mm-dd'
    });
    
</script>

<script>

$(document).on('click', '.simpan', function() { 
    location.reload();
});

var foto_upload= new Dropzone(".dropzone",{
    url: "<?php echo base_url('C_berita/fileUpload');?>",
    maxFilesize: 2,
    maxFiles: 1, 
    method:"post",
    acceptedFiles:'application/*',
    parallelUploads: 1,
    uploadMultiple: false,
    paramName:"userfile",
    dictInvalidFileType:"Type file ini tidak dizinkan",
    addRemoveLinks:true,
});


 //Event ketika Memulai mengupload
 foto_upload.on("sending",function(a,b,c){
    
    var berita_id = $("#berita_id").val(); 

    a.token=Math.random();
    c.append("berita_id", berita_id); 
    c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
         
});

//Event ketika foto dihapus
$(document).on('click', '.tombol_hapus', function() { 
    var token = $(this).attr("token");
    console.log(token); 
	// var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('C_berita/remove_foto') ?>",
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



//Event ketika foto dihapus
foto_upload.on("removedfile",function(a){ 
	var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('C_berita/remove_foto') ?>",
		cache:false,
		dataType: 'json',
		success: function(){
			console.log("Foto terhapus");
            alert('data berhasil dihapus');            
		},
		error: function(){
			console.log("Error");

		}
	});
});

</script>

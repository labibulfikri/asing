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
                <h1 data-aos="fade-up" data-aos-delay=""> Upload Berkas Kronologi </h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>         

            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="basic-tb-hd">
                            <br>
                            <br>
                            <div class="card-body bg-white"> 
                                
                                <!-- <form action="<?php echo base_url('c_perkara/insert_data_perkara')?>" method="post"> -->
                                    <div class="form-body">
                                        <h3 class="card-title">Input Data Perkara Kronologi </h3>
                                        <hr>
                                        <div class="row p-t-20">
 
                                            <div class="col-md-6">
                                            <label> Upload Berkas Kronologi</label>
                                            <input type="hidden" name="perkara_id" id="perkara_id" value="<?php echo $perkara_id ?>">
                                            <input type="hidden" name="perkaradet_id" id="perkaradet_id" value="<?php echo $perkaradet_id ?>">
                                         
                                                <div class="dropzone">

                          
                                            </div>       
                                            <br>
                                            <div class="form-actions">
                                                <button type="submit" class="simpan btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <!-- <a href="getdata_putusan?perkara_id=<?php echo $perkara_id ?>" class="btn btn-warning">Cancel</a> -->
                                                <a href="<?php echo base_url('c_perkara') ?>" class="btn btn-warning">Cancel</a>
                                            </div>
                                      
                                        </div>
                                        

                                        
                                        <div class="col-md-6">
                                        <h5>Berkas</h5>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        
                                        <tr>
                                        <th> No</th>
                                        <th> Nama</th>
                                        <th> Tindakan </th>
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $i = 1;
                                        foreach ($getupload as $key ) { ?>
                                            <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td> <?php echo $key->name_berkas ?></td>
                                            <td> 
                                                    <a class="btn btn-sm btn-success" target="_blank" href="<?php echo base_url()?>assets/upload_kronologi/<?php echo $key->name_berkas ?>"> <i  data-toggle="tooltip" title="Download" class="icon-download-cloud"></i></a>
                                                <button type="button" class="btn btn-sm btn-danger tombol_hapus" token="<?php echo $key->token ?>"> <i  data-toggle="tooltip" title="Hapus" class="icon-trash"></i> </button>  
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        
                                        </tbody>
                                        </table>

                                        </div>
                                        <hr>
                                    </div> 
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>

<script>



$(document).on('click', '.simpan', function() { 
    location.reload();
});

var foto_upload= new Dropzone(".dropzone",{
    url: "<?php echo base_url('C_perkara/fileUpload_kronologi');?>",
    maxFilesize: 200,
    method:"post",
    acceptedFiles:"application/*",
    paramName:"userfile",
    dictInvalidFileType:"Type file ini tidak dizinkan",
    addRemoveLinks:true,
});


 //Event ketika Memulai mengupload
 foto_upload.on("sending",function(a,b,c){
    
    var perkara_id = $("#perkara_id").val();
    var perkaradet_id = $("#perkaradet_id").val();

    a.token=Math.random();
    c.append("perkara_id", perkara_id);
    c.append("perkaradet_id", perkaradet_id);
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
		url:"<?php echo base_url('C_perkara/remove_foto_kronologi') ?>",
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
		url:"<?php echo base_url('C_perkara/remove_foto') ?>",
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



//Event ketika foto dihapus
foto_upload.on("removedfile",function(a){ 
	var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('C_perkara/remove_foto_kronologi') ?>",
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

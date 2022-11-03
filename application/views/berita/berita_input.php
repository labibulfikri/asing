
<div id="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li><?php echo $title;?></li>
				</ul>
			</div>
		</div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            
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
                                
                                <form action="<?php echo base_url('C_berita/insert_data_berita')?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title">Input Data Berita </h3>
                                        <hr>
                                        
                                        <div class="row p-t-20">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Foto </label>
                                                    <div class="dropzone">  </div>
                                                </div>
                                        </div>
 


                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Judul </label>
                                                    <input type="text"  class="form-control form-control-sm" name="berita_judul" placeholder="Judul">
                                                    <input type="hidden"  class="form-control form-control-sm" value="<?php echo $berita_id ?>" placeholder="Judul" id="berita_id">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label"> Tanggal Berita</label>
                                                    <input type="text" id="from-datepicker" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="berita_tgl" placeholder="Tanggal Berita ">
                                                </div>

                                        </div>

                                        
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                    <label class="control-label"> Isi Berita </label>
                                                    <textarea type="text" class="ckeditor form-control" id="banding_keterangan_edit" name="berita_isi" ></textarea>
                                                </div>
                                        </div>
                                        </div>
                                       
 
                                          
                                       
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="<?php echo base_url('c_berita') ?>" class="btn btn-warning">Kembali</a>
                                    </div>
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
    
// }); 
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
    acceptedFiles:'image/jpeg,image/png,image/jpg',
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

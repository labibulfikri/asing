<?php
 if ($this->session->flashdata('pesan')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
          Swal.fire({
          title: "Done",
          text: "<?php echo $this->session->flashdata('pesan'); ?>",
          // timer: 1500,
          // showConfirmButton: false,
          type: 'success'
          });
          });
    </script>
<?php 
}
?>


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
                <h1 data-aos="fade-up" data-aos-delay=""> Data Putusan  </h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <!-- <div class="card-header">
                                <h4 class="m-b-0 text-white"> Form Input Data </h4>
                            </div> -->
                            <br>
                            <br>
                            <div class="card-body bg-white">
                            <div class="table-responsive">

                            <a type="button" href="<?php echo base_url();?>c_perkara" class="btn btn-sm btn-success"> Kembali</a>
                            <a type="button" href="<?php echo base_url();?>c_perkara/tambah_putusan?perkara_id=<?php echo $perkara_id;?>" class="btn btn-sm btn-primary"> Tambah</a>
                            <div class="row"></div>
                            <div class="container-fluid"></div>
                            <hr>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th data-hide="phone, tablet"> No </th>
                                            <th data-hide="phone, tablet"> Perkara No </th>
                                            <th data-hide="phone, tablet"> Tingkat </th>
											<th data-hide="phone, tablet"> Tanggal Putusan </th>
                                            <th data-hide="phone, tablet"> Menang / Kalah  </th>
                                            <th data-hide="phone, tablet">Tindakan </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;

									
                                    foreach ($get_data_putusan as $key) { ?>
                                        <tr>
                                        <td> <?php echo $i++;?></td>
                                        <td> <?php echo $key->perkaradet_no;?></td>
                                        <td> <?php echo $key->perkaradet_tingkat;?></td>
										<td>
									
											
									<?php
									
									if ( $key->perkaradet_tgl_putusan == "" or $key->perkaradet_tgl_putusan == null ){
										echo "-";
									} else {
									
                                                    $harinya = date("D", strtotime($key->perkaradet_tgl_putusan));
                                                    // echo $harinya;


                                                    switch($harinya){
                                                        case 'Sun':
                                                        $getHari = "Minggu";
                                                        break;
                                                        case 'Mon': 
                                                        $getHari = "Senin";
                                                        break;
                                                        case 'Tue':
                                                        $getHari = "Selasa";
                                                        break;
                                                        case 'Wed':
                                                        $getHari = "Rabu";
                                                        break;
                                                        case 'Thu':
                                                        $getHari = "Kamis";
                                                        break;
                                                        case 'Fri':
                                                        $getHari = "Jumat";
                                                        break;
                                                        case 'Sat':
                                                        $getHari = "Sabtu";
                                                        break;
                                                        default:
                                                        $getHari = "Salah"; 
                                                        break;
                                                    }
                                            ?>
									<?php echo $getHari?>, <?php echo date('d F Y ', strtotime($key->perkaradet_tgl_putusan))?>
									<?php } ?>
                                            </td>
										
                                        <?php if ($key->perkaradet_inkrah == 1){ ?>

                                        <td> <?php echo $key->perkaradet_status;?> <small>  (Incracht) </small>  </td>
                                        <td>
                                        <a href='<?php echo base_url();?>c_perkara/input_edit_putusan?perkara_id=<?php echo $key->perkara_id ?>&perkaradet_id=<?php echo $key->perkaradet_id?>' role="button" class="btn btn-warning btn-sm"> <i  data-toggle="tooltip" title="Edit" class="icofont-edit"></i> </a> |
                                        <!-- <a href='<?php echo base_url();?>c_perkara/upload_file?perkara_id=<?php echo $key->perkara_id ?>&perkaradet_id=<?php echo $key->perkaradet_id?>' role="button" class="btn btn-primary btn-sm"> <i  data-toggle="tooltip" title="Upload" class="icon-upload-cloud"></i> </a> |
                                        -->
										<button role="button" class="tombol_delete btn btn-danger btn-sm" id_perkaradet="<?php echo $key->perkaradet_id?>" id_perkara="<?php echo $key->perkara_id?>"> <i  data-toggle="tooltip" title="Hapus" class="icofont-trash"></i> </button> |
                                        
                                        </td>
                                        <?php } else { ?>

                                        <td> <?php echo $key->perkaradet_status;?></td>

                                        <td>
                                        <a href='<?php echo base_url();?>c_perkara/input_edit_putusan?perkara_id=<?php echo $key->perkara_id ?>&perkaradet_id=<?php echo $key->perkaradet_id?>' role="button" class="btn btn-warning btn-sm"> <i  data-toggle="tooltip" title="Edit" class="icofont-edit"></i> </a> |
                                       <!-- <a href='<?php echo base_url();?>c_perkara/upload_file?perkara_id=<?php echo $key->perkara_id ?>&perkaradet_id=<?php echo $key->perkaradet_id?>' role="button" class="btn btn-primary btn-sm"> <i  data-toggle="tooltip" title="Upload" class="icon-upload-cloud"></i> </a> |
                                        -->
										<button role="button" class="tombol_delete btn btn-danger btn-sm" id_perkaradet="<?php echo $key->perkaradet_id?>" id_perkara="<?php echo $key->perkara_id?>"> <i  data-toggle="tooltip" title="Hapus" class="icofont-trash"></i> </button> |
                                        <button role="button" class="tombol_inkrah btn btn-success btn-sm" id_perkaradet="<?php echo $key->perkaradet_id?>" id_perkara="<?php echo $key->perkara_id?>"> <i  data-toggle="tooltip" title="Incracht" class="icon-ok"></i> </button> |
                                        </td>
                                        <?php } ?>
                                        
                                        

                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                    </table>									
         
        </div>
		    <div class="card-body bg-white">
		        <div class="form-body">
                    <h3 class="card-title">Berkas Perkara  </h3>
                        <hr>
                            <div class="row p-t-20">
                                    <div class="col-md-6">
                                        <label> Upload Berkas</label>
                                            <input type="hidden" name="perkara_id" id="perkara_id" value="<?php echo $perkara_id ?>">
                                            
                                                <div class="dropzone">     </div>
                                            <br>
                                            <div class="form-actions">
                                                <!--<button type="submit" class="simpan btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <a href="getdata_putusan?perkara_id=<?php echo $perkara_id ?>" class="btn btn-warning">Cancel</a>
                                            -->
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
                                                <a class="btn btn-sm btn-success" target="_blank" href="<?php echo base_url()?>assets/upload/<?php echo $key->name_berkas ?>"> <i  data-toggle="tooltip" title="Download" class="icon-download-cloud"></i></a>
                                                <button type="button" class="btn btn-sm btn-danger tombol_hapus" token="<?php echo $key->token ?>"> <i  data-toggle="tooltip" title="Hapus" class="icofont-trash"></i> </button>  
                                            
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

                            </div>
                            </div>
                            </div>
                            </div> 
                            </br>
                            </br>
							
    </div>
							
							 

<script>



$(document).on('click', '.simpan', function() { 
    location.reload();
});

var foto_upload= new Dropzone(".dropzone",{
    url: "<?php echo base_url('C_perkara/fileUpload');?>",
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

    a.token=Math.random();
    c.append("perkara_id", perkara_id); 
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
		url:"<?php echo base_url('C_perkara/remove_foto') ?>",
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
</script>      

    <script>
          
          //fungsi pupup
    $(document).on('click', '.tombol_view', function() {
       $('#viewModal').modal({
             backdrop:'static'
           });
        var rekommasuk_id = $(this).attr("rekommasuk_id");
        $.ajax({
            url: "<?php echo base_url() . 'C_rekom/histori' ?>",
            method: 'POST',
            data: {
                rekommasuk_id: rekommasuk_id
            },
            dataType: "json",
            success: function(data) { 

               var myObj = data;
                console.log(myObj);
            //   var a = 1;
                var baris = ''; 
                for (var i = 0; i < data.length; i++) {
                 
               if ( data[i].rekomkeluar_dari == null ) { 
                  
                   
                   baris += ' <tr>' +
                               '<td width="10%">' + i + '</td>'+
                               '<td width="10%">' +  data[i].rekommasuk_dari + '</td>'+
                               '<td width="10%">' +  data[i].rekommasuk_kepada + '</td>'+
                               '<td width="10%">' + data[i].tgl_terima_tu + '</td>' + 
                               '<td width="10%">' + data[i].rekommasuk_keterangan + '</td>' +
                               '<td width="10%">' + data[i].status + '</td>' +
                        '</tr>';
               }else{
 
                     
                   baris += ' <tr>' +
                               '<td width="10%">' + i + '</td>'+
                               '<td width="10%">' +  data[i].rekomkeluar_dari + '</td>'+
                               '<td width="10%">' + data[i].rekomkeluar_kepada + '</td>'+
                               '<td width="10%">' + data[i].rekomkeluar_tgl_masuk + '</td>' + 
                               // '<td width="10%">' + data[i].rekomkeluar_tgl_keluar + '</td>' + 
                               '<td width="10%">' + data[i].rekomkeluar_keterangan + '</td>' +
                               '<td width="10%">' + data[i].status + '</td>' +
                        '</tr>';
               
                   } 
                }


               $('#target_reg').html(baris);
                
            },
        })
    });



               //fungsi delete
    $(document).on('click', '.tombol_delete', function() {
         var perkara_id = $(this).attr("id_perkara");
         var perkaradet_id = $(this).attr("id_perkaradet");
         Swal.fire({
             title: 'Konfirmasi',
             text: "Anda ingin menghapus ",
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: 'ya',
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             cancelButtonText: 'Tidak',
             reverseButtons: true
         }).then((result) => {
             if (result.value) {
             $.ajax({
                 url: "<?php echo base_url(); ?>c_perkara/delete_putusan",
                 method: "POST",
                 onBeforeOpen: function() {
                         Swal.fire({
                             title: 'Menunggu',
                             html: 'Memproses data',
                             onOpen: () => {
                                 swal.showLoading()
                             }
                         })
                     },
                 data: {
                     perkara_id : perkara_id,
                     perkaradet_id : perkaradet_id
                 },
                 success: function(data) {
                    Swal.fire(
                             'Hapus',
                             'Berhasil Terhapus',
                             'success'
                        )                     
                        location.reload();
                 }
             })
             } else if (result.dismiss === Swal.DismissReason.cancel){
                Swal.fire(
                     'Batal',
                     'Anda membatalkan penghapusan',
                     'error'
                )
             }  
            })
       
       
     });


        //fungsi inkrah
    $(document).on('click', '.tombol_inkrah', function() {
         var perkara_id = $(this).attr("id_perkara");
         var perkaradet_id = $(this).attr("id_perkaradet");
         Swal.fire({
             title: 'Konfirmasi',
             text: "Apakah Perkara Ini Incracht ",
             type: 'warning',
             showCancelButton: true,
             confirmButtonText: 'ya',
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             cancelButtonText: 'Tidak',
             reverseButtons: true
         }).then((result) => {
             if (result.value) {
             $.ajax({
                 url: "<?php echo base_url(); ?>c_perkara/inkrah_putusan",
                 method: "POST",
                 onBeforeOpen: function() {
                         Swal.fire({
                             title: 'Menunggu',
                             html: 'Memproses data',
                             onOpen: () => {
                                 swal.showLoading()
                             }
                         })
                     },
                 data: {
                     perkara_id : perkara_id,
                     perkaradet_id : perkaradet_id
                 },
                 success: function(data) {
                    Swal.fire(
                             'Incracht',
                             'Berhasil Incracht',
                             'success'
                        )                     
                        location.reload();
                 }
             })
             } else if (result.dismiss === Swal.DismissReason.cancel){
                Swal.fire(
                     'Batal',
                     'Anda membatalkan penghapusan',
                     'error'
                )
             }  
            })
       
       
     });


         
         </script>
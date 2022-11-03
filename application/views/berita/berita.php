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
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
			
			
			<div id="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="#"><?php echo $title?></a></li> 
				</ul>
			</div>
		</div>   

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-sm-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <!-- <div class="card-header">
                                <h4 class="m-b-0 text-white"> Form Input Data </h4>
                            </div> -->

                            <div class="row"></div>
                            <br>
                            <br>
                          
                            <div class="container-fluid"></div>
                            <hr>
                            
                            <br>
                            <br>
                            <div class="card-body bg-white">
                            <div class="card-box table-responsive m-t-40">

                            <a href='<?php echo base_url();?>c_berita/input_berita' class="btn btn-sm btn-primary"> Tambah </a>
 
                             

                                    <?php foreach ($get_data as $value) { ?>
                                        <table class="blog wow fadeIn" id="dataTable" width="100%" cellspacing="0" >
<td> 
<article class="blog wow fadeIn">
                                        <div class="row no-gutters">
                                            <div class="col-lg-7">
                                                <figure>
                                                    <a href="<?php echo base_url()?>c_berita/detail_berita?berita_id=<?php echo $value->berita_id ?>"><img src="<?php echo base_url()?>assets/upload_berita/<?php echo $value->name_berkas?>" alt=""><div class="preview"><span>Read more</span></div></a>
                                                </figure>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="post_info">
                                                    <small><?php echo $value->berita_tgl?></small>
                                                    <h3><a href="<?php echo base_url()?>c_berita/detail_berita?berita_id=<?php echo $value->berita_id ?>"><?php echo $value->berita_judul ?></p>
                                                    
                                                            
                                                            
                                                    <ul>
                                                        <li>
                                                            <!-- <div class="thumb"><img src="http://via.placeholder.com/100x100.jpg"></div> Jessica Hoops -->
                                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>c_berita/edit_berita?berita_id=<?php echo $value->berita_id?>"><i  data-toggle="tooltip" title="edit" class="icon-edit"></i> </a> |
                                                            <a class="btn btn-success btn-sm" href="<?php echo base_url()?>c_berita/detail_berita?berita_id=<?php echo $value->berita_id?>"><i  data-toggle="tooltip" title="lihat" class="icon-view"></i> </a> |
                                        <button role="button" class="tombol_delete btn btn-danger btn-sm" berita_id="<?php echo $value->berita_id?>"> <i  data-toggle="tooltip" title="Hapus" class="fa fa-trash"></i> </button> 

                                                        </li>
                                                        <li>
                                                        <!-- <i class="icon_comment_alt"></i> 20 -->
                                                        
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <hr>

</td>
</table>
                                    <?php } ?>

                           
                            </div>
                        </div> 
                        <br>
                        <br>
        </div>
    </div>
    </div>
    </div>
    </div>

    
<script> 
    $("#from-datepicker1").datepicker({ 
        format: 'yyyy-mm-dd'
    });
 
    $("#from-datepicker2").datepicker({ 
        format: 'yyyy-mm-dd'
    });

    // $("#from-datepicker").on("change", function () {
    //     var fromdate = $(this).val();
    //     // alert(fromdate);
    // });
// }); 
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
         var berita_id = $(this).attr("berita_id"); 
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
                 url: "<?php echo base_url(); ?>c_berita/delete_berita",
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
                     berita_id : berita_id, 
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

         
         </script>

 
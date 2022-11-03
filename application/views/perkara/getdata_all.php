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
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"> History </h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item active">History</li>
                    </ol>
                </div>
                <!-- <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div> -->
            </div>
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
                        <div class="card card-outline-info">
                            <!-- <div class="card-header">
                                <h4 class="m-b-0 text-white"> Form Input Data </h4>
                            </div> -->
                            <div class="card-body">
							
							<form action="<?php echo base_url('c_rekom/get_all_data')?>" method="post">
                           
                      <div class="col-md-5">
                          <div class="form-group">
                              <label class="control-label"> Nama / Alamat Persil <span class="text-danger">*</span> </label> 
                              <input type="text" class="form-control" name="query" placeholder="Nama  / Alamat Persil "> 
							  <button type="submit" class="btn btn-primary btn-sm "> Cari </button>
					  </div>
                    </div>
                          
						  
                        
                </form>    
							 
                            <div class="table-responsive m-t-40">                                
                                <table id="datatable-responsive" class="table table-sm table-bordered table-striped">
                                    <thead color="red">
                                        <tr>
                                            <th> No </th> 
                                            <th data-sort-initial="true" data-toggle="true"> Nama Pemohon </th>
                                            <th> Atas Nama</th>
                                            <th> Lokasi Persil</th>
                                            <th data-hide="phone, tablet"> Jenis Rekom </th>
                                            <th data-hide="phone, tablet">Tgl Terima UPTSA </th>
                                            <th data-hide="phone, tablet">Tgl Terimas TU </th>
                                            <th data-hide="phone, tablet">Aksi </th>
                                            <!-- <th data-sort-ignore="true" class="min-width">Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;

                                    foreach ($datanya as $key) { ?>
                                        <tr>
                                        <td> <?php echo $i++;?></td> 
                                        <td> <?php echo $key->pemohon_nama;?></td>
                                        <td> <?php echo $key->pemohon_atas_nama;?></td>
                                        <td> <?php echo $key->alamat_persil;?></td>
                                        <td> <?php echo $key->rekommasuk_jenis;?></td>
                                        <td> <?php echo $key->tgl_terima_uptsa;?></td>
                                        <td> <?php echo $key->tgl_terima_tu;?></td>
                                        <td>
                                        <!-- <button href="<?php echo base_url();?>C_rekom/get_all_data?rekommasuk_id=<?php echo $key->rekommasuk_id?>" data-toggle="modal" data-target="#modal_history<?php echo $key->rekommasuk_id; ?>" data-id="<?php echo $key->rekommasuk_id; ?> "  role="button" class="btn btn-success btn-sm"> <i  data-toggle="tooltip" title="History" class="mdi mdi-vector-arrange-above"></i> </button> -->


                                        <?php if ($key->rekommasuk_status == "berkas kembali"){ ?>
                                        
                                        <button data-toggle="modal" data-target="#editModal<?php echo $key->rekommasuk_id; ?>" data-id="<?php echo $key->rekommasuk_id; ?>" role="button" class="btn btn-warning btn-sm"> <i  data-toggle="tooltip" title="Edit Berkas Kembali" class="icon-book-open"></i> </button> 
                                        <button data-toggle="modal" data-target="#batalModal<?php echo $key->rekommasuk_id; ?>" data-id="<?php echo $key->rekommasuk_id; ?>" role="button" class="btn btn-danger btn-sm"> <i  data-toggle="tooltip" title="Batalkan Berkas Kembali" class="icon-close"></i> </button> 

                                        <!-- <a href='<?php echo base_url();?>c_rekom/edit_bk?rekommasuk_id=<?php echo $key->rekommasuk_id ?>&rekomkeluar_id=<?php echo $key->rekomkeluar_id?>' role="button" class="btn btn-warning btn-sm"> <i  data-toggle="tooltip" title="Edit Berkas Kembali" class="icon-book-open"></i> </a>  -->
                                        <!-- <button type="button" data-toggle="modal" data-target="#editModal" name="pilih" rekommasuk_id="<?php echo $key->rekommasuk_id;?>" class="btn btn-warning btn-sm tombol_edit"><i  data-toggle="tooltip" title="Edit Data" class="icon-book-open"></i></button> | -->
                                        
                                        <?php } ?>
                                        <button type="button" data-toggle="modal" data-target="#viewModal" name="pilih" rekommasuk_id="<?php echo $key->rekommasuk_id;?>" class="btn btn-info tombol_pilih_view btn-sm tombol_view"><i  data-toggle="tooltip" title="History" class="mdi mdi-vector-arrange-above"></i></button> |
                                        <a target="_blank" href="<?php echo base_url();?>c_rekom/print_history?rekomkeluar_rekom_id=<?php echo $key->rekommasuk_id ?>" class="btn btn-success btn-sm"> <i class="mdi mdi-printer" data-toggle="tooltip" title="Print" ></i></a> |
                                       

                                        
                                        </td>

                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                    </table>                            
                            </div>
									<div class="row">
											<div class="col">
									 
												<?php echo $halaman; ?>
											</div>
									</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          <?php  foreach ($datanya as $key) { ?>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel aria-hidden="true role="dialog" tabindex="-1" id="viewModal" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel"> History </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                            <table class="table table-sm table-bordered table-striped">
                                <thead color="red" >
                                        <tr>                                         
                                            <!-- <th data-hide="phone, tablet"> No </th> -->
                                            <th data-sort-initial="true" data-toggle="true"> Dari </th>
                                            <th data-hide="phone, tablet"> Tujuan </th>
                                            <th data-hide="phone, tablet"> Tanggal Masuk </th>
                                            <th data-hide="phone, tablet"> Keterangan </th>
                                            <th data-hide="phone, tablet"> Status</th>
                                         </tr>
                                    </thead>
                                    <tbody id="target_reg">
                                  
                                    </tbody>

                                    </table>
 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                
          <?php } ?>


          <?php  foreach ($datanya as $key) { ?>
          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel aria-hidden="true role="dialog" tabindex="-1" id="editModal<?php echo $key->rekommasuk_id ?>" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel"> Update </h4>
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                            </div>
                            <div class="modal-body">
                            <form action="<?php echo base_url('c_rekom/update_bk')?>" method="post">
                                    <div class="form-body">
                                        <!-- <h3 class="card-title">Input Data Rekom Bank</h3> -->
                                        <hr>
                                        <div class="row p-t-20">

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Nomor UPTSA : </label>
                                                    <input type="text" value="<?php echo $key->rekommasuk_no_uptsa?>" class="form-control form-control-sm" name="rekommasuk_no_uptsa" id="rekommasuk_no_uptsa"readonly>
                                                    <input type="hidden" value="<?php echo $key->rekommasuk_id?>" class="form-control form-control-sm" name="rekommasuk_id" id="rekommasuk_id" readonly>
                                               </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Pemohon : </label>
                                                    <input type="text" value="<?php echo $key->pemohon_nama?>" class="form-control form-control-sm" name="pemohon_nama" id="pemohon_nama" readonly>
                                                </div>
                                            </div>                               

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Atas Nama : </label>
                                                    <input type="text" value="<?php echo $key->pemohon_atas_nama?>" class="form-control form-control-sm" name="pemohon_atas_nama" id="pemohon_atas_nama" readonly>
                                                </div>
                                            </div>                               

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Lokasi Persil </label>
                                                    <input type="text" value="<?php echo $key->alamat_persil?>" id="alamat_persil" class="form-control form-control-sm" name="alamat_persil" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Tanggal Kembali </label>
                                                    <input type="date" value="<?php echo $key->rekommasuk_tgl_keluar?>" class="form-control form-control-sm" name="rekommasuk_tgl_keluar">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Keterangan </label>
                                                    <!-- <textarea class="form-control form-control-sm" id="rekommasuk_keterangan_edit"  name="rekomkeluar_keterangan" placeholder="Keterangan"></textarea> -->
                                                    <textarea class="ckeditor form-control" id="rekommasuk_keterangan_edit" name="rekommasuk_keterangan">
                                                     <?php echo $key->rekommasuk_keterangan?>
                                                    </textarea>
                            
                                                </div>
                                            </div>

                                            
                                        
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="simpan" class="btn btn-success"> Simpan</i></button>
										<button type="button" class="reset btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>

                                </form>
 
                            </div>
                                           
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <?php } ?>




            <?php  foreach ($datanya as $key) { ?>
          <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel aria-hidden="true role="dialog" tabindex="-1" id="batalModal<?php echo $key->rekommasuk_id ?>" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel"> Update </h4>
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                            </div>
                            <div class="modal-body">
                            <form action="<?php echo base_url('c_rekom/update_batal_bk')?>" method="post">
                                    <div class="form-body">
                                        <!-- <h3 class="card-title">Input Data Rekom Bank</h3> -->
                                        <hr>
                                        <div class="row p-t-20">

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Nomor UPTSA : </label>
                                                    <input type="text" value="<?php echo $key->rekommasuk_no_uptsa?>" class="form-control form-control-sm" name="rekommasuk_no_uptsa" id="rekommasuk_no_uptsa"readonly>
                                                    <input type="hidden" value="<?php echo $key->rekommasuk_id?>" class="form-control form-control-sm" name="rekommasuk_id" id="rekommasuk_id" readonly>
                                               </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Pemohon : </label>
                                                    <input type="text" value="<?php echo $key->pemohon_nama?>" class="form-control form-control-sm" name="pemohon_nama" id="pemohon_nama" readonly>
                                                </div>
                                            </div>                               

                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="simpan" class="btn btn-success"> Batalkan</i></button>
										<button type="button" class="reset btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>

                                </form>
 
                            </div>
                                           
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <?php } ?>

                                
<script> 
$("#from-datepicker").datepicker({ 
format: 'yyyy-mm-dd'
});
</script>

<script>

 $(document).ready(function() {
        $('#datatable-responsive').DataTable( {
            "responsive": true,
			"bStateSave": true,
			"searching": false,
			"paging":   false,
			"ordering": false,
			"info":     false,
        } );
		
		$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
    } );

    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Cari Disini ....");
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
               
                 var baris = ''; 
                 for (var i = 0; i < data.length; i++) {
                  
                if ( data[i].rekomkeluar_dari == null ) { 
                   
                    
                    baris += ' <tr>' +
                                // '<td width="10%">' + i + '</td>'+
                                '<td width="10%">' +  data[i].rekommasuk_dari + '</td>'+
                                '<td width="10%">' +  data[i].rekommasuk_kepada + '</td>'+
                                '<td width="10%">' + data[i].tgl_terima_tu + '</td>' + 
                                '<td width="10%">' + data[i].rekommasuk_keterangan + '</td>' +
                                '<td width="10%">' + data[i].status + '</td>' +
                         '</tr>';
                }else{

                    
                    
                    baris += ' <tr>' +
                                // '<td width="10%">' + i + '</td>'+
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
          
          </script>


 
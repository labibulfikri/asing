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
                <h1 data-aos="fade-up" data-aos-delay=""> Data Nonlitigasi </h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
 
                
                <br>
                    <br>
                    <div class="container-fluid  ">
                          <h2> Data Nonlitigasi </h2>
                        <!-- <a href="<?php echo base_url()?>c_nonlit/add" class="btn btn-sm btn-primary"> Tambah </a> -->
                      
                        <p>
						
						  <?php  if ($this->session->userdata("status") !="login") { ?>
						  
						  <?php } else { ?>
                          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Tambah 
                          </a>
						  <?php } ?>
						  
                        </p>
                        <div class="collapse" id="collapseExample">
                          <div class="card card-body">

                          <form action="<?php echo base_url('c_nonlit/doAdd')?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title">Input Data Nonlitigasi </h3>
                                        <hr>
                                        <div class="row p-t-20">

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Permohonan Non Litigasi <span class="text-danger">*</span> </label>
                                                   <textarea class="form-control form-control-sm" required data-validation-required-message="This field is required" name="permohonan_nonlit" placeholder=" Permohonan "></textarea> 
                                               </div>
                                        </div>
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Tanggal Permohonan <span class="text-danger">*</span></label>
                                                    <input  type="date" class="form-control" required data-validation-required-message="This field is required" name="tgl_nonlit" placeholder="Tanggal Sidang ">
                                                </div>
                                            </div>
                                              
                                            
                                        
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="<?php echo base_url('c_perkara')?>" class="btn btn-warning">Cancel</a>
                                    </div>
                                </form>

                          </div>
                        </div>
                   	<br><br> 
                  
                    <div class="col-sm-12">


                    
                    
						<div class="data-table-list box_general_3">
							<div class="basic-tb-hd">
                          <hr>
                                          <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
   
                                            <thead>
                                                <tr>
                                                    <th width="5%"> No </th>
                                                    <th width="10%"> Permohonan Nonlit  </th>
                                                    <th width="20%"> Tanggal Permohonan  </th>
                                                    <th width="20%"> Jumlah Resume  </th>
                                                    <th width="25%"> Detail </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                             $i=1; 
                                             foreach ($data_nonlit as $value) { ?>
											 <?php 
												$sql ="SELECT COUNT(t_resume.id_resume) as ini
														FROM t_resume
														join t_nonlit on t_nonlit.id_nonlit = t_resume.id_nonlit
														where t_resume.id_nonlit = $value->id_nonlit ";
												$query = $this->db->query($sql)->result(); ?> 
											 
                                                <tr> 
                                                
                                                <td> <?php echo $i++;?>  </td>
                                                <td> <?php echo $value->permohonan_nonlit?>  </td>
                                                <td> <?php echo date('d F Y', strtotime($value->tgl_nonlit));?></td>
												<?php  foreach ($query as $hmm) { ?>
                                                <td> <?php echo $hmm->ini ?>  (X) </td>
                                                <?php } ?>
												<td>
												<?php if ($this->session->userdata("status") !="login") { ?>
												  <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>c_nonlit/daftarResume/<?php echo $value->id_nonlit?>"> <i class="icon-doc-text"></i> </a>												 
												 <?php } else { ?>
												<a class="btn btn-primary btn-sm" href="<?php echo base_url()?>c_nonlit/daftarResume/<?php echo $value->id_nonlit?>"> <i class="icon-doc-text"></i> </a>
                                                <a class="btn btn-warning btn-sm" href="<?php echo base_url()?>c_nonlit/edit_nonlit/<?php echo $value->id_nonlit?>"> <i class="icofont-edit"></i></a>   
												<button type="button" class="btn btn-sm btn-danger tombol_hapus" id_nonlit="<?php echo $value->id_nonlit ?>"> <i  data-toggle="tooltip" title="Hapus" class="icofont-trash"></i> </button>
												 <?php } ?>												
                                
												
                                                </td>
                                                
                                            </tr>
                                            <?php } ?>
											</tbody>
                </table>
							</div>
						</div>    
          </div>
        <br>
        <br>

    </div>

   
 
    <script> 
	
	    /* Datatables responsive */

    $(document).ready(function() {
        $('#datatable-responsive').DataTable( {
            responsive: true
        } );
    } );

    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });

   // function format(value) {
  //    return '<div> <span> <b> Para Pihak : </b></span></br> ' + value + '</div>';
  //}
 // $(document).ready(function () {
  //    var table = $('#example').DataTable({
  //      rowReorder: {
  //          selector: 'td:nth-child(2)'
  //      },
  //      responsive: true,
  //      searching : false
  //    });

    //   new $.fn.dataTable.FixedHeader(table);

      // Add event listener for opening and closing details
//      $('#example').on('click', 'td.details-control', function () {
  //        var tr = $(this).closest('tr');
    //      var row = table.row(tr);

      //    if (row.child.isShown()) {
              // This row is already open - close it
        //      row.child.hide();
          //    tr.removeClass('shown');
          //} else {
              // Open this row
            //  row.child(format(tr.data('child-value'))).show();
              //tr.addClass('shown');
          //}
      //});
 // });
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
                 url: "<?php echo base_url(); ?>c_perkara/delete_perkara",
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

<script> 
    $("#from-datepicker").datepicker({ 
        format: 'yyyy-mm-dd'
    });
     
</script>

<script>
//Event ketika foto dihapus
$(document).on('click', '.tombol_hapus', function() { 
    var id_nonlit = $(this).attr("id_nonlit");
    console.log(id_nonlit); 
	// var token=a.token;
	$.ajax({
		type:"post",
		data:{id_nonlit:id_nonlit},
		url:"<?php echo base_url('C_nonlit/remove_nonlit') ?>",
		cache:false,
		dataType: 'json',
		success: function(){
            // data_berkas();
			console.log("data terhapus");
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

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
                <h1 data-aos="fade-up" data-aos-delay=""> Data Perkara Litigasi </h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
                <div class="col-sm-12">
                      <?php if ($this->session->userdata("status") !="login") { ?>
                          <div class="example-box-wrapper">
                                  <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
   
                                            <thead>
                                                <tr>
                                                    <th width="5%"> No </th>
                                                    <th width="5%"> Nomor Perkara  </th>
                                                    <!-- <th width="20%"> Lokasi  </th> -->
                                                    <th width="10%"> Objek Permasalahan  </th>
                                                    <th width="25%"> Para Pihak </th>
													<th width="5%"> Kuasa Hukum </th>
                                                    <th width="5%"> Status </th>
                                                    <!-- <th width="5%"> Lama Proses </th> --> 
                                                    <th width="10%"> Detail </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 1;
                                    
                                    foreach ($get_data as $key) { ?>
                                        <td> <?php echo $i++;?></td>
                                        <td> <?php echo $key->perkara_no;?></td>
                                        <!-- <td> <?php echo $key->perkara_alamat;?></td> -->
                                        <td> <?php echo $key->perkara_objek;?></td>
                                        <td> <?php echo $key->perkara_penggugat;?> <br /> <?php echo $key->perkara_tergugat;?>  </td>
										<td> <?php echo $key->perkara_kuasa_hukum;?> </td>
										<td> 
                                        <?php if ($key->STATUS == "Proses"){ ?> 
                                            Proses <?php echo $key->perkaradet_tingkat ?>  </td>
                                        <?php } else { ?>
                                         <?php echo $key->STATUS;?>  <br /> ( Pemerintah Kota <?php echo $key->perkaradet_status;?> )</td>
                                        <?php } ?>
										
                                        <!-- <td> <?php echo $key->telat2;?> Hari</td> -->
                                        <td> <a href="<?php echo base_url()?>c_perkara/detail_perkara?perkara_id=<?php echo $key->perkara_id ?>&perkara_no=<?php echo $key->perkara_no ?>"> Detail</a></td>
                                        
                                        </tr>

                                        <?php } } else { ?>
                                            <p><a href="<?php echo base_url('c_perkara/tambah_data_perkara');?>" class="btn btn-primary"> Tambah</a></p>
                                            <div class="row"></div>
                                            <div class="container-fluid"></div>
                                            <hr>
                                       	<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">

                                            <thead>
                                                <tr>
                                                <th width="5%"> No </th>
                                                    <th width="5%"> Nomor Perkara  </th>
                                                 <!--   <th width="20%"> Lokasi  </th> -->
                                                    <th width="10%"> Objek Permasalahan  </th>
                                                    <th width="25%"> Para Pihak </th>
													<th width="20%"> Kuasa Hukum </th>
                                                    <th width="5%"> Status </th>
                                                   <!-- <th width="5%"> Lama Proses </th> --> 
                                                    <th width="10%"> Detail </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 1;
                                    
                                    foreach ($get_data as $key) { ?>
                                        
                                       
                                        <td> <?php echo $i++;?></td>
                                        <td> <?php echo $key->perkara_no;?></td>
                                        <!-- <td> <?php echo $key->perkara_alamat;?></td> -->
                                        <td> <?php echo $key->perkara_objek;?></td>
                                        <td> <?php echo $key->perkara_penggugat;?> - <br /><?php echo $key->perkara_tergugat;?>  </td>

										<td> <?php echo $key->perkara_kuasa_hukum;?> </td>
                                        <td> 
                                        <?php if ($key->STATUS == "Proses"){ ?> 
                                            Proses <?php echo $key->perkaradet_tingkat ?> </td>
                                        <?php } else { ?>
                                         <?php echo $key->STATUS;?>  <br /> ( Pemerintah Kota <?php echo $key->perkaradet_status;?> )</td>
                                        <?php } ?>
                                        
                                        <!-- <td> <?php echo $key->telat2;?> Hari</td> -->
                                        <td>
                                        
                                        <a class="btn btn-primary btn-sm" href='<?php echo base_url();?>c_perkara/upload_file_kronologi?perkara_id=<?php echo $key->perkara_id ?>&perkara_no=<?php echo $key->perkara_no?>'> <i  data-toggle="tooltip" title="Kronologi" class="icon-doc-text"></i> </a> |
                                        <a class="btn btn-warning btn-sm" href='<?php echo base_url();?>c_perkara/getdata_putusan?perkara_id=<?php echo $key->perkara_id ?>'> <i  data-toggle="tooltip" title="Putusan" class="icon-hourglass-1"></i> </a> |
                                        <a class="btn btn-warning btn-sm" href='<?php echo base_url();?>c_perkara/input_edit?perkara_id=<?php echo $key->perkara_id ?>' > <i  data-toggle="tooltip" title="Update" class="icofont-edit"></i> </a> |
                                        <button class="btn btn-danger btn-sm tombol_delete" role="button" id_perkara="<?php echo $key->perkara_id?>"> <i  data-toggle="tooltip" title="Hapus" class="icofont-trash"></i> </button>  |
                                        <a class="btn btn-success btn-sm" href='<?php echo base_url();?>c_perkara/getdata_jadwal?perkara_id=<?php echo $key->perkara_id ?>&perkara_no=<?php echo $key->perkara_no?>'> <i  data-toggle="tooltip" title="Jadwal" class="icon-calendar-5"></i> </a> |
                                        <a class="btn btn-primary btn-sm" href='<?php echo base_url();?>c_perkara/detail_perkara?perkara_id=<?php echo $key->perkara_id?>'> <i class="icofont-search"></i> </a>
                                            
                                      
                                        
                                        </td>

                                        </tr>
                                    <?php } } ?>
                                    </tbody>

                                    </table> 

                            </div>
                        </div>
                        
                        <br>
                        <br> 
    <script> 
	
	    /* Datatables responsive */

    $(document).ready(function() {
        $('#datatable-responsive').DataTable( {
            responsive: true,
			"bStateSave": true
        } );
		
		$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
    } );

    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Cari Disini ....");
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

 
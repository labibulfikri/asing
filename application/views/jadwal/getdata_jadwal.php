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
                <h1 data-aos="fade-up" data-aos-delay=""> Jadwal Sidang </h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
                <!-- Row -->
                <div class="row">
                    <div class="col-sm-12">

                <form action="<?php echo base_url('c_jadwal/search_bytgl')?>" method="post">
                           
                      <div class="col-md-5">
                          <div class="form-group">
                              <label class="control-label"> Tanggal Awal <span class="text-danger">*</span> </label>
                              <input type="date" class="form-control" required data-validation-required-message="This field is required" name="tgl_awal" placeholder="Tanggal awal ">                     
                      </div>
                    </div>
            
                    <div class="col-md-5">
                          <div class="form-group">
                              <label class="control-label"> Tanggal Akhir <span class="text-danger">*</span> </label>
                              <input type="date" class="form-control" required data-validation-required-message="This field is required" name="tgl_akhir" placeholder="Tanggal akhir ">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              
                              <label class="control-label"> <span class="text-danger"></span> </label>
                          <button type="submit" class="btn btn-primary form-control"> Cari </button>
                      </div>
                      </div>
                        
                </form>           
                    

                          
                             
                            <div class="row"></div>
                            <div class="container-fluid"></div>
                            <hr>
                            
                            <br>
                            <br>
                            <div class="container-fluid">
                            <div class="card-body bg-white">
                              <div class="card-box table-responsive m-t-40">
                                
                                <a target="_blank" href='<?php echo base_url();?>c_jadwal/print_jadwal?tgl1=<?php echo $tgl1;?>&tgl2=<?php echo $tgl2;?>' class="btn btn-sm btn-primary"> Print </a>
								<p> <?php echo $tgl1 ?> - <?php echo $tgl2 ?></p>
                                <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
            
                                    <thead>
                                        <tr>
                                            <th width="5%"> No </th>
                                            <th width="20%"> Nomor Perkara</th>
                                            <th width="20%"> Agenda  </th>
                                            <th width="30%"> Pihak  </th>
                                            <th width="20%"> Tanggal </th>
                                            <th width="15%"> Jam </th>
                                            <th width="10%"> Tindakan </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;

                                    foreach ($get_data as $key) { ?>
                                        <tr>

                                            <td><?php echo $i++?></td>
                                            <td><?php echo $key->perkara_no?></td>
											<td><?php echo $key->jadwal_judul?></td>
                                            <td><?php echo $key->perkara_penggugat?> - <?php echo $key->perkara_tergugat?></td>
                                            <td>
                                            <?php
                                                    $harinya = date("D", strtotime($key->jadwal_tgl));
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
                                            <?php echo $getHari?>, <?php echo date('d F Y ', strtotime($key->jadwal_tgl))?>
                                            </td>
                                            
                                            
                                            <td><?php echo $key->jadwal_waktu?></td>
                                            <td>
                                            <center>
                                            <!-- <a href='<?php echo base_url();?>c_jadwal/detail_jadwal?jadwal_id=<?php echo $key->jadwal_id ?>&jadwal_perkara_id=<?php echo $key->jadwal_perkara_id?>&perkara_id=<?php echo $key->perkara_id?>'> <i class="icon-search"></i> </a> -->
                                            <a href='<?php echo base_url();?>c_jadwal/detail_jadwal?jadwal_id=<?php echo $key->jadwal_id ?>&perkara_id=<?php echo $key->perkara_id?>'> <i class="icofont-ui-search"></i> </a>
                                            </center>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                    

                           
                            </div>
                        </div> 
                        <br>
                        <br>
						</div>
						
        </div>
    </div>
    </div>
    </div>
    </div>
  <script> 
	
	    /* Datatables responsive */

    $(document).ready(function() {
        $('#datatable-responsive').DataTable( {
            responsive: true,
			pageLength: 50
        } );
    } );

    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });
	</script>
    
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

         
         </script>

 
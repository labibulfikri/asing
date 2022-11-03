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
                <h1 data-aos="fade-up" data-aos-delay=""> Jadwal Perkara </h1> 
				
                <h1 data-aos="fade-up" data-aos-delay=""> Nomor Perkara : <?php echo $perkara_no?> </h1> 
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
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
                            <!-- <h5> Nomor Perkara : <?php echo $perkara_no;?> </h5>  -->
                            <a type="button" href="<?php echo base_url();?>c_perkara" class="btn btn-sm btn-success"> Kembali</a>
                            <a type="button" href="<?php echo base_url();?>c_perkara/tambah_jadwal?perkara_id=<?php echo $perkara_id;?>" class="btn btn-sm btn-primary"> Tambah</a>
                            <div class="row"></div>
                            <div class="container-fluid"></div>
                            <hr>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th data-hide="phone, tablet"> No </th>
                                            <th data-hide="phone, tablet"> Perihal </th>
                                            <th data-hide="phone, tablet"> Tanggal </th>
                                            <th data-hide="phone, tablet"> Waktu  </th>
                                            <th data-hide="phone, tablet"> Keterangan  </th>
                                            <th data-hide="phone, tablet">Tindakan </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;

                                    foreach ($get_data_jadwal as $key) { ?>
                                        <tr>
                                        <td> <?php echo $i++;?></td>
                                        <td> <?php echo $key->jadwal_judul;?></td>
                                        <td> <?php echo date('d F Y ', strtotime($key->jadwal_tgl));?></td>
                                        <td> <?php echo $key->jadwal_waktu;?></td>
                                        <td> <?php echo $key->jadwal_keterangan;?></td>
                                        <td>
                                        
                                        <a href='<?php echo base_url();?>c_perkara/edit_jadwal?perkara_id=<?php echo $key->perkara_id?>&jadwal_id=<?php echo $key->jadwal_id?>' role="button" class="btn btn-primary btn-sm"> <i  data-toggle="tooltip" title="Edit" class="icofont-edit"></i> </a> |

                                        <button role="button" class="tombol_delete btn btn-danger btn-sm" jadwal_id="<?php echo $key->jadwal_id?>" id_perkara="<?php echo $key->perkara_id?>"> <i  data-toggle="tooltip" title="Hapus" class="icofont-trash"></i> </button> 
                                        
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
         
        </div>
    </div>



    <script>
    
               //fungsi delete
        $(document).on('click', '.tombol_delete', function() {
         var perkara_id = $(this).attr("id_perkara");
         var jadwal_id = $(this).attr("jadwal_id");
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
                 url: "<?php echo base_url(); ?>c_perkara/delete_jadwal",
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
                     jadwal_id : jadwal_id
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
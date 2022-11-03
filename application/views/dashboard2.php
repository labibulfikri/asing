  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">

    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">

          <div class="col-lg-7 text-lg-left">
                            <h1 data-aos="fade-right"> Aplikasi Sidang </h1>
							
                            <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Aplikasi Sidang adalah sarana yang digunakan untuk mencatat sengketa bangunan, tanah dan aset, serta yang dikelola oleh Pemerintah Kota Surabaya. Aplikasi Sengketa Bangunan dan Tanah digunakan di Dinas Pengelolaan Bangunan dan Tanah Pemerintah Kota Surabaya.</p>
                            <!-- <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#" class="btn btn-outline-white">Get started</a></p> -->
                        </div>
            <div class="col-lg-5 iphone-wrap">
              <!-- <img src="assets/img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right"> -->
              <img src="assets/image1.jpg" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
            </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <section class="section">

<div class="container">
  <!-- <div class="row justify-content-center text-center mb-5" data-aos="fade">
    <div class="col-md-6 mb-5">
      <img src="<?php echo base_url()?>assets/assets/img/undraw_svg_1.svg" alt="Image" class="img-fluid">
    </div>
  </div> -->

  <div class="row">
    <div class="col-md-6">
      <div class="step">
        <!-- <span class="number">01</span> -->
         <!-- <?php  $tgl = date('Y-m-d'); $tgl_akhir = date('Y-m-d', strtotime('+3 days', strtotime($tgl)));?>
        <span>  Tanggal : <?php echo $tgl?> - <?php echo $tgl_akhir ?> </span>
-->
        <h3> Jadwal Sidang </h3>
        <div class="row">

				<?php
				  if ($get_data_jadwal_limit != null) { ?>

					  
                    <table class="table table-responsive">
                    <thead>
                        <tr>

                            <th> No</th>
							              <th> Nomor Perkara</th>
                            <th> Agenda</th>
                            <th> Tanggal</th>
                            <th> Waktu</th>
                        </tr>
                        </thead>
                    <tbody>
                    <?php 
                    $i= 1;
                    foreach ($get_data_jadwal_limit as $value ) { ?>
                    <tr>

                    <td><?php echo $i++ ?></td>
					 <td><?php echo $value->perkara_no ?></td>
                    <td> <a href='<?php echo base_url();?>c_jadwal/detail_jadwal?jadwal_id=<?php echo $value->jadwal_id ?>&perkara_id=<?php echo $value->jadwal_perkara_id?>'>  <?php echo $value->jadwal_judul ?>  </a></td>
                    <td>

                        <?php
                        $harinya = date("D", strtotime($value->jadwal_tgl));
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

                        echo $getHari ?> ,<?php echo date('d F Y ', strtotime($value->jadwal_tgl));?>
                                        
                    </td>
                    
                    
                    <td><?php echo $value->jadwal_waktu ?></td> 
                    </tr>
				 <?php } ?>  
                    </tbody>

                    </table>
					
				 <div class="col-lg-6">
				 <a href="<?php echo base_url('c_jadwal')?>" class="btn btn-primary btn-sm"> Jadwal Sidang Lengkap</a></p> 
				</div> 
				 <?php } else { ?>           
          
          <span > Kosong </span>
          <hr>
						<a href="<?php echo base_url('c_jadwal')?>" class="btn btn-primary btn-sm"> Jadwal Sidang Lengkap</a>

                      <?php }  ?>
				 
                    </div>

      </div>
    </div>
    
    <div class="col-md-6 iphone-wrap">
      <img src="<?php echo base_url()?>assets/image2.jpg" alt="Image" class="img-fluid"> 
    
      </div>
    </div>
  </div>


</section>

<style>
/*search box css start here*/
.search-sec{
    padding: 2rem;
}
.search-slt{
    display: block;
    width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #55595c;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
.wrn-btn{
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
@media (min-width: 992px){
    .search-sec{
        position: relative;
        top: -114px;
        background: rgba(26, 70, 104, 0.51);
    }
}

@media (max-width: 992px){
    .search-sec{
        background: #1A4668;
    }
}
</style>

<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://pbs.twimg.com/media/EGHYvttU4AAYKb7?format=jpg&name=large" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://pbs.twimg.com/media/EGHYvtkUcAAuc8T?format=jpg&name=large" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://pbs.twimg.com/media/EGHYvtjU0AAO8w1?format=jpg&name=large" class="d-block w-100" alt="...">
            </div>
            https://upload.wikimedia.org/wikipedia/commons/8/8d/Yarra_Night_Panorama%2C_Melbourne_-_Feb_2005.jpg>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->


        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				</ol>

			
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="<?php echo base_url()?>assets/image1.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<!-- <h5>Gambar Slide Yang Pertama</h5> -->
							<!-- <p>Gambar pemandangan sungai.</p> -->

							<input type="text">
						</div>
					</div>
					<div class="carousel-item">
						<img src="<?php echo base_url()?>assets/img/taman.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<!-- <h5>Gambar Slide Yang Kedua</h5> -->
							<!-- <p>Gambar pemandangan sawah di desa.</p> -->
						</div>
					</div>
					<div class="carousel-item">
						<img src="<?php echo base_url()?>assets/img/tunjungan.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<!-- <h5>Gambar Slide Yang Ketiga</h5> -->
							<!-- <p>Gambar pemandangan taman belakang rumah.</p> -->
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
    </div>
</section>
<section class="search-sec">
    <div class="container">
        <form action="<?php echo base_url('c_perkara/search_perkara')?>" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- <div class="col-lg-12 col-md-3 col-sm-12 p-0"> -->
                        <div class="col-sm-9">
                            <input type="text" name="search" required class="form-control form-control-sm search-slt" placeholder="Objek Permasalahan">
                        </div>
                        <!-- <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter Drop City">
                        </div> -->
                        <!-- <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                <option>Select Vehicle</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                            </select>
                        </div> -->
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<div class="bg_color_1"> 
			<div class="container margin_120_95">
				<div class="main_title">
                
                <?php 
                   
                    $tgl = date('Y-m-d'); 
                    $tgl_akhir = date('Y-m-d', strtotime('+3 days', strtotime($tgl)));

                
                
                ?>
                    
                    <h2> Jadwal Sidang  </h2>
					<h5> Tanggal : <?php echo $tgl?> - <?php echo $tgl_akhir ?></h5> 
					<!-- <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri.</p> -->
				</div>
				<div class="row">

				<?php
				  if ($get_data_jadwal_limit != null) { ?>

					  
                    <table class="table">
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
				 <p class="text-center add_top_30"><a href="<?php echo base_url('c_jadwal')?>" class="btn_1 medium"> Jadwal Sidang Lengkap</a></p> 
				</div> 
				 <?php } else { ?>      
				 
                    <div class="container margin_120">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div id="confirm">
                                    
                                <h2> Kosong </h2>
                              
                                </div>
                            </div>
                        </div>
						<p class="text-center"><a href="<?php echo base_url('c_jadwal')?>" class="btn_1 medium"> Jadwal Sidang Lengkap</a></p>
					 
                    </div>
                                   
                    <?php }  ?>
				
                    </div>
                    </div>
                    <div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2>Berita Terkini</h2>
					<p>Dinas Pengelolaan Bangunan dan Tanah Kota Surabaya</p>
				</div>

                    <div id="reccomended" class="owl-carousel owl-theme">
                <?php foreach ($getberita_limit as $key ) { ?>
					<div class="item">
						<a href="<?php echo base_url()?>c_berita/detail_berita?berita_id=<?php echo $key->berita_id?>">
							<div class="views"><i class="icon-eye-7"></i><?php echo $key->berita_tgl ?></div>
							<div class="title">
								<h4><?php echo $key->berita_judul ?></em></h4>
							</div>
                            <img src="<?php echo base_url()?>assets/upload_berita/<?php echo $key->name_berkas?>" style="max-height: 200px;" alt="">
						</a>
					</div> 
				 
				
                <?php } ?>
				</div>
				</div>
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<!-- /white_bg -->
		</div>
 
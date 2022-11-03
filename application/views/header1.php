<header class="header_sticky">	
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<!-- /btn_mobile-->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo">
						<a href="<?php echo base_url('c_dashboard')?>" title="Findoctor"><img src="<?php echo base_url()?>assets/img/logo4.png" data-retina="true" alt="" width="163" height="36"></a>
					</div>
				</div>
				<div class="col-lg-9 col-6">
					<ul id="top_access">
						<?php if ($this->session->userdata('status') != "login") { ?>
						
							<li><a href="<?php echo base_url('c_login')?>"><i class="icon-login" data-toggle="tooltip" title="login" ></i></a></li>
						<?php } else { ?>

							<li><a href="<?php echo base_url('c_login/log_out')?>"><i class="icon-logout-1" data-toggle="tooltip" title="logout" ></i></a></li>
						<?php } ?>
						<!-- <li><a href="register-doctor.html"><i class="pe-7s-add-user"></i></a></li> -->
					</ul>
					<nav id="menu" class="main-menu">
						<ul>
							
                        <li><span><a href="<?php echo base_url('c_dashboard')?>">Home</a></span></li>
							<li>
								<span><a href="#0">Perkara</a></span>						
                                <ul>
                                
									<li><a href="<?php echo base_url('c_perkara')?>">Data Perkara</a></li>
						 
								</ul>

                            <li>
								<span><a href="#0">Jadwal Sidang</a></span>						
                                <ul>
                                    <li><a href="<?php echo base_url('c_jadwal')?>">Jadwal</a></li>
                            </ul>

							<li>
								<span><a href="#0">Laporan</a></span>						
                                <ul>
                                    <li><a href="<?php echo base_url('c_laporan')?>">Laporan Perkara </a></li>
							</ul>
							
							<li>
								<span><a href="#0">Berita</a></span>						
                                <ul>
                                    <li><a href="<?php echo base_url('c_berita')?>">Data Berita </a></li>
                            </ul>
							
							<?php if($this->session->userdata("status") == "login"){ ?>
								
							<li>
								<span><a href="#0">Non Litigasi</a></span>						
                                <ul>
                                    <li><a href="<?php echo base_url('c_nonlit')?>">Data Non Litigasi </a></li>
                            </ul>
	
							<?php } ?>
							
						</ul>
					</nav>
					<!-- /main-menu -->
				</div>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->
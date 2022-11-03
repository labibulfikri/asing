
  <!-- ======= Header ======= -->
  <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center">

        <div class="col-6 col-lg-2">
          <h1 class="mb-0 site-logo"><a href="<?php echo base_url('c_dashboard')?>" class="mb-0"> Asing </a></h1>
        </div>

        <div class="col-12 col-md-10 d-none d-lg-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li><a href="<?php echo base_url('c_dashboard')?>" class="nav-link">Home</a></li>
              <li><a href="<?php echo base_url('c_perkara')?>" class="nav-link">Perkara</a></li>
              <li><a href="<?php echo base_url('c_jadwal')?>" class="nav-link">Jadwal Sidang</a></li>
              <li><a href="<?php echo base_url('c_laporan')?>" class="nav-link">Laporan Sidang</a></li>
              <!-- <li><a href="http://172.17.126.83/sengketa/" class="nav-link">Non Litigasi</a></li> -->
			  

             
						<?php if ($this->session->userdata('status') != "login") { ?>
						
							<li><a class="nav-link" href="<?php echo base_url('c_login')?>">Login</a></li>
						<?php } else { ?>
               <li><a href="<?php echo base_url('c_nonlit');?>" class="nav-link">Non Litigasi</a></li> 

							<li><a class="nav-link" href="<?php echo base_url('c_login/log_out')?>"> Logout</i></a></li>
						<?php } ?>
						<!-- <li><a href="register-doctor.html"><i class="pe-7s-add-user"></i></a></li> -->
				 
<!-- 
              <li class="has-children">
                <a href="blog.html" class="nav-link">Blog</a>
                <ul class="dropdown">
                  <li><a href="blog.html" class="nav-link">Blog</a></li>
                  <li><a href="blog-single.html" class="nav-link">Blog Sigle</a></li>
                </ul>
              </li> -->
              <!-- <li><a href="contact.html" class="nav-link">Contact</a></li> -->
            </ul>
          </nav>
        </div>

        <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

          <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>
        </div>

      </div>
    </div>

  </header>

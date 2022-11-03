	
	<main>
		<div id="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->
		
		<div class="container margin_60">
			<div class="row">
				<div class="col-lg-9">
					<div class="bloglist singlepost">
						<p><img alt="" class="img-fluid" src="<?php echo base_url()?>assets/upload_berita/<?php echo $getberita->name_berkas?>"></p>
						<h1><?php echo $getberita->berita_judul?></h1>
						<div class="postmeta">
							<ul>
								<!-- <li><a href="#"><i class="icon_folder-alt"></i> </a></li> -->
								<li><a href="#"><i class="icon_clock_alt"></i> <?php echo $getberita->berita_tgl?></a></li>
								<!-- <li><a href="#"><i class="icon_pencil-edit"></i> Admin</a></li> -->
								<!-- <li><a href="#"><i class="icon_comment_alt"></i> (14) Comments</a></li> -->
							</ul>
						</div>
						<!-- /post meta -->
						<div class="post-content">
							<div class="dropcaps">
								<p><?php echo $getberita->berita_isi?></p>
							</div> 
						</div>
						<!-- /post -->
					</div>
					<!-- /single-post -->

					 

				 
				</div>
				<!-- /col --> 
				<aside class="col-lg-3">
					<div class="widget">
						<form>
							<div class="form-group">
								<input type="text" name="search" id="search" class="form-control" placeholder="Search...">
							</div>
							<button type="submit" id="submit" class="btn_1"> Search</button>
						</form>
					</div>
					<!-- /widget -->
					
					<div class="widget">
						<div class="widget-title">
							<h4>Recent Posts</h4>
						</div>
						<ul class="comments-list">
                        <?php foreach ($getdata as $key ) { ?>
                            <li>
								<div class="alignleft">
									<a href="<?php echo base_url()?>c_berita/detail_berita?berita_id=<?php echo $key->berita_id?>"><img src="<?php echo base_url()?>assets/upload_berita/<?php echo $key->name_berkas?>" alt=""></a>
								</div>
								<small><?php echo $key->berita_tgl?></small>
								<h3><a href="<?php echo base_url()?>c_berita/detail_berita?berita_id=<?php echo $key->berita_id?>" title=""><?php echo $key->berita_judul?></a></h3>
							</li>
                          
							
                        <?php } ?>
							 
						</ul>
					</div>
					<!-- /widget -->

					<!-- <div class="widget">
						<div class="widget-title">
							<h4>Blog Categories</h4>
						</div>
						<ul class="cats">
							<li><a href="#">Treatments <span>(12)</span></a></li>
							<li><a href="#">News <span>(21)</span></a></li>
							<li><a href="#">Events <span>(44)</span></a></li>
							<li><a href="#">New treatments <span>(09)</span></a></li>
							<li><a href="#">Focus in the lab <span>(31)</span></a></li>
						</ul>
					</div>
					 /widget -->

					<!--<div class="widget">
						<div class="widget-title">
							<h4>Popular Tags</h4>
						</div>
						<div class="tags">
							<a href="#">Medicine</a>
							<a href="#">Treatments</a>
							<a href="#">Events</a>
							<a href="#">Specialist</a>
							<a href="#">Pills</a>
							<a href="#">Cancer</a>
						</div>
					</div> -->
					<!-- /widget -->
					
				</aside>
                
                <!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->
	
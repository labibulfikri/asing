<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="<?php echo base_url()?>assets/images/hery.jpeg" alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5> Hery Poerboyo </h5>
                        <!-- <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a> -->
                        <!-- <a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a> -->
                        <a href="<?php echo base_url();?>c_login/log_out" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                        <div class="dropdown-menu animated flipInY">
                     
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                
                                
                    <ul id="sidebarnav">
                        <li><a href="<?php echo base_url('c_dashboard')?>"> Dashboard </a> </li> 
                        <li><a href="<?php echo base_url('c_rekom')?>"> Input Rekom </a> </li>
                        <li class="nav-small-cap"> Input Perkara </li>
                      
                                  
                                         
                                            <li> 
                                                <a href="<?php echo base_url('c_rekom/get_data')?>"> Rekomendasi Bank 
                                                 <span class="label label-rouded label-themecolor pull-right">  <?php echo $key->jumlah; ?>  </span>
                                                </a>
                                            </li>
                                
                             
 
                             
                                    <li>
                                        <a href="<?php echo base_url('c_rekom/get_data')?>"> Rekomendasi Bank </a>
                                    </li>
                              
                        <li><a href="<?php echo base_url('c_rekom/get_all_data')?>"> Histori </a></li>

                   
                            </ul>
                            
                    </ul>



                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
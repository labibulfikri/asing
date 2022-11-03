
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
                <h1 data-aos="fade-up" data-aos-delay=""> Update Data Nonlitigasi </h1>
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
                        <div class="basic-tb-hd">
                           <br>
                           <br>
                            <div class="card-body bg-white"> 
                                
                                <form action="<?php echo base_url('c_nonlit/doEdit')?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title"> Update Data Nonlitigasi  </h3>
                                        <hr>
                                        <div class="row p-t-20">

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Permohonan Non Litigasi <span class="text-danger">*</span> </label>
                                                    <input type="hidden" name="id_nonlit" value="<?php echo $nonlitRow->id_nonlit?>"> 
                                                   <textarea class="form-control form-control-sm" required data-validation-required-message="This field is required" name="permohonan_nonlit" placeholder=" Permohonan "> <?php echo $nonlitRow->permohonan_nonlit?> </textarea> 
                                               </div>
                                        </div>
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Tanggal Permohonan <span class="text-danger">*</span></label>
                                                    <input value="<?php echo $nonlitRow->tgl_nonlit?>" type="date" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="tgl_nonlit" placeholder="Tanggal">
                                                </div>
                                            </div>
                                        
                                          
                                    <div class="col-md-12">                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                            <a href="<?php echo base_url('c_nonlit')?>" class="btn btn-warning">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </form>
                            </div>
                        </div>
 
                    </div>
                </div> 
            </div> 
            <br>
            <br>
        
<script> 
    $("#from-datepicker").datepicker({ 
        format: 'yyyy-mm-dd'
    });
    
// }); 
</script>
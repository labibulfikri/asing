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
                <h1 data-aos="fade-up" data-aos-delay=""> Input Data Jadwal </h1>
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
                            <!-- <div class="card-header">  -->
                                <!-- <h4 class="m-b-0 text-white"> Form Input Data </h4> -->
                            <!-- </div> -->
                            <br>
                            <br>
                            <div class="card-body bg-white"> 
                                
                                <form action="<?php echo base_url('c_perkara/insert_data_jadwal')?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title">Input Jadwal Sidang </h3>
                                        <hr>
                                        <div class="row p-t-20">

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Agenda  <span class="text-danger">*</span> </label>
                                                    <input type="text"  class="form-control form-control-sm" required data-validation-required-message="This field is required" name="jadwal_agenda" placeholder=" Masukkan Agenda ">
                                                    <input type="hidden" readonly class="form-control form-control-sm" required data-validation-required-message="This field is required" value="<?php echo $perkara_id ?>" name="perkara_id" placeholder="Perkara Id">
                                               </div>
                                        </div>
 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Tanggal Sidang <span class="text-danger">*</span></label>
                                                    <!-- <input type="date" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="jadwal_tgl" placeholder="Tanggal Terima "> -->
                                                    <!-- <input  type="text" id="from-datepicker" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="jadwal_tgl" placeholder="Tanggal Sidang "> -->
                                                    <input  type="date" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="jadwal_tgl" placeholder="Tanggal Sidang ">
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Jam Sidang <span class="text-danger">*</span></label>
                                                    <input type="text" id="input-a" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="jadwal_waktu">
                                                    <!-- <input id="datepicker" type="time" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="jadwal_waktu" placeholder="Tanggal Terima "> -->
                                                </div>
                                            </div>
                                                                                      
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="<?php echo base_url()?>c_perkara/getdata_jadwal?perkara_id=<?php echo $perkara_id ?>" type="button" class="btn btn-warning">Cancel</a>
                                    </div>
                                </form>
                            </div>
                                </div>
                            </div>
                            </div>
                            <br>
                            <br>
                        
                    </div> 

                    

<script> 
    $("#from-datepicker").datepicker({ 
        format: 'yyyy-mm-dd'
    });
    $("#from-datepicker").on("change", function () {
        var fromdate = $(this).val();
        // alert(fromdate);
    });
// }); 
</script>

 <script>
 
 var input = $('#input-a');
input.clockpicker({
    autoclose: true
});
 
 
 </script>
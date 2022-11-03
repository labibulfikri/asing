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
                                
                                <form action="<?php echo base_url('c_nonlit/doAdd')?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title">Input Data Nonlitigasi </h3>
                                        <hr>
                                        <div class="row p-t-20">

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Permohonan Non Litigasi <span class="text-danger">*</span> </label>
                                                   <textarea class="form-control form-control-sm" required data-validation-required-message="This field is required" name="permohonan_nonlit" placeholder=" Permohonan "></textarea> 
                                               </div>
                                        </div>
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Tanggal Permohonan <span class="text-danger">*</span></label>
                                                    <input type="text" id="from-datepicker"class="form-control form-control-sm" required data-validation-required-message="This field is required" name="tgl_nonlit" placeholder="Tanggal">
                                                </div>
                                            </div>
                                              
                                            
                                        
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="<?php echo base_url('c_perkara')?>" class="btn btn-warning">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <br>
                        <br>
                    </div>
                </div> 
            </div>
        </div> 

        
<script> 
    $("#from-datepicker").datepicker({ 
        format: 'yyyy-mm-dd'
    });
    
// }); 
</script>
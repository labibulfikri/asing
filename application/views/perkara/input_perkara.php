
      
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
                <h1 data-aos="fade-up" data-aos-delay=""> Input Data Perkara </h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
</section>       
            <!-- ============================================================== -->
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
                                
                                <form action="<?php echo base_url('c_perkara/insert_data_perkara')?>" method="post">
                                    <div class="form-body">
                                        <h3 class="card-title">Input Data Perkara </h3>
                                        <hr>
                                        <div class="row p-t-20">

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Nomor Perkara <span class="text-danger">*</span> </label>
                                                   <input type="text"  class="form-control form-control-sm" required data-validation-required-message="This field is required" name="perkara_no" placeholder=" Nomor Perkara"> 
                                               </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Objek Permasalahan <span class="text-danger">*</span> </label>
                                                <input type="text" id="firstName" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="perkara_objek" placeholder="Objek Permasalahan">
                                            </div>
                                        </div>


                                    <!--    <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"> Alamat <span class="text-danger">*</span> </label>
                                                <input type="text" id="firstName" class="form-control form-control-sm" required data-validation-required-message="This field is required" name="perkara_alamat" placeholder="Alamat">
                                            </div>
                                        </div> -->

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Jenis Gugatan <span class="text-danger">*</span> </label>
                                                    <select class="select2 form-control custom-select" name="perkara_jenis" required data-validation-required-message="This field is required" style="width: 100%; height:36px;">
                                                    <option value="-" disabled selected> Silahkan Pilih </option>
                                                    <!-- <option value="Perbuatan Melawan Hukum"> Perbuatan Melawan Hukum </option> -->
                                                    <option value="Pengadilan Negeri"> Pengadilan Negeri </option>
                                                    <option value="Keputusan Tata Usaha Negara"> Pengadilan Tata Usaha Negara </option>
                                                    <option value="Pengadilan Agama"> Pengadilan Agama</option>
                                                    <option value="komisi informasi"> Komisi Informasi</option> 
                                                    <option value="lain-lain"> Lain-Lain </option> -->
                                                    </select>
                               
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Tanggal Masuk Gugatan</label>
                                                    <input type="date" class="form-control form-control-sm" name="perkara_tgl_masuk" placeholder="Tanggal">
                                                </div>
                                            </div>
                                              
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Penggugat  </label>
                                                    <!-- <textarea class="form-control form-control-sm" name="keterangan_rekom" placeholder="Keterangan"></textarea> -->
                                                    <!-- <textarea type="text" class="ckeditor form-control" id="banding_keterangan_edit" name="perkara_penggugat" ></textarea> -->
                                                    <textarea type="text" class="form-control" id="banding_keterangan_edit" name="perkara_penggugat" ></textarea>
                            
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Tergugat  </label>
                                                    <!-- <textarea class="form-control form-control-sm" name="keterangan_rekom" placeholder="Keterangan"></textarea> -->
                                                    <!-- <textarea type="text" class="ckeditor form-control" id="banding_keterangan_edit" name="perkara_tergugat" ></textarea> -->
                                                    <textarea type="text" class="form-control" id="banding_keterangan_edit" name="perkara_tergugat" ></textarea>
                            
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Kuasa Hukum  </label>
                                                    <!-- <textarea class="form-control form-control-sm" name="keterangan_rekom" placeholder="Keterangan"></textarea> -->
                                                    <!-- <textarea type="text" class="ckeditor form-control" id="banding_keterangan_edit" name="perkara_petitum" ></textarea> -->
													<textarea type="text" class="form-control" name="perkara_kuasa_hukum" ></textarea>
                            
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
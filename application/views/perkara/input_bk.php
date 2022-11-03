
<?php
 if ($this->session->flashdata('pesan')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
          Swal.fire({
          title: "Done",
          text: "<?php echo $this->session->flashdata('pesan'); ?>",
          // timer: 1500,
          // showConfirmButton: false,
          type: 'success'
          });
          });
    </script>
<?php 
}
?>
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Form Layout</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"> Dashboard </li>
                        <li class="breadcrumb-item active"> Berkas Kembali </li>
                    </ol>
                </div>
            
            </div>
           
            <div class="container-fluid">
 
            <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Berkas Kembali </h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('c_rekom/update_bk')?>" method="post">
                                    <div class="form-body">
                                        <!-- <h3 class="card-title">Input Data Rekom Bank</h3> -->
                                        <hr>
                                        <div class="row p-t-20">

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Nomor UPTSA : </label>
                                                    <input type="hidden"  class="form-control form-control-sm" name="rekomkeluar_rekom_no" value="<?php echo $getdata[0]->rekommasuk_no_uptsa;?>" readonly>
                                                    <input type="hidden"  class="form-control form-control-sm" name="rekommasuk_id" value="<?php echo $getdata[0]->rekommasuk_id;?>" readonly>
                                               </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Pemohon : </label>
                                                    <input type="text" class="form-control form-control-sm" name="rekomkeluar_tgl_masuk" value="<?php echo $getdata[0]->pemohon_nama;?>" readonly>
                                                </div>
                                            </div>                               

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Lokasi Persil </label>
                                                    <input type="text" id="firstName" class="form-control form-control-sm" name="alamat_persil" value="<?php echo $getdata[0]->alamat_persil;?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Keterangan </label>
                                                    <!-- <textarea class="form-control form-control-sm" name="rekomkeluar_keterangan" placeholder="Keterangan"></textarea> -->
                                                    <textarea type="text" class="ckeditor form-control" name="rekommasuk_keterangan"></textarea>
                            
                                                </div>
                                            </div>

                                            
                                        
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" terget="_blank" name="simpan" class="btn btn-success"> <i class="icon-printer"> Simpan & Cetak</i></button>
                                        <button type="reset" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>

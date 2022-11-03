<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themedesigner.in/demo/admin-press/main/form-layout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2019 02:58:57 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/loogo_sby.GIF">
    <title> DPBT Surabaya</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/main/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url()?>assets/main/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<style>
    #div_right
{
    float: right;
    width: 400px;
    height: 400px; 
}

</style>
​
</head>
<body onload="window.print();">
  <div class="wrapper">
<section>
            <center>
            <h2> REKOMENDASI BANK </h2>
            <h2> Bidang PSP </h2>
            <table style="width:80%" align="center" class="table table-sm table-bordered table-striped">
            <thead>
                <th width="5px;"> NO </th>
                <th> Pemrosesan </th>
                <th> Waktu Hari </th>
                <th> Tanggal Terima </th>
                <th> Tanggal Keluar </th>
                <th> Keterangan  </th>
                <th> Paraf </th>
            </thead>
            <tbody>
            <?php foreach ($get_bk as $key) { ?>
            <tr>
                <td width="5px;"> I </td>
                <td data-hide="phone, tablet"> LOKET </td>
                <td data-hide="phone, tablet">  </td>
                <td data-hide="phone, tablet">  </td>
                <td data-hide="phone, tablet">  </td>
                <td data-hide="phone, tablet">  </td>
                <td data-hide="phone, tablet"> </td>
            </tr>
            <tr>
                <td data-hide="phone, tablet"> </td>
                <td data-hide="phone, tablet"> KELENGKAPAN ADMINISTRASI (CEK RETRIBUSI) </td>
                <td align="center"> 2 </td>
                <td align="center"> <?php echo $key->rekommasuk_created_date ?> </td>
                <td align="center"> <?php echo $key->rekommasuk_created_date ?> </td>
                <td align="center"> <?php echo $key->rekommasuk_keterangan ?> </td>
                <td align="center">  <img src=" <?php echo base_url('assets/images/ttd.png');?>" width="20px;"></img> </td>
            </tr>
            
            <tr>
                <td data-hide="phone, tablet"> </td>
                <td data-hide="phone, tablet"> CEK BLOKIR DAN KETERANGAN LAINNYA </td>
                <td align="center"> 2 </td>
                <td align="center"> <?php echo $key->rekommasuk_created_date ?> </td>
                <td align="center"> <?php echo $key->rekommasuk_created_date ?> </td> 
                <td align="center"> <?php echo $key->rekomkeluar_keterangan ?> </td>
                <td align="center">  <img src=" <?php echo base_url('assets/images/ttd.png');?>" width="20px;"></img>  </td>
            </tr>
            <?php } ?>

            <tr>
                <td data-hide="phone, tablet"> II </td>
                <td data-hide="phone, tablet"> KA.SIE. PENANGANAN SENGKETA TANAH </td>
                <td></td>
                <?php foreach ($get_kasie as $kasie ) { ?>
                <?php if ($kasie->rekomkeluar_kepada = "kasie"){ ?>
                <td align="center"> <?php echo $kasie->rekomkeluar_tgl_masuk ?> </td>
                <td align="center"> <?php echo $kasie->rekomkeluar_tgl_keluar ?> </td>
                <td align="center"> <?php echo $kasie->rekomkeluar_keterangan ?> </td>
                <td align="center">  <img src=" <?php echo base_url('assets/images/ttd.png');?>" width="20px;"></img>  </td>
                <?php }else { ?> 
                <td align="center"> - </td>
                <td align="center"> - </td>
                <td align="center"> - </td>
                <td align="center"> - </td>
                <?php } } ?>

            </tr>

            
            <tr>

                <td data-hide="phone, tablet"> III </td>
                <td data-hide="phone, tablet"> KA.SIE. PENANGANAN SENGKETA BANGUNAN </td>
                <td></td>
                <?php foreach ($get_kasie as $kasie ) { ?>
                <?php if ($kasie->rekomkeluar_kepada = "kasie"){ ?>
                <td align="center"> <?php echo $kasie->rekomkeluar_tgl_masuk ?> </td>
                <td align="center"> <?php echo $kasie->rekomkeluar_tgl_keluar ?> </td>
                <td align="center"> <?php echo $kasie->rekomkeluar_keterangan ?> </td>
                <td align="center">  <img src=" <?php echo base_url('assets/images/ttd.png');?>" width="20px;"></img>  </td>
                <?php }else { ?> 
                <td align="center"> - </td>
                <td align="center"> - </td>
                <?php } } ?>
            
            </tr>
            
            <tr>
                <td data-hide="phone, tablet"> IV </td>
                <td data-hide="phone, tablet"> KA.BID. PENGENDALIAN </td> 
                <td></td>
                <?php foreach ($get_kabid as $kabid ) { ?>
                <?php if ($kabid->rekomkeluar_kepada == "kabid") { ?>

                <td align="center"> <?php echo $kabid->rekomkeluar_tgl_masuk ?>  </td>
                <td align="center"> <?php echo $kabid->rekomkeluar_tgl_keluar ?>  </td>
                <td align="center"> <?php echo $kabid->rekomkeluar_keterangan ?>  </td>
                <td align="center">  <img src=" <?php echo base_url('assets/images/ttd.png');?>" width="20px;"></img> </td>
                <?php } else { ?> 
                <td align="center"> - </td>
                <td align="center"> - </td>
                <td align="center"> - </td>
                <td align="center"> - </td>
                <?php } } ?>
            </tr>

            
            <tr>
                <td data-hide="phone, tablet"> V </td>
                <td data-hide="phone, tablet"> SEKRETARIS </td>
                <td align="center">  </td>
                <?php foreach ($get_kadis as $kadis ) { ?>
                <?php if ($kadis->rekomkeluar_kepada == "kadis") { ?>

                <td align="center"> <?php echo $kadis->rekomkeluar_tgl_masuk ?>  </td>
                <td align="center"> <?php echo $kadis->rekomkeluar_tgl_keluar ?>  </td>
                <td align="center"> <?php echo $kadis->rekomkeluar_keterangan ?>  </td>
                <td align="center">  <img src=" <?php echo base_url('assets/images/ttd.png');?>" width="20px;"></img> </td>
                <?php } else { ?> 
                <td align="center"> - </td>
                <td align="center"> - </td>
                <td align="center"> - </td>
                <td align="center"> - </td>
                <?php } } ?>
            </tr>

            
            <tr>
                <td data-hide="phone, tablet"> VI </td>
                <td data-hide="phone, tablet"> KEPALA DINAS </td>
                <td align="center">  </td>
                <?php foreach ($get_kadis as $kadis ) { ?>
                <?php if ($kadis->rekomkeluar_kepada == "kadis") { ?>

                <td align="center"> <?php echo $kadis->rekomkeluar_tgl_masuk ?>  </td>
                <td align="center"> <?php echo $kadis->rekomkeluar_tgl_keluar ?>  </td>
                <td align="center"> <?php echo $kadis->rekomkeluar_keterangan ?>  </td>
                <td align="center">  <img src=" <?php echo base_url('assets/images/ttd.png');?>" width="20px;"></img>  </td>
                <?php } else { ?> 
                <td align="center"> - </td>
                <td align="center"> - </td>
                <td align="center"> - </td>
                <td align="center"> - </td>
                <?php } } ?>
            </tr> 
            
            </tbody>

        </table>
        </center>

            <br>
            <br>
            <br>
            <br>
            <br>
            <div id='div_right'>
            <center>
            <label text-align: center;> Kepala Bidang </label><br>
            <label> Penanganan Sengketa dan Penyuluhan </label>
            
            
            
            <br>
            <br>
            <br>
            <br>
            <br>
            (IGNATIUS HOTLAN HAHALONGAN, S.H., M.H)
            </center>
            </div>
</section>

</div>
 
    
    <!-- This is data table -->
    <script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/popper.min.html"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>assets/main/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url()?>assets/main/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>assets/main/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url()?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>assets/main/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->

    <!-- Footable -->
    <script src="<?php echo base_url()?>assets/plugins/footable/js/footable.all.min.js"></script>
    
    <script src="<?php echo base_url()?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

    
    <script src="<?php echo base_url()?>assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    
    <script src="<?php echo base_url()?>assets/plugins/dff/dff.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url()?>plugins/multiselect/js/jquery.multi-select.js"></script>
    <!-- ============================================================== -->
    <script src="<?php echo base_url()?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>

<script>
    $(document).ready(function() {
        $(".dataTables_filter").removeAttr("top");
    });
    </script>
</body>
 </html>
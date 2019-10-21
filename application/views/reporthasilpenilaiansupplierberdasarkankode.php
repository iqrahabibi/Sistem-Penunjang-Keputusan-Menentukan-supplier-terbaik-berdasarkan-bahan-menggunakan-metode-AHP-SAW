<?php $this->view('header');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Cetak Laporan Hasil Penilaian Supplier
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php/ctrlutama')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Data Bahan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
                <div class="row">
                        <div class="col-xs-12">
                        
                            <br>
                            <div class="box">
                                
                                <div class="box-body table-responsive">
                                <form action="<?php echo base_url('index.php/ctrlreportpdf/reportpenilaiankode')?>" method="POST">
                                    <div class="form-group">
										<label class="control-label col-md-3">Kode Penilaian</label>
										<div class="col-md-4">
                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                                <select name="kode" class="form-control">
                                                    <?php foreach($saw as $ambil){?>
                                                        <option value="<?php echo $ambil->kode_saw?>"><?php echo $ambil->kode_saw?></option>    
                                                    <?php }?>
                                                </select>
											</div>
											<!-- /input-group -->
											
										</div>
									</div>
                                    <button Type="submit" class="btn btn-primary">cetak</button>
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/admin/js/bootstrap.min.js')?>" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url('assets/admin/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/admin/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/admin/js/AdminLTE/app.js')?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/admin/pages/scripts/components-pickers.js')?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/clockface/js/clockface.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap-daterangepicker/moment.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')?>"></script>

        <?php foreach($datauser as $ambil){?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editprofile<?php echo $ambil->id?>" width="75%" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			                <h4 class="modal-title">Insert Data Bahan</h4>
			            </div>
			            <form class="form-horizontal" action="<?php echo base_url('index.php/ctrluser/editprofile')?>" method="post" enctype="multipart/form-data" role="form">
				            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-lg-6 col-sm-1">Foto</label>
				                            <div class="col-lg-12">
                                                <img src="<?php echo base_url('assets/img/'.$ambil->gambar.'')?>" width="250px" height="300px" >
                                                <br>
				                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-lg-6 col-sm-1">Nama Lengkap</label>
                                            <div class="col-lg-12">
                                                <input type="hidden" class="form-control" id="jenjang" name="id" value="<?php echo $ambil->id?>">
                                                <input type="text" class="form-control" id="jenjang" name="nama" value="<?php echo $ambil->nama?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 col-sm-1">Username</label>
                                            <div class="col-lg-12">
                                                <input type="text" required class="form-control" id="jenjang" name="username" value="<?php echo $ambil->username?>" placeholder="Nama Bahan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 col-sm-1">Password</label>
                                            <div class="col-lg-12">
                                                <input type="password" required class="form-control" id="jenjang" name="password" value="<?php echo $ambil->password?>" placeholder="Nama Bahan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-6 col-sm-1">Gambar</label>
                                            <div class="col-lg-12">
                                                <input type="file" class="form-control" id="jenjang" name="gambar" value="<?php echo $ambil->gambar?>">
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                                
                                </div>
                                    
				                <div class="modal-footer">
                                <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
				                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                                    
				                </div>
			                </form>
			            </div>
			        </div>
                </div>
                
        <?php }?>
 
        <script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
                    ComponentsPickers.init();
                    });   
    </script>
        <!-- page script -->
       
    </body>
</html>
<?php $this->view('header');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Data Kriteria
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php/ctrlutama')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Data Kriteria</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <a href="#insert-data" data-toggle="modal" class="btn-lg btn-primary glyphicon"> + </a>
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <div class="box">
                                
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kriteria</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$x=1;
											foreach($datakriteria as $ambil){
                                        ?>
                                            <tr>
                                                <td><?php echo $x;?></td>
                                                <td><?php echo $ambil->nama_kriteria?></td>
                                                <td width="20px;"><a href="#edit-data<?php echo $ambil->kode_kriteria?>" data-toggle="modal" class="btn btn-warning" >Edit</a></td>
												<td width="20px;"><a href="<?php echo base_url('index.php/ctrlkriteria/deletedata/'.$ambil->kode_kriteria.'')?>" class="btn btn-danger" >Hapus</a></td>
                                            </tr>
                                        <?php 
                                            $x++;    
                                            }
                                        ?>
                                        </tbody>
                                        
                                    </table>
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

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
<?php foreach ($datakriteria as $ambil) {
		?>
				<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $ambil->kode_kriteria?>" width="75%" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			                <h4 class="modal-title">Ubah Data Kriteria</h4>
			            </div>
			            <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlkriteria/editdata')?>" method="post" enctype="multipart/form-data" role="form">
				            <div class="modal-body">
                                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Kode Kriteria</label>
				                        <div class="col-lg-12">
                                            <input type="text" class="form-control" readonly id="jenjang" name="id" value="<?php echo $ambil->kode_kriteria?>">  
				                        </div>
                                    </div>
				                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Nama Kriteria</label>
				                        <div class="col-lg-12">
				                        	<input type="text" class="form-control" required id="jenjang" name="nama" placeholder="Nama" value="<?php echo $ambil->nama_kriteria?>">
				                        </div>
                                    </div>
                                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Status</label>
				                        <div class="col-lg-12">
				                            <select name="status" required class="form-control">
                                                <option value="0">COST</option>
                                                <option value="1">BENEFIT</option>
                                            </select>
				                        </div>
                                    </div>
				                </div>
				                <div class="modal-footer">
				                    <button class="btn btn-info" type="submit"> Update&nbsp;</button>
				                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
				                </div>
			                </form>
			            </div>
			        </div>
			    </div>

        <?php  }?>
        
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="insert-data" width="75%" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			                <h4 class="modal-title">Insert Data Kriteria</h4>
			            </div>
			            <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlkriteria/insertdata')?>" method="post" enctype="multipart/form-data" role="form">
				            <div class="modal-body">
                                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Kode Kriteria</label>
				                        <div class="col-lg-12">
                                            <input type="text" class="form-control" readonly id="jenjang" name="id" value="<?php echo $kode?>">  
				                        </div>
                                    </div>
				                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Nama Kriteria</label>
				                        <div class="col-lg-12">
				                        	<input type="text" class="form-control" id="jenjang" name="nama" placeholder="Nama Kriteria">
				                        </div>
				                    </div>
                                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Status</label>
				                        <div class="col-lg-12">
				                            <select name="status" class="form-control">
                                                <option value="0">COST</option>
                                                <option value="1">BENEFIT</option>
                                            </select>
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
 
    </body>
</html>
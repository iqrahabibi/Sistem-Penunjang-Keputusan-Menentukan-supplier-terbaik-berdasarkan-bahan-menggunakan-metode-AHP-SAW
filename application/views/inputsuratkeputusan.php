<?php $this->view('header');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Entry Surat Keputusan
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php/ctrlutama')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Entry Surat Keputusan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
                <a href="#insert-data" data-toggle="modal" class="btn-lg btn-primary glyphicon"> + </a>
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <div class="box">
                                
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <form method="post">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Surat Keputusan</th>
                                                <th>Tanggal Surat Keputusan</th>
                                                <th>Nama Bahan</th>
                                                <th>Nama Supplier</th>
                                                <th>Hasil</th>
                                                <th>Keterangan</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $x=1;
											foreach($join as $ambil){
                                        ?>
                                            <tr>
                                                <td><?php echo $x;?></td>
                                                <td><?php echo $ambil->kd_sk?></td>
                                                <td><?php echo $ambil->tanggal_sk?></td>
                                                <td><?php echo $ambil->nama_bahan?></td>
                                                <td><?php echo $ambil->nama_supplier?></td>
                                                <td><?php echo $ambil->hasil?></td>
                                                <td><?php echo $ambil->keterangan?></td>
                                                <td width="20px;"><a href="<?php echo base_url('index.php/ctrlprintsk/cobain/'.$ambil->kode_saw.'')?>" target="_BLANK" class="btn btn-warning" >Cetak</a></td>
												<td width="20px;"><a href="<?php echo base_url('index.php/ctrlsuratkeputusan/deletedata/'.$ambil->kd_sk.'')?>" class="btn btn-danger" >Hapus</a></td>
                                            </tr>
                                        <?php 
                                            $x++;  
                                            
                                            }
                                            
                                        ?>
                                        </tbody>
                                        
                                        </form>
                                    </table>
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <link href="<?php echo base_url('assets/admin/css/multiple-select.scss')?>" rel="stylesheet" type="text/css" />
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/admin/js/bootstrap.min.js')?>" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url('assets/admin/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/admin/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/admin/js/AdminLTE/app.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/admin/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
       
        
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

        
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="insert-data" width="75%" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			                <h4 class="modal-title">Entry Surat Keputusan</h4>
			            </div>
			            <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlsuratkeputusan/insertdata')?>" method="post" enctype="multipart/form-data" role="form">
				            <div class="modal-body">
                                    <div class="form-group">
				                        <label class="col-lg-4 col-sm-1">Kode Surat Keputusan</label>
				                        <div class="col-lg-12">
                                            <input type="text" class="form-control" readonly id="jenjang" name="id" value="<?php echo $kode?>">
				                        </div>
                                    </div>
				                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Kode Penilaian</label>
				                        <div class="col-lg-12">
                                            <select name="nilai" id="nilai" required class="nilai form-control">
                                                <option value="">Pilih</option>
													<?php foreach($saw as  $ambil){?>
												<option value="<?php echo $ambil->kode_saw?>"><?php echo $ambil->kode_saw?></option>
													<?php }?>
											</select>
				                        </div>
				                    </div>
                                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Hasil Keputusan</label>
				                        <div class="col-lg-12">
                                            <select name="hasil" id="hasil" required class="form-control">
                                                <option value="">Pilih</option>
											</select>
				                        </div>
				                    </div>
                                    <div id="loading" style="margin-top: 15px;">
                                    <img src="<?php echo base_url('assets/image/loading.gif')?>" width="50"> <small>Loading...</small>
                                    </div>
                                    <div class="form-group">
                                           <label class="col-lg-3 col-sm-1">Keterangan</label>
                                        <div class="col-lg-12">
                                            <textarea name="keterangan" class="form-control" required placeholder="Keterangan"></textarea>
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
                
                <?php foreach($sk as $ambil){?>
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $ambil->kd_sk?>" width="75%" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			                <h4 class="modal-title">Edit Surat Keputusan</h4>
			            </div>
			            <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlsuratkeputusan/editdata')?>" method="post" enctype="multipart/form-data" role="form">
				            <div class="modal-body">
                                    <div class="form-group">
				                        <label class="col-lg-4 col-sm-1">Kode Surat Keputusan</label>
				                        <div class="col-lg-12">
                                            <input type="text" class="form-control" readonly id="jenjang" name="id" value="<?php echo $ambil->kd_sk?>">
				                        </div>
                                    </div>
				                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Kode Penilaian</label>
				                        <div class="col-lg-12">
                                           <input type="text" name="nilai" class="form-control" readonly value="<?php echo $ambil->kd_saw?>">
				                        </div>
				                    </div>
                                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Hasil Keputusan</label>
				                        <div class="col-lg-12">
                                            <select name="hasil" id="hasil" required class="form-control">
                                                <?php foreach($asik as $take){?>
                                                <option value="<?php echo $take->nilai_saw?>"><?php echo $take->nilai_saw?></option>
                                                <?php }?>
											</select>
				                        </div>
				                    </div>
                                    <div class="form-group">
                                           <label class="col-lg-3 col-sm-1">Keterangan</label>
                                        <div class="col-lg-12">
                                            <textarea name="keterangan" class="form-control" required placeholder="Keterangan"><?php echo $ambil->keterangan?></textarea>
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
                    function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
            
                        return false;
                    return true;
                    }
                $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    
    $("#nilai").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#hasil").hide(); // Sembunyikan dulu combobox kota nya
      $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("index.php/ctrlsuratkeputusan/listhasil"); ?>", // Isi dengan url/path file php yang dituju
        data: {kode_saw : $("#nilai").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#hasil").html(response.list_nilai).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
    
</script>
    </body>
</html>
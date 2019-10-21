<?php $this->view('header');?>
<script src="<?php echo base_url('assets/admin/js/AdminLTE/jquery/3.4.1/jquery.min.js')?>"></script>
<script>
$(document).ready(function(){
    $("#gambar").hide();
    $("#hide").hide();
$("#hide").click(function(){
    $("#gambar").hide(1000);
    $("#hide").hide();
    $("#show").show();
    $("#notice").show();
  });
  $("#show").click(function(){
    $("#gambar").show(1000);
    $("#hide").show();
    $("#show").hide();
    $("#notice").hide();
  });
});
</script>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Hasil Perhitungan Metode SAW
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php/ctrlutama')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Hitung SAW</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                    <div class="box">
                    <div class="box-header">
                    <form method="post" action="<?php echo base_url('index.php/ctrlsaw')?>">
                        <div class="col-sm-3">
                            <h3>Tanggal Sekarang : <?php echo $tanggal?></h2>
                        </div>
                        <div class="col-sm-3">
                            <h3>Kode Penilaian : <?php echo $kode?></h2>
                        </div>
                        <br>
                        <div class="col-md-2">
                            <select name="bahan" required class="form-control">
                                    <option>------------- PILIH BAHAN -------------</option>
                                <?php foreach($bahan as $ambil){?>
                                    <option value="<?php echo $ambil->kode_bahan?>"><?php echo $ambil->nama_bahan?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary">FILTER</button> 
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <div class="box">
                            <div class="box-header">
                                    <h3 class="box-title">Matriks Nilai Supplier</h3>                                    
                                </div>&nbsp;&nbsp;
                            <a href="#insert-data" data-toggle="modal" class="btn-lg btn-primary glyphicon"> + </a>
                                <div class="box-body table-responsive">
                                    <div class ="col-md-2"></div>
                                    <div class ="col-md-8">
                                    <img src="<?php echo base_url('assets/image/revisipaket.png')?>" id="gambar" width="1000" height="500">

                                    </div>
                                
                                
                                <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlahp/insertdata')?>" method="post" enctype="multipart/form-data" role="form">
                                
                                <table id="example1" class="table table-bordered table-striped">
                                
                                
                                <tr>
                                       
                                        <td width='4%'>No</td>
                                        <td width='18%'>Nama Supplier</td>
                                        <?php 
                                        for($i=0;$i<=3;$i++){ ?>
                                            <td width='18%'><?php echo $kriteria[$i]->nama_kriteria?></td>
                                        <?php
                                        }
                                        ?>
                                        <td width='18%'>Total</td>

                                    </tr>
                                    <?php 
                                        $x=1;
                                        if(count($kriteria) <= 0 ){
                                    ?>
                                    <tr>
                                        <td colspan="4" align="center"><h4>DATA TIDAK BISA DI BANDINGKAN KARNA JUMLAH DATA TIDAK SESUAI DENGAN MINIMUM KRITERIA DARI PERUSAHAAN</h4></td>
                                    </tr>
                                    <?php 
                                        }else{  
                                            $x=1;  
                                    foreach($saw as $ambil){
                                        $total = $ambil->kriteria1+$ambil->kriteria2+$ambil->kriteria3+$ambil->kriteria4;
                                    ?>
                                    <tr>
                                        <td><?php echo $x?></td>
                                        <td><?php echo $ambil->nama_supplier?></td>
                                        <td><?php echo $ambil->kriteria1?></td>
                                        <td><?php echo $ambil->kriteria2?></td>
                                        <td><?php echo $ambil->kriteria3?></td>
                                        <td><?php echo $ambil->kriteria4?></td>
                                        <td><?php echo $total?></td>
                                    </tr>
                                     <?php 
                                    
                                $x++; }
                                     }
                                     ?>     
                                     
                                    </table>
                                </form>
                               
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                    <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <div class="box">
                            <div class="box-header">
                                    <h3 class="box-title">Matriks Normalisasi</h3>                                    
                                </div>
                                <div class="box-body table-responsive">
                                    
                                
                                <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlahp/insertdata')?>" method="post" enctype="multipart/form-data" role="form">
                                <table id="example1" class="table table-bordered table-striped">
                                
                                
                                <tr>
                                       
                                        <td width='4%'>No</td>
                                        <td width='18%'>Nama Supplier</td>
                                        <?php for($i=0;$i<=3;$i++){ ?>
                                            <td width='18%'><?php echo $kriteria[$i]->nama_kriteria?></td>
                                        <?php
                                        }
                                        ?>
                                       

                                    </tr>
                                    <?php 
                                        $x=1;
                                        if(count($kriteria) <= 0 ){
                                    ?>
                                    <tr>
                                        <td colspan="4" align="center"><h4>DATA TIDAK BISA DI BANDINGKAN KARNA JUMLAH DATA TIDAK SESUAI DENGAN MINIMUM KRITERIA DARI PERUSAHAAN</h4></td>
                                    </tr>
                                    <?php 
                                        }else{  
                                            $x=1;  
                                    foreach($saw as $ambil){
                                        $total = $ambil->kriteria1+$ambil->kriteria2+$ambil->kriteria3+$ambil->kriteria4;
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $x?></td>
                                        <td><?php echo $ambil->nama_supplier?></td>
                                        <td>
                                            <?php
                                                if($kriteria[0]->status == 0){
                                                    echo $normalisasi1 = number_format($nilaimin[0]->min1/$ambil->kriteria1,4);
                                                    
                                                }else{
                                                    echo $normalisasi1 = number_format($ambil->kriteria1/$nilaimax[0]->max1,4);
                                                }
                                        
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($kriteria[1]->status == 0){
                                                    echo $normalisasi2 = number_format($nilaimin[0]->min2/$ambil->kriteria2,4);
                                                }else{
                                                    echo $normalisasi2 =number_format($ambil->kriteria2/$nilaimax[0]->max2,4);
                                                }
                                                
                                            ?>
                                            
                                        </td>
                                        <td>
                                            <?php 
                                                if($kriteria[2]->status == 0){
                                                    echo $normalisasi3 = number_format($nilaimin[0]->min3/$ambil->kriteria3,4);
                                                }else{
                                                    echo $normalisasi3 = number_format($ambil->kriteria3/$nilaimax[0]->max3,4);
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($kriteria[3]->status == 0){
                                                    echo $normalisasi4 = number_format($nilaimin[0]->min4/$ambil->kriteria4,4);
                                                }else{
                                                    echo $normalisasi4 = number_format($ambil->kriteria4/$nilaimax[0]->max4,4);
                                                }
                                            ?>
                                            </td>
                                        
                                    </tr>
                                     <?php 
                                    
                                $x++; }
                                     }
                                     //var_dump($normalisasi2); exit();
                                     ?>     
                                     
                                    </table>
                                    
                                </form>
                               
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
<?php if(count($saw) <= 0){?>
<?php }else{?>
    <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <div class="box">
                            <div class="box-header">
                                    <h3 class="box-title">Perankingan</h3>                                    
                                </div>
                                <div class="box-body table-responsive">
                                    
                                
                                <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlsaw/insertnilaisaw')?>" method="post" enctype="multipart/form-data" role="form">
                                <table id="example1" class="table table-bordered table-striped">
                                
                                
                                <tr>
                                       
                                        <td width='4%'>No</td>
                                        <td width='18%'>Nama Supplier</td>
                                        <td width='18%'>Nilai SAW</td>

                                    </tr>
                                    <?php 
                                    $x=1; 
                                    
                                        $i=1;
                                        $y=0;
                                        foreach($saw as $ambil){
                                            $normal1 = number_format($nilaimin[0]->min1/$ambil->kriteria1,4);
                                            if($kriteria[0]->status == 0 && $kriteria[1]->status == 0 && $kriteria[2]->status == 0 && $kriteria[3]->status == 0){
                                                $total1 = number_format((($nilaimin[0]->min1/$ambil->kriteria1)*$kriteria[0]->bobot)+(($nilaimin[0]->min2/$ambil->kriteria2)*$kriteria[1]->bobot)+(($nilaimin[0]->min3/$ambil->kriteria3)*$kriteria[2]->bobot)+(($nilaimin[0]->min4/$ambil->kriteria4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 1 && $kriteria[1]->status == 0 && $kriteria[2]->status == 0 && $kriteria[3]->status == 0){
                                                $total1 = number_format((($ambil->kriteria1/$nilaimax[0]->max1)*$kriteria[0]->bobot)+(($nilaimin[0]->min2/$ambil->kriteria2)*$kriteria[1]->bobot)+(($nilaimin[0]->min3/$ambil->kriteria3)*$kriteria[2]->bobot)+(($nilaimin[0]->min4/$ambil->kriteria4)*$kriteria[3]->bobot),4);
                                           
                                            }elseif($kriteria[0]->status == 0 && $kriteria[1]->status == 1 && $kriteria[2]->status == 0 && $kriteria[3]->status == 0){
                                                $total1 = number_format((($nilaimin[0]->min1/$ambil->kriteria1)*$kriteria[0]->bobot)+(($ambil->kriteria2/$nilaimax[0]->max2)*$kriteria[1]->bobot)+(($nilaimin[0]->min3/$ambil->kriteria3)*$kriteria[2]->bobot)+(($nilaimin[0]->min4/$ambil->kriteria4)*$kriteria[3]->bobot),4);
                                           
                                            }elseif($kriteria[0]->status == 0 && $kriteria[1]->status == 0 && $kriteria[2]->status == 1 && $kriteria[3]->status == 0){
                                                $total1 = number_format((($nilaimin[0]->min1/$ambil->kriteria1)*$kriteria[0]->bobot)+(($nilaimin[0]->min2/$ambil->kriteria2)*$kriteria[1]->bobot)+(($ambil->kriteria3/$nilaimax[0]->max3)*$kriteria[2]->bobot)+(($nilaimin[0]->min4/$ambil->kriteria4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 0 && $kriteria[1]->status == 0 && $kriteria[2]->status == 0 && $kriteria[3]->status == 1){
                                                $total1 = number_format((($nilaimin[0]->min1/$ambil->kriteria1)*$kriteria[0]->bobot)+(($nilaimin[0]->min2/$ambil->kriteria2)*$kriteria[1]->bobot)+(($nilaimin[0]->min3/$ambil->kriteria3)*$kriteria[2]->bobot)+(($ambil->kriteria4/$nilaimax[0]->max4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 1 && $kriteria[1]->status == 0 && $kriteria[2]->status == 1 && $kriteria[3]->status == 1){
                                                $total1 = number_format((($ambil->kriteria1/$nilaimax[0]->max1)*$kriteria[0]->bobot)+(($nilaimin[0]->min2/$ambil->kriteria2)*$kriteria[1]->bobot)+(($ambil->kriteria3/$nilaimax[0]->max3)*$kriteria[2]->bobot)+(($ambil->kriteria4/$nilaimax[0]->max4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 1 && $kriteria[1]->status == 1 && $kriteria[2]->status == 0 && $kriteria[3]->status == 1){
                                                $total1 = number_format((($ambil->kriteria1/$nilaimax[0]->max1)*$kriteria[0]->bobot)+(($ambil->kriteria2/$nilaimax[0]->max2)*$kriteria[1]->bobot)+(($nilaimin[0]->min3/$ambil->kriteria3)*$kriteria[2]->bobot)+(($ambil->kriteria4/$nilaimax[0]->max4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 1 && $kriteria[1]->status == 1 && $kriteria[2]->status == 1 && $kriteria[3]->status == 0){
                                                $total1 = number_format((($ambil->kriteria1/$nilaimax[0]->max1)*$kriteria[0]->bobot)+(($ambil->kriteria2/$nilaimax[0]->max2)*$kriteria[1]->bobot)+(($ambil->kriteria3/$nilaimax[0]->max3)*$kriteria[2]->bobot)+(($nilaimin[0]->min4/$ambil->kriteria4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 0 && $kriteria[1]->status == 1 && $kriteria[2]->status == 1 && $kriteria[3]->status == 0){
                                                $total1 = number_format((($nilaimin[0]->min1/$ambil->kriteria1)*$kriteria[0]->bobot)+(($ambil->kriteria2/$nilaimax[0]->max2)*$kriteria[1]->bobot)+(($ambil->kriteria3/$nilaimax[0]->max3)*$kriteria[2]->bobot)+(($nilaimin[0]->min4/$ambil->kriteria4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 1 && $kriteria[1]->status == 0 && $kriteria[2]->status == 0 && $kriteria[3]->status == 1){
                                                $total1 = number_format((($ambil->kriteria1/$nilaimax[0]->max1)*$kriteria[0]->bobot)+(($nilaimin[0]->min2/$ambil->kriteria2)*$kriteria[1]->bobot)+(($nilaimin[0]->min3/$ambil->kriteria3)*$kriteria[2]->bobot)+(($ambil->kriteria4/$nilaimax[0]->max4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 0 && $kriteria[1]->status == 1 && $kriteria[2]->status == 1 && $kriteria[3]->status == 1){
                                                $total1 = number_format((($nilaimin[0]->min1/$ambil->kriteria1)*$kriteria[0]->bobot)+(($ambil->kriteria2/$nilaimax[0]->max2)*$kriteria[1]->bobot)+(($ambil->kriteria3/$nilaimax[0]->max3)*$kriteria[2]->bobot)+(($ambil->kriteria4/$nilaimax[0]->max4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 0 && $kriteria[1]->status == 0 && $kriteria[2]->status == 1 && $kriteria[3]->status == 1){
                                                $total1 = number_format((($nilaimin[0]->min1/$ambil->kriteria1)*$kriteria[0]->bobot)+(($nilaimin[0]->min2/$ambil->kriteria2)*$kriteria[1]->bobot)+(($ambil->kriteria3/$nilaimax[0]->max3)*$kriteria[2]->bobot)+(($ambil->kriteria4/$nilaimax[0]->max4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 1 && $kriteria[1]->status == 1 && $kriteria[2]->status == 0 && $kriteria[3]->status == 0){
                                                $total1 = number_format((($ambil->kriteria1/$nilaimax[0]->max1)*$kriteria[0]->bobot)+(($ambil->kriteria2/$nilaimax[0]->max2)*$kriteria[1]->bobot)+(($nilaimin[0]->min3/$ambil->kriteria3)*$kriteria[2]->bobot)+(($nilaimin[0]->min4/$ambil->kriteria4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 0 && $kriteria[1]->status == 1 && $kriteria[2]->status == 0 && $kriteria[3]->status == 1){
                                                $total1 = number_format((($nilaimin[0]->min1/$ambil->kriteria1)*$kriteria[0]->bobot)+(($ambil->kriteria2/$nilaimax[0]->max2)*$kriteria[1]->bobot)+(($nilaimin[0]->min3/$ambil->kriteria3)*$kriteria[2]->bobot)+(($ambil->kriteria4/$nilaimax[0]->max4)*$kriteria[3]->bobot),4);
                                            }elseif($kriteria[0]->status == 1 && $kriteria[1]->status == 0 && $kriteria[2]->status == 1 && $kriteria[3]->status == 0){
                                                $total1 = number_format((($ambil->kriteria1/$nilaimax[0]->max1)*$kriteria[0]->bobot)+(($nilaimin[0]->min2/$ambil->kriteria2)*$kriteria[1]->bobot)+(($ambil->kriteria3/$nilaimax[0]->max3)*$kriteria[2]->bobot)+(($nilaimin[0]->min4/$ambil->kriteria4)*$kriteria[3]->bobot),4);
                                            }else{
                                                $total1 = number_format((($ambil->kriteria1/$nilaimax[0]->max1)*$kriteria[0]->bobot)+(($ambil->kriteria2/$nilaimax[0]->max2)*$kriteria[1]->bobot)+(($ambil->kriteria3/$nilaimax[0]->max3)*$kriteria[2]->bobot)+(($ambil->kriteria4/$nilaimax[0]->max4)*$kriteria[3]->bobot),4);
                                            }
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?><input type="hidden" name="kodesaw" value="<?php echo $kode?>"></td>
                                                <td><?php echo $ambil->nama_supplier?><input type="hidden" name="kode[]" value="<?php echo $ambil->kode_supplier?>"></td>
                                                <td><?php echo $total1?><input type="hidden" name="nilai[]" value="<?php echo $total1?>"></td>
                                            </tr>
                                            <?php $i++;
                                        }
                                      
                                        $x=1;
                                        if(count($kriteria) <= 0 ){
                                    ?>
                                    <tr>
                                    <td></td>
                                        <td colspan="4" align="center"><h4>DATA TIDAK BISA DI BANDINGKAN KARNA JUMLAH DATA TIDAK SESUAI DENGAN MINIMUM KRITERIA DARI PERUSAHAAN</h4></td>
                                    </tr>
                                    <?php 
                                    
                                        }else{  
                                            
                                   
                                    ?>
                                   
                                     <?php 
                                   
                                     }
                                     ?>     
                                     
                                    </table>
                                    <?php if(count($kriteria) == 4){?>
                                    <button class="btn btn-primary" type="submit"> Simpan Data</button>
                                    <?php }else{?>
                                    <?php }?>
                                    <br>
                                </form>
                               
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
<?php }?>
               
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url('assets/admin/js/AdminLTE/jquery/2.0.2/jquery.min.js')?>"></script>
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
            });
        </script>

            <div id="insert-data" class="modal fade">
			    <div class="modal-dialog modal-lg">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			                <h4 class="modal-title">Insert Data Penilaian</h4>
                        </div>
			            <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlsaw/insertdata')?>" method="post" enctype="multipart/form-data" role="form">
                            
                                <div class="modal-body">
				                    
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <td>No</td>
                                                <td>Nama Supplier</td>
                                                <?php for($i=0;$i<=3;$i++){ ?>
                                                    <td width='18%'><?php echo $kriteria[$i]->nama_kriteria?></td>
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            <?php
                                                $x=1; 
                                                foreach($supplier as $supp){
                                            
                                                ?>
                                            <tr>
                                                <td><?php echo $x?><input type="hidden" name="kode" value="<?php echo $kode?>"></td>
                                                <td><?php echo $supp->nama_supplier?><input type="hidden" name="nama[]" value="<?php echo $supp->kode_supplier?>"></td>
                                                <td><input type="number" name="kriteria1[]" placeholder="Hari" required onkeypress="return hanyaAngka(event)" min="1" max="99" maxlength="2" style="width:45px"></td>
                                                <td><input type="number" name="kriteria2[]" placeholder="1-4" required onkeypress="return hanyaAngka(event)" min="1" max="4" maxlength="2" style="width:40px"></td>
                                                <td><input type="number" name="kriteria3[]" placeholder="Rupiah" required onkeypress="return hanyaAngka(event)" min="1000" max="1000000" maxlength="2" style="width:80px"></td>
                                                <td><input type="number" name="kriteria4[]" placeholder="Hari" required onkeypress="return hanyaAngka(event)" min="1" max="99" maxlength="2" style="width:45px"></td>
                                            </tr>
                                                <?php 
                                            $x++;
                                                }?>
                                        </table>
				                </div>
				                <div class="modal-footer">
                                <?php if($supplier == null || $supplier == 0){?>
                                <?php }else{?>
                                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                                <?php }?>
				                    
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
 
                <script>
                    function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
            
                        return false;
                    return true;
                    }
                </script>
    </body>
</html>
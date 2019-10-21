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
                        Hasil Perhitungan Metode AHP
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php/ctrlutama')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Data Bahan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                        <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
                            <br>
                            <div class="box">
                            <!-- <button class="btn btn-primary" id="show"> Tampilkan Gambar</button>&nbsp;<small id="notice"><p class="glyphicon glyphicon-arrow-left"></p> Tidak Tau Penilaian Kriteria Dengan Ketentuan Dari Perusahaan ?</small>
                                <button class="btn btn-primary" id="hide"> Sembunyikan Gambar</button> -->
                                <div class="box-body table-responsive">
                                    <!-- <div class ="col-md-2"></div>
                                    <div class ="col-md-8">
                                    <img src="<?php echo base_url('assets/image/revisipaket.png')?>" id="gambar" width="1000" height="500">

                                    </div> -->
                                
                                
                                <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlahp/insertdata')?>" method="post" enctype="multipart/form-data" role="form">
                                <table id="example1" class="table table-bordered table-striped">
                                
                                
                                <tr>
                                        <td width='4%'>No.</td>
                                        <td width='18%'>Nama Kriteria</td>
                                        <td width='55%' style="text-align:center;">Pilih Nilai</td>
                                        <td width='18%'>Nama Kriteria</td>

                                    </tr>
                                    <?php 
                                        $x=1;
                                        if(count($kriteria) < 4){
                                    ?>
                                    <tr>
                                        <td colspan="4" align="center"><h4>DATA TIDAK BISA DI BANDINGKAN KARNA JUMLAH DATA TIDAK SESUAI DENGAN MINIMUM KRITERIA DARI PERUSAHAAN</h4></td>
                                    </tr>
                                    <?php 
                                        }elseif(count($kriteria) == 4){
                                            $x-1;
                                            for($i=0;$i<=5;$i++){
                                                if($i==0){
                                                    $a=0;
                                                    $b=1;
                                                }elseif($i==1){
                                                    $a=0;
                                                    $b=2;
                                                }elseif($i==2){
                                                    $a=0;
                                                    $b=3;
                                                }elseif($i==3){
                                                    $a=1;
                                                    $b=2;
                                                }elseif($i==4){
                                                    $a=1;
                                                    $b=3;
                                                }elseif($i==5){
                                                    $a=2;
                                                    $b=3;
                                                }
                                    ?>
                                        <tr>
                                            <td><?php echo $x?></td>
                                            <td><input type="hidden" name="kriteria1[]" value="<?php echo $kriteria[$a]->kode_kriteria?>"><?php echo $kriteria[$a]->nama_kriteria;?></td>
                                            <td style="text-align:center;">
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='-9'><label>9</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='-8'><label>8</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='-7'><label>7</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='-6'><label>6</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='-5'><label>5</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='-4'><label>4</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='-3'><label>3</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='-2'><label>2</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='1'><label>1</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='2'><label>2</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='3'><label>3</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='4'><label>4</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='5'><label>5</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='6'><label>6</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='7'><label>7</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='8'><label>8</label>&nbsp;</span>
                                                    <span ><input type='radio' name='Intense<?php echo $i?>' value='9'><label>9</label>&nbsp;</span>
                                            </td>
                                            <td><input type="hidden" name="kriteria2[]" value="<?php echo $kriteria[$b]->kode_kriteria?>"><?php echo $kriteria[$b]->nama_kriteria;?></td>
                                        </tr>
                                        
                                    <?php $x++; }
                                        }else{  
                                     ?> 
                                     <tr>
                                        <td colspan="4" align="center"><h4>DATA KRITERIA MELEBIHI MAXIMUM YANG TELAH DI TENTUKAN OLEH PERUSAHAAN</h4></td>
                                    </tr>
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
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Matriks Nilai Perbandingan</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form class="form-horizontal" action="<?php echo base_url('index.php/ctrlahp/hitung')?>" method="post" enctype="multipart/form-data" role="form">
                                
                                <table id="example1" class="table table-bordered table-striped">
                                    <?php
                                    if(count($kriteria) == 4){
                                        if(count($perbandingan) <= 0){
                                            
                                        
                                    ?>
                                    <tr>
                                        <td colspan="4" align="center"><h4>DATA KRITERIA BELUM DI BERI NILAI PERBANDINGAN</h4></td>
                                    </tr>
                                    <?php }else{?>
                                <tr>
                                    <td width='3%'>No.</td>
                                    <td>Kriteria</td>
                                        <?php 
                                            $a=1;
                                            for($i=0;$i<4;$i++){
                                        ?>
                                            <td>K<?php echo "$a - ".$kriteria[$i]->nama_kriteria;?></td>
                                        <?php 
                                            $a++;
                                            }
                                        ?>
                                </tr>
                                <tr>
                                <td>1</td>
                                <td>K<?php echo "1 - ".$kriteria[0]->nama_kriteria?></td>
                                                <td>1.00<?php $nol1=1.0000;?></td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[0]->nilai_banding < 0){
                                                            $satu = number_format(abs($perbandingan[0]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[0]->nilai_banding/1),4);
                                                        }else{
                                                            $satu = number_format(abs(1/$perbandingan[0]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[0]->nilai_banding),4);
                                                        }
                                                    ?>
                                                    <input type="hidden" name="satu" value="<?php echo $satu; ?>"> 
                                                </td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[1]->nilai_banding < 0){
                                                            $dua = number_format(abs($perbandingan[1]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[1]->nilai_banding/1),4);
                                                        }else{
                                                            $dua = number_format(abs(1/$perbandingan[1]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[1]->nilai_banding),4);
                                                        }
                                                    ?>
                                                    <input type="hidden" name="dua" value="<?php echo $dua; ?>"> 
                                                </td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[2]->nilai_banding < 0){
                                                            $tiga = number_format(abs($perbandingan[2]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[2]->nilai_banding/1),4);
                                                        }else{
                                                            $tiga = number_format(abs(1/$perbandingan[2]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[2]->nilai_banding),4);
                                                        }
                                                    ?>
                                                    <input type="hidden" name="tiga" value="<?php echo $tiga; ?>">
                                                </td>
                                        </tr>
                                    <tr>
                                <td>2</td>
                                <td>K<?php echo "2 - ".$kriteria[1]->nama_kriteria?></td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[0]->nilai_banding < 0){
                                                            $empat = number_format(abs(1/$perbandingan[0]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[0]->nilai_banding),4);
                                                        }else{
                                                            $empat = number_format(abs($perbandingan[0]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[0]->nilai_banding/1),4);                                                            
                                                        }
                                                    ?>
                                                    <input type="hidden" name="empat" value="<?php echo $empat; ?>">
                                                </td>
                                                <td>1.00<?php $nol2=1.0000;?></td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[3]->nilai_banding < 0){
                                                            $lima = number_format(abs($perbandingan[3]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[3]->nilai_banding/1),4);
                                                        }else{
                                                            $lima = number_format(abs(1/$perbandingan[3]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[3]->nilai_banding),4);
                                                        }
                                                    ?>
                                                    <input type="hidden" name="empat" value="<?php echo $lima; ?>">
                                                </td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[4]->nilai_banding < 0){
                                                            $enam = number_format(abs($perbandingan[4]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[4]->nilai_banding/1),4);
                                                        }else{
                                                            $enam = number_format(abs(1/$perbandingan[4]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[4]->nilai_banding),4);
                                                        }
                                                    ?>
                                                    <input type="hidden" name="empat" value="<?php echo $enam; ?>">
                                                </td>
                                        </tr>
                                    <tr>
                                <td>3</td>
                                <td>K<?php echo "3 - ".$kriteria[2]->nama_kriteria?></td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[1]->nilai_banding < 0){
                                                            $tujuh = number_format(abs(1/$perbandingan[1]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[1]->nilai_banding),4);
                                                        }else{
                                                            $tujuh = number_format(abs($perbandingan[1]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[1]->nilai_banding/1),4);                                                            
                                                        }
                                                    ?>
                                                     <input type="hidden" name="empat" value="<?php echo $tujuh; ?>">
                                                </td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[3]->nilai_banding < 0){
                                                            $delapan = number_format(abs(1/$perbandingan[3]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[3]->nilai_banding),4);
                                                        }else{
                                                            $delapan = number_format(abs($perbandingan[3]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[3]->nilai_banding/1),4);  
                                                            // var_dump(1/$perbandingan[3]->nilai_banding);
                                                            // exit();                                                          
                                                        }
                                                    ?>
                                                     <input type="hidden" name="empat" value="<?php echo $delapan; ?>">
                                                </td>
                                                <td>1.00<?php $nol3=1.0000;?></td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[5]->nilai_banding < 0){
                                                            $sembilan = number_format(abs($perbandingan[5]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[5]->nilai_banding/1),4);
                                                        }else{
                                                            $sembilan = number_format(abs(1/$perbandingan[5]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[5]->nilai_banding),4);
                                                        }
                                                    ?>
                                                    <input type="hidden" name="empat" value="<?php echo $sembilan; ?>">
                                                </td>
                                        </tr>
                                    <tr>
                                <td>4</td>
                                <td>K<?php echo "4 - ".$kriteria[3]->nama_kriteria?></td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[2]->nilai_banding < 0){
                                                            $sepuluh = number_format(abs(1/$perbandingan[2]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[2]->nilai_banding),4);
                                                        }else{
                                                            $sepuluh = number_format(abs($perbandingan[2]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[2]->nilai_banding/1),4);                                                            
                                                        }
                                                    ?>
                                                    <input type="hidden" name="empat" value="<?php echo $sepuluh; ?>">
                                                    </td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[4]->nilai_banding < 0){
                                                            $sebelas = number_format(abs(1/$perbandingan[4]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[4]->nilai_banding),4);
                                                        }else{
                                                            $sebelas = number_format(abs($perbandingan[4]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[4]->nilai_banding/1),4);                                                            
                                                        }
                                                    ?>
                                                    <input type="hidden" name="empat" value="<?php echo $sebelas; ?>">
                                                </td>
                                                <td>
                                                    <?php
                                                        if($perbandingan[5]->nilai_banding < 0){
                                                            $duabelas = number_format(abs(1/$perbandingan[5]->nilai_banding),4);
                                                            echo number_format(abs(1/$perbandingan[5]->nilai_banding),4);
                                                        }else{
                                                            $duabelas = number_format(abs($perbandingan[5]->nilai_banding/1),4);
                                                            echo number_format(abs($perbandingan[5]->nilai_banding/1),4);                                                            
                                                        }
                                                    ?>
                                                    <input type="hidden" name="empat" value="<?php echo $duabelas; ?>">
                                                </td>
                                                <td>1.00<?php $nol4=1.0000;?></td>
                                        </tr>
                                        <tr>
                                    <td></td>
                                    <td style="font-weight:bold; color:#333;">Jumlah</td>
                                                    <td style="font-weight:bold; color:#333;"><?php $total1 = $nol1+$empat+$tujuh+$sepuluh; echo number_format($total1,2);?></td>
                                                    <td style="font-weight:bold; color:#333;"><?php $total2 = $nol2+$satu+$delapan+$sebelas; echo number_format($total2,2);?></td>
                                                    <td style="font-weight:bold; color:#333;"><?php $total3 = $nol3+$dua+$lima+$duabelas; echo number_format($total3,2);?></td>
                                                    <td style="font-weight:bold; color:#333;"><?php $total4 = $nol4+$tiga+$enam+$sembilan; echo number_format($total4,2);?></td>
                                                </tr>    
                                                    <?php } 
                                                        }elseif(count($kriteria) < 4){?> 
                                                        <tr>
                                                        <td colspan="4" align="center"><h4>DATA TIDAK BISA DI BANDINGKAN KARNA JUMLAH DATA TIDAK SESUAI DENGAN MINIMUM KRITERIA DARI PERUSAHAAN</h4></td>
                                                        </tr>
                                                    <?php }else{?>
                                                        <tr>
                                                            <td colspan="4" align="center"><h4>DATA KRITERIA MELEBIHI MAXIMUM YANG TELAH DI TENTUKAN OLEH PERUSAHAAN</h4></td>
                                                        </tr>
                                                    <?php }
                                                    ?>     
                                    </table>
                                   
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
<?php if(count($perbandingan) <= 0 || count($kriteria) > 4){?>
<?php }else{?>
    <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Normalisasi dan Nilai Eigen</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <form action="<?php echo base_url('index.php/ctrlahp/insertbobot')?>" method="post">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <tr>
                                            <td width='3%'>No.</td>
                                            <td>Kriteria</td>
                                            <?php 
                                            $a=1;
                                                for($i=0;$i<4;$i++){
                                            ?>
                                                <td>K<?php echo "$a - ".$kriteria[$i]->nama_kriteria;?></td>
                                            <?php 
                                                $a++;
                                                }
                                            ?>
                                            <td style="font-weight:bold; color:#09F;">Eigen</td>
                                        </tr>
                                        <?php 
                                            $brs1klm1 = $nol1+($satu*$empat)+($dua*$tujuh)+($tiga*$sepuluh);
                                            $brs1klm2 = ($nol1*$satu)+($satu*$nol2)+($dua*$delapan)+($tiga*$sebelas);
                                            $brs1klm3 = ($nol1*$dua)+($satu*$lima)+($dua*$nol3)+($tiga*$duabelas);
                                            $brs1klm4 = ($nol1*$tiga)+($satu*$enam)+($dua*$sembilan)+($tiga*$nol4);

                                            $brs2klm1 = ($empat*$nol1)+($nol2*$empat)+($lima*$tujuh)+($enam*$sepuluh);
                                            $brs2klm2 = ($empat*$satu)+($nol2*$nol2)+($lima*$delapan)+($enam*$sebelas);
                                            $brs2klm3 = ($empat*$dua)+($nol2*$lima)+($lima*$nol3)+($enam*$duabelas);
                                            $brs2klm4 = ($empat*$tiga)+($nol2*$enam)+($lima*$sembilan)+($enam*$nol4);

                                            $brs3klm1 = ($tujuh*$nol1)+($delapan*$empat)+($nol3*$tujuh)+($sembilan*$sepuluh);
                                            $brs3klm2 = ($tujuh*$satu)+($delapan*$nol2)+($nol3*$delapan)+($sembilan*$sebelas);
                                            $brs3klm3 = ($tujuh*$dua)+($delapan*$lima)+($nol3*$nol3)+($sembilan*$duabelas);
                                            $brs3klm4 = ($tujuh*$tiga)+($delapan*$enam)+($nol3*$sembilan)+($sembilan*$nol4);

                                            $brs4klm1 = ($sepuluh*$nol1)+($sebelas*$empat)+($duabelas*$tujuh)+($nol4*$sepuluh);
                                            $brs4klm2 = ($sepuluh*$satu)+($sebelas*$nol2)+($duabelas*$delapan)+($nol4*$sebelas);
                                            $brs4klm3 = ($sepuluh*$dua)+($sebelas*$lima)+($duabelas*$nol3)+($nol4*$duabelas);
                                            $brs4klm4 = ($sepuluh*$tiga)+($sebelas*$enam)+($duabelas*$sembilan)+($nol4*$nol4);

                                            $jumlah_baris1 = $brs1klm1+$brs1klm2+$brs1klm3+$brs1klm4;
                                            $jumlah_baris2 = $brs2klm1+$brs2klm2+$brs2klm3+$brs2klm4;
                                            $jumlah_baris3 = $brs3klm1+$brs3klm2+$brs3klm3+$brs3klm4;
                                            $jumlah_baris4 = $brs4klm1+$brs4klm2+$brs4klm3+$brs4klm4;

                                            $total_semua_baris = $jumlah_baris1+$jumlah_baris2+$jumlah_baris3+$jumlah_baris4;

                                            $eigen1 = number_format($jumlah_baris1/$total_semua_baris,4);
                                            $eigen2 = number_format($jumlah_baris2/$total_semua_baris,4);
                                            $eigen3 = number_format($jumlah_baris3/$total_semua_baris,4);
                                            $eigen4 = number_format($jumlah_baris4/$total_semua_baris,4);

                                            $hasilbobot1 = number_format(($nol1*$eigen1)+($satu*$eigen2)+($dua*$eigen3)+($tiga*$eigen4),4);
                                            $hasilbobot2 = number_format(($empat*$eigen1)+($nol2*$eigen2)+($lima*$eigen3)+($enam*$eigen4),4);
                                            $hasilbobot3 = number_format(($tujuh*$eigen1)+($delapan*$eigen2)+($nol3*$eigen3)+($sembilan*$eigen4),4);
                                            $hasilbobot4 = number_format(($sepuluh*$eigen1)+($sebelas*$eigen2)+($duabelas*$eigen3)+($nol4*$eigen4),4);

                                            $hasilbagibobot1 = number_format($hasilbobot1/$eigen1,4);
                                            $hasilbagibobot2 = number_format($hasilbobot2/$eigen2,4);
                                            $hasilbagibobot3 = number_format($hasilbobot3/$eigen3,4);
                                            $hasilbagibobot4 = number_format($hasilbobot4/$eigen4,4);

                                            $totalperhitunganbobot = number_format($hasilbagibobot1+$hasilbagibobot2+$hasilbagibobot3+$hasilbagibobot4,4);

                                            $totalhitungdibagitotalkriteria = number_format($totalperhitunganbobot/4,4);

                                            $hasilakhir = number_format(($totalhitungdibagitotalkriteria-4)/3,4);

                                            $hasilakhirkuadrat = number_format($hasilakhir/0.9,4);
                                        ?>
                                        <tr>
                                            
                                            <td>1</td>
                                            <td>K<?php echo "1 - ".$kriteria[0]->nama_kriteria?><input type="hidden" name="id[]" value="<?php echo $kriteria[0]->kode_kriteria?>"></td>
                                            <td><?php echo number_format($brs1klm1,4)?></td>
                                            <td><?php echo number_format($brs1klm2,4)?></td>
                                            <td><?php echo number_format($brs1klm3,4)?></td>
                                            <td><?php echo number_format($brs1klm4,4)?></td>
                                            
                                            <td style="font-weight:bold; color:#333;"><?php echo number_format($eigen1,4)?><input type="hidden" name="bobot[]" value="<?php echo number_format($eigen1,4) ?>"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>2</td>
                                            <td>K<?php echo "2 - ".$kriteria[1]->nama_kriteria?><input type="hidden" name="id[]" value="<?php echo $kriteria[1]->kode_kriteria?>"></td>
                                            <td><?php echo number_format($brs2klm1,4)?></td>
                                            <td><?php echo number_format($brs2klm2,4)?></td>
                                            <td><?php echo number_format($brs2klm3,4)?></td>
                                            <td><?php echo number_format($brs2klm4,4)?></td>
                                            <td style="font-weight:bold; color:#333;"><?php echo number_format($eigen2,4)?><input type="hidden" name="bobot[]" value="<?php echo number_format($eigen2,4) ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>K<?php echo "3 - ".$kriteria[2]->nama_kriteria?><input type="hidden" name="id[]" value="<?php echo $kriteria[2]->kode_kriteria?>"></td>
                                            <td><?php echo number_format($brs3klm1,4)?></td>
                                            <td><?php echo number_format($brs3klm2,4)?></td>
                                            <td><?php echo number_format($brs3klm3,4)?></td>
                                            <td><?php echo number_format($brs3klm4,4)?></td>
                                            <td style="font-weight:bold; color:#333;"><?php echo number_format($eigen3,4)?><input type="hidden" name="bobot[]" value="<?php echo number_format($eigen3,4) ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>K<?php echo "4 - ".$kriteria[3]->nama_kriteria?><input type="hidden" name="id[]" value="<?php echo $kriteria[3]->kode_kriteria?>"></td>
                                            <td><?php echo number_format($brs4klm1,4)?></td>
                                            <td><?php echo number_format($brs4klm2,4)?></td>
                                            <td><?php echo number_format($brs4klm3,4)?></td>
                                            <td><?php echo number_format($brs4klm4,4)?></td>
                                            <td style="font-weight:bold; color:#333;"><?php echo number_format($eigen4,4)?><input type="hidden" name="bobot[]" value="<?php echo number_format($eigen4,4) ?>"></td>
                                        </tr>          
                                    </table>
                                    <input type="hidden" name="hasilakhir" value="<?php echo $hasilakhirkuadrat?>">
                                    <br>
                                    <?php if(count($kriteria) == 4){ 
                                        if(count($perbandingan) > 0){
                                        ?>
                                    <button class="btn btn-primary" type="submit"> Simpan Bobot</button>
                                    <a href="<?php echo base_url('index.php/ctrlahp/reset')?>" class="btn btn-danger">Reset Perbandingan</a>
                                    <?php } }else{?>
                                    <?php }?>
                                    <br>
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <br>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Cek Konsistensi</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <tr><td colspan="3">Hasil Cek Nilai Konsistensi</td></tr>
                                        <tr>
                                            <td width="21%">Weighted SUM (WS)</td>
                                            <td width="1%">:</td>
                                            <td width="78%">[<?php echo $hasilbobot1?>] [<?php echo $hasilbobot2?>] [<?php echo $hasilbobot3?>] [<?php echo $hasilbobot4?>]</td>
                                        </tr>
                                        <tr>
                                            <td>Total Dari Hasil Bagi WS dengan Bobot (Eigen)</td>
                                            <td>:</td>
                                            <td><?php echo $totalperhitunganbobot?></td>
                                        </tr>
                                        <tr>
                                            <td>Hasil Bagi Dengan Jumlah Kriteria (<?php echo count($kriteria)?>)</td>
                                            <td>:</td>
                                            <td><?php echo $totalhitungdibagitotalkriteria?></td>
                                        </tr>
                                        <tr>
                                            <td>Index Konsistensi (CI)</td>
                                            <td>:</td>
                                            <td><?php echo $hasilakhir?></td>
                                        </tr>
                                        <tr>
                                            <td>Rasio Konsistensi</td>
                                            <td>:</td>
                                            <td><?php echo $hasilakhirkuadrat?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold; color:#333;">Hasil Konsistensi</td>
                                            <td style="font-weight:bold; color:#333;">:</td>
                                            <td style="font-weight:bold; color:#333;"><?php if($hasilakhirkuadrat < 0.1){ ?> <p style="font-weight:bold; color:#008000;">KONSISTEN</p> <?php }else{ ?><p style="font-weight:bold; color:#FF0000;">TIDAK KONSISTEN</p> <?php }?></td>
                                        </tr>           
                                    </table>
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
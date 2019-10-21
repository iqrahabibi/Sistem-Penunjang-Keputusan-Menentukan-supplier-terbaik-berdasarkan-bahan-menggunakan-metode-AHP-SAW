<?php $this->view('header');?>

            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php/ctrlutama')?>"><i class="fa fa-dashboard active"></i> Dashboard</a></li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                <!-- <img src="<?php echo base_url('assets/image/msk.jpg')?>" width="100%" height="100%"> -->
                <div class="row">
                        <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($supplier);?>
                                    </h3>
                                    <p>
                                        Jumlah Supplier
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($hasil);?>
                                    </h3>
                                    <p>
                                        Jumlah Penilaian Bulan Ini
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                       
                    
                        
                    </div><!-- /.row -->
                    <!-- Small boxes (Stat box) -->
                   
                </section><!-- /.content -->
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
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
    Index.init(); // init index page
    QuickSidebar.init(); // init quick sidebar
    Tasks.initDashboardWidget(); // init tash dashboard widget
});
</script>
<!-- END JAVASCRIPTS -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'keenthemes.com');
  ga('send', 'pageview');
</script>
<?php $this->view('footer');?>
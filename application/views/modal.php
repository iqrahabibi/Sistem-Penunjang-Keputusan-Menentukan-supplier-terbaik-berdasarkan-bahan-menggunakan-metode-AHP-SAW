<?php foreach ($datauser as $ambil) {
		?>
				<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $ambil->id?>" width="75%" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			                <h4 class="modal-title">Ubah Data</h4>
			            </div>
			            <form class="form-horizontal" action="<?php echo base_url('index.php/ctrluser/editdata')?>" method="post" enctype="multipart/form-data" role="form">
				            <div class="modal-body">
				                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Nama</label>
				                        <div class="col-lg-12">
                                            <input type="hidden" class="form-control" id="jenjang" name="id" value="<?php echo $ambil->id?>">  
				                        	<input type="text" class="form-control" id="jenjang" name="nama" placeholder="Nama" value="<?php echo $ambil->nama?>">
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">username</label>
				                        <div class="col-lg-12">
				                            <input type="text" class="form-control" id="nama" name="username" placeholder="Username" value="<?php echo $ambil->username?>">
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

        <?php  }?>
        
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="insert-data" width="75%" class="modal fade">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
			                <h4 class="modal-title">Insert Data</h4>
			            </div>
			            <form class="form-horizontal" action="<?php echo base_url('index.php/ctrluser/insertdata')?>" method="post" enctype="multipart/form-data" role="form">
				            <div class="modal-body">
				                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Nama</label>
				                        <div class="col-lg-12">
				                        	<input type="text" class="form-control" id="jenjang" name="nama" placeholder="Nama">
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Username</label>
				                        <div class="col-lg-12">
				                            <input type="text" class="form-control" id="nama" name="username" placeholder="Username">
				                        </div>
                                    </div>
                                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Password</label>
				                        <div class="col-lg-12">
				                            <input type="password" class="form-control" id="nama" name="password" placeholder="Password">
				                        </div>
                                    </div>
                                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Gambar</label>
				                        <div class="col-lg-12">
				                            <input type="file" id="nama" name="gambar">
				                        </div>
                                    </div>
                                    <div class="form-group">
				                        <label class="col-lg-3 col-sm-1">Status</label>
				                        <div class="col-lg-12">
				                            <select name="status" class="form-control">
                                                <option value="0">STAFF</option>
                                                <option value="1">ADMIN</option>
                                                <option value="2">OWNER</option>
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
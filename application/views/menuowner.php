<ul class="sidebar-menu">
    <li>
        <a href="<?php echo base_url('index.php/ctrlutama')?>">
            <i class="glyphicon glyphicon-home"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview">
        <a href="">
            <i class="fa fa-edit"></i>
                <span>Master</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/ctrlbahan')?>"><i class="glyphicon glyphicon-leaf"></i> Bahan</a></li>
            <li><a href="<?php echo base_url('index.php/ctrlsupplier')?>"><i class="glyphicon glyphicon-user"></i> Supplier</a></li>
            <li><a href="<?php echo base_url('index.php/ctrlkriteria')?>"><i class="glyphicon glyphicon-list-alt"></i> Kriteria</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i class="fa fa-edit"></i>
                <span>Proses</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/ctrlahp')?>"><i class="glyphicon glyphicon-leaf"></i> Entry Pembobotan Kriteria</a></li>
            <li><a href="<?php echo base_url('index.php/ctrlsaw')?>"><i class="glyphicon glyphicon-user"></i> Penilaian Supplier</a></li>
            <li><a href="<?php echo base_url('index.php/ctrlsuratkeputusan')?>"><i class="glyphicon glyphicon-user"></i> Entry Surat Keputusan</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i class="fa fa-edit"></i>
                <span>Report</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/ctrlreportpdf/viewperbandingan')?>"><i class="glyphicon glyphicon-leaf"></i> Cetak Laporan Perbandingan Kriteria</a></li>
            <li><a href="<?php echo base_url('index.php/ctrlreportpdf/viewpenilaiansupplierkode')?>"><i class="glyphicon glyphicon-user"></i> Cetak Laporan Hasil Penilaian Supplier Berdasarkan Kode Penilaian</a></li>
            <li><a href="<?php echo base_url('index.php/ctrlreportpdf/viewsuratkeputusan')?>"><i class="glyphicon glyphicon-user"></i> Cetak Laporan Surat Keputusan</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i class="glyphicon glyphicon-wrench"></i>
                <span>Setting User</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/ctrlinter')?>"><i class="glyphicon glyphicon-user"></i> Data User</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i class="glyphicon glyphicon-wrench"></i>
                <span>test</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/ctrluser')?>"><i class="glyphicon glyphicon-user"></i> test</a></li>
        </ul>
    </li>
    
</ul>
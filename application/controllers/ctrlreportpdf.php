<?php
Class ctrlreportpdf extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modelreport');
        $this->load->model('modelperbandingan');
        $this->load->model('modeluser');
        $this->load->model('modelsaw');
        $this->load->library('pdf');
    }

    function viewperbandingan(){
        $banding = $this->modelperbandingan->getperbandingan();

        $this->session->nama;
        $admin = $this->modeluser->ambiladmin($this->session->nama);
        $alluser            = $this->modeluser->getalluser();
    $data['datauser']   = $alluser;
    		$data['admin'] = $admin;
        $data['nama']= $this->session->nama;
        $data['perbandingan']= $banding;
        $this->load->view('reportperbandingankriteria', $data);
    }

    function viewpenilaiansupplierperiode(){
        $this->session->nama;
        $admin = $this->modeluser->ambiladmin($this->session->nama);
        $alluser            = $this->modeluser->getalluser();
    $data['datauser']   = $alluser;
    		$data['admin'] = $admin;
        $data['nama']= $this->session->nama;
        $this->load->view('reporthasilpenilaiansupplierberdasarkanperiode', $data);
    }

    function viewpenilaiansupplierkode(){
        $this->session->nama;
        $admin = $this->modeluser->ambiladmin($this->session->nama);
        $kode  = $this->modelsaw->getsaw();
        $alluser            = $this->modeluser->getalluser();
    $data['datauser']   = $alluser;
        $data['saw']   = $kode;    
    	$data['admin'] = $admin;
        $data['nama']  = $this->session->nama;
        $this->load->view('reporthasilpenilaiansupplierberdasarkankode', $data);
    }

    function viewsuratkeputusan(){
        $this->session->nama;
        $admin = $this->modeluser->ambiladmin($this->session->nama);
        $alluser            = $this->modeluser->getalluser();
    $data['datauser']   = $alluser;
    		$data['admin'] = $admin;
        $data['nama']= $this->session->nama;
        $this->load->view('reportsuratkeputusan', $data);
    }

    function reportperbandingan(){

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('assets/image/download.jpg',11,8,40,20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'PT. MITRA SUKSES KREASINDO',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Komplek Arteri Mas 65-64 Jl. Panjang Arteri Klp. Dua No65A, Kb Jeruk',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Kota Jakarta Barat, Daerah Khusus Ibu Kota Jakarta 11550, Indonesia',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Telp (021) 5366 1680',0,1,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(190,7,'LAPORAN PERBANDINGAN KRITERIA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,7,'------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'C');
        
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(10,6,'NO',1,0);
        $pdf->Cell(45,6,'NAMA KRITERIA KE 1',1,0);
        $pdf->Cell(45,6,'NAMA KRITERIA KE 2',1,0);
        $pdf->Cell(80,6,'KETERANGAN',1,1);
        $x = 1;

        $pdf->SetFont('Arial','',7);
        $banding = $this->modelreport->pdfperbandingan();
        $banding1 = $this->modelreport->pdfperbandingan1();
        // foreach ($banding as $row){
           // for($i=0;$i<=5;$i++){
               
            $pdf->Cell(10,6,"1",1,0);
            $pdf->Cell(45,6,$banding[0]->kode_kriteria1." - ".$banding[0]->nama_kriteria,1,0);
            $pdf->Cell(45,6,$banding[0]->kode_kriteria2." - ".$banding1[0]->nama_kriteria,1,0);
            if($banding[0]->nilai_banding <= 0){
                $pdf->Cell(80,6,$banding[0]->nama_kriteria." ".abs($banding[0]->nilai_banding)." Kali lebih penting dari ".$banding1[0]->nama_kriteria,1,1);
            }else{
                $pdf->Cell(80,6,$banding1[0]->nama_kriteria." ".abs($banding[0]->nilai_banding)." Kali lebih penting dari ".$banding[0]->nama_kriteria,1,1);
            }

            $pdf->Cell(10,6,"2",1,0);
            $pdf->Cell(45,6,$banding[1]->kode_kriteria1." - ".$banding[1]->nama_kriteria,1,0);
            $pdf->Cell(45,6,$banding1[1]->kode_kriteria2." - ".$banding1[1]->nama_kriteria,1,0);
            if($banding[1]->nilai_banding <= 0){
                $pdf->Cell(80,6,$banding[1]->nama_kriteria." ".abs($banding[1]->nilai_banding)." Kali lebih penting dari ".$banding1[1]->nama_kriteria,1,1);
            }else{
                $pdf->Cell(80,6,$banding1[1]->nama_kriteria." ".abs($banding[1]->nilai_banding)." Kali lebih penting dari ".$banding[1]->nama_kriteria,1,1);
            }

            $pdf->Cell(10,6,"3",1,0);
            $pdf->Cell(45,6,$banding[2]->kode_kriteria1." - ".$banding[2]->nama_kriteria,1,0);
            $pdf->Cell(45,6,$banding1[3]->kode_kriteria2." - ".$banding1[3]->nama_kriteria,1,0);
            if($banding[2]->nilai_banding <= 0){
                $pdf->Cell(80,6,$banding[2]->nama_kriteria." ".abs($banding[2]->nilai_banding)." Kali lebih penting dari ".$banding1[3]->nama_kriteria,1,1);
            }else{
                $pdf->Cell(80,6,$banding1[3]->nama_kriteria." ".abs($banding[3]->nilai_banding)." Kali lebih penting dari ".$banding[2]->nama_kriteria,1,1);
            }

            $pdf->Cell(10,6,"4",1,0);
            $pdf->Cell(45,6,$banding[3]->kode_kriteria1." - ".$banding[3]->nama_kriteria,1,0);
            $pdf->Cell(45,6,$banding1[1]->kode_kriteria2." - ".$banding1[1]->nama_kriteria,1,0);
            if($banding[3]->nilai_banding <= 0){
                $pdf->Cell(80,6,$banding[3]->nama_kriteria." ".abs($banding[3]->nilai_banding)." Kali lebih penting dari ".$banding1[1]->nama_kriteria,1,1);
            }else{
                $pdf->Cell(80,6,$banding1[1]->nama_kriteria." ".abs($banding[1]->nilai_banding)." Kali lebih penting dari ".$banding[3]->nama_kriteria,1,1);
            }

            $pdf->Cell(10,6,"5",1,0);
            $pdf->Cell(45,6,$banding[4]->kode_kriteria1." - ".$banding[4]->nama_kriteria,1,0);
            $pdf->Cell(45,6,$banding1[3]->kode_kriteria2." - ".$banding1[3]->nama_kriteria,1,0);
            if($banding[4]->nilai_banding <= 0){
                $pdf->Cell(80,6,$banding[4]->nama_kriteria." ".abs($banding[4]->nilai_banding)." Kali lebih penting dari ".$banding1[3]->nama_kriteria,1,1);
            }else{
                $pdf->Cell(80,6,$banding1[3]->nama_kriteria." ".abs($banding[3]->nilai_banding)." Kali lebih penting dari ".$banding[4]->nama_kriteria,1,1);
            }

            $pdf->Cell(10,6,"6",1,0);
            $pdf->Cell(45,6,$banding[5]->kode_kriteria1." - ".$banding[5]->nama_kriteria,1,0);
            $pdf->Cell(45,6,$banding1[3]->kode_kriteria2." - ".$banding1[3]->nama_kriteria,1,0);
            if($banding[5]->nilai_banding <= 0){
                $pdf->Cell(80,6,$banding[5]->nama_kriteria." ".abs($banding[5]->nilai_banding)." Kali lebih penting dari ".$banding1[3]->nama_kriteria,1,1);
            }else{
                $pdf->Cell(80,6,$banding1[3]->nama_kriteria." ".abs($banding[3]->nilai_banding)." Kali lebih penting dari ".$banding[5]->nama_kriteria,1,1);
            }
            
            // $pdf->Cell(27,6,$row->keterangan,1,0);
            // $pdf->Cell(27,6,$row->nip,1,1);
         //   $x++;
       // }
        $pdf->Output();
    }

    function reportpenilaianperiode(){
        $tgl1 = $this->input->post('from');
        $tgl2 = $this->input->post('to');

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('assets/image/download.jpg',11,8,40,20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'PT. MITRA SUKSES KREASINDO',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Komplek Arteri Mas 65-64 Jl. Panjang Arteri Klp. Dua No65A, Kb Jeruk',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Kota Jakarta Barat, Daerah Khusus Ibu Kota Jakarta 11550, Indonesia',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Telp (021) 5366 1680',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LAPORAN PENILAIAN SUPPLIER BERDASARKAN PERIODE',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,5,'PERIODE '.date("d-m-Y", strtotime($tgl1)).' s/d '.date("d-m-Y", strtotime($tgl2)).'.',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,7,'------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(5,6,'NO',1,0);
        $pdf->Cell(40,6,'NAMA BAHAN',1,0);
        $pdf->Cell(30,6,'KODE PENILAIAN',1,0);
        $pdf->Cell(30,6,'TANGGAL PENILAI',1,0);
        $pdf->Cell(30,6,'NAMA SUPPLIER',1,0);
        $pdf->Cell(30,6,'HASIL NILAI',1,1);
        $x=1;

        $pdf->SetFont('Arial','',7);
        $i=1;
        $penilaianperiode = $this->modelreport->pdfpenilaianperiode($tgl1,$tgl2);
        foreach ($penilaianperiode as $row){
            $pdf->Cell(5,6,$x,1,0);
            $pdf->Cell(40,6,$row->nama_bahan,1,0);
            $pdf->Cell(30,6,$row->kode_saw,1,0);
            $pdf->Cell(30,6,$row->tgl_penilaian,1,0);
            $pdf->Cell(30,6,$row->nama_supplier,1,0);
            $pdf->Cell(30,6,$row->nilai_saw,1,1);
            $i++;
            $x++;
        }
        $pdf->Output();
    }

    function reportpenilaiankode(){
        $kode = $this->input->post('kode');

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('assets/image/download.jpg',11,8,40,20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'PT. MITRA SUKSES KREASINDO',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Komplek Arteri Mas 65-64 Jl. Panjang Arteri Klp. Dua No65A, Kb Jeruk',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Kota Jakarta Barat, Daerah Khusus Ibu Kota Jakarta 11550, Indonesia',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Telp (021) 5366 1680',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LAPORAN PENILAIAN SUPPLIER BERDASARKAN KODE',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,5,'STATUS = "'.$kode.'"',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,7,'------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(5,6,'NO',1,0);
        $pdf->Cell(40,6,'NAMA BAHAN',1,0);
        $pdf->Cell(30,6,'KODE PENILAIAN',1,0);
        $pdf->Cell(30,6,'TANGGAL PENILAI',1,0);
        $pdf->Cell(30,6,'NAMA SUPPLIER',1,0);
        $pdf->Cell(30,6,'HASIL NILAI',1,0);
        $pdf->cell(30,6,'RANKING',1,1);
        $x=1;

        $pdf->SetFont('Arial','',7);
        $i=1;
        $penilaiankode = $this->modelreport->pdfpenilaiankode($kode);
        foreach ($penilaiankode as $row){
            $pdf->Cell(5,6,$x,1,0);
            $pdf->Cell(40,6,$row->nama_bahan,1,0);
            $pdf->Cell(30,6,$row->kode_saw,1,0);
            $pdf->Cell(30,6,$row->tgl_penilaian,1,0);
            $pdf->Cell(30,6,$row->nama_supplier,1,0);
            $pdf->Cell(30,6,$row->nilai_saw,1,0);
            $pdf->Cell(30,6,$i,1,1);
            $x++;
            $i++;
        }
        $pdf->Output();
    }

    function reportsk(){
        $tgl1 = $this->input->post('from');
        $tgl2 = $this->input->post('to');

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('assets/image/download.jpg',11,8,40,20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'PT. MITRA SUKSES KREASINDO',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Komplek Arteri Mas 65-64 Jl. Panjang Arteri Klp. Dua No65A, Kb Jeruk',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Kota Jakarta Barat, Daerah Khusus Ibu Kota Jakarta 11550, Indonesia',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,7,'Telp (021) 5366 1680',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LAPORAN SURAT KEPUTUSAN',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,5,'PERIODE '.date("d-m-Y", strtotime($tgl1)).' s/d '.date("d-m-Y", strtotime($tgl2)).'.',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,7,'------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(5,6,'NO',1,0);
        $pdf->Cell(35,6,'NO SURAT KEPUTUSAN',1,0);
        $pdf->Cell(45,6,'TANGGAL SURAT KEPUTUSAN',1,0);
        $pdf->Cell(30,6,'NAMA SUPPLIER',1,0);
        $pdf->Cell(30,6,'NAMA BAHAN',1,0);
        $pdf->Cell(30,6,'HASIL KEPUTUSAN',1,1);
        $x=1;

        $pdf->SetFont('Arial','',7);
        $suratkeputusan = $this->modelreport->pdfsuratkeputusan($tgl1 , $tgl2);
        foreach ($suratkeputusan as $row){
            $pdf->Cell(5,6,$x,1,0);
            $pdf->Cell(35,6,$row->kd_sk,1,0);
            $pdf->Cell(45,6,$row->tanggal_sk,1,0);
            $pdf->Cell(30,6,$row->nama_supplier,1,0);
            $pdf->Cell(30,6,$row->nama_bahan,1,0);
            $pdf->Cell(30,6,$row->hasil,1,1);
            $x++;
        }
        $pdf->Output();
    }
}

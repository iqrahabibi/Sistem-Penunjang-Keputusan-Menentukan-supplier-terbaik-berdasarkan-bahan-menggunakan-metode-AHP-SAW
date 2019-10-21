<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelreport extends CI_Model {

	public function __construct() {
		parent::__construct();


    }
    public function pdfperbandingan(){
        $result = $this->db->query("SELECT * from perbandingan,kriteria where kode_kriteria1 = kode_kriteria");
        return $result->result();
    }

    public function pdfperbandingan1(){
        $result = $this->db->query("SELECT * from perbandingan,kriteria where kode_kriteria2 = kode_kriteria");
        return $result->result();
    }

    public function pdfpenilaianperiode($tgl1 , $tgl2){
        $result= $this->db->query("select * from saw,hasilsaw,supplier,bahan where saw.kode_saw = hasilsaw.kode_saw and hasilsaw.kode_supplier = supplier.kode_supplier and supplier.kode_bahan = bahan.kode_bahan and tgl_penilaian BETWEEN '$tgl1' and '$tgl2'order by nilai_saw DESC");
        return $result->result();
    }

    public function pdfpenilaiankode($kode){
        $result= $this->db->query("select * from saw,hasilsaw,supplier,bahan where saw.kode_saw = hasilsaw.kode_saw and hasilsaw.kode_supplier = supplier.kode_supplier and supplier.kode_bahan = bahan.kode_bahan and saw.kode_saw = '$kode' order by nilai_saw DESC");
        return $result->result();
    }

    public function pdfsuratkeputusan($tgl1 , $tgl2){
        $result = $this->db->query("select * from surat_keputusan,hasilsaw,supplier,bahan where surat_keputusan.hasil = hasilsaw.nilai_saw and hasilsaw.kode_supplier = supplier.kode_supplier and supplier.kode_bahan = bahan.kode_bahan and tanggal_sk BETWEEN '$tgl1' and '$tgl2'");
        return $result->result();
    }
}

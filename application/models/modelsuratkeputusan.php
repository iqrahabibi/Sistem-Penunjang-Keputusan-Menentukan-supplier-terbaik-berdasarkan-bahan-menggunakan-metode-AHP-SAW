<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelsuratkeputusan extends CI_Model {

	public function __construct() {
		parent::__construct();


	}

  public function InsertData($data){
		$checkinsert = false;
		try{
			$this->db->insert('surat_keputusan',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	public function getallsuratkeputusan(){
		$result = $this->db->get('surat_keputusan');
		return $result->result();
	}

	public function cobain(){
		$result = $this->db->query("select kd_saw from surat_keputusan");
		return $result->result();
	}

	public function takeit($cek){
		$result = $this->db->query("select * from surat_keputusan,hasilsaw,supplier,bahan where surat_keputusan.hasil = hasilsaw.nilai_saw and hasilsaw.kode_supplier = supplier.kode_supplier and supplier.kode_bahan = bahan.kode_bahan and surat_keputusan.kd_saw = '$cek'");
		return $result->result();
	}

	public function test(){
			$result= $this->db->query("select * from surat_keputusan where kode_kriteria=''");
			return $result->result();
	}
	
	public function test1(){
		$result= $this->db->query("select * from surat_keputusan,hasilsaw where surat_keputusan.kd_saw = hasilsaw.kode_saw");
		return $result->result();
}

    public function joinsk(){
        $result = $this->db->query("select * from surat_keputusan,hasilsaw,supplier,bahan where surat_keputusan.hasil = hasilsaw.nilai_saw and hasilsaw.kode_supplier = supplier.kode_supplier and supplier.kode_bahan = bahan.kode_bahan");
        return $result->result();
    }
    
    public function Deletesk($id){
		$checkupdate = false;
		try{
			$this->db->where('kd_sk',$id);
			$this->db->delete('surat_keputusan');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function UpdateSK($id,$data){
		$checkupdate = false;
		try{
			$this->db->where('kd_sk',$id);
			$this->db->update('surat_keputusan',$data);
			$checkupdate = true;
		}catch (Exception $ex) {

			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function kodesk()   {
		$this->db->select('RIGHT(surat_keputusan.kd_sk,3) as kode', FALSE);
		$this->db->order_by('kd_sk','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('surat_keputusan');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		 //jika kode ternyata sudah ada.      
		 $data = $query->row();      
		 $kode = intval($data->kode) + 1;
		}
		else {      
		 //jika kode belum ada      
		 $kode = 1;    
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "SKP".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelkriteria extends CI_Model {

	public function __construct() {
		parent::__construct();


	}

  public function InsertData($data){
		$checkinsert = false;
		try{
			$this->db->insert('kriteria',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	public function getallkriteria(){
		$result = $this->db->get('kriteria');
		return $result->result();
	}

	public function test(){
		for($i=1;$i<=4;$i++){
			$result= $this->db->query("select * from kriteria where kode_kriteria='$i'");
			return $result->result();
		}
	}

	public function UpdateKriteria($id,$data){
		$checkupdate = false;
		try{
			$this->db->where('kode_kriteria',$id);
			$this->db->update('kriteria',$data);
			$checkupdate = true;
		}catch (Exception $ex) {

			$checkupdate = false;
		}

		return $checkupdate;

	}

	public function UpdateKriteriaBobot($data){
		$checkupdate = false;
		try{
			$this->db->update_batch('kriteria',$data,'kode_kriteria');
			$checkupdate = true;
		}catch (Exception $ex) {

			$checkupdate = false;
		}

		return $checkupdate;

	}

	public function DeleteKriteria($id){
		$checkupdate = false;
		try{
			$this->db->where('kode_kriteria',$id);
			$this->db->delete('kriteria');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function kodekriteria()   {
		$this->db->select('RIGHT(kriteria.kode_kriteria,3) as kode', FALSE);
		$this->db->order_by('kode_kriteria','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('kriteria');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		$kodejadi = "KTR".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
  }
}

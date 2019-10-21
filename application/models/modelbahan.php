<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelbahan extends CI_Model {

	public function __construct() {
		parent::__construct();


	}

  public function InsertData($data){
		$checkinsert = false;
		try{
			$this->db->insert('bahan',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	public function getallbahan(){
		$result = $this->db->get('bahan');
		return $result->result();
	}

	public function UpdateBahan($id,$data){
		$checkupdate = false;
		try{
			$this->db->where('kode_bahan',$id);
			$this->db->update('bahan',$data);
			$checkupdate = true;
		}catch (Exception $ex) {

			$checkupdate = false;
		}

		return $checkupdate;

	}

	public function DeleteBahan($id){
		$checkupdate = false;
		try{
			$this->db->where('kode_bahan',$id);
			$this->db->delete('bahan');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function kodebahan()   {
		$this->db->select('RIGHT(bahan.kode_bahan,3) as kode', FALSE);
		$this->db->order_by('kode_bahan','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('bahan');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		$kodejadi = "BHN".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
  }
}

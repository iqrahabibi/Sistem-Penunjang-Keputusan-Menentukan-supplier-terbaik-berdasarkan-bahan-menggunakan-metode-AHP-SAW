<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelsupplier extends CI_Model {

	public function __construct() {
		parent::__construct();


	}

  public function InsertData($data){
		$checkinsert = false;
		try{
			$this->db->insert('supplier',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	public function getallsupplier(){
		$result = $this->db->get('supplier');
		return $result->result();
	}

	public function UpdateSupplier($id,$data){
		$checkupdate = false;
		try{
			$this->db->where('kode_supplier',$id);
			$this->db->update('supplier',$data);
			$checkupdate = true;
		}catch (Exception $ex) {

			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function DeleteSupplier($id){
		$checkupdate = false;
		try{
			$this->db->where('kode_supplier',$id);
			$this->db->delete('supplier');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function hitung(){
		$result = $this->db->query("select count(kode_supplier) from supplier");
		return $result->result();
	}
	
	public function cek($cek){
		$result = $this->db->query("SELECT kode_bahan from supplier where kode_bahan = '$cek'");
		return $result->result();
	}

	public function cekmatriksaw($cek){
		$result = $this->db->query("SELECT kode_supplier from matrikssaw where kode_supplier = '$cek'");
		return $result->result();
	}
    
    public function joinbahan(){
        $result = $this->db->query("SELECT * from supplier,bahan where supplier.kode_bahan = bahan.kode_bahan");
        return $result->result();
	}

	public function join($kode){
        $result = $this->db->query("SELECT * from supplier where kode_bahan = '$kode'");
        return $result->result();
	}
	
	public function panggiljoinbahan($coba){
        $result = $this->db->query("SELECT * from supplier,bahan,supplierbahan where supplierbahan.kode_bahan = bahan.kode_bahan and supplierbahan.kode_supplier = supplier.nama_supplier and supplierbahan.kode_supplier = '$coba'");
        return $result->result();
	}
	
	public function kodesupplier()   {
		$this->db->select('RIGHT(supplier.kode_supplier,3) as kode', FALSE);
		$this->db->order_by('kode_supplier','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('supplier');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		$kodejadi = "SPL".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
  }
}

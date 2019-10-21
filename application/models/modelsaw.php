<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelsaw extends CI_Model {

	public function __construct() {
		parent::__construct();


	}

  public function InsertData($data){
		$checkinsert = false;
		try{
            // $this->db->insert('perbandingan',$data);
            $this->db->insert_batch('matrikssaw', $data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	public function Insertnilai($data){
		$checkinsert = false;
		try{
            // $this->db->insert('perbandingan',$data);
            $this->db->insert_batch('hasilsaw', $data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	public function Insertsaw($data){
		$checkinsert = false;
		try{
            $this->db->insert('saw',$data);
            // $this->db->insert_batch('saw', $data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	public function viewByhasil($kodesaw){
		$result = $this->db->query("select * from hasilsaw,supplier where hasilsaw.kode_supplier = supplier.kode_supplier and kode_saw = '$kodesaw' order by nilai_saw Desc");
		return $result->result();
		// $this->db->where('kode_saw', $kodesaw);
		// $result = $this->db->get('hasilsaw')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		
		// return $result; 
	  }

	function gethasil($id){
        $hasil=$this->db->query("SELECT * FROM hasilsaw WHERE kode_saw='$id'");
        return $hasil->result();
	}
	
	public function allsaw($cek){
		$result = $this->db->query("select * from saw where substring(tgl_penilaian,6,2) = '$cek'");
		return $result->result();
	}

	public function getsaw(){
		$result = $this->db->get('saw');
		return $result->result();
	}

	public function getallsaw(){
		$result = $this->db->get('matrikssaw');
		return $result->result();
	}

	public function join(){
			$result= $this->db->query("select * from matrikssaw,supplier where matrikssaw.kode_supplier = supplier.kode_supplier");
			return $result->result();
    }

    public function notin(){
        $result= $this->db->query("select * from supplier where kode_supplier not in ( select kode_supplier from matrikssaw )");
        return $result->result();
}
    
    public function nilaimax(){
        $result= $this->db->query("select max(kriteria1) as max1, max(kriteria2) as max2, max(kriteria3) as max3, max(kriteria4) as max4 from matrikssaw");
        return $result->result();
    }

    public function nilaimin(){
        $result= $this->db->query("select min(kriteria1) as min1, min(kriteria2) as min2, min(kriteria3) as min3, min(kriteria4) as min4 from matrikssaw");
        return $result->result();
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

	public function kodesaw()   {
		$this->db->select('RIGHT(hasilsaw.kode_saw,3) as kode', FALSE);
		$this->db->order_by('kode_saw','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('hasilsaw');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		$kodejadi = "SAW".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;  
  }

	public function DeleteSaw($id){
		$checkupdate = false;
		try{
			$this->db->where_in('kode_supplier', $id);
			$this->db->delete('matrikssaw');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}
	
}

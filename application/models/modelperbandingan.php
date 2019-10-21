<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelperbandingan extends CI_Model {

	public function __construct() {
		parent::__construct();


	}

  public function InsertData($data){
		$checkinsert = false;
		try{
            $this->db->insert_batch('perbandingan', $data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	public function getperbandingan(){
		$result = $this->db->get('perbandingan');
		return $result->result();
	}

	public function ambilperbandingan(){
		$result = $this->db->query("select id from perbandingan");
		return $result->result();
	}

	public function resetmodel($id){
		$checkupdate = false;
		try{
			$this->db->where('id',$id);
			$this->db->delete('perbandingan');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}
}

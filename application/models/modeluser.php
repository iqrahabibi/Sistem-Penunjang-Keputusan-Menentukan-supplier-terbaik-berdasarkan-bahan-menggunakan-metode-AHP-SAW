<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modeluser extends CI_Model {

	public function __construct() {
		parent::__construct();


	}

  public function InsertData($data){
		$checkinsert = false;
		try{
			$this->db->insert('user',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	public function getalluser(){
		$result = $this->db->get('user');
		return $result->result();
	}

	public function UpdateUser($id,$data){
		$checkupdate = false;
		try{
			$this->db->where('id',$id);
			$this->db->update('user',$data);
			$checkupdate = true;
		}catch (Exception $ex) {

			$checkupdate = false;
		}

		return $checkupdate;

	}

	public function DeleteUser($id){
		$checkupdate = false;
		try{
			$this->db->where('id',$id);
			$this->db->delete('user');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function readadmin($username,$password){
		$result = $this->db->where('username',($username))->where('password',($password))->where('status = "1"')->limit(1)->get('user');
		return $result->row();
	}

	public function readstaff($username,$password){
		$result = $this->db->where('username',($username))->where('password',($password))->where('status = "0"')->limit(1)->get('user');
		return $result->row();
	}
	public function readowner($username,$password){
		$result = $this->db->where('username',($username))->where('password',($password))->where('status = "2"')->limit(1)->get('user');
		return $result->row();
	}

	public function ambiladmin($nama){
		$result = $this->db->where('nama',$nama)->get('user');
		return $result->row();
	}
}

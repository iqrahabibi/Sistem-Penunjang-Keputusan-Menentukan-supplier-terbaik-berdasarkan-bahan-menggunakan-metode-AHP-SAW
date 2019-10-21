<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrllogin extends CI_Controller {

	public function __construct() {
		parent::__construct();
			$this->load->model('modeluser');
  	}
	 
	public function index(){
		$this->load->view('login');
	}

	public function auth(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//$checkUsername = $this->CRUDModel->readUsername($username,$password);
		if($checkUsername = $this->modeluser->readadmin($username,$password)){
			$newdata = array(
				'nama'  => $checkUsername->nama);
			//set session
			$this->session->set_userdata($newdata);
			redirect('ctrlutama');
		}else if($checkUsername = $this->modeluser->readstaff($username,$password)){
			$newdata = array(
				'nama'  => $checkUsername->nama);
			//set session
			$this->session->set_userdata($newdata);
			redirect('ctrlutama');
		}else if($checkUsername = $this->modeluser->readowner($username,$password)){
			$newdata = array(
				'nama'  => $checkUsername->nama);
			//set session
			$this->session->set_userdata($newdata);
			redirect('ctrlutama');
		}else{
			redirect('ctrllogin');
		}
	}

  public function logout(){

		$sess_array = $this->session->all_userdata();

		foreach($sess_array as $key =>$val){
		if($key!='nama'
		  && $key!='RESERVER_KEY_HERE')$this->session->unset_userdata($key);
		}
		redirect('ctrllogin');
		//redirect to default controller and index function
		//$this->load->view('Login2');


	}
}

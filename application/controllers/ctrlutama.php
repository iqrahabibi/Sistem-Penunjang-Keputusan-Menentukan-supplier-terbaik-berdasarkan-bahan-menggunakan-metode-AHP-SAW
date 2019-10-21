<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlutama extends CI_Controller {

	public function __construct() {
		parent::__construct();
			$this->load->model('modeluser');
			$this->load->model('modelsupplier');
			$this->load->model('modelsaw');
  	}
	 
	public function index(){
		if($this->session->nama==NULL){
			redirect('ctrllogin');
		}
		$now				= date('m');
		$alluser			= $this->modeluser->getalluser();
		$counthasil			= $this->modelsaw->allsaw($now);
		$countsupp 			= $this->modelsupplier->getallsupplier();
		$nama 				= $this->session->nama;
		$admin 				= $this->modeluser->ambiladmin($nama);
		$data['hasil']		= $counthasil;
		$data['supplier']	= $countsupp;
		$data['admin'] 		= $admin;
		$data['nama'] 		= $nama;
		$data['datauser']	= $alluser;

		$this->load->view('index utama', $data);
	}
}

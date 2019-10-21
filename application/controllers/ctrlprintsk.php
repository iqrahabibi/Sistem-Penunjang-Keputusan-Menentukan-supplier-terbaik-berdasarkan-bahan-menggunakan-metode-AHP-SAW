<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlprintsk extends CI_Controller {

	public function __construct() {
		parent::__construct();
            $this->load->model('modeluser');
            $this->load->model('modelsuratkeputusan');
  	}
	 
	public function index(){
		$this->load->view('login');
    }
    
    public function cobain($id){
        $cek = $this->modelsuratkeputusan->takeit($id);
        $data['ambil'] = $cek;

        $this->load->view('printwindowsk', $data);
    }
}

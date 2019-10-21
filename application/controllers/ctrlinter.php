<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlinter extends CI_Controller {

	public function __construct() {
        parent::__construct();
            
  	}
	 
	public function index(){
		

		$this->load->view('inter');
    }
    public function test(){
        $test = $this->input->post('tes');
        $data['test'] = $test;
        $this->load->view('inter', $data);
    }
    
   
}

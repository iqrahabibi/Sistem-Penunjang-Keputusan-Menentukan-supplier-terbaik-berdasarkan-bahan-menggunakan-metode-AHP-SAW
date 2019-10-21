<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlkriteria extends CI_Controller {

	public function __construct() {
        parent::__construct();
            $this->load->model('modelkriteria');
			      $this->load->model('modeluser');
  	}
	 
	public function index(){
		if($this->session->nama==NULL){
			redirect('ctrllogin');
		}
    $allkriteria			    = $this->modelkriteria->getallkriteria();
    $autonumber           = $this->modelkriteria->kodekriteria();
		$nama 				        = $this->session->nama;
    $admin 				        = $this->modeluser->ambiladmin($nama);
    $alluser            = $this->modeluser->getalluser();
    $data['datauser']   = $alluser;
    $data['admin'] 		    = $admin;
    $data['kode']         = $autonumber;
		$data['nama'] 		    = $nama;
		$data['datakriteria']	= $allkriteria;

		$this->load->view('datakriteria', $data);
    }
    
    public function EditData(){
        $id       = $this->input->post('id');
        $nama     = $this->input->post('nama');
        $status   = $this->input->post('status');
    
      $data = array(
        'nama_kriteria'   => $nama,
        'status'          => $status
      );
    
      $result = $this->modelkriteria->UpdateKriteria($id,$data);
    
      $data = NULL;
      if($result){
        redirect('ctrlkriteria');
      }else{
    
        $nama = $this->session->nama;
        $data['nama'] = $nama;
        $data['result'] = "Gagal";
        $this->load->view('datakriteria',$data);
      }
    }
    
        public function DeleteData($id){
            $result = $this->modelkriteria->DeleteKriteria($id);
    
            if($result){
                redirect('ctrlkriteria');
            }else{
    
                $nama = $this->session->nama;
                $data['nama'] = $nama;
                $data['result'] = "Gagal";
                $this->load->view('datakriteria',$data);
            }
        }
    
        public function InsertData(){
            $id         = $this->input->post('id');
            $nama       = $this->input->post('nama');
            $status     = $this->input->post('status');
        
          $data = array(
            'kode_kriteria'      => $id,
            'nama_kriteria'      => $nama,
            'status'             => $status
          );
    
              $result = $this->modelkriteria->InsertData($data);
    
              $data = null;
              if($result){
                  Redirect('ctrlkriteria');
              }else{
                  Redirect('ctrlkriteria');
              }
          }
}

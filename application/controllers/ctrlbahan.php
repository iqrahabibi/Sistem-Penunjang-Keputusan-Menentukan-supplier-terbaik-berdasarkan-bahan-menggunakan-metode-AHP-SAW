<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlbahan extends CI_Controller {

	public function __construct() {
        parent::__construct();
            $this->load->model('modelbahan');
            $this->load->model('modelsupplier');
			      $this->load->model('modeluser');
  	}
	 
	public function index(){
		if($this->session->nama==NULL){
			redirect('ctrllogin');
		}
    $allbahan			      = $this->modelbahan->getallbahan();
    $autonumber         = $this->modelbahan->kodebahan();
		$nama 				      = $this->session->nama;
    $admin 				      = $this->modeluser->ambiladmin($nama);
    $alluser            = $this->modeluser->getalluser();
    $data['datauser']   = $alluser;
    $data['admin'] 		  = $admin;
    $data['kode']       = $autonumber;
		$data['nama'] 		  = $nama;
		$data['databahan']	= $allbahan;

		$this->load->view('databahan', $data);
    }
    
    public function EditData(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
    
      $data = array(
        'nama_bahan'      => $nama
      );
    
      $result = $this->modelbahan->UpdateBahan($id,$data);
    
      $data = NULL;
      if($result){
        redirect('ctrlbahan');
      }else{
    
        $nama = $this->session->nama;
        $data['nama'] = $nama;
        $data['result'] = "Gagal";
        $this->load->view('databahan',$data);
      }
    }
    
        public function DeleteData($id){
          if($this->modelsupplier->cek($id) == null || $this->modelsupplier->cek($id) == 0){
            $result = $this->modelbahan->DeleteBahan($id);
          }else{
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-danger">
                    <h4>Gagal Hapus</h4>
                    <p>Data Tersebut sudah di pakai</p>
                </div>');
            redirect('ctrlbahan');
          }
            
    
            if($result){
                redirect('ctrlbahan');
            }else{
    
                $nama = $this->session->nama;
                $data['nama'] = $nama;
                $data['result'] = "Gagal";
                $this->load->view('databahan',$data);
            }
        }
    
        public function InsertData(){
            $id     = $this->input->post('id');
            $nama   = $this->input->post('nama');
        
          $data = array(
            'kode_bahan'      => $id,
            'nama_bahan'      => $nama
          );
    
              $result = $this->modelbahan->InsertData($data);
    
              $data = null;
              if($result){
                  Redirect('ctrlbahan');
              }else{
                  Redirect('ctrlbahan');
              }
          }
}

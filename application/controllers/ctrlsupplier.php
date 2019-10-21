<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlsupplier extends CI_Controller {

	public function __construct() {
        parent::__construct();
            $this->load->model('modelsupplier');
            $this->load->model('modelbahan');
			      $this->load->model('modeluser');
  	}
	 
	public function index(){
		if($this->session->nama==NULL){
			redirect('ctrllogin');
        }
        $test                   = $this->input->post('test');
        $autonumber             = $this->modelsupplier->kodesupplier();
        $allsupplier            = $this->modelsupplier->getallsupplier();
        $allbahan			          = $this->modelbahan->getallbahan();
        $joinbahan              = $this->modelsupplier->joinbahan();
        $nama 				          = $this->session->nama;
        $admin 				          = $this->modeluser->ambiladmin($nama);
        $alluser                = $this->modeluser->getalluser();
        $data['datauser']       = $alluser;
        $data['text']           = $test;
        $data['admin'] 		      = $admin;
        $data['kode']           = $autonumber;
        $data['nama'] 		      = $nama;
        $data['databahan']	    = $allbahan;
        $data['datasupplier']   = $allsupplier;
        $data['joinbahan']      = $joinbahan;
        // var_dump($test);
        // exit();

		$this->load->view('datasupplier', $data);
    }
    
    public function EditData(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kode_bahan = $this->input->post('kd_bahan');
    
      $data = array(
        'nama_supplier'      => $nama,
        'kode_bahan'         => $kode_bahan
      );
    
      $result = $this->modelsupplier->UpdateSupplier($id,$data);
      
    
      $data = NULL;
      if($result){
        redirect('ctrlsupplier');
      }else{
    
        $nama = $this->session->nama;
        $data['nama'] = $nama;
        $data['result'] = "Gagal";
        $this->load->view('datasupplier',$data);
      }
    }
    
        public function DeleteData($id){
          if($this->modelsupplier->cekmatriksaw($id) == null || $this->modelsupplier->cekmatriksaw($id) == 0){
            $result = $this->modelsupplier->DeleteSupplier($id);
          }else{
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-danger">
                    <h4>Gagal Hapus</h4>
                    <p>Data Tersebut sudah di pakai</p>
                </div>');
            redirect('ctrlsupplier');
          }
    
            if($result){
                redirect('ctrlsupplier');
            }else{
    
                $nama = $this->session->nama;
                $data['nama'] = $nama;
                $data['result'] = "Gagal";
                $this->load->view('datasupplier',$data);
            }
        }
    
        public function InsertData(){
            $id = $this->input->post('id');
            $nama       = $this->input->post('nama');
            $kode_bahan = $this->input->post('kd_bahan');
            $alamat     = $this->input->post('alamat');
            $nohp       = $this->input->post('nohp');
        
          $data = array(
            'kode_supplier' => $id,
            'nama_supplier' => $nama,
            'kode_bahan'    => $kode_bahan,
            'alamat'        => $alamat,
            'no_hp'         => $nohp
          );
         
              $result = $this->modelsupplier->InsertData($data);
    
              $data = null;
              if($result){
                  Redirect('ctrlsupplier');
              }else{
                  Redirect('ctrlsupplier');
              }
          }
}

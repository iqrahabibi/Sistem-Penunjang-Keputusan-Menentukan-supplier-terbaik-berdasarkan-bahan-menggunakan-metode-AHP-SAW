<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlahp extends CI_Controller {

	public function __construct() {
        parent::__construct();
            $this->load->model('modelkriteria');
            $this->load->model('modelperbandingan');
			      $this->load->model('modeluser');
  	}
	 
	public function index(){
		if($this->session->nama==NULL){
			redirect('ctrllogin');
		}
        $allkriteria	  	      = $this->modelkriteria->getallkriteria();
        $allperbandingan        = $this->modelperbandingan->getperbandingan();
        $nama 				          = $this->session->nama;
        $admin 				          = $this->modeluser->ambiladmin($nama);
        $alluser            = $this->modeluser->getalluser();
    $data['datauser']   = $alluser;
        $data['admin'] 		      = $admin;
        $data['perbandingan']   = $allperbandingan;
        $data['nama'] 		      = $nama;
        $data['kriteria']	      = $allkriteria;

		$this->load->view('hitungahp', $data);
    }
    
        public function InsertData(){
            $kriteria1       = $this->input->post('kriteria1');
            $kriteria2       = $this->input->post('kriteria2');
            
                      $data = array();        
                      $index = 0; // Set index array awal dengan 0    
                      foreach($kriteria1 as $datakriteria1){ // Kita buat perulangan berdasarkan nis sampai data terakhir      
                        array_push($data, array(        
                            'kode_kriteria1'=>$datakriteria1,        
                            'kode_kriteria2'=>$kriteria2[$index], 
                            'nilai_banding'=>$this->input->post('Intense'.$index),   
                        ));           
                        $index++;    
                    }
          
              if(count($this->modelperbandingan->getperbandingan()) <=0 ){
                $result = $this->modelperbandingan->InsertData($data);
              }else{
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-danger">
                    <h4>Gagal Simpan</h4>
                    <p>Nilai Sudah Di input</p>
                </div>');
              }
              
    
              $data = null;
              if($result){
                  Redirect('ctrlahp');
              }else{
                  Redirect('ctrlahp');
              }
          }

          public function insertbobot(){
              $id = $this->input->post('id');
              $bobot    = $this->input->post('bobot');

              $data = array();
              $index=0;
              foreach($id as $kodekriteria){
                array_push($data, array(
                    'kode_kriteria'=>$kodekriteria,
                    'bobot'=>$bobot[$index],
                ));
                $index++;
              }

              if($this->input->post('hasilakhir') < 0.1){
                $result = $this->modelkriteria->UpdateKriteriaBobot($data);
              }else{
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-danger">
                    <h4>Gagal Simpan Bobot</h4>
                    <p>Tidak Konsisten</p>
                </div>');
                redirect('ctrlahp');
              }
                
              
              $data = null;
              if($result){
                redirect('ctrlahp');
              }else{
                $nama = $this->session->nama;
                $data['nama'] = $nama;
                $data['result'] = "Gagal";
                $this->load->view('hitungahp',$data);
              }
          }

          public function reset(){
            $id = $this->modelperbandingan->ambilperbandingan();
            foreach($id as $cek){
              $result = $this->modelperbandingan->resetmodel($cek->id);
            }  
         
              
      
              if($result){
                  redirect('ctrlahp');
              }else{
      
                  $nama = $this->session->nama;
                  $data['nama'] = $nama;
                  $data['result'] = "Gagal";
                  $this->load->view('hitungahp',$data);
              }
          }
}

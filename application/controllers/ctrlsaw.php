<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlsaw extends CI_Controller {

	public function __construct() {
        parent::__construct();
            $this->load->model('modelkriteria');
            $this->load->model('modelbahan');
            $this->load->model('modelsaw');
            $this->load->model('modelperbandingan');
            $this->load->model('modeluser');
            $this->load->model('modelsupplier');
  	}
	 
	public function index(){
		if($this->session->nama==NULL){
			redirect('ctrllogin');
        }
        
        $tanggal                = date('d-m-Y');
        $kode                   = $this->input->post('bahan');
        $allkriteria		    = $this->modelkriteria->getallkriteria();
        $allbahan               = $this->modelbahan->getallbahan();
        $allsupplier            = $this->modelsupplier->join($kode);
        $nilaimax               = $this->modelsaw->nilaimax();
        $notin                  = $this->modelsaw->notin();
        $nilaimin               = $this->modelsaw->nilaimin();
        $allperbandingan        = $this->modelperbandingan->getperbandingan();
        $autonumber             = $this->modelsaw->kodesaw();
        $matrikssaw             = $this->modelsaw->join();
        $kriteriaperid          = $this->modelkriteria->test();
		$nama 				    = $this->session->nama;
        $admin 				    = $this->modeluser->ambiladmin($nama);
        $alluser            = $this->modeluser->getalluser();
        $data['datauser']   = $alluser;
        $data['admin'] 		    = $admin;
        $data['notin']          = $notin;
        $data['bahan']          = $allbahan;
        $data['tanggal']        = $tanggal;
        $data['kode']           = $autonumber;
        $data['nilaimax']       = $nilaimax;
        $data['nilaimin']       = $nilaimin;
        $data['saw']            = $matrikssaw;
        $data['supplier']       = $allsupplier;
        $data['perbandingan']   = $allperbandingan;
        $data['test']           = $kriteriaperid;
		$data['nama'] 		    = $nama;
		$data['kriteria']	    = $allkriteria;

		$this->load->view('hitungsaw', $data);
    }
    
        public function InsertData(){
            $nama            = $this->input->post('nama');
            $kodesaw         = $this->input->post('kode');
            $kriteria1       = $this->input->post('kriteria1');
            $kriteria2       = $this->input->post('kriteria2');
            $kriteria3       = $this->input->post('kriteria3');
            $kriteria4       = $this->input->post('kriteria4');
            
                      $data = array();        
                      $index = 0; // Set index array awal dengan 0    
                      foreach($nama as $namasupp){ // Kita buat perulangan berdasarkan nis sampai data terakhir      
                        array_push($data, array(   
                            'kode_saw'      =>$kodesaw,     
                            'kode_supplier' =>$namasupp,        
                            'kriteria1'     =>$kriteria1[$index],
                            'kriteria2'     =>$kriteria2[$index],
                            'kriteria3'     =>$kriteria3[$index],
                            'kriteria4'     =>$kriteria4[$index],
                        ));           
                        $index++;    
                    }
          
            //if(count($this->modelsaw->join()) < 0)
           // {
                $result = $this->modelsaw->InsertData($data);
            //}else{
                // $this->session->set_flashdata('msg', 
                // '<div class="alert alert-danger">
                //     <h4>Gagal Simpan</h4>
                //     <p>Nilai Sudah Di input</p>
                // </div>');
            // }
            
    
              $data = null;
              if($result){
                  Redirect('ctrlsaw');
              }else{
                  Redirect('ctrlsaw');
              }
          }

        public function insertnilaisaw(){
            $kodesaw = $this->input->post('kodesaw');
            $kodesupp   = $this->input->post('kode');
            $nilaisaw   = $this->input->post('nilai');
            $tgl        = date('Y-m-d');

            $data = array();        
                      $index = 0; // Set index array awal dengan 0    
                      foreach($kodesupp as $datakodesupp){ // Kita buat perulangan berdasarkan nis sampai data terakhir      
                        array_push($data, array(        
                            'kode_saw'=>$kodesaw,        
                            'kode_supplier'=>$datakodesupp, 
                            'nilai_saw'=>$nilaisaw[$index],   
                        ));           
                        $index++;    
                    }
                    $data2 = array(
                        'kode_saw'      => $kodesaw,
                        'tgl_penilaian' => $tgl
                      );

                    $result  = $this->modelsaw->Insertnilai($data);
                    $result2 = $this->modelsaw->Insertsaw($data2);
                    $result3 = $this->modelsaw->deleteSaw($kodesupp);
                    $data = null;
              if($result && $result2 && $result3){
                  Redirect('ctrlsaw');
              }else{
                  Redirect('ctrlsaw');
              }
        }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlsuratkeputusan extends CI_Controller {

	public function __construct() {
		parent::__construct();
            $this->load->model('modeluser');
            $this->load->model('modelsuratkeputusan');
            $this->load->model('modelsaw');
  	}
	 
	public function index(){
		if($this->session->nama==NULL){
			redirect('ctrllogin');
		}
        $alluser			      = $this->modeluser->getalluser();
        $sk                 = $this->modelsuratkeputusan->getallsuratkeputusan();
        // $cobain             = $this->modelsuratkeputusan->cobain();
        $asik               = $this->modelsuratkeputusan->test1();
        $join               = $this->modelsuratkeputusan->joinsk();
        $saw                = $this->modelsaw->getsaw();
        $autonumber         = $this->modelsuratkeputusan->kodesk();
		    $nama 				      = $this->session->nama;
        $admin 				      = $this->modeluser->ambiladmin($nama);
        $alluser            = $this->modeluser->getalluser();
        $data['asik']       = $asik;
        $data['datauser']   = $alluser;
        $data['join']       = $join;
        $data['admin'] 		  = $admin;
        $data['saw']        = $saw;
        $data['kode']       = $autonumber;
        $data['sk']         = $sk;
        $data['nama'] 		  = $nama;
        $data['datauser']	  = $alluser;

		$this->load->view('inputsuratkeputusan', $data);
    }

    public function listhasil(){
        // Ambil data ID Provinsi yang dikirim via ajax post
        $kode_saw = $this->input->post('kode_saw');
        
        $hasilsaw = $this->modelsaw->viewByhasil($kode_saw);
        
        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>Pilih</option>";
        $i=1;
        foreach($hasilsaw as $data){
          $lists .= "<option value='".$data->nilai_saw."'>".$data->nama_supplier." - ".$data->nilai_saw."</option>"; // Tambahkan tag option ke variabel $lists
          $i++;
        }
        
        $callback = array('list_nilai'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
      }

    function get_subkategori(){
        $id=$this->input->post('nilai');
        $data=$this->modelsaw->getnilai($id);
        echo json_encode($data);
    }
    
    public function EditData(){
      $id       = $this->input->post('id');
      $nilai   = $this->input->post('nilai');
      $hasil   = $this->input->post('hasil');
      $keterangan     = $this->input->post('keterangan');
      $tgl            = date('Y-m-d');
    $data = array(
      'kd_sk'         => $id,
      'hasil'         => $hasil,
      'tanggal_sk'    => $tgl,
      'keterangan'    => $keterangan,
      'kd_saw'        => $nilai
    );
    
      $result = $this->modelsuratkeputusan->UpdateSK($id,$data);
    
      $data = NULL;
      if($result){
        redirect('ctrlsuratkeputusan');
      }else{
    
        $nama = $this->session->nama;
        $data['nama'] = $nama;
        $data['result'] = "Gagal";
        $this->load->view('inputsuratkeputusan',$data);
      }
    }
    
        public function DeleteData($id){
            $result = $this->modelsuratkeputusan->Deletesk($id);
    
            if($result){
                redirect('ctrlsuratkeputusan');
            }else{
    
                $nama = $this->session->nama;
                $data['nama'] = $nama;
                $data['result'] = "Gagal";
                $this->load->view('inputsuratkeputusan',$data);
            }
        }
    
        public function InsertData(){
            $id       = $this->input->post('id');
            $nilai   = $this->input->post('nilai');
            $hasil   = $this->input->post('hasil');
            $keterangan     = $this->input->post('keterangan');
            $tgl            = date('Y-m-d');
          $data = array(
            'kd_sk'         => $id,
            'hasil'         => $hasil,
            'tanggal_sk'    => $tgl,
            'keterangan'    => $keterangan,
            'kd_saw'        => $nilai
          );
    
              $result = $this->modelsuratkeputusan->InsertData($data);
    
              $data = null;
              if($result){
                  Redirect('ctrlsuratkeputusan');
              }else{
                  Redirect('ctrlsuratkeputusan');
              }
          }
}
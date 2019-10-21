<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrluser extends CI_Controller {

	public function __construct() {
		parent::__construct();
			$this->load->model('modeluser');
  	}
	 
	public function index(){
		if($this->session->nama==NULL){
			redirect('ctrllogin');
		}
		$alluser			= $this->modeluser->getalluser();
		$nama 				= $this->session->nama;
		$admin 				= $this->modeluser->ambiladmin($nama);
		$data['admin'] 		= $admin;
		$data['nama'] 		= $nama;
		$data['datauser']	= $alluser;

		$this->load->view('datauser', $data);
    }
    
    public function EditData(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
    
      $data = array(
        'nama'      => $nama,
        'username'  => $username
      );
    
      $result = $this->modeluser->UpdateUser($id,$data);
    
      $data = NULL;
      if($result){
        redirect('ctrluser');
      }else{
    
        $nama = $this->session->nama;
        $data['nama'] = $nama;
        $data['result'] = "Gagal";
        $this->load->view('datauser',$data);
      }
    }

    public function Editprofile(){
      $this->load->helper(array('form', 'url'));
				$nama_file = md5(uniqid(rand(), true));
				$this->load->library('upload');
				$config = [
					'upload_path'   => './assets/img/',
					'allowed_types' => 'gif|jpg|png|jpeg|bmp',
					'file_name'     => $nama_file
				];
                $this->upload->initialize($config);
                    if(!$this->upload->do_upload('gambar')){
                        $gambar =   "";
                    }else{
                        $gambar =   $this->upload->file_name;
                    }
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
  
    $data = array(
      'password'  => $password,
      'nama'      => $nama,
      'username'  => $username,
      'gambar'    => $gambar
    );
  
    $result = $this->modeluser->UpdateUser($id,$data);
  
    $data = NULL;
    if($result){
      redirect('ctrlutama');
    }else{
  
      $nama = $this->session->nama;
      $data['nama'] = $nama;
      $data['result'] = "Gagal";
      $this->load->view('index utama',$data);
    }
  }
    
        public function DeleteData($id){
            $result = $this->modeluser->DeleteUser($id);
    
            if($result){
                redirect('ctrluser');
            }else{
    
                $nama = $this->session->nama;
                $data['nama'] = $nama;
                $data['result'] = "Gagal";
                $this->load->view('datauser',$data);
            }
        }
    
        public function InsertData(){
            $this->load->helper(array('form', 'url'));
				$nama_file = md5(uniqid(rand(), true));
				$this->load->library('upload');
				$config = [
					'upload_path'   => './assets/img/',
					'allowed_types' => 'gif|jpg|png|jpeg|bmp',
					'file_name'     => $nama_file
				];
                $this->upload->initialize($config);
                    if(!$this->upload->do_upload('gambar')){
                        $gambar =   "";
                    }else{
                        $gambar =   $this->upload->file_name;
                    }
            $nama       = $this->input->post('nama');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $status     = $this->input->post('status');
        
          $data = array(
            'nama'      => $nama,
            'username'  => $username,
            'password'  => $password,
            'gambar'    => $gambar,
            'status'    => $status
          );
    
              $result = $this->modeluser->InsertData($data);
    
              $data = null;
              if($result){
                  Redirect('ctrluser');
              }else{
                  Redirect('ctrluser');
              }
          }
}

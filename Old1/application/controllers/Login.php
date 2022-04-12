<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct($config="rest") {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		parent::__construct();
		//$this->load->model('Mdl_user');
		//$this->load->library('session');
	}
	
	public function userLogin(){
		if(empty($_POST['UName']) || empty($_POST['PWord'])){
			echo $this->sendJson(array("message"=>"Invalid Data"));
		}else{
			$fromModel=$this->Mdl_user->login($_POST['UName'],$_POST['PWord']);
			if($fromModel["result"]){
				$this->session->set_userdata('mcquser',$_POST['UName']);
			}
			$this->sendJson(array('message' => $fromModel["message"], 'result' => $fromModel["result"]));
		}
	}

	private function sendJson($data) {
		$this->output->set_header('Content-Type: application/json; charset=utf-8')->set_output(json_encode($data));
	}

	public function home(){
		if($this->Mdl_user->sessionCheck()){
			// $session_data = $this->session->userdata('mcquser');
    		// $data['username'] = $session_data['username'];
			// $this->load->view('vwUserMenu',$data);
			$this->load->view('header');
			$this->load->view('vwhome');
			$this->load->view('footer');
		}else{
			redirect('login');
		}
	}
	public function index(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
}

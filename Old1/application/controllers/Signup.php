<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	public function __construct($config="rest") {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		parent::__construct();
		$this->load->model('Mdl_user');
	}
	
	public function index(){
		$this->load->view('header');
		$this->load->view('signup');
		$this->load->view('footer');
	}
	
	public function userSignup(){
		if(empty($_POST['UName']) || empty($_POST['PWord']) || empty($_POST['email'])){
			echo $this->sendJson(array("message"=>"Invalid Data"));
		}else{
			$this->sendJson($this->Mdl_user->signup($_POST['UName'],$_POST['email'],$_POST['PWord']));
		}
	}
	

	private function sendJson($data) {
		$this->output->set_header('Content-Type: application/json; charset=utf-8')->set_output(json_encode($data));
	}


}

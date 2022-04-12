<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {

	public function __construct($config="rest") {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		parent::__construct();
		$this->load->model('Mdl_authenticate');
		$this->load->library('form_validation');
		$this->load->helper('form');
		if( $this->Mdl_authenticate->sessionCheck()){
			redirect("home");
		}
	}
	

	public function signin(){
		//$this->form_validation->set_rules("emailName","Email ID","required|valid_email");
		//$this->form_validation->set_rules("passwordName","Password","required|min_length[8]");
		// if($this->form_validation->run()== FALSE ){
		// 	echo $this->sendJson(array("message"=>strip_tags(validation_errors()),"result"=>"false"));
		// }else{
			if(empty(trim($_POST['em']))||empty(trim($_POST['pw']))){
				echo $this->sendJson(array("message"=>"Empty email & Password","result"=>false));
			}else{
				$flag=$this->Mdl_authenticate->signin($_POST['em'],$_POST['pw']);
				// $flag=$this->Mdl_authenticate->signin();
				if($flag){
					echo $this->sendJson(array("message"=>"Signin Success","result"=>true));
					$this->session->set_userdata('mcquser',$this->input->post('em'));
				}else{
					echo $this->sendJson(array("message"=>"Invalid Email or Password","result"=>false));
				}
			}
			
		// }
	}

	public function signup(){
			// $this->form_validation->set_rules("fullname","Full Name","required|alpha");
			// $this->form_validation->set_rules("email","Email ID","required|valid_email");
			// $this->form_validation->set_rules("password","Password","required|min_length[8]");
			// if($this->form_validation->run()== FALSE ){
				echo $this->sendJson(array("message"=>"ERROR","result"=>"false"));
			// }else{
				$flag=$this->Mdl_authenticate->signup();
				echo $this->sendJson(array('message'=>$flag["message"],"result"=>$flag["result"]));
				
			// }
	}
	public function signUpPage(){
		$this->load->view("authenticate/vw_signup");
	}

	
	function sendJson($data) {
	  $this->output->set_header('Content-Type: application/json; charset=utf-8')->set_output(json_encode($data));
	  //sample : echo $this->sendJson(array('message'=>'Login Success'));
	}

	public function index(){
		$this->load->view('authenticate/vw_signin');
	}
}

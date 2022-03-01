<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	public function userSignup(){
		$data["fullname"]= $_POST["spfullname"];
		$data["email"]= $_POST["spemail"];
		$data["password"]= $_POST["sppassword"];
		$data["dob"]= $_POST["spdob"];
		$this->load->model("Login_model");
		$this->Login_model->insert($data);
		echo $this->sendJson(array("message"=>"Registration Success"));
	}
	public function userLogin(){
		if(empty($_POST['UName']) || empty($_POST['PWord'])){
			echo $this->sendJson(array("message"=>"Invalid Data"));
		}else{
			if($_POST['UName']=="admin@mail.com" && $_POST['PWord']=="123"){
				echo $this->sendJson(array("message"=>"Welcome"));
			}else{
				echo $this->sendJson(array("message"=>"Invalid"));
			}
		}
	}
	private function sendJson($data) {
		$this->output->set_header('Content-Type: application/json; charset=utf-8')->set_output(json_encode($data));
	}
	public function home(){
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
}

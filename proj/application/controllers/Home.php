<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
   public function __construct($config="rest") {
       header("Access-Control-Allow-Origin: *");
       header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
       header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
       parent::__construct();
       $this->load->model('Mdl_authenticate');
       $this->load->model('Mdl_user');
       if(! $this->Mdl_authenticate->sessionCheck()){
           redirect("authenticate");
       }
   }
	public function index()
	{
        $session_data = $this->session->get_userdata();
        $data['userDataFromModel']=$this->Mdl_user->getUserDetailsFromModelByEmail($session_data['mcquser']);
		$this->load->view('vw_header');
		$this->load->view('vw_navbar',$data);
		$this->load->view('vw_home');
		$this->load->view('vw_footer');
	}

    public function logout(){
		$this->session->unset_userdata('mcquser');
		redirect("authenticate");
	}
}

<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mdl_user extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

    public function signup($username,$email,$password) {
        $encodedPassword=md5($password);
        if($this->db->query("SELECT * FROM users WHERE stdemail = '$email'")->num_rows()>0){
            return array('message' => 'This email in already use', 'result' => false);
        }else{
            if($this->db->query("INSERT INTO users (stdusername,stdemail,stdpassword) VALUES ('$username', '$email', '$encodedPassword')")){
                return array('message' => 'You are successfully signed up', 'result' => true);
            }else{
                return array('message' => 'Database error please try again later', 'result' => false);
            }
        }
    }

    public function login($UName,$PWord){
        $PWord=md5($PWord);
        if($this->db->query("SELECT * FROM users WHERE stdemail = '$UName' AND stdpassword = '$PWord'")->num_rows()>0){
            return array('message' => 'Login Success', 'result' => true);
        }
        else{
            return array('message' => 'Invalid Username/ Password', 'result' => false);
        }
    }

    public function sessionCheck(){
        $session_data = $this->session->get_userdata();
        if (is_null($session_data)) {
          return false;
        }
        else if (empty($session_data['mcquser'])) {
          return false;
        }
        else if ($session_data['mcquser']=="") {
          return false;
        }
        else{
          $ses=$session_data['mcquser'];
          return true;
        }
    }
}
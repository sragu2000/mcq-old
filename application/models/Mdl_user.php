<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mdl_user extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

    public function signup($username,$email,$password) {
        if($this->db->query("SELECT * FROM users WHERE stdemail = '$email'")->num_rows()>0){
            return array('message' => 'This email in already use', 'result' => false);
        }else{
            if($this->db->query("INSERT INTO users (stdusername,stdemail,stdpassword) VALUES ('$username', '$email', '$password')")){
                return array('message' => 'You are successfully signed up', 'result' => true);
            }else{
                return array('message' => 'Database error please try again later', 'result' => false);
            }
        }
    }
}
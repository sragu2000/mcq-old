<?php
class Mdl_user extends CI_Model {
   public function getUserDetailsFromModelByEmail($emailAsSessionValue){
    return $this->db->query("SELECT * FROM users WHERE stdemail = '$emailAsSessionValue'")->first_row();
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
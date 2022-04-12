<?php
class Mdl_authenticate extends CI_Model {
    public function signin($emFromController,$pwFromController){
      $pwFromController=md5($pwFromController);
      // $arr['email']=$this->input->post('em');
      // $arr['password']=md5($this->input->post('pw'));
      //if($this->db->get_where("users",$arr)->num_rows()>0){
      if($this->db->query("SELECT * FROM users WHERE stdemail='$emFromController' and stdpassword='$pwFromController'")->num_rows()==1){
        return true;
      }else{
        return false;
      }
    }

    public function signup(){
        $arr['stdemail']=$this->input->post('email');
        $email=$this->input->post('email');
        $arr['fullname']=$this->input->post('fullname');
        $arr['stdpassword']=md5($this->input->post('password'));
        if($this->db->query("SELECT * FROM users WHERE stdemail='$email'")->num_rows()>0){
          return array("message"=>"E-Mail already in use", "result"=>false);
        }else{
          if($this->db->insert('users',$arr)){
          return array("message"=>"Signup Success", "result"=>true);
          }else{
          return array("message"=>"Unknown Error, Try again later", "result"=>false);
          }
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
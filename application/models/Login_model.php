<?php 

class Login_model extends CI_model{
    function insert($data){
        $status=$this->db->insert("user",$data);
        return $status;
    }
}
?>
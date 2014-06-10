<?php

class User_model extends Model{
        function __construct(){
            parent::__construct();
        }
        
        function signIn($fields,$where=''){
            return $this->db->select($fields,'persona',$where);
        }
}

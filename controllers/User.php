<?php

    class User extends Controller{
        
        function __construct() {
            parent::__construct();
        }
        public function signIn(){
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $response = $this->model->signIn('*',"per_dni = '".$_POST["username"]."'");
                $response = $response[0];
                
                if($response["per_clave"] == $_POST["password"]){
                    $this ->createSession($response["per_dni"],$response["per_id"]);
                    echo 1;
                }
            }
        }
        
        function createSession($per_dni,$per_id){
            Session::setValue('U_NAME', $per_dni);
            Session::setValue('ID', $per_id);
        }
        
        function destroySession(){
            Session::destroy();
            header('location:'.URL);
        }
        
    }
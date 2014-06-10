<?php

    Class Session{
        //funcion para aperturar session
        static function init(){
            @session_start();              
        }
        
        //funcion para destruir o cerrar session
        static function destroy(){
            session_destroy();
        }
        
        //obtenemos el valor de la sesion
        static function getValue($var){
            return $_SESSION[$var];
        }
        
        //envia el valor para iniciar una sesion
        static function setValue($var, $val){
            $_SESSION[$var]=$val;
        }
        
        static function unsetValue($var){
            if(isset($_SESSION[$var]))
                unset ($_SESSION[$var]);
        }
        
        static function exist(){
            if(sizeof($_SESSION)> 0){
                return true;
            }else{
                return false;
            }
        }
        
    }

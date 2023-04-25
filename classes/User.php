<?php

class User{
    
    
    
    public static function isGuset(){
        if(isset($_SESSION['login'])){
            return false;
        }else{
            return true;
        }
    }
}

?>
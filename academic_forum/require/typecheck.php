<?php

define('TYPE_USER',2);

    function typecheck($id, $usertype){
        
        if ($usertype == TYPE_USER){

            $_SESSION['academic']['user']['user_id']=$id;
            $_SESSION['academic']['user']['usertype']=TYPE_USER;
            header("location:academic_forum.php");
        } else{
            echo "invalid username or password";
         }
    }

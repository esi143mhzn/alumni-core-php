<?php

    define('TYPE_ADMIN',1);

    function typecheck($id, $usertype){
        

        if($usertype==TYPE_ADMIN){
            $_SESSION['academic']['admin']['user_id']=$id;
            $_SESSION['academic']['admin']['usertype']=TYPE_ADMIN;
            header("location:user.php");


        }else{
             echo "invalid username or password";
        }
    }
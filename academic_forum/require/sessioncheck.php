<?php
	session_start();
	date_default_timezone_set('UTC');
	define('IS_LIBRARY',false);
	if($_SESSION['academic']['user']['user_id']){

    }else{
        header("Location: index.php");
        die;
    }
	
?>
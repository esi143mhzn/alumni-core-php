<?php

	session_start();

	unset($_SESSION['academic']['admin']['user_id']);

	header("location: index.php");


?>
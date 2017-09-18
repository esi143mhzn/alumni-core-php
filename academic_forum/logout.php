<?php
//session_start();
unset($_SESSION['academic']['user']['user_id']);
header("location: index.php");
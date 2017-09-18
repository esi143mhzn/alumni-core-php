
<?php

include '../connection.php';
?>
<?php 

 session_start();
 if($_SESSION['user_id']=="")
 {
	header("Location: " . "../index.php"); 
}
 ?>
<?php 
if(isset($_POST['submit'])){
	if(!empty($_POST['delete'])) {
	foreach($_POST['delete'] as $id) {
$query=mysql_query("Delete from tbl_deliveredlist where delivery_id='$id'");
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "deliveredlist.php");
		exit;
    }
	}
	}
	}
?>
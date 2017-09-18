<?php
include '../../connection.php';
?><?php 

 session_start();
 if($_SESSION['admin_id']=="")
 {
	header("Location: " . "../../index.php"); 
}
 ?>
 <?php
include '../Admin/connection.php';
$id=$_REQUEST['id'];
$query1=mysql_query("select * from tbl_banner where banner_id='$id'");
$datas=mysql_fetch_array($query1);
$logo=$datas['banner_image'];
unlink($_SERVER['DOCUMENT_ROOT'] . "/public_html/Panel/Admin/Uploads/Banner/$logo");
$query=mysql_query("Delete from tbl_banner where banner_id='$id'");
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Lists/list_banner.php");
		exit;
    }
?>
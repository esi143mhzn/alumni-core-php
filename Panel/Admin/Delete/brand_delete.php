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
$query1=mysql_query("select * from tbl_brand where brand_id='$id'");
$datas=mysql_fetch_array($query1);
$logo=$datas['brand_logo'];
unlink($_SERVER['DOCUMENT_ROOT'] . "/public_html/Panel/Admin/Uploads/Brand/$logo");
$query=mysql_query("Delete from tbl_brand where brand_id='$id'");
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Lists/list_brand.php");
		exit;
    }
?>
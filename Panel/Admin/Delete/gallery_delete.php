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
$query1=mysql_query("select * from tbl_fashiongallery where gallery_id='$id'");
$datas=mysql_fetch_array($query1);
$folder_name=$datas['folder_name'];
$logo=$datas['image_name'];
unlink($_SERVER['DOCUMENT_ROOT'] . "/public_html/Panel/Admin/Uploads/Gallery/".$folder_name."/$logo");
$query=mysql_query("Delete from tbl_fashiongallery where gallery_id='$id'");
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Lists/list_uploadgallery.php");
		exit;
    }
?>
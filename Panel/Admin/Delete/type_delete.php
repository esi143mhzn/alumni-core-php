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
$query1=mysql_query("select * from tbl_producttype JOIN tbl_productgender ON tbl_producttype.gender_id=tbl_productgender.gender_id where tbl_producttype.type_id='$id'");
$datas=mysql_fetch_array($query1);
$folder=$datas['folder_name'];
$folder_name=$datas['genderfolder_name'];
$dir1 = $_SERVER['DOCUMENT_ROOT'] . "/public_html/Panel/Admin/Uploads/Product/".$folder_name."/".$folder."/Original/";
foreach (glob($dir1."/*.*") as $filename1) {
    if (is_file($filename1)) {
        unlink($filename1);
    }
}
rmdir($dir1);
$dir2 = $_SERVER['DOCUMENT_ROOT'] . "/G-shop/Panel/Admin/Uploads/Product/".$folder_name."/".$folder."/Small/";
foreach (glob($dir2."/*.*") as $filename2) {
    if (is_file($filename2)) {
        unlink($filename2);
    }
}
rmdir($dir2);
$dir3= $_SERVER['DOCUMENT_ROOT'] . "/G-shop/Panel/Admin/Uploads/Product/".$folder_name."/".$folder."/Thumbnail/";
foreach (glob($dir3."/*.*") as $filename3) {
    if (is_file($filename3)) {
        unlink($filename3);
    }
}
rmdir($dir3);
$dir = $_SERVER['DOCUMENT_ROOT'] . "/G-shop/Panel/Admin/Uploads/Product/".$folder_name."/".$folder."/";
rmdir($dir);
$query=mysql_query("Delete from tbl_producttype where type_id='$id'");
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Lists/list_product_type.php");
		exit;
    }
?>
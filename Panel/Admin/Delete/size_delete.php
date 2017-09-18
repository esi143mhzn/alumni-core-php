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
$query=mysql_query("SELECT * FROM tbl_products JOIN tbl_dresscode JOIN tbl_productimage	JOIN tbl_producttype JOIN tbl_productgender ON tbl_dresscode.dresscode_id=tbl_products.dresscode_id AND tbl_dresscode.dresscode_id=tbl_productimage.dresscode_id AND tbl_products.type_id=tbl_producttype AND tbl_products.gender_id=tbl_productgender.gender_id WHERE tbl_products.size_id='$id'");
$datas=mysql_fetch_array($query);
	$folder_name=$datas['folder_name'];
	$folder=$datas['genderfolder_name'];
	$original=$datas['original_name'];
	$small=$datas['small_name'];
	$thumbnail=$datas['thumbnail_name'];
	unlink($_SERVER['DOCUMENT_ROOT'] . "/public_html/Panel/Admin/Uploads/Product/".$folder."/".$folder_name."/original/$original");
	unlink($_SERVER['DOCUMENT_ROOT'] . "/public_html/Panel/Admin/Uploads/Product/".$folder."/".$folder_name."/Small/$small");
	unlink($_SERVER['DOCUMENT_ROOT'] . "/public_html/Panel/Admin/Uploads/Product/".$folder."/".$folder_name."/Thumbnail/$thumbnail");
$query2=mysql_query("DELETE FROM tbl_products, tbl_productimage USING tbl_products INNER JOIN tbl_productimage ON tbl_productimage.dresscode_id=tbl_products.dresscode_id WHERE tbl_products.size_id='$id'");
$query1=mysql_query("Delete from tbl_productsize where size_id='$id'");
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Lists/list_product_size.php");
		exit;
    }
?>
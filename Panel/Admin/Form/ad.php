<?php 

 session_start();
 if($_SESSION['admin_id']=="")
 {
	header("Location: " . "../../index.php"); 
}
 ?><?php
include ("../../connection.php");
?>
<?php

if(isset($_POST['submit']) && $_POST['submit'] == "Submit"){
		$ad_name=$_POST['ad_name'];
		$ad_link=$_POST['ad_link'];
		$ad_detail=$_POST['ad_detail'];	
		date_default_timezone_set("Asia/Kathmandu");
		$date= date("Y-m-d h:i:sa");
	if(isset($_FILES['upload'])){
		$uploadname=$_FILES['upload']['name'];
		$uploadname=mt_rand(100000,999999). $uploadname;
		$uploadtemp=$_FILES['upload']['tmp_name'];
		$uploadtype=$_FILES['upload']['type'];
		$filesize=$_FILES['upload']['size'];
	
		$uploadname= preg_replace("#[^a-z0-9.]#i","",$uploadname);
	
		//file size upto 11 mb only//
		if(($filesize > 11000000)){
			die("ERROR:FILE to big");
		}
		if(!$uploadtemp){
			die("no file selected");
		}else{
				move_uploaded_file($uploadtemp,"../Uploads/Ads/$uploadname");
		}
}
	
$query="INSERT INTO tbl_ads(ad_name,ad_image,ad_detail,ad_link,date) VALUES('$ad_name','$uploadname','$ad_detail','$ad_link','$date')";
$result=mysql_query($query);
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "#");
		exit;
    }


}

?>

<style>
textarea {
    min-width:200px;
	max-width:420px;
    min-height:100px;
	max-height:150px;
}
</style>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
<?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Advertisement</h3>
	</div>
	<div class="panel-body">		
 		<form role="form" method="post" action="#" enctype="multipart/form-data">
			<div class="form-group">
							<input class="form-control" type="text" name="ad_name" placeholder="Ad Name"  required/>
							</div>	
							<div class="form-group">
								<input class="form-control" type="file" name="upload" value="Upload" required/>
							</div>						
							<div class="form-group">
							<textarea class="form-control" name="ad_link" placeholder="Ad Link" required></textarea>
							</div>
							<div class="form-group">
							<textarea class="form-control" name="ad_detail" placeholder="Ad Details" required></textarea>
							</div>
							<div class="form-group">
							<input class="btn btn-primary" type="submit" name="submit" value="Submit"/>
							</div>
							</form>
	</div>	
</div>
 <script src="../../js/bootstrap.js"></script>
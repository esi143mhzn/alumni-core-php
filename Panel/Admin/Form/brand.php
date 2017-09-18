<?php 

 session_start();
 if($_SESSION['admin_id']=="")
 {
	header("Location: " . "../../index.php"); 
}
 ?><?php
include '../../connection.php';
?>
 <html>
<head>
<meta http-equiv="type-Type" type="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
	  

    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
</head>
<style>
textarea {
    min-width:200px;
	max-width:200px;
    min-height:50px;
}
</style>
<?php

if(isset($_POST['submit']) && $_POST['submit'] == "Add Brand"){
		$brand_name=$_POST['brand_name'];
		$brand_link=$_POST['brand_link'];
		$brand_detail=$_POST['brand_detail'];
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
				move_uploaded_file($uploadtemp,"../Uploads/Brand/$uploadname");
		}
	}	
	
$query="INSERT INTO tbl_brand(brand_name,brand_logo,brand_link,brand_detail,date) VALUES('$brand_name','$uploadname','$brand_link','$brand_detail','$date')";
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



<body>
<?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Banner</h3>
	</div>
	<div class="panel-body">
	 			 <form role="form" method="post" action="#" enctype="multipart/form-data">
		 			<fieldset>
						<div class="form-group">
							<input class="form-control" type="text" name="brand_name" placeholder="Brand Name"  required/>
							</div>
						<div class="form-group">
							<input class="form-control" type="file" name="upload" value="Upload" required/>
						</div>					
						<div class="form-group">
							<textarea class="form-control" name="brand_link" placeholder="Link" required></textarea>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="brand_detail" placeholder="Details" required></textarea>
						</div>
						<div class="form-group">
							<input class="btn btn-primary" type="submit" name="submit" value="Add Banner"/>
						</div>
				</fieldset>
			</form>
	</div>	
</div>
 <script src="../../js/bootstrap.js"></script>
</body>
</html>

<?php
include '../../connection.php';
?><?php 

 session_start();
 if($_SESSION['admin_id']=="")
 {
	header("Location: " . "../../index.php"); 
}
 ?>
 <html>
<head>
<meta http-equiv="type-Type" type="text/html; charset=iso-8859-1" />
<title>Banner Edit</title>
	  
	
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
	$id=$_REQUEST['id'];
if(isset($_POST['submit']) && $_POST['submit'] == "Edit Banner"){
		$banner_name=$_POST['banner_name'];
		$banner_detail=$_POST['banner_detail'];
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
				move_uploaded_file($uploadtemp,"../Uploads/Banner/$uploadname");
		}
	}	
	
$query="Update tbl_banner set banner_name='$banner_name',banner_image='$uploadname',banner_detail='$uploadname' where banner_id='$id'";
$result=mysql_query($query);
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Lists/list_banner.php");
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
	<?php 
			$query1=mysql_query("Select * from tbl_banner where banner_id='$id'");
			$datas=mysql_fetch_array($query1);
			$logo=$datas['banner_image'];
			unlink($_SERVER['DOCUMENT_ROOT'] . "/public_html/Panel/Admin/Uploads/Banner/$logo");
			?>
	 			 <form role="form" method="post" action="#" enctype="multipart/form-data">
		 			<fieldset>
						<div class="form-group">
							<input class="form-control" type="text" name="banner_name" placeholder="<?=$datas['banner_name'];?>" required/>
						</div>
						<div class="form-group">
							<input class="form-control" type="file" name="upload" value="Upload" required/>
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="4" cols="50" name="banner_detail"placeholder="<?=$datas['banner_detail'];?>"required></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Edit Banner" class="btn btn-primary btn-block"/>
						</div>
				</fieldset>
			</form>
	</div>	
</div>
 <script src="../../js/bootstrap.js"></script>
</body>
</html>

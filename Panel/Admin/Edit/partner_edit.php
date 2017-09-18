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
?>
<?php
$id=$_REQUEST['id'];
$query1=mysql_query("Select * from tbl_partner where partner_id='$id'");
$datas=mysql_fetch_array($query1);
			if(isset($_POST['submit']) && $_POST['submit'] == "Edit Partner"){
		$partner_name=$_POST['partner_name'];
		$partner_link=$_POST['partner_link'];
		$partner_detail=$_POST['partner_detail'];
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
				move_uploaded_file($uploadtemp,"../Uploads/Partner/$uploadname");
		}
}
	
$query="Update tbl_partner set partner_name='$partner_name',partner_logo='$uploadname',partner_link='$partner_link',partner_detail='$partner_detail' where partner_id='$id'"; 
$result=mysql_query($query);
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Lists/list_partner.php");
		exit;
    }


}

?><head>
<title>Partner Edit</title>
</head>
    

<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">

<style>
textarea {
    min-width:200px;
	max-width:420px;
    min-height:100px;
	max-height:150px;
}
</style>
<?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Partner</h3>
	</div>
	<div class="panel-body">		
 		<form role="form" method="post" action="#" enctype="multipart/form-data">
			<div class="form-group">
			<?php 
			$id=$_REQUEST['id'];
			$query1=mysql_query("Select * from tbl_partner where partner_id='$id'");
			$datas=mysql_fetch_array($query1);
			$logo=$datas['brand_logo'];
			unlink($_SERVER['DOCUMENT_ROOT'] . "/public_html/Panel/Admin/Uploads/Brand/$logo");
			?>
							<input class="form-control" type="text" name="partner_name" placeholder="<?=$datas['partner_name'];?>"  required/>
							</div>	
							<div class="form-group">
								<input class="form-control" type="file" name="upload" value="Upload" required/>
							</div>						
							<div class="form-group">
							<textarea class="form-control" name="partner_link" placeholder="<?=$datas['partner_link'];?>" required></textarea>
							</div>
							<div class="form-group">
							<textarea class="form-control" name="partner_detail" placeholder="<?=$datas['partner_detail'];?>" required></textarea>
							</div>
							<div class="form-group">
							<input class="btn btn-primary" type="submit" name="submit" value="Edit Partner"/>
							</div>
							</form>
	</div>	
</div>
 <script src="../../js/bootstrap.js"></script>
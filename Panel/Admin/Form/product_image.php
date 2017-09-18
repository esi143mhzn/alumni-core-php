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
if(isset($_POST['submit']) && $_POST['submit'] == "Add Image"){
	$dresscode_id=$_POST['dresscode_id'];
	$color_id=$_POST['color_id'];
	$query5=mysql_query("select * from tbl_products JOIN tbl_dresscode JOIN tbl_producttype JOIN tbl_productgender ON tbl_products.dresscode_id=tbl_dresscode.dresscode_id AND tbl_products.type_id=tbl_producttype.type_id AND tbl_producttype.gender_id=tbl_productgender.gender_id WHERE tbl_dresscode.dresscode_id='$dresscode_id'");
	$datas5=mysql_fetch_array($query5);
	$folder_name=$datas5['folder_name'];
	$folder=$datas5['genderfolder_name'];
if(isset($_FILES['upload_original'])){
		$original=$_FILES['upload_original']['name'];
		$original=mt_rand(100000,999999). $original;
		$uploadtemp=$_FILES['upload_original']['tmp_name'];
		$uploadtype=$_FILES['upload_original']['type'];
		$filesize=$_FILES['upload_original']['size'];
		$original= preg_replace("#[^a-z0-9.]#i","",$original);
		if(($filesize > 11000000)){
			die("ERROR:FILE to big");
		}
		if(!$uploadtemp){
			die("no file selected");
		}else{
			move_uploaded_file($uploadtemp,"../Uploads/Product/".$folder."/".$folder_name."/Original/$original");
		}
		}
	if(isset($_FILES['upload_small'])){
		$small=$_FILES['upload_small']['name'];
		$small=mt_rand(100000,999999). $small;
		$uploadtemp=$_FILES['upload_small']['tmp_name'];
		$uploadtype=$_FILES['upload_small']['type'];
		$filesize=$_FILES['upload_small']['size'];
		$small= preg_replace("#[^a-z0-9.]#i","",$small);
	
		if(($filesize > 11000000)){
			die("ERROR:FILE to big");
		}
		if(!$uploadtemp){
			die("no file selected");
		}else{
			move_uploaded_file($uploadtemp,"../Uploads/Product/".$folder."/".$folder_name."/Small/$small");
		}
}
	if(isset($_FILES['upload_thumbnail'])){
		$thumbnail=$_FILES['upload_thumbnail']['name'];
		$thumbnail=mt_rand(100000,999999). $thumbnail;
		$uploadtemp=$_FILES['upload_thumbnail']['tmp_name'];
		$uploadtype=$_FILES['upload_thumbnail']['type'];
		$filesize=$_FILES['upload_thumbnail']['size'];
		$thumbnail= preg_replace("#[^a-z0-9.]#i","",$thumbnail);
	
		if(($filesize > 11000000)){
			die("ERROR:FILE to big");
		}
		if(!$uploadtemp){
			die("no file selected");
		}else{
			move_uploaded_file($uploadtemp,"../Uploads/Product/".$folder."/".$folder_name."/Thumbnail/$thumbnail");
		}
		}	
		date_default_timezone_set("Asia/Kathmandu");
		$date= date("Y-m-d h:i:sa");
$sql="INSERT INTO tbl_productimage(original_name,small_name,thumbnail_name,dresscode_id,date,color_id)VALUES('$original','$small','$thumbnail','$dresscode_id','$date','$color_id')";	
$rslt=mysql_query($sql);
if(mysql_error()){
        echo mysql_error();
    }
	else{
		echo
		 header("Location: " . "../Form/dresscode.php");
		exit;
    }
}

?>		



<body>
<?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Product Image</h3>
	</div>
	<div class="panel-body">
	 			 <form role="form" method="post" action="#" enctype="multipart/form-data">
		 			<fieldset>
						<div class="form-group">
				<select class="form-control" name="dresscode_id" required>
					<option disabled="disabled" selected="selected">Select Dress Code</option>
					<?php $query1 = mysql_query("select * from tbl_dresscode");
					while($datas1 = mysql_fetch_array($query1)){
					?>
					<option value="<?=$datas1['dresscode_id'];?>"><?php echo $datas1['dresscode_name'];?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<select class="form-control" name="color_id" required>
					<option disabled="disabled" selected="selected">Select Color</option>
					<?php $query = mysql_query("select * from tbl_productcolor");
					while($datas = mysql_fetch_array($query)){
					?>
					<option value="<?=$datas['color_id'];?>"><?php echo $datas['color_name'];?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
			Original
			</div>
			<div class="form-group">
				<input type="file" name="upload_original" value="Upload" required/>
			</div>
			<div class="form-group">
			Small
			</div>
			<div class="form-group">
				<input type="file" name="upload_small" value="Upload" required/>
			</div>
			<div class="form-group">
			Thumbnail
			</div>
			<div class="form-group">
				<input type="file" name="upload_thumbnail" value="Upload" required/>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Add Image"/>
			</div>
				</fieldset>
			</form>
	</div>	
</div>
 <script src="../../js/bootstrap.js"></script>
</body>
</html>

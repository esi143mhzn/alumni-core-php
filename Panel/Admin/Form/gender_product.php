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

if(isset($_POST['submit']) && $_POST['submit'] == "Add Gender"){
		$gender_name=$_POST['gender_name'];
		$folder_name=$_POST['folder_name'];	
$structure = '../Uploads/Product/'.$folder_name.'';	
if(!is_dir("../Uploads/Product/".$folder_name."/")){
!mkdir($structure, 0777, true);	
}	
$query="INSERT INTO tbl_productgender(gender_name,genderfolder_name) VALUES('$gender_name','$folder_name')";
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
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
<?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Product Gender</h3>
	</div>
	<div class="panel-body">		
		<form role="form" method="post" action="">
			<div class="form-group">
				<input class="form-control" type="text" name="folder_name" placeholder="Folder Name" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="gender_name" placeholder="Gender" required/>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Add Gender" />
			</div>
		</form>
	</div>
</div>
 <script src="../../js/bootstrap.js"></script>

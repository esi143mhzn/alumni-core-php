<?php
include '../../connection.php';
?>
<?php 

 session_start();
 if($_SESSION['admin_id']=="")
 {
	header("Location: " . "../../index.php"); 
}
 ?>
<?php

if(isset($_POST['submit']) && $_POST['submit'] == "Submit"){
		$title=$_POST['title'];
		$heading=$_POST['heading'];
		$content=$_POST['content'];
	
$query="INSERT INTO tbl_contact(title,heading,content) VALUES('$title','$heading','$content')";
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
	<script type="text/javascript" src="../../css/ckeditor.js"> </script>
	
<?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Contact</h3>
	</div>
	<div class="panel-body">		
 		<form role="form" method="post" action="#" enctype="multipart/form-data">
			<div class="form-group">
							<input class="form-control" type="text" name="title" placeholder="Title"  required/>
							</div>	
							<strong> Heading : </strong>
							        <textarea class="ckeditor form-control" name="heading" rows="4" cols="15" /></textarea> <br>
							<strong> Content : </strong>
							        <textarea class="ckeditor form-control" name="content" rows="4" cols="15" /></textarea> <br>
							<div class="form-group">
							<input class="btn btn-primary" type="submit" name="submit" value="Submit"/>
							</div>
							</form>
	</div>	
</div>
 <script src="../../js/bootstrap.js"></script>
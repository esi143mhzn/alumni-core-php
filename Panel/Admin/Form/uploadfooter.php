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
<title>Footer</title>
	 
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
	
	<script type="text/javascript" src="../../js/ckeditor.js"> </script>

</head>	
<?php
if(isset($_POST['submit']) && $_POST['submit'] == "Submit"){
			$footer_title=$_POST['footer_title'];
			$footer_heading=$_POST['footer_heading'];
			$footer_details=$_POST['footer_details'];
				
$query="INSERT INTO tbl_footer(footer_title,footer_heading,footer_details) VALUES('$footer_title','$footer_heading','$footer_details')";
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
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Footer</h3>
	</div>
	<div class="panel-body">		
		<form method="post" action="#">
			<fieldset>
				<div class="form-group">
					<input class="form-control" type="text" name="footer_title" placeholder="Title" required />
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="footer_heading" placeholder="Heading" required />
				</div>
				<strong> Details : </strong>
			    	<textarea class="ckeditor form-control" name="footer_details" rows="4" cols="15" /></textarea><br/>
					
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">									  
			</fieldset>
		</form>
	</div>
	</div>
 <script src="../../js/bootstrap.js"></script>
</body>
</html>

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
	$id=$_REQUEST['id'];

if(isset($_POST['submit']) && $_POST['submit'] == "Edit Color"){
		$color_name=$_POST['color_name'];
	
$query="Update tbl_productcolor set color_name='$color_name' where color_id='$id'";
$result=mysql_query($query);
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Lists/list_color.php");
		exit;
    }
}


?>
	  
	
<head>
<title>Color Edit</title>
</head>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">

<?php include '../upside.php'; ?>

<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Product Color</h3>
	</div>
	<div class="panel-body">		
		<form method="post" action="">
			<div class="form-group">
			<?php 
			$query1=mysql_query("Select * from tbl_productcolor where color_id='$id'");
			$datas=mysql_fetch_array($query1);
			?>
			
				<input class="form-control" type="text" name="color_name" placeholder="<?=$datas['color_name'];?>" required />
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Edit Color" />
    		</div>  
		</form>
	</div>
</div>
 <script src="../../js/bootstrap.js"></script>
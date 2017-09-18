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

if(isset($_POST['submit']) && $_POST['submit'] == "Add Type"){
		$gender_id=$_POST['gender_id'];
$quer=mysql_query("select * from tbl_productgender where gender_id='$gender_id'");
$datasss=mysql_fetch_array($quer);
		$type_name=$_POST['type_name'];
		$folder_name=$_POST['folder_name'];
		$folder=$datasss['genderfolder_name'];
$structure = '../Uploads/Product/'.$folder.'/'.$folder_name.'';	
$structure1 = '../Uploads/Product/'.$folder.'/'.$folder_name.'/Original';	
$structure2 = '../Uploads/Product/'.$folder.'/'.$folder_name.'/Small';	
$structure3 = '../Uploads/Product/'.$folder.'/'.$folder_name.'/Thumbnail';
if(!is_dir("../Uploads/Product/".$folder."/".$folder_name."/")){
!mkdir($structure, 0777, true);	
}	
if(!is_dir("../Uploads/Product/".$folder."/".$folder_name."/Original")){
!mkdir($structure1, 0777, true);
}
if(!is_dir("../Uploads/Product/".$folder."/".$folder_name."/Small")){		
!mkdir($structure2, 0777, true);
}
if(!is_dir("../Uploads/Product/".$folder."/".$folder_name."/Thumbnail")){		
!mkdir($structure3, 0777, true);	
}	
$query="INSERT INTO tbl_producttype(type_name,folder_name,gender_id) VALUES('$type_name','$folder_name','$gender_id')";
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
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Product Type</h3>
	</div>
	<div class="panel-body">		
		<form role="form" method="post" action="">
			<div class="form-group">
				<select class="form-control" name="gender_id" required>
					<option disabled="disabled" selected="selected">Select Gender</option>
							<?php $query = mysql_query("select * from tbl_productgender");
									while($datas = mysql_fetch_array($query)){
									?>
								<option value="<?=$datas['gender_id'];?>"><?php echo $datas['gender_name'];?></option>
									<?php }?>
				</select>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="folder_name" placeholder="Folder Name" required/>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="type_name" placeholder="Product Type" required/>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Add Type" />
			</div>
		</form>
	</div>
</div>
 <script src="../../js/bootstrap.js"></script>

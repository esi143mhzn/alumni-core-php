<?php
include '../../connection.php';
?><?php 

 session_start();
 if($_SESSION['admin_id']=="")
 {
	header("Location: " . "../../index.php"); 
}
 ?>
  
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">

<?php include '../upside.php'; ?>

<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Select Gender</h3>
	</div>
	<div class="panel-body">		
		<form method="post" action="products.php">
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
				<input class="btn btn-primary" type="submit" name="submit" value="Submit" />
    		</div>  
		</form>
	</div>
</div>
 <script src="../../js/bootstrap.js"></script>
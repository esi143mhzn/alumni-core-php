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
$gender_type=$_POST['gender_id'];
if(isset($_POST['submit']) && $_POST['submit'] == "Add Product"){
		$product_name=$_POST['product_name'];
		$product_type=$_POST['type_id'];
		$gender=$_POST['gen'];
		$product_size=$_POST['size_id'];
		$quantity=$_POST['quantity'];
		$product_price=$_POST['product_price'];
		$detail=$_POST['detail'];
		$dresscode_id=$_POST['dresscode_id'];
		date_default_timezone_set("Asia/Kathmandu");
		$date= date("Y-m-d h:i:sa");
	
$query="INSERT INTO tbl_products(product_name,type_id,size_id,quantity,product_price,detail,dresscode_id,date,gender_id) VALUES('$product_name','$product_type','$product_size','$quantity','$product_price','$detail','$dresscode_id','$date','$gender')";
$result=mysql_query($query);
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Form/product_image.php");
		exit;
    }
}



?>
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
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Product</h3>
	</div>
	<div class="panel-body">		
 						<form role="form" method="post" action="#" enctype="multipart-data">
			<div class="form-group">
			<input type="text" name="gen"  class="form-control" value="<?= $gender_type?>" />
			</div>
			<div class="form-group">
				<select class="form-control" name="dresscode_id" required>
					<option disabled="disabled" selected="selected">Select Dresscode</option>
							<?php $query = mysql_query("select * from tbl_dresscode");
									while($datas = mysql_fetch_array($query)){
									?>
								<option value="<?=$datas['dresscode_id'];?>"><?php echo $datas['dresscode_name'];?></option>
									<?php }?>
							</select>			
							</div>
			<div class="form-group">
							<input class="form-control" type="text" name="product_name" placeholder="Product Name"  required pattern="[a-zA-Z\s]+"/>
							</div>
							
							<div class="form-group">
							<select class="form-control" name="type_id" required>
									<option disabled="disabled" selected="selected">Select Product Type</option>
									<?php 
									
									$query = mysql_query("select * from tbl_producttype where gender_id='$gender_type'");
									while($datas = mysql_fetch_array($query)){
									?>
								<option value="<?=$datas['type_id'];?>"><?php echo $datas['type_name'];?></option>
									<?php }?>
							</select>
							</div>
							<div class="form-group">
							<input class="form-control" type="text" name="product_price" placeholder="Price"  required/>
							</div>
							<div class="form-group">
							<select class="form-control" name="size_id" required>
					<option disabled="disabled" selected="selected">Select Size</option>
									<?php $query = mysql_query("select * from tbl_productsize");
									while($datas = mysql_fetch_array($query)){
									?>
					   			<option value="<?=$datas['size_id'];?>"><?php echo $datas['size_name'];?></option>
									<?php }?>
							</select>
							</div>
							<div class="form-group">
							<input class="form-control" type="text" name="quantity" placeholder="Quantity " pattern="[0-9]" required />
							</div>
							<div class="form-group">
							<textarea class="form-control" name="detail" placeholder="Description" required></textarea>
							</div>
							<div class="form-group">
							<input class="btn btn-primary" type="submit" name="submit" value="Add Product"/>
							</div>
							</form>
	</div>	
</div>
 <script src="../../js/bootstrap.js"></script>
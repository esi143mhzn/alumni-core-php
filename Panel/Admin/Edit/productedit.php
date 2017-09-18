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
		
	
if(isset($_POST['submit']) && $_POST['submit'] == "Update Product"){
		$product_name=$_POST['product_name'];
		$product_type=$_POST['type_id'];
		$product_size=$_POST['size_id'];
		$quantity=$_POST['quantity'];
		$product_price=$_POST['product_price'];
		$detail=$_POST['detail'];
		$dresscode_id=$_POST['dresscode_id'];
		$id=$_POST['id'];
$query="UPDATE tbl_products SET product_name='$product_name',type_id='$product_type',size_id='$product_size',quantity='$quantity',product_price='$product_price',detail='$detail',dresscode_id='$dresscode_id' where product_id='$id'";
$result=mysql_query($query);
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "../Lists/list_products.php");
		exit;
    }
}



?>
<head>
<title>Product Edit</title>
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
<div class="content">
        <div class="main-content">
    
<div class="panel panel-primary" style="width:450px; float:right;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">New Product Data</h3>
	</div>
	
	<div class="panel-body">		
 						<form role="form" method="post" action="#" enctype="multipart/form-data">
			<div class="form-group">
			<input type="hidden" name="id" value="<?php
			$id=$_GET['id'];
	
			 	$query1=mysql_query("SELECT * FROM tbl_products JOIN tbl_producttype JOIN tbl_productsize JOIN tbl_dresscode ON tbl_products.type_id=tbl_producttype.type_id AND tbl_products.size_id=tbl_productsize.size_id AND tbl_dresscode.dresscode_id=tbl_products.dresscode_id where product_id='$id'");
 				while($data1=mysql_fetch_array($query1)){
 				echo $data1['product_id'];
				}
				?>" /> 
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
							<input class="form-control" type="text" name="product_name" placeholder="Product Name" required/>
							</div>
							<div class="form-group">
							<select class="form-control" name="type_id" required>
					<option disabled="disabled" selected="selected">Select Product Type</option>
									<?php $query = mysql_query("select * from tbl_producttype");
									while($datas = mysql_fetch_array($query)){
									?>
								<option value="<?=$datas['type_id'];?>"><?php echo $datas['type_name'];?></option>
									<?php }?>
							</select>
							</div>
							<div class="form-group">
							<input class="form-control" type="text" name="product_price" placeholder="Price" required/>
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
							<input class="form-control" type="text" name="quantity" placeholder="Quantity " required />
							</div>
							<div class="form-group">
							<textarea class="form-control" name="detail" placeholder="Description"  required></textarea>
							</div>
							<div class="form-group">
							<input class="btn btn-primary" type="submit" name="submit" value="Update Product"/>
							</div>
							</form>
	</div>	
</div>

<div class="panel panel-primary" style="width:450px; float:left;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Old Product Data</h3>
	</div>
	
	<div class="panel-body">		
	<?php 
	$query1=mysql_query("SELECT * FROM tbl_products JOIN tbl_producttype JOIN tbl_productsize JOIN tbl_dresscode 
		ON tbl_products.type_id=tbl_producttype.type_id AND tbl_products.size_id=tbl_productsize.size_id AND tbl_dresscode.dresscode_id=tbl_products.dresscode_id where product_id='$id'");
$data1=mysql_fetch_array($query1);
?>
<div class="form-group">
Dresscode:<?=$data1['dresscode_name'];?>
</div>
<div class="form-group">
Product name:<?=$data1['product_name'];?>
</div>
<div class="form-group">
Product type:<?=$data1['type_name'];?>
</div>
<div class="form-group">
Price:<?=$data1['product_price'];?>
</div>
<div class="form-group">
Size:<?=$data1['size_name'];?>
</div>
<div class="form-group">
Quantity:<?=$data1['quantity'];?>
</div>
<div class="form-group">
Description:<?=$data1['detail'];?>
</div>
</div>
</div>
</div>
</div>
 <script src="../../js/bootstrap.js"></script>
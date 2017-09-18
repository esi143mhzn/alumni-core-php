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

$query="SELECT * FROM tbl_products JOIN tbl_producttype JOIN tbl_productsize JOIN tbl_dresscode 
		ON tbl_products.type_id=tbl_producttype.type_id AND tbl_products.size_id=tbl_productsize.size_id AND tbl_dresscode.dresscode_id=tbl_products.dresscode_id";
$userdata=mysql_query($query);
?>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
 <?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:1130px; float:right; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">List Products</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover ">
  			<thead>
    			<tr>
      				<th>#</th>
      				<th>Dress Code</th>
      				<th>Product Name</th>
      				<th>Type</th>
      				<th>Size</th>
      				<th>Price</th>
      				<th>Stock</th>
      				<th>Detail</th>
					<th>Action</th>
    			</tr>
  			</thead>
  			<tbody>
			<?php
			$sn=1;
				while($datas=mysql_fetch_array($userdata)){
			?>
    			<tr>
      				<td><?php echo $sn ?></td>
      				<td><?php echo $datas['dresscode_name']; ?></td>
      				<td style="overflow:hidden; max-width:150px;"><?php echo $datas['product_name']; ?></td>
      				<td><?php echo $datas['type_name']; ?></td>
      				<td><?php echo $datas['size_name']; ?></td>
      				<td>Rs.<?php echo $datas['product_price']; ?></td>
      				<td><?php echo $datas['quantity']; ?></td>
      				<td style="overflow:hidden; max-width:150px;"><?php echo $datas['detail']; ?></td>
					<td><a href="../Edit/productedit.php?id=<?php echo $datas['product_id']; ?>" class="ico del"><i class="fa fa-edit" style="font-size:24px"></i></a>
						<a href="../Delete/product_delete.php?id=<?php echo $datas['product_id']; ?>" onclick="return confirm('do you really want to delete?');">
						<i class="glyphicon glyphicon-trash" style="font-size:24px"></i></a></td>
				</tr>
			
			<?php
			$sn++;
			}
			?>
  			</tbody>
		</table> 
	</div>
</div>
 <script src="../../js/bootstrap.js"></script>

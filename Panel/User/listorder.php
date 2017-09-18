<?php 

 session_start();
 if($_SESSION['user_id']=="")
 {
	header("Location: " . "../index.php"); 
}
 ?>
<?php

?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>User Order List</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/theme.css">
</head>
<body>
<?php include 'upside.php'; ?>
<div class="content">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title ">List Order</h3>
	</div>
	<div class="panel-body">
		<form action="deliveredlist.php" method="post">
		<table class="table table-striped table-hover ">
  			<thead>
    			<tr>
					<th><center>Mark</center></th>
      				<th>#</th>
      				<th>DressCode</th>
      				<th>Product</th>
      				<th>Qty</th>
      				<th>Size</th>
      				<th>Price</th>
      				<th>Customer</th>
      				<th>Location</th>
      				<th>Email</th>
      				<th>Phone</th>
      				<th>Color</th>
    			</tr>
  			</thead>
  			<tbody>
			
			<?php
				$query="SELECT * FROM tbl_customerorder";
				$userdata=mysql_query($query);
				$sn=1;
				while($datas=mysql_fetch_array($userdata)){
			?>
    			<tr>
      				<th><center>
					
					<input type="checkbox" name="delivered[]" value="<?php echo $datas['order_id']; ?>"/></center></th>
					<th><?php $sn ?></th>
      				<th><?php echo $datas['dress_code']; ?></th>
      				<th><?php echo $datas['product_name']; ?></th>
      				<th><?php echo $datas['order_quantity']; ?></th>
      				<th><?php echo $datas['size']; ?></th>
      				<th><?php echo $datas['price']; ?></th>
      				<th><?php echo $datas['fullname']; ?></th>
      				<th><?php echo $datas['delivery_location']; ?></th>
      				<th><?php echo $datas['email']; ?></th>
      				<th><?php echo $datas['phone_no']; ?></th>
      				<th><?php echo $datas['color']; ?></th>
					
				</tr>
			<?php
			}
			?>
			
  			</tbody>
			
		
		</table>
		<input type="submit" name="submit" value="Mark As Delivered"/>
			</form>
			</div>
	</div>
</div>

	<script src="../js/bootstrap.js"></script>
</body>
</html>
<?php 

 session_start();
 if($_SESSION['user_id']=="")
 {
	header("Location: " . "../index.php"); 
}
 ?><!doctype html>
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
<?php 
if(isset($_POST['submit'])){
	if(!empty($_POST['delivered'])) {
	foreach($_POST['delivered'] as $id) {
			$query1=mysql_query("select * from tbl_customerorder where order_id='$id'");
			$datas1=mysql_fetch_array($query1);
			$dress_code=$datas1['dress_code'];
      		$product_name=$datas1['product_name'];
      		$order_quantity=$datas1['order_quantity'];
      		$size=$datas1['size'];
      		$price=$datas1['price'];
      		$fullname=$datas1['fullname'];
      		$delivery_location=$datas1['delivery_location'];
      		$email=$datas1['email'];
      		$phone_no=$datas1['phone_no'];
      		$color=$datas1['color'];
	$query2=mysql_query("Insert into tbl_deliveredlist(dress_code,product_name,order_quantity,size,price,fullname,delivery_location,email,phone_no,color) VALUES('$dress_code','$product_name','$order_quantity','$size','$price','$fullname','$delivery_location','$email','$phone_no','$color')");
	$query3=mysql_query("Delete from tbl_customerorder where order_id='$id'");
		}
		}
		}

?>

<div class="content">
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title ">List Order</h3>
	</div>
	<div class="panel-body">
		
			<form action="delete_list.php" method="post">
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
						$query="SELECT * FROM tbl_deliveredlist";
						$userdata=mysql_query($query);
						$sn=1;
						while($datas=mysql_fetch_array($userdata)){
					?>
    				<tr>
      				<th><input type="checkbox" name="delete[]" value="<?php echo $datas['delivery_id']; ?>"/></center></th>
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
			<input type="submit" name="submit" value="Delete"/>
		</form>  
		
	</div>
	</div>
</div>
	<script src="../js/bootstrap.js"></script>
</body>
</html>





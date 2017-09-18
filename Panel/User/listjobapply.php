<?php
include '../connection.php';
?><?php 
 session_start();
 if($_SESSION['user_id']=="")
 {
	header("Location: " . "../index.php"); 
}
 ?>
<?php
$query="SELECT * FROM tbl_cv";
$userdata=mysql_query($query);
?>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/theme.css">
 <?php include 'upside.php'; ?>
	<div class="panel panel-primary" style="width:800px;  margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">List JOB Applicant</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover ">
  			<thead>
    			<tr>
      				<th>#</th>
      				<th>Full Name</th>
      				<th>Address</th>
					<th>Phone No</th>
					<th>Email</th>
					<th>C.V</th>
    			</tr>
  			</thead>
						<?php
			$sn=1;
				while($datas=mysql_fetch_array($userdata)){
			?>
    			<tr>
      				<td><?php echo $sn ?></td>
      				<td><?php echo $datas['full_name']; ?></td>
      				<td><?php echo $datas['address']; ?></td>
					<td><?php echo $datas['phone']; ?></td>
					<td><?php echo $datas['email']; ?></td>
					<td><?php echo $datas['cv_name']; ?></td>
				</tr>
			<?php
			$sn++;
			}
			?>
  			</tbody>
		</table> 
	</div>
</div>


 <script src="../js/bootstrap.js"></script>

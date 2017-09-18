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
$query="SELECT * FROM tbl_alumni2069";
$userdata=mysql_query($query);

?>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
 <?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:800px;  margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">List User</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover ">
  			<thead>
    			<tr>
      				<th>#</th>
      				<th>Aid</th>
      				<th>Name</th>
      				<th>Address</th>
      				<th>Batch</th>
      				<th>Internship</th>
      				<th>Company</th>
      				<th>Fb</th>
    			</tr>
  			</thead>
  			<tbody>
			<?php include '../../connection.php';
			$sn=1;
				while($datas=mysql_fetch_array($userdata)){
			?>
    			<tr>
      				<td><?php echo $sn ?></td>
      				<td><?php echo $datas['aid']; ?></td>
      				<td><?php echo $datas['name']; ?></td>
      				<td><?php echo $datas['address']; ?></td>
      				<td><?php echo $datas['batch']; ?></td>
      				<td><?php echo $datas['internship']; ?></td>
      				<td><?php echo $datas['company']; ?></td>
      				<td><?php echo $datas['fb']; ?></td>
					<td><a href="../Delete/user_delete.php?id=<?php echo $datas['aid']; ?>" onclick="return confirm('do you really want to delete?');">
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



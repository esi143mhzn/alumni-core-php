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
$query="SELECT * FROM tbl_user";
$userdata=mysql_query($query);

?>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
 <?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:900px;  margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">List User</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover ">
  			<thead>
    			<tr>
      				<th>#</th>
      				<th>Full Name</th>
      				<th>Username</th>
    			</tr>
  			</thead>
  			<tbody>
			<?php
			$sn=1;
				while($datas=mysql_fetch_array($userdata)){
			?>
    			<tr>
      				<td><?php echo $sn ?></td>
      				<td><?php echo $datas['fullname']; ?></td>
      				<td><?php echo $datas['username']; ?></td>
					<td><a href="../Delete/user_delete.php?id=<?php echo $datas['user_id']; ?>" onclick="return confirm('do you really want to delete?');">
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



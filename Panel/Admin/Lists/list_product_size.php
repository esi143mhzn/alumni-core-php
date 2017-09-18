<?php
include '../../connection.php';
?><?php 

 session_start();
 if($_SESSION['admin_id']=="")
 {
	header("Location: " . "../../index.php"); 
}
 ?>
 <?php include '../upside.php'; ?>
<?php
$query="SELECT * FROM tbl_productsize";
$userdata=mysql_query($query);

?>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
<div class="panel panel-primary" style="width:900px;  margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">List Product Size</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover ">
  			<thead>
    			<tr>
      				<th>#</th>
      				<th>Product Size</th>
    			</tr>
  			</thead>
  			<tbody>
			<?php
			$sn=1;
				while($datas=mysql_fetch_array($userdata)){
			?>
    			<tr>
      				<td><?php echo $sn ?></td>
      				<td><?php echo $datas['size_name']; ?></td>
					<td><a href="../Edit/size_edit.php?id=<?php echo $datas['size_id']; ?>" class="ico del"><i class="fa fa-edit" style="font-size:24px"></i></a>
						<a href="../Delete/size_delete.php?id=<?php echo $datas['size_id']; ?>" onclick="return confirm('do you really want to delete?');">
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
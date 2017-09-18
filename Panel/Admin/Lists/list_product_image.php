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
$query="SELECT * FROM tbl_productimage JOIN tbl_dresscode ON tbl_dresscode.dresscode_id=tbl_productimage.dresscode_id";
$userdata=mysql_query($query);

?>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
 <?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:1130px; float:right; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">List Product Image</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover ">
  			<thead>
    			<tr>
      				<th>#</th>
      				<th>DressCode</th>
      				<th>Original Image</th>
      				<th>Small Image</th>
      				<th>Thumbnail Image</th>
      				<th>Color ID</th>
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
      				<td style="overflow:hidden; max-width:150px;"><?php echo $datas['original_name']; ?></td>
      				<td style="overflow:hidden; max-width:150px;"><?php echo $datas['small_name']; ?></td>
      				<td style="overflow:hidden; max-width:150px;"><?php echo $datas['thumbnail_name']; ?></td>
      				<th><?php echo $datas['color_id']; ?></td>
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
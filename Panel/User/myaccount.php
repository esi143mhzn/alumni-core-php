<?php 

 session_start();
 if($_SESSION['user_id']=="")
 {
	header("Location: " . "../index.php"); 
}
 ?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>User</title>
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
if(isset($_POST['submit']) && $_POST['submit']=="Fullname"){
$id=$_GET['id'];
$fullname=$_POST['new_fullname'];
$query1="UPDATE tbl_user SET fullname='$fullname' where user_id='$id'";
$result=mysql_query($query1);
}
?>
<?php 
if(isset($_POST['submit']) && $_POST['submit']=="Username"){
$id=$_GET['id'];
$username=$_POST['new_username'];
$query2="UPDATE tbl_user SET username='$username' where user_id='$id'";
$result1=mysql_query($query2);
}
?>
<?php 
if(isset($_POST['submit']) && $_POST['submit']=="Password"){
$id=$_GET['id'];
$password=$_POST['new_password'];
$query3="UPDATE tbl_user SET password='$password' where user_id='$id'";
$result2=mysql_query($query3);
}
?>
    <div class="content">
        <div class="main-content">
    
	        <div class="dialog">
    <div class="panel panel-default" style="margin:auto;width:500px;">
	<?php
						if(!isset($_SESSION['submit'])){
							$id=$_SESSION['user_id'];
							$username=$_SESSION['username'];
							$query=mysql_query("select * from tbl_user where user_id='$id'");
							}
						while ($datas = mysql_fetch_array($query)){
				 			
?>
        <p class="panel-heading no-collapse"><?= $datas['fullname'];?></p>
        <table class="table table-striped table-hover ">
		
		<tr>
		<th>Fullname</th>
		<th>:</th>
		<th class="old_fullname"><?=$datas['fullname']; ?></th>
		<th class="new_fullname">
         <form method="post" action="myaccount.php?id=<?=$datas['user_id'];?>">
		 <input type="text" name="new_fullname"/>
		 
          <input type="submit" name="submit" value="Fullname"/>
		  </form>
        </th>
		<th>
		<a href="#" class="edit_fullname"><i class="fa fa-pencil"></i></a>
		</th>
		</tr>
		<tr>
		<th>Username</th>
		<th>:</th>
		<th class="old_username"><?=$datas['username']; ?></th>
		<th class="new_username">
         <form method="post" action="myaccount.php?id=<?=$datas['user_id'];?>">
		 <input type="text" name="new_username"/>
		 
          <input type="submit" name="submit" value="Username"/>
		  </form>
        </th>
		<th>
		<a href="#" class="edit_username"><i class="fa fa-pencil"></i></a>
		</th>
		</tr>
		<tr>
		<th>Password</th>
		<th>:</th>
		<th class="old_password"><?=md5($datas['password']); ?></th>
		<th class="new_password">
         <form method="post" action="myaccount.php?id=<?=$datas['user_id'];?>">
		 <input type="password" name="new_password"/>
		 
          <input type="submit" name="submit" value="Password"/>
		  </form>
        </th>
		<th>
		<a href="#" class="edit_password"><i class="fa fa-pencil"></i></a>
		</th>
		</tr>
		</table>
    </div>
</div>
</div>
    </div>
	<script>
       $('.new_fullname').hide();   
	   $('.id').hide();
 $('.edit_fullname').click(function(){
    $('.old_fullname').hide(); 
    $('.new_fullname').show();
	$('.id').hide();

 });
 </script>
 <script>
       $('.new_username').hide();   
	   $('.id').hide();
 $('.edit_username').click(function(){
    $('.old_username').hide(); 
    $('.new_username').show();
	$('.id').hide();

 });
 </script>
 <script>
       $('.new_password').hide();   
	   $('.id').hide();
 $('.edit_password').click(function(){
    $('.old_password').hide(); 
    $('.new_password').show();
	$('.id').hide();

 });
 </script>
	<?php } ?>
	<script src="../js/bootstrap.js"></script>
</body></html>
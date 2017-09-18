<?php 

 session_start();
 if($_SESSION['aid']=="")
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
$query1="UPDATE tbl_alumni2068 SET name='$fullname' where aid='$id'";
$result=mysql_query($query1);
}
?>
<?php 
if(isset($_POST['submit']) && $_POST['submit']=="Username"){
$id=$_GET['id'];
$username=$_POST['new_username'];
$query2="UPDATE tbl_alumni2068 SET username='$username' where aid='$id'";
$result1=mysql_query($query2);
}
?>
<?php 
if(isset($_POST['submit']) && $_POST['submit']=="Password"){
$id=$_GET['id'];
$password=$_POST['new_password'];
$query3="UPDATE tbl_alumni2068 SET password='$password' where aid='$id'";
$result2=mysql_query($query3);
}
?>
<?php 
if(isset($_POST['submit']) && $_POST['submit']=="Address"){
$id=$_GET['id'];
$address=$_POST['new_address'];
$query3="UPDATE tbl_alumni2068 SET address='$address' where aid='$id'";
$result2=mysql_query($query3);
}
?>
<?php 
if(isset($_POST['submit']) && $_POST['submit']=="internship"){
$id=$_GET['id'];
$intership=$_POST['new_internship'];
$query3="UPDATE tbl_alumni2068 SET intership='$intership' where aid='$id'";
$result2=mysql_query($query3);
}
?>
<?php 
if(isset($_POST['submit']) && $_POST['submit']=="company"){
$id=$_GET['id'];
$company=$_POST['new_company'];
$query3="UPDATE tbl_alumni2068 SET company='$company' where aid='$id'";
$result2=mysql_query($query3);
}
?>
    <div class="content">
        <div class="main-content">
    
	        <div class="dialog">
    <div class="panel panel-default" style="margin:auto;width:500px;">
	<?php
						if(!isset($_SESSION['submit'])){
							$id=$_SESSION['aid'];
							$username=$_SESSION['username'];
							$query=mysql_query("select * from tbl_alumni2068 where aid='$id'");
							}
						while ($datas = mysql_fetch_array($query)){
				 			
?>
        <p class="panel-heading no-collapse"><?= $datas['name'];?></p>
        <table class="table table-striped table-hover ">
		
		<tr>
		<th>Fullname</th>
		<th>:</th>
		<th class="old_fullname"><?=$datas['name']; ?></th>
		<th class="new_fullname">
         <form method="post" action="myaccount.php?id=<?=$datas['aid'];?>">
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
         <form method="post" action="myaccount.php?id=<?=$datas['aid'];?>">
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
         <form method="post" action="myaccount.php?id=<?=$datas['aid'];?>">
		 <input type="password" name="new_password"/>
		 
          <input type="submit" name="submit" value="Password"/>
		  </form>
        </th>
		<th>
		<a href="#" class="edit_password"><i class="fa fa-pencil"></i></a>
		</th>
		</tr>
		<tr>
		<th>Address</th>
		<th>:</th>
		<th class="old_address"><?=$datas['address']; ?></th>
		<th class="new_address">
         <form method="post" action="myaccount.php?id=<?=$datas['aid'];?>">
		 <input type="text" name="new_address"/>
		 
          <input type="submit" name="submit" value="Address"/>
		  </form>
        </th>
		<th>
		<a href="#" class="edit_address"><i class="fa fa-pencil"></i></a>
		</th>
		</tr>
		<tr>
		<th>Internship</th>
		<th>:</th>
		<th class="old_internship"><?=$datas['internship']; ?></th>
		<th class="new_internship">
         <form method="post" action="myaccount.php?id=<?=$datas['aid'];?>">
		 <input type="text" name="new_internship"/>
		 
          <input type="submit" name="submit" value="Internship"/>
		  </form>
        </th>
		<th>
		<a href="#" class="edit_internship"><i class="fa fa-pencil"></i></a>
		</th>
		</tr>
		<tr>
		<th>Company</th>
		<th>:</th>
		<th class="old_company"><?=$datas['company']; ?></th>
		<th class="new_company">
         <form method="post" action="myaccount.php?id=<?=$datas['aid'];?>">
		 <input type="text" name="new_company"/>
		 
          <input type="submit" name="submit" value="Company"/>
		  </form>
        </th>
		<th>
		<a href="#" class="edit_company"><i class="fa fa-pencil"></i></a>
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
  <script>
       $('.new_address').hide();   
	   $('.id').hide();
 $('.edit_address').click(function(){
    $('.old_address').hide(); 
    $('.new_address').show();
	$('.id').hide();

 });
 </script>
  <script>
       $('.new_internship').hide();   
	   $('.id').hide();
 $('.edit_internship').click(function(){
    $('.old_internship').hide(); 
    $('.new_internship').show();
	$('.id').hide();

 });
 </script>
  <script>
       $('.new_company').hide();   
	   $('.id').hide();
 $('.edit_company').click(function(){
    $('.old_company').hide(); 
    $('.new_company').show();
	$('.id').hide();

 });
 </script>
	<?php } ?>
	<script src="../js/bootstrap.js"></script>
</body></html>
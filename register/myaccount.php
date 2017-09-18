<?php
include_once 'dbconfig.php';
if (isset($_SESSION['user_session'])) {
  $user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alumni Information Database</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="css/template-style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
    <script type="text/javascript" src="js/validation.js"></script> 
</head>
<?php include '../header.php'; ?>

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
	<script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script>   
</body></html>
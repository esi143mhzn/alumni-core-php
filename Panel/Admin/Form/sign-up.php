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
  include '../../connection.php';
  if(isset($_POST["submit"])&& $_POST["submit"]=="Sign Up"){
 $username=$_POST['username'];
 $fullname=$_POST['fullname'];
 $password=$_POST['password'];
  if (mysql_num_rows($query) != 0)
  {
      echo "Username already exists";
  }

  else
  {
 
 	$signup=$_POST['signup'];
	if($signup==1){
	$query="INSERT INTO tbl_admin(fullname,username,password) VALUES('$fullname','$username','$password')";
	$result=mysql_query($query);
	if(mysql_error()){
    	    echo mysql_error();
	
				    }
    	else{
			echo
		 	header("Location: " . "home.php");
			exit;
   	 }
		}
}
 $signup=$_POST['signup'];
if($signup==1){
$query="INSERT INTO tbl_admin(fullname,username,password) VALUES('$fullname','$username','$password')";
$result=mysql_query($query);
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "home.php");
		exit;
    }
	}
if($signup==0){
	$query="INSERT INTO tbl_user(fullname,username,password) VALUES('$fullname','$username','$password')";
$result=mysql_query($query);
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "home.php");
		exit;
    }
	}
	}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
</head>
<body>
<?php  include '../upside.php';?>
<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Sign Up</h3>
	</div>
	<div class="panel-body">		

            <form action="" method="post">
                 <form action="" method="post">
                <div class="form-group">
				<select class="form-control" name="signup" required>
				<option disabled="disabled">Select user</option>
				<option value="1">Admin</option>
				<option value="0">User</option>
          <option value="0">Alumni</option>
				</select>
				</div>
				<div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control span12" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control span12" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control span12" required>
                </div>
				<div class="form-group">
                   <input type="submit" name="submit" value="Sign Up" class="btn btn-primary pull-right">
				</div>
            </form>
    </div>
</div>

    </div>
	<script src="../../js/bootstrap.js"></script>
</body></html>
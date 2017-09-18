<?php 

 session_start();
 if($_SESSION['user_id']=="")
 {
	header("Location: " . "../index.php"); 
}
 ?>
 <?php
 
 if(isset($_POST["submit"])&& $_POST["submit"]=="Sign Up"){
 $username=$_POST['username'];
 $fullname=$_POST['fullname'];
 $password=$_POST['password'];
  if (mysql_num_rows($query) != 0)
  {
      echo "Username already exists";
  }
else{
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
    <title>User Sign Up</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/theme.css">
</head>
<body>
<?php

include 'upside.php';?>
    <div class="content">
        <div class="main-content">
    
	        <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Sign Up</p>
        <div class="panel-body">
            <form action="" method="post">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fullname" class="form-control span12" pattern="[a-zA-Z\s]+" title="Only Letters" required />
                </div>
               <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control span12">
                </div>
                <div class="form-group">
                   <input type="submit" name="submit" value="Sign Up" class="btn btn-primary pull-right">
					</div>
                </form>
        </div>
    </div>
</div>
</div>
    </div>
	<script src="../js/bootstrap.js"></script>
</body></html>

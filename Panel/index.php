<?php
session_start();
?>
<?php
include 'connection.php';
if(isset($_POST["submit"]) && $_POST["submit"] == "Sign In"){
    $login=$_POST['login'];
	$username = $_POST['username'];
    $password = $_POST['password'];
    if($login==1){
    $query = "SELECT * FROM tbl_admin WHERE username='".$username."' AND password='".$password."'";
    $result = mysql_query($query);

    if(mysql_num_rows($result) > 0){
        $row = mysql_fetch_assoc($result);

        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['username'] = $row['username'];
                
      header("Location: " . "Admin/Form/home.php"); exit;
    }
    else{
        echo "Invalid username or password";
    }
	}
	else
	{
	$query = "SELECT * FROM tbl_alumni2068 WHERE username='".$username."' AND password='".$password."'";
	$result = mysql_query($query);

    if(mysql_num_rows($result) > 0){
        $row = mysql_fetch_assoc($result);

        $_SESSION['aid'] = $row['aid'];
        $_SESSION['username'] = $row['username'];
                
      header("Location: " . "Alumni/home.php"); exit;
    }
    else{
        echo "Invalid username or password";
    }
	}
	
}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/theme.css">
</head>
<body class=" theme-blue">
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <a class="" href="index.php"><span class="navbar-brand"><span class="fa fa-paper-plane"></span>Panel</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    <div class="dialog">
    	<div class="panel panel-default">
        	<p class="panel-heading no-collapse">Sign In</p>
       		<div class="panel-body">
            	<form action="" method="post">
                	<div class="form-group">
					<select class="form-control" name="login">
					<option disabled="disabled">Select user</option>
					<option value="1">Admin</option>
					<!-- <option value="0">User</option> -->
                    <option value="0">Alumni</option>
					</select>
					</div>
					<div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control span12">
					</div>    
	            	<div class="form-group">
                	<label>Password</label>
                    <input type="password" name="password" class="form-control span12">
                	</div>
                	<input type="submit" name="submit"  value="Sign In" class="btn btn-primary pull-right">
            	</form>
        	</div>
    	</div>
    
	</div>
    <script src="js/bootstrap.js"></script>
</body></html>

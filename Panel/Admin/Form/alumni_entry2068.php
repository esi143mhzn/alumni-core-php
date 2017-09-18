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
  if(isset($_POST["submit"])&& $_POST["submit"]=="Submit"){
 $Name=$_POST['name'];
 $Username=$_POST['username'];
 $Password=$_POST['password'];
 $Address=$_POST['address'];
 $Batch=$_POST['batch'];
  $Internship=$_POST['internship'];
   $Company=$_POST['company'];
    $Gmail=$_POST['gmail'];
     $FB=$_POST['fb'];
  if (mysql_num_rows($query) !=0)
  {
      echo "Username already exists";
  }

  else
  {
 
 	$signup=$_POST['signup'];
	if($signup==0){
	$query="INSERT INTO tbl_alumni2068(name,username,password,address,batch,internship,company,gmail,fb) VALUES('$Name','$Username','$Password','$Address','$Batch','$Internship','$Company','$Gmail','$FB')";
	$result=mysql_query($query);
	if(mysql_error()){
    	    echo mysql_error();
	
				    }
    	else{
			echo
		 	header("Location: " . "home2.php");
			exit;
   	 }
		}
}}
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
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">2068 Entry</h3>
	</div>
	<div class="panel-body">		

            <form action="" method="post">
                 <form action="" method="post">
                <div class="form-group">
				<select class="form-control" name="signup" required>
				<option disabled="disabled">Select user</option>
				
          <option value="0">Alumni</option>
				</select>
				</div>
				<div class="form-group">
                   
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control span12" required>
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
                    <label>Address</label>
                    <input type="text" name="address" class="form-control span12" required>
                </div>
                 <div class="form-group">
                    <label>Batch</label>
                    <input type="text" name="batch" class="form-control span12" required>
                </div>
                 <div class="form-group">
                    <label>Internship</label>
                    <input type="text" name="internship" class="form-control span12" required>
                </div>
                 <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" class="form-control span12" required>
                </div>
                 <div class="form-group">
                    <label>Gmail</label>
                    <input type="text" name="gmail" class="form-control span12" required>
                </div>
                 <div class="form-group">
                    <label>FB</label>
                    <input type="text" name="fb" class="form-control span12" required>
                </div>
				<div class="form-group">
                   <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right">
				</div>
            </form>
    </div>
</div>

    </div>
	<script src="../../js/bootstrap.js"></script>
</body></html>
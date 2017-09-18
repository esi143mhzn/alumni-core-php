<?php
include '../connection.php';
?>
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
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>          </button>
          <a class="" href="home.php"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> User Panel</span></a></div>

       <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>
					<?php
						if(!isset($_SESSION['submit'])){
							$id=$_SESSION['user_id'];
							$username=$_SESSION['username'];
							$query=mysql_query("select * from tbl_user where username='$username'");
							}
						while ($datas = mysql_fetch_array($query)){
				 			echo $datas['fullname'];
							}
					?>
					<i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="myaccount.php">My Account</a></li>
                <li><a tabindex="-1" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>

    

    <div class="sidebar-nav" style="float:left;">
		<ul>
            <li ><a href="home.php" class="nav-header collapsed"><span class="fa fa-caret-right"></span> Main Page</a></li>
            <li ><a href="listorder.php" class="nav-header collapsed"><span class="fa fa-caret-right"></span> List Order(New)</a></li>
			<li ><a href="sign-up.php" class="nav-header collapsed"><span class="fa fa-caret-right"></span> Sign Up</a></li>
			<li ><a href="listjobapply.php" class="nav-header collapsed"><span class="fa fa-caret-right"></span>List Applicants</a></li>
			<li ><a href="deliveredlist.php" class="nav-header collapsed"><span class="fa fa-caret-right"></span> Delivered List</a></li>
		</ul>
    </div>
</body>
</html>
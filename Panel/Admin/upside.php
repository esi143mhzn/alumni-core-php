<?php
include '../../connection.php';
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
          <a class="" href="home.php"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Admin Panel</span></a></div>

       <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>
					<?php
						if(!isset($_SESSION['submit'])){
							$id=$_SESSION['admin_id'];
							$username=$_SESSION['username'];
							$query=mysql_query("select * from tbl_admin where username='$username'");
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

    

   <div class="sidebar-nav">
    <ul>
		<li><a href="#" data-target=".list-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-list"></i>List<i class="fa fa-collapse"></i></a></li>
		<li><ul class="list-menu nav nav-list collapse">
            <li ><a href="../Lists/list_banner.php"><span class="fa fa-caret-right"></span>List Banner</a></li>
            
            <li ><a href="../Lists/list_uploadgallery.php"><span class="fa fa-caret-right"></span>List Gallery</a></li>
            <li ><a href="../Lists/list_admin.php"><span class="fa fa-caret-right"></span>List Admin</a></li>
            <li ><a href="../Lists/list_user.php"><span class="fa fa-caret-right"></span>List User</a></li>
              <li ><a href="../Lists/list_alumni2068.php"><span class="fa fa-caret-right"></span>List of Alumni 2068</a></li>
               <li ><a href="../Lists/list_alumni2069.php"><span class="fa fa-caret-right"></span>List of Alumni 2069</a></li>
          
    </ul></li>
        <li><a href="#" data-target=".upload-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-upload"></i> Uploads<i class="fa fa-collapse"></i></a></li>
        <li><ul class="upload-menu nav nav-list collapse">
            <li ><a href="../Form/bannerupload.php"><span class="fa fa-caret-right"></span> Banner</a></li>
            
            <li ><a href="../Form/contact.php"><span class="fa fa-caret-right"></span> Contact</a></li>
           
            <li ><a href="../Form/vacancy.php"><span class="fa fa-caret-right"></span>Vacancy</a></li>
           
    </ul></li>


     <ul>
        <li><a href="#" data-target=".alumni-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-upload"></i>Alumni Entry<i class="fa fa-collapse"></i></a></li>
        <li><ul class="alumni-menu nav nav-list collapse">
                <li ><a href="../Form/alumni_entry2068.php"><span class="fa fa-caret-right"></span>Batch 2068</a></li>
                <li ><a href="../Form/alumni_entry2069.php"><span class="fa fa-caret-right"></span>Batch 2069</a></li>
           
    </ul></li>

        <ul><li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> Account <i class="fa fa-collapse"></i></a></li>
        <li><ul class="accounts-menu nav nav-list collapse">
            <li ><a href="../Form/sign-up.php"><span class="fa fa-caret-right"></span> Sign Up</a></li></ul></li>


            
                
    </ul></li>
	</ul>
    </div>
    </div>
</body>
</html>
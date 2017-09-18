<?php
include '../../connection.php';
?><?php 

 session_start();
 if($_SESSION['admin_id']=="")
 {
	header("Location: " . "../../index.php"); 
}
 ?>
 <html><head>
    
    <title>Bootstrap Admin</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
</head>

<body>
<?php include '../upside.php'; ?>
    <div class="content">
        <div class="main-content">
    
	        <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Alumni Information</p>

        <div class="panel-body">
		Congratulation!! Datas are stored.
        </div>	
    </div>
</div>
</div>
    </div>


    <script src="../../js/bootstrap.js"></script>
</body></html>
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

    <div class="content">
        <div class="main-content">
    
	        <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">User Panel</p>

        <div class="panel-body">
		Welcome!!!!!! to user panel.
        </div>	
    </div>
</div>
</div>
    </div>
	<script src="../js/bootstrap.js"></script>
</body></html>
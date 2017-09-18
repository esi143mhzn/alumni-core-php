<?php
include '../../connection.php';
?><?php 

 session_start();
 if($_SESSION['admin_id']=="")
 {
	header("Location: " . "../../index.php"); 
}
 ?>
 <html>
<head>
<title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
	<script type="text/javascript" src="../../js/ckeditor.js"></script>

</head>
<?php

if(isset($_POST['submit']) && $_POST['submit'] == "Submit"){
			$job_title=$_POST['job_title'];
			$job_position_type=$_POST['job_position_type'];
			$job_experience=$_POST['job_experience'];
			$job_openings=$_POST['job_openings'];
			$job_descriptions=$_POST['job_descriptions'];
			$job_requirement=$_POST['job_requirement'];
			$job_location=$_POST['job_location'];
				
$query="INSERT INTO tbl_career(job_title,job_position_type,job_experience,job_openings,job_descriptions,job_requirement,job_location) VALUES('$job_title','$job_position_type','$job_experience','$job_openings','$job_descriptions','$job_requirement','$job_location')";
$result=mysql_query($query);
if(mysql_error()){
        echo mysql_error();
	
    }
    else{
		echo
		 header("Location: " . "#");
		exit;
    }
}

?>	
<body>
<?php include '../upside.php'; ?>
	<div class="content">
		<div class="header">
					<h1 class="page-title">JOB OVERVIEW</h1>
		</div>
            <div class="col-md-5">
				<div class="panel panel-default">
							   <div class="panel-body">
							       <form action="" method="post">
								   <fieldset>
							        	<div class="form-group">
											<input class="form-control" type="text" name="job_title" placeholder="Title" pattern="[a-zA-Z\s]+" />
							   			</div>
										<div class="form-group">
											<input class="form-control" type="text" name="job_position_type" placeholder="Position Type" pattern="[a-zA-Z\s]+"  />
										</div>
										<div class="form-group">
											<input class="form-control" type="text" name="job_experience" placeholder="Experience" />
										</div>
										<div class="form-group">
											<input class="form-control" type="text" name="job_openings" placeholder="Openings" pattern="[0-9]" />
										</div>
										<strong> descriptions : </strong>
							        <textarea class="ckeditor form-control" name="job_descriptions" rows="4" cols="15" /></textarea> <br>
									<strong> requirement : </strong>
									 <textarea class="ckeditor form-control" name="job_requirement" rows="4" cols="15" /></textarea><br>
										<div class="form-group">
											<input class="form-control" type="text" name="job_location" placeholder="location" pattern="[a-zA-Z\s]+" />
										</div>
							          <input type="submit" name="submit" value="Submit" class="btn btn-primary">
									  </fieldset>
							       </form>
							   </div>
				</div>
          </div><!-- col-md-5 -->  
</div><!-- content -->	

 <script src="../../js/bootstrap.js"></script>
</body>
</html>

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
<meta http-equiv="type-Type" type="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
	  
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <script src="../../js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../../css/theme.css">
</head>

<body>
<?php
if(isset($_POST['submit'])){
	$folder_name=$_POST['folder_name'];	
	$structure = '../Uploads/Gallery/'.$folder_name.'';	
		date_default_timezone_set("Asia/Kathmandu");
		$date= date("Y-m-d h:i:sa");
    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_FILES['upload']['name'][$i];
		$shortname=mt_rand(100000,999999). $shortname;
		$uploadtemp=$_FILES['upload']['tmp_name'];
		$uploadtype=$_FILES['upload']['type'];
		$filesize=$_FILES['upload']['size'];
	
		$shortname= preg_replace("#[^a-z0-9.]#i","",$shortname);
if(!is_dir("../Uploads/Gallery/".$folder_name."/")){
!mkdir($structure, 0777, true);
}
	
                //save the url and the file
                $filePath = "../Uploads/Gallery/".$folder_name."/" .$shortname;

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $files[] = $shortname;
                    //insert into db
 					$query="INSERT INTO tbl_fashiongallery(image_name,date,folder_name) VALUES('$shortname','$date','$folder_name')";
					$result=mysql_query($query);

                    //use $shortname for the filename
                    //use $filePath for the relative url to the file

                }
              }
        }
    }

    //show success message
    echo "<h1>Uploaded:</h1>";    
    if(is_array($files)){
        echo "<ul>";
        foreach($files as $file){
            echo "<li>$file</li>";
        }
        echo "</ul>";
    }
}

?>		
<script>
$(document).ready(function() {
    $('#fileForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            upload[]: {
                validators: {
                    notEmpty: {
                        message: 'Please select an image'
                    },
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 2097152,   // 2048 * 1024
                        message: 'The selected file is not valid'
                    }
                }
            }
        }
    });
});
</script>

<?php include '../upside.php'; ?>
<div class="panel panel-primary" style="width:450px; margin:auto;">
	<div class="panel-heading">
		<h3 class="panel-title " style="margin-top:3px;margin-bottom:3px;">Gallery</h3>
	</div>
	<div class="panel-body">		
		<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group">
    			<label for='upload'>Add Images:</label>
   			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="folder_name" placeholder="Folder Type" required/>
			</div>
			<div class="form-group">
				<input  class="form-control" id='upload' name="upload[]" type="file" multiple="multiple" required/>
    		</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Submit"/>
			</div>
		</form>
	</div>	
</div>
 <script src="../../js/bootstrap.js"></script>
</body>
</html>

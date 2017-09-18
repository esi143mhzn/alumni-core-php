<?php
session_start();

require_once 'includes/dbconfig.php';
require_once 'require/typecheck.php';


if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    if ($email!='' && $password!='') {

        require_once 'includes/random.php';

        // $salt = generateRandomString(10);

        $sql= "select * from users where email ='$email' and status='1' limit 0,1";

        $query = mysqli_query($link, $sql);

        $row =mysqli_fetch_assoc($query);
        // print_r($row);
        $id = $row['user_id'];
        $hexPassword = $row['password'];
        $salt= $row['salt'];
        $usertype = $row['usertype'];
        // echo $salt;
        // echo "<br>";
        // echo $hexPassword;

        require_once 'includes/password.inc.php';

        // match given data with database
        if (checkHash($password, $hexPassword, $salt)) {

            // echo "<br>Login successfull....";

            typecheck($id, $usertype);
        }

    }else{
        echo "Email or Password can't be blank !!";
    }
}

?>


<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Academic Forum</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style1.css">


    <link rel="stylesheet" href="assets/material/css/reset.css">
    <link rel="stylesheet" href="assets/material/css/style.css">


</head>
<body>


<div class="pen-title">
    <h1>Please Sign in</h1>
</div>

<div class="container">
    <div class="card"></div>
    <div class="card" >
        <!--
         <h1 class="title">Login Here</h1>-->
        <div class="image" style="margin-left: 148px">
            <img src="assets/img/logo1.png" class="img-rounded"  alt="Cinque Terre" width="150" height="140">
        </div>
        <form method="post">
            <div class="input-container">
                <input type="text" name="email" placeholder="Email Address" pattern="[^ @]*@[^ @]*" require_onced title="Enter correct email" required="required"/>
                <label for="Username">Email Address </label>
                <div class="bar"></div>
            </div>
            <div class="input-container">
                <input type="password" name="password"  placeholder="Password" required="required"/>
                <label for="Password">Password</label>
                <div class="bar"></div>
            </div>
            <input type="submit" value="Go" class="btn btn-primary btn-lg btn-block" name="login"  >

        </form>
    </div>


</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="assets/material/js/index.js"></script>




</body>
</html>
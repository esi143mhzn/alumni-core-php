<?php
session_start();

require_once '../includes/dbconfig.php';
require_once '../includes/typecheck.php';


if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    if ($email!='' && $password!='') {

        require_once '../includes/random.php';

        // $salt = generateRandomString(10);

        $sql= "select * from users where email ='$email' and status='1' limit 0,1";
        //echo $sql;

        $query = mysqli_query($link, $sql);

        $row =mysqli_fetch_assoc($query);
        // print_r($row);
        $id = $row['user_id'];
        $hexPassword = $row['password'];
        $salt= $row['salt'];
        $usertype = $row['usertype'];
         // $salt;
        // echo "<br>";echo $hexPassword;


        require_once '../includes/password.inc.php';

        // match given data with database
        if (checkHash($password, $hexPassword, $salt)) {

             //echo "<br>Login successfull....";

            typecheck($id, $usertype);
        }

    }else{
        echo "Email or Password can't be blank !!";
    }




}

?>



<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="container">

    <form method="post" class="form-signin">
        <div class="image" style="margin-left: 57px">
            <img src="../assets/img/logo1.png" class="img-rounded"  alt="Cinque Terre" width="150" height="140">
        </div>
        <h2 class="form-signin-heading">Please Sign-In</h2>

        <div class="form-group">
            <input name="email" type="text" class="form-control" placeholder="Email Address" pattern="[^ @]*@[^ @]*" require_onced title="Enter correct email"/>
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Password"/>
        </div>

        <input type="submit" value="SIGN-IN" class="btn btn-primary" name="login">

    </form>

</div>

</body>

</html>
<?php

    require_once '../includes/dbconfig.php';
    require_once '../includes/sessioncheck.php';
    require_once '../includes/usertype.php';
    require_once '../includes/random.php';
    require_once '../includes/time.inc.php';
    require_once '../includes/header.php';


    if (isset($_POST['add'])){
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $type = checkUser('usertype');
        $faculty = mysqli_real_escape_string($link, $_POST['faculty']);
        $batch = mysqli_real_escape_string($link, $_POST['batch']);
        $status = mysqli_real_escape_string($link,$_POST['status']);

        $salt = generateRandomString(10);

        $p = hash('sha512', $salt . $password . md5($salt));

        $time = time();

            $query = "INSERT INTO  `academic`.`users` (
                        `user_id` ,
                        `username` ,
                        `email` ,
                        `password` ,
                        `salt` ,
                        `faculty` ,
                        `batch` ,
                        `phone` ,
                        `usertype` ,
                        `created_at` ,
                        `status`
                        )
                        VALUES (
                        NULL ,  '$username',  '$email',  '$p',  '$salt',  '$faculty',  '$batch',  '$phone',  '$type',  '$time',  '$status'
                        );";
            $result = mysqli_query($link, $query);
        //echo $query;

    }

    if (isset($_POST['edit'])) {
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $phone = mysqli_real_escape_string($link, $_POST['phone']);
        $type = checkUser('usertype');
        $faculty = mysqli_real_escape_string($link, $_POST['faculty']);
        $batch = mysqli_real_escape_string($link, $_POST['batch']);
        $status = mysqli_real_escape_string($link,$_POST['status']);
        $id = mysqli_real_escape_string($link, $_POST['id']);
        $salt = generateRandomString(10);

        $p = hash('sha512', $salt . $password . md5($salt));

        $time = time();


        $query = "UPDATE `users` SET `username` = '$username',
                                    `email` = '$email',
                                     `password` = '$p',
                                     `phone` = '$phone',
                                     `salt` = '$salt',
                                     `created_at` = '$time',
                                     `usertype` = '$type',
                                     `faculty` = '$faculty',
                                     `batch` = '$batch',
                                     `status` = '$status'
                                     WHERE `user_id` = $id LIMIT 1";

        $result = mysqli_query($link, $query);
    }


?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        

    </head>

    <body>

    <?php
    if (isset($_GET['new']) || isset($_GET['edit'])){
        require_once 'manager/user/userform.php';
    }elseif (isset($_GET['profile'])){
        require 'manager/user/userprofile.php';
    }
    else if(isset($_GET['user'])){
        require_once 'manager/user/userview.php';

    }
    elseif (isset($_GET['question'])){
        require 'manager/question/question.php';
    }
    elseif (isset($_GET['tags'])){
        require 'manager/tag/tags.php';
    }else if(isset($_GET['tprofile'])){
        require 'manager/tag/tagprofile.php';
    }
    else {
        require_once 'manager/user/userview.php';
    }
    ?>
    </body>
</html>
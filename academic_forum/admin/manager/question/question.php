<?php

    require '../includes/dbconfig.php';
    require_once "../includes/sessioncheck.php";

    $sql= "SELECT * FROM questions";
    $result = mysqli_query($link, $sql);

?>

<html>
<head>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
</head>

<body>

    <?php
        require_once '../includes/header.php';
        require_once 'manager/question/questionview.php';
    ?>
</body>
</html>

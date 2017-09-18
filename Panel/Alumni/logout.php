<?php session_start();


$_SESSION['aid'] = "";
session_destroy();

header("Location: " . "../index.php");
exit;

?>


<?php session_start();

include '../../../connection.php';

$_SESSION['id'] = "";
session_destroy();

header("Location: " . "../../index.php");
exit;

?>


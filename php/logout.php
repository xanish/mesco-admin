<?php
session_start();
$_SESSION['user']=false;

header('Location:../login.php');
?>

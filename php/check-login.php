<?php

if($_POST['username'] == 'admin' && $_POST['password'] == 'pass@123'){
    header('Location:../index.php');
    session_start();
    $_SESSION['user'] = true;
    $_SESSION['username'] = $_POST['username'];
}
else{
    header('Location:../login.php?i=1');
}

?>

<?php 
    session_start();
    if(isset($_POST['logout']))
    {
        unset($_SESSION['user']);
        header("location:login.php?logkeluar=1");
    }

?>
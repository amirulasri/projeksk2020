<?php 
    session_start();
    if(isset($_POST['logout']))
    {
        unset($_SESSION['User']);
        header("location:login.php?logkeluar=1");
    }

?>
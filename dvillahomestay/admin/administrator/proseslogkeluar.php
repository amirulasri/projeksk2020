<?php 
    session_start();
    if(isset($_GET['logout']))
    {
        unset($_SESSION['User']);
        header("location:../index.php?info=2");
    }

?>
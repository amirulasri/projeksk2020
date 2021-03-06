<?php 
    session_start();
    if(isset($_POST['logout']))
    {
        unset($_session['user']);
        header("location:login.php?logkeluar=1");
    }

?>
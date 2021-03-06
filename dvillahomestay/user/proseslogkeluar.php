<?php
session_start();
unset($_SESSION['User1']);
header('location: ../index.php?log=1');
?>
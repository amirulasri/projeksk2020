<?php
include '../../../../setup.php';

if(isset($_POST['submit'])){
    $query = "UPDATE adminlogin SET username='admin', password='12345678' WHERE role='root'";
    mysqli_query($conn, $query);
    header('location: resetpasswordberjaya.php?id=1');
}else{
    header('location: index.php');
}
?>
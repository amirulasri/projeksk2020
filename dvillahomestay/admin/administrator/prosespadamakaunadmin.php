<?php
include('../../setup.php');

$username = $_GET['username'];

$querypadamakaunadmin = mysqli_query($conn, "DELETE FROM adminlogin WHERE username = '$username'");

if($querypadamakaunadmin){
    echo '<script>
    alert("Akaun Admin Berjaya Dipadamkan");
    window.location.href="akaunadmin.php";</script>';
}else{
    $ralat = mysqli_error($conn);
    echo '<script>alert("Akaun admin gagal dipadamkan. Ralat: ' . $ralat . '");
    window.location.href="index.php";</script>';
}
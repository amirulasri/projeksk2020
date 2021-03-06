<?php
include('../../setup.php');

$emailpelanggan = $_GET['emailpelanggan'];

$querypadamakaunpelanggan = mysqli_query($conn, "DELETE FROM pelanggan WHERE email = '$emailpelanggan'");

if($querypadamakaunpelanggan){
    echo '<script>
    alert("Akaun Pelanggan Berjaya Dipadamkan");
    window.location.href="akaunpelanggan.php";</script>';
}else{
    $ralat = mysqli_error($conn);
    echo '<script>alert("Akaun pelanggan gagal dipadamkan. Ralat: ' . $ralat . '");
    window.location.href="akaunpelanggan.php";</script>';
}
<?php
include('../../setup.php');

$namapelanggan = $_POST['namapelanggan'];
$email = $_POST['emailpelanggan'];
$notelpelanggan = $_POST['notelpelanggan'];
$katalaluanpelanggan = $_POST['katalaluanpelanggan'];

$querytambahpelanggan = mysqli_query($conn, "INSERT INTO pelanggan VALUES ('$email','$namapelanggan','$notelpelanggan')");

if($querytambahpelanggan){
    $querytambahpelangganlogin = mysqli_query($conn, "INSERT INTO pelangganlogin VALUES ('$email','$katalaluanpelanggan')");
    echo '<script>
    alert("Akaun Pelanggan Berjaya Ditambah");
    window.location.href="akaunpelanggan.php";</script>';
}else{
    $ralat = mysqli_error($conn);
        echo '<script>alert("Gagal mendaftarkan akaun pelanggan baru. Ralat: ' . $ralat . '");
    window.location.href="akaunpelanggan.php";</script>';
}
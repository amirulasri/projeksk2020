<?php
include('../../setup.php');

$emailsemasa = $_POST['emailsemasa'];
$namapelanggan = $_POST['namapelanggan'];
$email = $_POST['emailpelanggan'];
$notelpelanggan = $_POST['notelpelanggan'];
$katalaluanpelanggan = $_POST['katalaluanpelanggan'];

$querytambahpelanggan = mysqli_query($conn, "UPDATE pelanggan SET namapelanggan='$namapelanggan', email='$email', notelpelanggan='$notelpelanggan' WHERE email='$emailsemasa'");

if($querytambahpelanggan){
    $querytambahpelangganlogin = mysqli_query($conn, "UPDATE pelangganlogin SET katalaluan='$katalaluanpelanggan' WHERE email='$email'");
    echo '<script>
    alert("Akaun Pelanggan Berjaya Dikemaskini");
    window.location.href="akaunpelanggan.php";</script>';
}else{
    $ralat = mysqli_error($conn);
        echo '<script>alert("Gagal mengemaskini akaun pelanggan. Ralat: ' . $ralat . '");
    window.location.href="akaunpelanggan.php";</script>';
}
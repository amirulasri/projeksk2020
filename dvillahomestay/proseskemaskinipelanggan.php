<?php
include('setup.php');

$emailsemasa = $_POST['emailsemasa'];
$namapelanggan = $_POST['namapelanggan'];
$email = $_POST['emailpelanggan'];
$notelpelanggan = $_POST['notelpelanggan'];
$katalaluan = $_POST['katalaluan'];

$queryupdatepelanggan = mysqli_query($conn, "UPDATE pelanggan SET email='$email', namapelanggan='$namapelanggan', notelpelanggan='$notelpelanggan' WHERE email='$emailsemasa'");
if ($queryupdatepelanggan) {
    $queryupdatelogin = mysqli_query($conn, "UPDATE pelangganlogin SET katalaluan='$katalaluan' WHERE email='$email'");
    if ($queryupdatelogin) {
        echo '<script>alert("Kemaskini Data Pelanggan Berjaya!. Sila log masuk semula.");
    window.location.href="user/proseslogkeluar.php";</script>';
    } else {
        $ralat = mysqli_error($conn);
        echo '<script>alert("Kemaskini Data Pelanggan Gagal!. Ralat: ' . $ralat . '");
    window.location.href="index.php";</script>';
    }
} else {
    $ralat = mysqli_error($conn);
    echo '<script>alert("Kemaskini Data Pelanggan Gagal!. Ralat: ' . $ralat . '");
    window.location.href="index.php";</script>';
}

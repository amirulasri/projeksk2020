<?php
include('setup.php');

$emailpelanggan = $_POST['emailpelanggan'];
$katalaluan = $_POST['katalaluan'];

$queryperiksakatalaluan = mysqli_query($conn, "SELECT * FROM pelangganlogin WHERE email='$emailpelanggan' AND katalaluan='$katalaluan'");
if (mysqli_num_rows($queryperiksakatalaluan) > 0) {
    $querypadamakaun = mysqli_query($conn, "DELETE FROM pelanggan WHERE email = '$emailpelanggan'");
    if ($querypadamakaun) {
        session_start();
        unset($_SESSION['User1']);
        echo '<script>alert("Akaun berjaya dipadamkan. Kembali ke laman utama");
        window.location.href="index.php";</script>';
    } else {
        $ralat = mysqli_error($conn);
        echo '<script>alert("Akaun gagal dipadamkan!. Ralat: ' . $ralat . '");
        window.location.href="index.php";</script>';
    }
} else {
    echo '<script>alert("Kata laluan yang anda masukkan SALAH!");
        window.location.href="index.php";</script>';
}

<?php
include('../../setup.php');

$namaadmin = $_POST['namaadmin'];
$username = $_POST['username'];
$katalaluanadmin = $_POST['katalaluan'];
$role = $_POST['role'];

$querytambahadmin = mysqli_query($conn, "INSERT INTO adminlogin VALUES ('$username','$katalaluanadmin','$namaadmin','$role')");

if($querytambahadmin){
    echo '<script>
    alert("Akaun Admin Berjaya Ditambah");
    window.location.href="akaunadmin.php";</script>';
}else{
    $ralat = mysqli_error($conn);
        echo '<script>alert("Gagal mendaftarkan akaun admin baru. Ralat: ' . $ralat . '");
    window.location.href="akaunadmin.php";</script>';
}
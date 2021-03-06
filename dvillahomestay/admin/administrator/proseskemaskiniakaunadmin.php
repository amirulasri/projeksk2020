<?php
include('../../setup.php');

$usernamesemasa = $_POST['usernamesemasa'];
$namaadmin = $_POST['namaadmin'];
$username = $_POST['username'];
$katalaluanadmin = $_POST['katalaluan'];
$role = $_POST['role'];

$querykemaskiniadmin = mysqli_query($conn, "UPDATE adminlogin SET namaadmin='$namaadmin', username='$username', password='$katalaluanadmin', role='$role' WHERE username='$usernamesemasa'");

if($querykemaskiniadmin){
    echo '<script>
    alert("Akaun Admin Berjaya Dikemaskini");
    window.location.href="akaunadmin.php";</script>';
}else{
    $ralat = mysqli_error($conn);
        echo '<script>alert("Gagal mengemaskini akaun admin. Ralat: ' . $ralat . '");
    window.location.href="index.php";</script>';
}
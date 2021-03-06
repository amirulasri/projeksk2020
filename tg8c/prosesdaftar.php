<?php
include('settings.php');

$id = $_POST['id'];
$katalaluan = $_POST['katalaluan'];

if (empty($id)) {
    header('location:login.php');
}
if (empty($katalaluan)) {
    header('location:login.php');
} else {
    $query1 = "INSERT INTO loginpelanggan (id, katalaluan, kppelanggan) VALUES ('$id', '$katalaluan','')";

    mysqli_query($conn, $query1);

    header('location: login.php?daftarberjaya=1');
}
?>

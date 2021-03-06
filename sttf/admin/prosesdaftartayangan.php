<?php
include('../settings.php');
session_start();

if (isset($_SESSION['admin'])) {
    $namatayangan = $_POST['namatayangan'];
    $hargatayangan = $_POST['harga'];

    $query = "INSERT INTO tayangan (idtayangan,namatayangan,harga) VALUES (null,'$namatayangan','$hargatayangan')";
    mysqli_query($conn, $query);
    header('location: daftartayangan.php?berjaya=1');
} else {
    header("location:login.php?fail=1");
}
?>
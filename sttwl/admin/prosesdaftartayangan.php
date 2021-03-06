<?php
include('../settings.php');
session_start();

if (isset($_SESSION['admin'])) {
    $namatayangan = $_POST['namatayangan'];
    $hargatayangan = $_POST['hargatayangan'];

    $query = "INSERT INTO tayangan (namatayangan) VALUES ('$namatayangan')";
    mysqli_query($conn, $query);
    header('location: daftartayangan.php?berjaya=1');
} else {
    header("location:login.php?fail=1");
}
?>
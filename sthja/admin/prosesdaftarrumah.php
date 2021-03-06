<?php
include('../settings.php');
session_start();

if (isset($_SESSION['admin'])) {
    $pemandangan = $_POST['pemandangan'];
    $namarumah = $_POST['namarumah'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO rumah (idrumah,pemandangan,namarumah,harga) VALUES (null,'$pemandangan','$namarumah','$harga')";
    $result = mysqli_query($conn, $query);
    if($result){
        header('location: daftarrumah.php?berjaya=1');
    }else{
        header('location: daftarrumah.php?gagal=1');
    }
} else {
    header("location:login.php?fail=1");
}
?>
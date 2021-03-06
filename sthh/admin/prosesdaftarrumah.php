<?php
include('../settings.php');
session_start();

if (isset($_SESSION['admin'])) {
    $namarumah = $_POST['namarumah'];
    
    $query = "INSERT INTO rumah (idrumah,namarumah) VALUES (null,'$namarumah')";
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
<?php
include('settings.php');

session_start();

if (isset($_SESSION['User'])) {
    $kppelanggan = $_POST['kppelanggan'];
    $tarikhmasuk = $_POST['tarikhmasuk'];
    $idrumah = $_POST['idrumah'];
    $jumlahhari = $_POST['jumlahhari'];
    $jumlahharga = $_POST['jumlahharga'];

    if(empty($kppelanggan)){
        header('location: tempah.php?gagal=1');
    }
    if(empty($idrumah)){
        header('location: tempah.php?gagal=1');
    }else{
        $result = mysqli_query($conn, "INSERT INTO tempahan (kppelanggan, idrumah, jumlahhari, tarikhmasuk, jumlahharga) VALUES ('$kppelanggan', '$idrumah', '$jumlahhari', '$tarikhmasuk', '$jumlahharga')");
        if($result){
            header('location: index2.php?berjayatempah=1');
        }else{
            header('location: index2.php?gagaltempahkp=1');
        }
        
    }
} else {
    header("location:login.php?fail=1");
}
?>
<?php
include('settings.php');
session_start();

if (isset($_SESSION['User'])) {
    if (isset($_POST['submit'])) {
        $namapelanggan = $_POST['namapelanggan'];
        $kppelanggan = $_POST['kppelanggan'];
        $nombortelefon = $_POST['notelpelanggan'];
        $emailpelanggan = $_POST['emailpelanggan'];
        $umur = $_POST['umur'];
        
        //DAPATKAN NAMA PENGGUNA
        $namapengguna = $_SESSION['User'];

        //UPDATE LOGINPELANGGAN
        if(!empty($kppelanggan)){
            $query = mysqli_query($conn, "INSERT INTO pelanggan (kppelanggan, umur, namapelanggan, emailpelanggan, notelpelanggan) VALUES ('$kppelanggan', '$umur', '$namapelanggan', '$emailpelanggan', '$notelpelanggan')");
            if ($query) {
                mysqli_query($conn, "UPDATE loginpelanggan SET kppelanggan='$kppelanggan' WHERE id='$namapengguna'");
                header('location: index.php?berjayadaftar=1');
            } else {
                header('location: index.php?gagaldaftarkp=1');
            }
        }

    }
} else {
    header("location:login.php?fail=1");
}

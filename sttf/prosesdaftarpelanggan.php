<?php
include('settings.php');
session_start();

if (isset($_SESSION['User'])) {
    if (isset($_POST['submit'])) {
        $namapelanggan = $_POST['namapelanggan'];
        $kppelanggan = $_POST['kppelanggan'];
        $nombortelefon = $_POST['nombortelefon'];
        
        $jantina = $_POST['jantina'];
        
        //DAPATKAN NAMA PENGGUNA
        $namapengguna = $_SESSION['User'];

        //UPDATE LOGINPELANGGAN
        if(!empty($kppelanggan)){
            $query = mysqli_query($conn, "INSERT INTO pelanggan (kppelanggan, jantina, namapelanggan, notelpelanggan) VALUES ('$kppelanggan', '$jantina', '$namapelanggan', '$nombortelefon')");
            if ($query) {
                mysqli_query($conn, "UPDATE loginpelanggan SET kppelanggan='$kppelanggan' WHERE id='$namapengguna'");
                header('location: index2.php?berjayadaftar=1');
            } else {
                header('location: index2.php?gagaldaftarkp=1');;
            }
        }

    }
} else {
    header("location:login.php?fail=1");
}

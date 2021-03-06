<?php
include('settings.php');

session_start();

if (isset($_SESSION['User'])) {
    $kppelanggan = $_POST['kppelanggan'];
    $tarikhtayangan = $_POST['tarikhtayangan'];
    $idtayangan = $_POST['idtayangan'];
    $jumlahtiket = $_POST['jumlahtiket'];
    $jumlahharga = $_POST['jumlahharga'];

    if(empty($kppelanggan)){
        header('location: tempah.php?gagal=1');
    }
    if(empty($idtayangan)){
        header('location: tempah.php?gagal=1');
    }else{
        $result = mysqli_query($conn, "INSERT INTO tempahan (kppelanggan, idtayangan, jumlahtiket, tarikhtayangan, jumlahharga) VALUES ('$kppelanggan', '$idtayangan', '$jumlahtiket', '$tarikhtayangan', '$jumlahharga')");
        if($result){
            header('location: index.php?berjayatempah=1');
        }else{
            header('location: index.php?gagaltempahkp=1');
        }
        
    }
} else {
    header("location:login.php?fail=1");
}
?>
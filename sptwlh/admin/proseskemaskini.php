<?php
include('../settings.php');
session_start();
if (isset($_SESSION['admin'])) {
    $idtempahan = $_POST['idtempahan'];
    $idtayangan = $_POST['idtayangan'];
    $jumlahtiket = $_POST['jumlahtiket'];
    $tarikhtayangan = $_POST['tarikhtayangan'];
    $jumlahharga = $_POST['jumlahharga'];

    if(!empty($idtempahan)){
        mysqli_query($conn, "UPDATE tempahan SET idtayangan='$idtayangan', jumlahtiket='$jumlahtiket', tarikhtayangan='$tarikhtayangan', jumlahharga='$jumlahharga' WHERE idtempahan = '$idtempahan'");
        header('location: carian.php?berjayakemaskini=1');
    }else{
        header('location: carian.php?gagalkemaskini=4');
    }
} else {
    header("location:login.php?fail=1");
}
?>
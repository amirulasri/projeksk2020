<?php
include('../settings.php');
session_start();
if (isset($_SESSION['admin'])) {
    $idtempahan = $_POST['idtempahan'];
    $idrumah = $_POST['idrumah'];
    $jumlahhari = $_POST['jumlahhari'];
    $tarikhmasuk = $_POST['tarikhmasuk'];
    $jumlahharga = $_POST['jumlahharga'];

    if(!empty($idtempahan)){
        $result = mysqli_query($conn, "UPDATE tempahan SET idrumah='$idrumah', jumlahhari='$jumlahhari', tarikhmasuk='$tarikhmasuk', jumlahharga='$jumlahharga' WHERE idtempahan = '$idtempahan'");
        if($result){            
            header('location: carian.php?berjayakemaskini=1');
        }else{
            header('location: carian.php?gagalkemaskini=4');
        }
    }else{
        header('location: carian.php?gagalkemaskini=4');
    }
} else {
    header("location:login.php?fail=1");
}
?>
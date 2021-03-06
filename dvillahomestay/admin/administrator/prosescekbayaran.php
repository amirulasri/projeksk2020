<?php
include '../../setup.php';

//DAPATKAN DATA
$cekbayaran = $_GET['cek'];
$idtempahan = $_GET['id'];
$lainlaincek = $_GET['inputcek'];

if(empty($cekbayaran)){
    $cekbayaran = $lainlaincek;
}

//PROSES MENGEMASKINI STATUS BAYARAN
$query = mysqli_query($conn, "UPDATE tempahan SET statusbayaran='$cekbayaran' WHERE idtempahan ='$idtempahan'");
if($query){
    header ('location: cariantempahan.php?info=2&id='.$idtempahan);
}else{
    $ralat = $conn->error;
    header ('location: cariantempahan.php?info=4&id='.$idtempahan.'&ralat='.$ralat);
}
?>
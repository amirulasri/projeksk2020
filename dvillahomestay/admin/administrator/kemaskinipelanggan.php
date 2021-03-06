<?php
include '../../setup.php';

$idrumah = $_POST['idrumah'];
$idtempahan = $_POST['idtempahan'];
$nokppelanggan = $_POST['nokppelanggan'];
$tarikhmasuk = $_POST['tarikhmasuk'];
$tarikhkeluar = $_POST['tarikhkeluar'];
$jumlahharga = $_POST['jumlahharga'];
$bildewasa = $_POST['bildewasa'];
$bilkanakkanak = $_POST['bilkanakkanak'];

//PENGIRAAN HARGA SEMULA:
$query_mysqli = mysqli_query($conn, "SELECT * FROM rumah WHERE idrumah='$idrumah'");

while ($query = mysqli_fetch_array($query_mysqli)) {

    //MEMBEZAKAN TARIKH MASUK DAN TARIKH KELUAR DALAM HARI

    date_default_timezone_set('Asia/Kuala_Lumpur');

    $date1 = date_create($tarikhmasuk);
    $date2 = date_create($tarikhkeluar);
    $diff = date_diff($date1, $date2);
    $bilanganhari = $diff->format("%R%a");

    //PENGIRAAN BERLAKU DISINI

    $a = $query['hargarumah'];
    $b = $bilanganhari;

    $jumlahharga =$a * $b;

}

//MASUK KE DALAM DATABASE:
$sql = "UPDATE tempahan SET idrumah='$idrumah', tarikhmasuk='$tarikhmasuk', tarikhkeluar='$tarikhkeluar', bildewasa='$bildewasa', bilkanakkanak='$bilkanakkanak', jumlahharga='$jumlahharga' WHERE idtempahan='$idtempahan'";

if ($conn->query($sql) === true) {
    header('location: tempahanpelanggan.php?info=1&idt='.$idtempahan);
} else {
    $ralat = $conn->error;
    header('location: tempahanpelanggan.php?info=2&idt='.$idtempahan.'&ralat='.$ralat);
}

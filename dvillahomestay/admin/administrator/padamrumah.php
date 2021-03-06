<?php
include '../../setup.php';

$idrumah = $_GET['id'];

$sql = "DELETE FROM rumah WHERE idrumah='$idrumah'";

if ($conn->query($sql) === TRUE) {
    unlink('../../gambarrumah/gambar'.$idrumah.'.jpg');
    header('location: senarairumah.php?info=3&idrumah='.$idrumah);
} else {
    $ralat = $conn->error;
    header('location: senarairumah.php?info=6&ralat='.$ralat.'');
}
?>
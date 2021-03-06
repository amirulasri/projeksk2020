<?php
include '../../setup.php';

$idrumah = $_POST['idrumah'];
$namarumah = $_POST['namarumah'];
$hargarumah = $_POST['hargarumah'];

$sql = "UPDATE rumah SET namarumah='$namarumah', hargarumah='$hargarumah' WHERE idrumah='$idrumah'";

if ($conn->query($sql) === TRUE) {
    move_uploaded_file($_FILES['file']['tmp_name'], '../../gambarrumah/'. "gambar$idrumah.jpg");
    header('location: senarairumah.php?info=1&idrumah='.$idrumah);
} else {
    $ralat = $conn->error;
    header('location: senarairumah.php?info=7&ralat='.$ralat);
}
?>
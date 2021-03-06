<?php
include '../../setup.php';
$namarumah = $_POST['namarumah'];
$hargarumah = $_POST['hargarumah'];
$sql = "INSERT INTO rumah (idrumah, namarumah, hargarumah) VALUES (NULL, '$namarumah', '$hargarumah')";
if ($conn->query($sql) === TRUE) {
    $lastid = mysqli_insert_id($conn);
    move_uploaded_file($_FILES['file']['tmp_name'], '../../gambarrumah/'."gambar$lastid.jpg");
    header('location: senarairumah.php?info=2&idrumah='.$lastid.'');
} else {
    $ralat = $conn->error;
    header('location: senarairumah.php?info=8&ralat='.$ralat);
}
?>
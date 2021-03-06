<?php
include '../../setup.php';

$idtempahan = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM tempahan WHERE idtempahan='$idtempahan'");
if($query){
    header ("location: cariantempahan.php?info=3&id=".$idtempahan);
}else{
    $ralat = $conn->error;
    header ("location: cariantempahan.php?info=5&id=".$idtempahan."&ralat=$ralat");
}
?>
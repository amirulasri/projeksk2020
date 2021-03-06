<?php
include('../settings.php');
session_start();

if (isset($_SESSION['admin'])) {
    if(empty($_GET['id'])){
        header('location: carian.php');
    }else{
        $idtempahan = $_GET['id'];
        $query = "DELETE FROM tempahan WHERE idtempahan = '$idtempahan'";
        $result = mysqli_query($conn, $query);
        if($result){
            header('location: carian.php?berjaya=1');
        }else{
            header('location: carian.php?gagal=1');
        }
    }
} else {
    header("location:login.php?fail=1");
}
?>
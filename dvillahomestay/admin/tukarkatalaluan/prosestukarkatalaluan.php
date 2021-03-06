<?php
include '../../setup.php';

$idadminbaru = $_POST['idadminbaru'];
$katalaluanlama = $_POST['katalaluanlama'];
$katalaluan1 = $_POST['katalaluan1'];
$katalaluan2 = $_POST['katalaluan2'];

if(!empty($idadminbaru)){
    if(!empty($katalaluanlama)){
        $select = mysqli_query($conn, "SELECT * FROM adminlogin WHERE password='$katalaluanlama' AND role='root'");
        $count = mysqli_num_rows($select);
        if($count == 1){
            if($katalaluan1 == $katalaluan2){
                $query = mysqli_query($conn, "UPDATE adminlogin SET username='$idadminbaru', password='$katalaluan1' WHERE role='root'");
                header('location: index.php?info=1');
            }else{
                header('location: index.php?info=2');
            }
        }else{
            header('location: index.php?info=3');
        }
    }
}else{
    if(!empty($katalaluanlama)){
        $select = mysqli_query($conn, "SELECT * FROM adminlogin WHERE password='$katalaluanlama' AND role='root'");
        $count = mysqli_num_rows($select);
        if($count == 1){
            if($katalaluan1 == $katalaluan2){
                $query = mysqli_query($conn, "UPDATE adminlogin SET password='$katalaluan1' WHERE role='root'");
                header('location: index.php?info=1');
            }else{
                header('location: index.php?info=2');
            }
        }else{
            header('location: index.php?info=3');
        }
    }
}
?>
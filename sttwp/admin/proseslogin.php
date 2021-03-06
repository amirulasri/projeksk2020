<?php
include('../settings.php');
session_start();
if (empty($_POST['id']) || empty($_POST['password'])) {
    header("location:index.php?sss=1");
} else {
    $query = "SELECT * FROM admin WHERE BINARY id='" . $_POST['id'] . "' AND katalaluan='" . $_POST['password'] . "'";
    $result = mysqli_query($conn, $query);

    if (mysqli_fetch_assoc($result)) {
        $_SESSION['admin'] = $_POST['id'];
        header("location: index.php");
    } else {
        header("location: login.php?gagal=1");
    }
}

<?php
require_once('../setup.php');
session_start();
if (isset($_POST['Login'])) {
    if (empty($_POST['id']) || empty($_POST['password'])) {
        header("location:index.php");
    } else {
        $query = "SELECT * FROM adminlogin WHERE BINARY username='" . $_POST['id'] . "' AND password='" . $_POST['password'] . "'";
        $result = mysqli_query($connect, $query);

        if (mysqli_fetch_assoc($result)) {
            $_SESSION['User'] = $_POST['id'];
            header("location: administrator/index.php");
        } else {
            header("location: index.php?info=1");
        }
    }
} else {
    header('location: index.php');
}

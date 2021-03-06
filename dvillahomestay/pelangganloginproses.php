<?php
require_once('setup.php');
session_start();
if (isset($_POST['Login'])) {
    if (empty($_POST['email']) || empty($_POST['katalaluan'])) {
        header("location: loginpelanggan.php?info=3");
    } else {
        $query = "SELECT * FROM pelangganlogin WHERE BINARY email='" . $_POST['email'] . "' AND katalaluan='" . $_POST['katalaluan'] . "'";
        $result = mysqli_query($connect, $query);
        if (mysqli_fetch_assoc($result)) {
            $email = $_POST['email'];
            $_SESSION['User1'] = $email;
            header("location: index.php");
        } else {
            header("location: loginpelanggan.php?info=1&email=" . $_POST['email'] . "");
        }
    }
} else {
    echo "<script>window.location.href='index.php'</script>";
}

<?php
error_reporting(E_ERROR | E_PARSE);
include 'setup.php';

if (($conn->connect_errno) != 1049) {
    echo "<script>window.location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta name="description" content="D'Villa Homestay menyediakan rumah tumpangan dengan harga yang terendah! Lawati sekarang!">
    <meta name="keywords" content="DVilla, Homestay, Homestay murah, Bajet, Homestay bajet">
    <meta name="author" content="Amirul Asri">
    <meta property="og:image" content="" />
    <meta property="og:title" content="DvillaHomestay - Tempah homestay mengikut bajet ideal anda" />
    <meta property="og:description" content="Amirul Asri - Rujukan SPM Sains Komputer" />
    <title>D'Villa Homestay</title>
    <link rel="stylesheet" href="user/style/sambungangagalstyle.css" type="text/css">
    <link rel="stylesheet" href="style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="style/loader.css">
    <link rel="shortcut icon" type="image/x-icon" href="style/favicon.ico">
    <script src="jquery/jquery.js"></script>
</head>

<body onload="semakloginstatus()">
    <br>
    <div class="boranglogin">
        <div class="boranglogindalam">
            <div class="logininput">
                <h3 class="titlecolor">Selamat datang ke D'Villa Homestay setup</h3>
                <p class="titlecolor">Pangkalan data <b>dvillahomestay</b> tidak ditemui, Mungkin ini adalah kali pertama anda ingin menjalankan Web Aplikasi D'Villa Homestay<br>Untuk permulaan, Klik butang di bawah</p>
                <a href="firststart2.php" role="button" class="btn btn-primary">Jom Mulakan!</a>
            </div>
        </div>
    </div>
    <div class="loader-wrapper">
        <h1 class="textcolor">D'Villa Homestay</h1>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>

</html>
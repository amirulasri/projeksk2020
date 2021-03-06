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
    <meta name="description"
        content="D'Villa Homestay menyediakan rumah tumpangan dengan harga yang terendah! Lawati sekarang!">
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
                <h3 class="titlecolor">Setup Admin</h3>
                <p class="titlecolor">Masukkan ID admin dan Kata Laluan admin yang baru. Ia digunakan untuk melog masuk
                    dan mengawal data D'Villa Homestay. Tetapan lalai akan digunakan adalah: <br> ID: admin  Katalaluan: 12345678</p>
                <form action="ciptadb.php" method="POST">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label titlecolor">ID Admin Baru</label>
                        <div class="col-sm-10">
                            <input type="text" name="adminid" class="form-control" value="admin">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label titlecolor">Kata Laluan Admin Baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="adminpass" value="12345678" id="inputPassword">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan dan Mulakan Sistem!</button>
                </form>
            </div>
        </div>
    </div>
    <div class="loader-wrapper">
        <h1 class="textcolor">D'Villa Homestay</h1>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function () {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>

</html>
<?php
include('../../setup.php');

session_start();

if (isset($_SESSION['User'])) {
} else {
    header("location:../index.php");
}

//CHECK ROLE
$adminuser = $_SESSION['User'];
$queryrole = mysqli_query($conn, "SELECT * FROM adminlogin WHERE username='$adminuser'");
while ($dataadmin = mysqli_fetch_array($queryrole)) {
    $roleadmin = $dataadmin['role'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>D'Villa Homestay</title>
    <link rel="stylesheet" href="../style/administrator.css" type="text/css">
    <link rel="stylesheet" href="../style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../../style/loader.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../style/favicon.ico">
    <script src="../../jquery/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</head>

<body>

    <div class="loader-wrapper">
        <h1 class="textcolor">D'Villa Homestay</h1>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <!-- Modal log keluar -->
    <div class="modal fade" id="logkeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log keluar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Adakah anda pasti ingin mengelog keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="proseslogkeluar.php?logout=1" role="button" class="btn btn-danger">Ya, log keluar</a>
                </div>
            </div>
        </div>
    </div>

    <header>
        <a href="#" class="logo">ADMINISTRATOR</a>
        <div class="menu-toggle" onclick="tukaricon(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav class="hidenav">
            <ul>
                <li><a href="tempahanpelanggan.php">Senarai tempahan keseluruhan</a></li>
                <li><a href="daftarrumah.php">Daftar rumah</a></li>
                <li><a href="senarairumah.php">Senarai rumah</a></li>
                <li><a href="cariantempahan.php">Carian</a></li>
                <li><a href="#" data-toggle="modal" data-target="#logkeluar">Log keluar</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <script>
        $(document).ready(function() {
            $('.menu-toggle').click(function() {
                $('.menu-toggle').toggleClass('active')
                $('nav').toggleClass('active')
            })
        })

        function tukaricon(x) {
            x.classList.toggle("change");
        }
    </script>
    <div class="boranglogin">
        <div class="boranglogindalam">
            <div class="logininput">
                <h2 class="titlecolor">Kini berada dalam tetapan Admin.<br> </h2>
                <p class="titlecolor">Amirul Asri 5 Fikrah SMK Jalan Tiga 2020</p>
                <p class="titlecolor">D'Villa Homestay 2020</p>
                <br>
                <a style="width: 100%;" href="tempahanpelanggan.php" role="button" class="btn btn-info">Lihat senarai tempahan keseluruhan pengguna</a><br>
                <a href="akaunadmin.php" role="button" class="btn btn-primary" <?php if ($roleadmin == 'root' or $roleadmin == 'administrator') {
                                                                                    echo "style='width: 100%; margin-top:10px;'";
                                                                                } else {
                                                                                    echo "style='display:none;'";
                                                                                } ?>>Akaun Admin</a><br>
                <a href="akaunpelanggan.php" role="button" class="btn btn-success" <?php if ($roleadmin == 'root' or $roleadmin == 'administrator') {
                                                                                    echo "style='width: 100%; margin-top:10px;'";
                                                                                } else {
                                                                                    echo "style='display:none;'";
                                                                                } ?>>Akaun Pelanggan</a><br>
            </div>
        </div>
    </div>
</body>

</html>
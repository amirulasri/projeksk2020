<?php
include 'setup.php';

if (($conn->connect_errno) == 1049) {
    echo "<script>window.location.href='firststart.php'</script>";
} else if (($conn->connect_errno) == 2002) {
    echo "<script>window.location.href='gagalsambungan.html'</script>";
}

$statuslogin = "";

session_start();
if (isset($_SESSION['User1'])) {
    $statuslogin = 1;
} else {
    $statuslogin = 0;
}

//Dapatkan data pelanggan
$emailpelanggan = $_SESSION['User1'];
$querydatapelanggan = mysqli_query($conn, "SELECT * FROM pelanggan INNER JOIN pelangganlogin ON pelanggan.email = pelangganlogin.email WHERE pelangganlogin.email = '$emailpelanggan'");
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
    <meta property="og:title" content="D'villa Homestay - Sistem PHP tempahan Homestay oleh Amirul Asri" />
    <meta property="og:description" content="Amirul Asri - SPM Sains Komputer 2020" />
    <title>D'Villa Homestay</title>
    <link rel="stylesheet" href="user/style/welcomestyle.css" type="text/css">
    <link rel="stylesheet" href="style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="user/style/navbar.css">
    <link rel="stylesheet" href="style/loader.css">
    <link rel="shortcut icon" type="image/x-icon" href="style/favicon.ico">
    <script src="jquery/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
        #background {
            position: absolute;
            left: 0px;
            top: 0px;
            background-size: cover;
            width: 100%;
            height: 100vh;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -o-user-select: none;
            user-select: none;
            z-index: -10000;
        }
    </style>
</head>

<body onload="semakloginstatus()">
    <!-- Bahagian popup log keluar -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Log Keluar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Adakah anda pasti ingin mengelog keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="user/proseslogkeluar.php" role="button" class="btn btn-danger">Log keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Popup tukar saiz text -->
    <div class="modal fade" id="ubahsaiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah saiz teks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pilih saiz: <select name="zoom" class="form-control" id="zoom" required="required" onchange="tukarsaizteks()">
                        <option value="2" selected>Lalai</option>
                        <option style="font-size: 14px;" value="1">Kecil</option>
                        <option style="font-size: 20px;" value="3">Sederhana</option>
                        <option style="font-size: 30px;" value="4">Besar</option>
                    </select>
                    <input type="hidden" value="" id="idsaiz">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bahagian popup gagal tempah rumah -->
    <div class="modal fade" id="gagaltempah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tempahan Gagal Dibuat!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Ada sesuatu yang tidak kena dengan pelayan kami. Sila cuba kemudian.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal mesej berjaya log keluar -->
    <div class="modal fade" id="logkeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log Keluar Berjaya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Log keluar berjaya, kembali ke laman login pelanggan.
                </div>
            </div>
        </div>
    </div>
    <!-- Modal akaun pelanggan -->
    <div class="modal fade" id="akaunpelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="proseskemaskinipelanggan.php" name="form1" method="post" onsubmit="return confirm('Adakah anda pasti ingin mengemaskini data akaun anda?')">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Akaun Saya</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="emailsemasa" value="<?php echo $emailpelanggan; ?>">
                    <?php
                    while ($datapelanggan = mysqli_fetch_array($querydatapelanggan)) {
                    ?>
                        <div class="modal-body">
                            <label for="">Nama:</label>
                            <input type="text" name="namapelanggan" value="<?php echo $datapelanggan['namapelanggan']; ?>" class="form-control"><br>
                            <label for="">E-Mel:</label>
                            <input type="email" name="emailpelanggan" value="<?php echo $_SESSION['User1']; ?>" class="form-control"><br>
                            <label for="">Nombor Telefon:</label>
                            <input type="tel" name="notelpelanggan" value="<?php echo $datapelanggan['notelpelanggan']; ?>" pattern="[0-9]{10,11}" class="form-control"><br>
                            <label for="">Kata Laluan:</label>
                            <input type="password" name="katalaluan" value="<?php echo $datapelanggan['katalaluan']; ?>" class="form-control">
                            <p class="alert" id="kurang" style="display: none; color:red;">Kata laluan yang anda masukkan kurang dari 8 aksara</p>
                            <p class="alert" id="lebih" style="display: none; color:red;">Kata laluan yang anda masukkan lebih dari 20 aksara</p>
                            <br><button style="width: 100%;" role="button" type="button" onclick="paparmodalpadamakaun()" class="btn btn-danger"><b>PADAM AKAUN</b></button>
                        <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <a href="" role="button" class="btn btn-secondary">Batal</a>
                            <button type="submit" onclick="return stringlength(document.form1.katalaluan,8,20)" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL PADAM AKAUN -->
    <div class="modal fade" id="padamakaun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="prosespadamakaun.php" method="post">
                <input type="hidden" name="emailpelanggan" value="<?php echo $emailpelanggan; ?>" class="form-control">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">PADAM AKAUN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Adakah anda pasti ingin memadam akaun D'Villa ini? Sebaik sahaja anda padam akaun, data tempahan tidak akan dapat dipulihkan semula.</p>
                        <label for="">Untuk Meneruskan, masukkan kata laluan anda:</label>
                        <input type="password" name="katalaluan" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="tutupmodalpadamakaun()">Kembali</button>
                        <button type="submit" href="prosespadamakaun.php" class="btn btn-danger">PADAM AKAUN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?php echo $statuslogin; ?>" id="statuslogin">
    <header>
        <a href="#" class="logo">D'Villa Homestay</a>
        <div class="menu-toggle" onclick="tukaricon(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav class="hidenav">
            <ul>
                <li><a href="user/index.php">Tempah sekarang</a></li>
                <li><a href="user/senaraitempahan.php" class="status" style="display: none">Tempahan saya</a></li>
                <li><a href="#" role="button" data-toggle="modal" data-target="#ubahsaiz">Ubah saiz</a></li>
                <li><a href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter" class="status" style="display: none">Log Keluar</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <div id="background"></div>
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
    <script>
        function paparmodalpadamakaun() {
            $('#padamakaun').modal('show');
            $('#akaunpelanggan').modal('hide');
        }

        function tutupmodalpadamakaun() {
            $('#padamakaun').modal('hide');
            $('#akaunpelanggan').modal('show');
        }
    </script>
    <script>
        function stringlength(inputtxt, minlength, maxlength) {
            var field = inputtxt.value;
            var mnlen = minlength;
            var mxlen = maxlength;

            if (field.length < mnlen) {
                document.getElementById("lebih").style.display = "none";
                document.getElementById("kurang").style.display = "block";
                return false;
            } else if (field.length > mxlen) {
                document.getElementById("kurang").style.display = "none";
                document.getElementById("lebih").style.display = "block";
                return false;
            }
        }
    </script>
    <?php
    if (isset($_GET['log'])) {
        echo "<script>$('#logkeluar').modal('show');</script>";
    } elseif (isset($_GET['error'])) {
        echo "<script>$('#gagaltempah').modal('show');</script>";
    }
    ?>
    <div class="boranglogin">
        <div class="boranglogindalam">
            <div class="logininput">
                <p style="color: white;"><?php if ($statuslogin == 1) {
                                                echo "Anda dilog masuk sebagai: " . $_SESSION['User1'];
                                            } ?></p>
                <h2 class="titlecolor">Selamat datang ke D'Villa.<br> Tempah homestay mengikut bajet ideal anda.</h2>
                <p class="titlecolor">Amirul Asri - D'villa Homestay 2020</p>
                <br>
                <a href="user/index.php" role="button" class="btn btn-success" style="width: 100%;">Tempah Sekarang!</a>
                <br><a href="loginpelanggan.php" <?php if ($statuslogin == 1) {
                                                        echo "style='display:none;'";
                                                    } ?>>Sudah mempunyai akaun? Log masuk</a><br>

                <button class="btn btn-primary" data-toggle="modal" data-target="#akaunpelanggan" <?php if ($statuslogin == 0) {
                                                                                                        echo "style='display:none;'";
                                                                                                    } else {
                                                                                                        echo "style='width:100%;'";
                                                                                                    } ?>>Akaun Saya</button>
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
    <script>
        function semakloginstatus() {
            var statuslogin = document.getElementById("statuslogin").value;
            if (statuslogin == 1) {
                var x = document.querySelectorAll(".status");
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].style = "dislay: block;";
                }
            }
        }
    </script>
    <script>
        function tukarsaizteks() {
            var idsaiz = document.getElementById('zoom').value;
            var zoom = "";
            if (idsaiz == 1) {
                zoom = "80%";
            } else if (idsaiz == 2) {
                zoom = "100%";
            } else if (idsaiz == 3) {
                zoom = "120%";
            } else if (idsaiz == 4) {
                zoom = "130%";
            } else if (idsaiz == 5) {
                zoom = "140%";
            }
            document.body.style = "zoom:" + zoom + ";";
        }
    </script>
    <script type="text/javascript">
        $(function() {
            var images = ['background/bg1.jpg', 'background/bg2.jpg', 'background/bg3.jpg', 'background/bg4.jpg'];
            $('#background').css({
                'background-image': 'url(' + images[Math.floor(Math.random() * images.length)] + ')',
            });
        });
    </script>
</body>

</html>
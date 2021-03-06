<?php
include '../setup.php';

$statuslogin = "";

session_start();
if (isset($_SESSION['User1'])) {
    $statuslogin = 1;
} else {
    $statuslogin = 0;
}

$idrumah = $_GET['idrumah'];
$tarikhmasuk = $_GET['tarikhmasuk'];
$tarikhkeluar = $_GET['tarikhkeluar'];
$bildewasa = $_GET['bildewasa'];
$bilkanakkanak = $_GET['bilkanakkanak'];
$jumlahharga = $_GET['jumlahharga'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>D'Villa Homestay</title>
    <link rel="stylesheet" href="style/formstyle.css" type="text/css">
    <link rel="stylesheet" href="style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="../style/loader.css">
    <link rel="shortcut icon" type="image/x-icon" href="../style/favicon.ico">
    <script src="../jquery/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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
                    <a href="proseslogkeluar.php" role="button" class="btn btn-danger">Log keluar</a>
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
    <!-- Bahagian popup batal tempahan -->
    <div class="modal fade" id="bataltempahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Batalkan tempahan?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Adakah anda pasti ingin membatalkan tempahan dan kembali ke laman utama?
                </div>
                <div class="modal-footer">
                    <a href="../index.php" role="button" class="btn btn-danger">Ya. Batalkan tempahan</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak kembali semula</button>
                </div>
            </div>
        </div>
    </div>
<input type="hidden" value="<?php echo $statuslogin; ?>" id="statuslogin">
    <header>
        <a href="../index.php" class="logo">D'Villa Homestay</a>
        <div class="menu-toggle" onclick="tukaricon(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav class="hidenav">
            <ul>
                <li><a href="#" class="active">Tempah sekarang</a></li>
                <li><a href="senaraitempahan.php" class="status" style="display: none" onclick="return confirm('Anda kini dalam proses menempah. Adakah anda pasti ingin ke Semakan Tempahan?')">Tempahan saya</a></li>
                <li><a href="#" role="button" data-toggle="modal" data-target="#ubahsaiz">Ubah Saiz</a></li>
                <li><a href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter" class="status" style="display: none">Log Keluar</a></li>
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
        <form action="<?php if($statuslogin==0){echo 'prosestempah.php';}else{echo 'prosestempahakaun.php';} ?>" name="form1" method="post">
            <div class="boranglogindalam">
                <div class="logininput">
                    <h2 class="titlecolor">Lengkapkan maklumat diri anda</h2>
                    <p class="titlecolor" <?php if($statuslogin == 1){echo "style='display:none;'";} ?>>Maklumat ini juga akan digunakan untuk mendaftarkan anda ke dalam akaun D'Villa.</p><br>
                    <p class="titlecolor status" style="display: none">Anda telah pun mendaftarkan diri anda ke dalam akaun D'villa. Anda tidak perlu memasukkan email dan kata laluan.</p>
                    <div class="maklumattempahan">

                        <!-- MAKLUMAT TERSEMBUNYI -->
                        <input class="form-control" type="hidden" name="idrumah" value="<?php echo $idrumah ?>" readonly>
                        <input class="form-control" type="hidden" name="tarikhmasuk" value="<?php echo $tarikhmasuk ?>" readonly>
                        <input class="form-control" type="hidden" name="tarikhkeluar" value="<?php echo $tarikhkeluar ?>" readonly>
                        <input class="form-control" type="hidden" name="bildewasa" value="<?php echo $bildewasa ?>" readonly>
                        <input class="form-control" type="hidden" name="bilkanakkanak" value="<?php echo $bilkanakkanak ?>" readonly>
                        <input class="form-control" type="hidden" name="jumlahharga" value="<?php echo $jumlahharga ?>" readonly>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon3">Nama penuh</span>
                            </div>
                            <input type="text" name="namapelanggan" class="form-control" oninvalid="this.setCustomValidity('Nama penuh diperlukan!')" oninput="this.setCustomValidity('')" required>
                        </div>

                        <div class="input-group mb-3" <?php if($statuslogin == 1){echo "style='display:none;'";} ?>>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-dark" id="basic-addon3">E-mel</span>
                            </div>
                            <input type="email" name="email" class="form-control" value="<?php if($statuslogin == 1){echo $_SESSION['User1'];} ?>" oninvalid="this.setCustomValidity('Masukkan alamat e-mel yang sah.')" oninput="this.setCustomValidity('')" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon3">Nombor telefon</span>
                            </div>
                            <input type="tel" pattern='^\+?\d{10,11}' title="Masukkan nombor telefon yang betul" name="notelpelanggan" class="form-control" oninvalid="this.setCustomValidity('Masukkan nombor telefon yang betul.')" oninput="this.setCustomValidity('')" required>
                        </div>

                        <div class="input-group mb-3" <?php if($statuslogin == 1){echo "style='display:none;'";} ?>>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon3">Kata Laluan:</span>
                            </div>
                            <input type="password" value="<?php if($statuslogin == 1){echo '1234567890';} ?>" name="katalaluanpelanggan" class="form-control" minlength="8" required>
                        </div>

                    </div>
                    <a href="#" role="button" data-toggle="modal" data-target="#bataltempahan" class="btn btn-outline-danger rounded-0">Batalkan tempahan</a>
                    <button type="submit" class="btn btn-primary rounded-0" onclick="return stringlength(document.form1.katalaluanpelanggan,8,20)">Tempah</button>
                    <br>
                    <p class="alert" id="kurang" style="display: none; color:red;">Kata laluan yang anda masukkan kurang dari 8 aksara</p>
                    <p class="alert" id="lebih" style="display: none; color:red;">Kata laluan yang anda masukkan lebih dari 20 aksara</p>
                </div>
            </div>
        </form>
    </div>
    <div class="loader-wrapper">
        <h2 class="textcolor">Sila Tunggu...</h2>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
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
        function tukarsaizteks(){
            var idsaiz = document.getElementById('zoom').value;
            var zoom = "";
            if(idsaiz == 1){
                zoom = "80%";
            }else if(idsaiz == 2){
                zoom = "100%";
            }else if(idsaiz == 3){
                zoom = "120%";
            }else if(idsaiz == 4){
                zoom = "130%";
            }else if(idsaiz == 5){
                zoom = "140%";
            }
            document.body.style = "zoom:"+zoom+";";
        }
    </script>
</body>

</html>
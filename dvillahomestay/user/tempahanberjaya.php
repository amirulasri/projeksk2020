<?php
$statuslogin = "";

session_start();
if (isset($_SESSION['User1'])) {
    $statuslogin = 1;
} else {
    $statuslogin = 0;
}
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
    <!-- Bahagian popup akaun dicipta -->
    <div class="modal fade" id="akaundicipta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Akaun berjaya didaftarkan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Akaun anda berjaya didaftarkan. Sila log masuk untuk melihat tempahan anda secara terperinci
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kemudian</button>
                    <a href="../loginpelanggan.php" role="button" class="btn btn-danger">Log masuk</a>
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
                <li><a href="senaraitempahan.php" class="status" style="display: none">Tempahan saya</a></li>
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


    <?php
    $idtempahan = $_GET['idtempahan'];
    $pilihtempahan = "SELECT * FROM tempahan WHERE idtempahan='$idtempahan'";
    ?>


    <div class="boranglogin">
        <div class="boranglogindalam">
            <div class="logininput">
                <div class="titlecolor">
                    <h3>Tempahan anda berjaya! ID Tempahan anda adalah <?php echo "<u>" . $idtempahan . "</u>"; ?> Pergi ke Semak Tempahan Saya untuk melihat tempahan anda</h3> 
                </div><br>
                <?php
                //Dapatkan keputusan sama ada email dihantar ke pelanggan atau tidak
                $infomail = "";
                if(isset($_GET['emeldihantar'])){
                    $infomail = $_GET['emeldihantar'];
                }
                if($infomail == 1){
                    echo '<p style="color:white;">Maklumat tempahan juga telah dihantar ke email yang telah anda sediakan. Anda boleh lihat di peti masuk email anda.</p>';
                }else{
                    echo '<p style="color:white;">Terdapat kegagalan menghantar maklumat tempahan kepada pelanggan melalui email. Untuk menyemak tempahan dalam sistem ini, sila log masuk dan lihat di bahagian Tempahan Saya</p>';
                }
                ?>
                <p <?php if ($statuslogin == 1) {
                        echo "style='display:none;'";
                    } else {
                        echo "style='color:white;'";
                    } ?>>Akaun DvillaHomestay anda juga telah didaftarkan. Untuk melihat keseluruhan tempahan anda,<br><a href="../loginpelanggan.php" role="button" class="btn btn-primary">Sila log masuk</a></p>
                <a href="tempahansaya.php?idtempahan=<?php echo $idtempahan; ?>" role="button" style="display: none;" class="btn btn-success status">Semak tempahan saya</a>
            </div>
        </div>
    </div>
    <div class="loader-wrapper">
        <h2 class="textcolor">Menyelesaikan Tempahan...</h2>&nbsp;&nbsp;&nbsp;&nbsp;
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
            }else{
                $('#akaundicipta').modal('show');
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
</body>

</html>
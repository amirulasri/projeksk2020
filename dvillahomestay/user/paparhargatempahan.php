<?php
include '../setup.php';

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
        <form action="maklumatanda.php" method="get">
            <div class="boranglogindalam">
                <div class="logininput">
                    <h2 class="titlecolor">Semak Maklumat Tempahan Anda</h2><br>
                    <div class="maklumattempahan">
                        <?php
                        if (isset($_GET['submit'])) {
                            $idrumah = $_GET['namarumah'];
                            $tarikhmasuk = $_GET['tarikhmasuk'];
                            $tarikhkeluar = $_GET['tarikhkeluar'];
                            $bildewasa = $_GET['bildewasa'];
                            $bilkanakkanak = $_GET['bilkanakkanak'];

                            if ($tarikhmasuk > $tarikhkeluar) {
                                echo "<script>location.href = 'index.php?info=1';</script>";
                            }

                            $query_mysql = mysqli_query($conn, "SELECT * FROM rumah WHERE idrumah='$idrumah'");
                            while ($query = mysqli_fetch_array($query_mysql)) {

                                //MEMBEZAKAN TARIKH MASUK DAN TARIKH KELUAR DALAM HARI

                                date_default_timezone_set('Asia/Kuala_Lumpur');

                                $date1 = date_create($tarikhmasuk);
                                $date2 = date_create($tarikhkeluar);
                                $diff = date_diff($date1, $date2);
                                $bilanganhari = $diff->format("%R%a");

                                //PENGIRAAN BERLAKU DISINI

                                $plusremove = $bilanganhari + 0;

                                $a = $query['hargarumah'];
                                $b = $bilanganhari;

                                $jumlahharga = $a * $b;


                        ?>

                                <!-- MAKLUMAT TERSEMBUNYI -->
                                <input class="form-control" type="hidden" name="idrumah" value="<?php echo $query['idrumah'] ?>" readonly>
                                <input class="form-control" type="hidden" name="tarikhmasuk" value="<?php echo $tarikhmasuk ?>" readonly>
                                <input class="form-control" type="hidden" name="tarikhkeluar" value="<?php echo $tarikhkeluar ?>" readonly>
                                <input class="form-control" type="hidden" name="bildewasa" value="<?php echo $bildewasa ?>" readonly>
                                <input class="form-control" type="hidden" name="bilkanakkanak" value="<?php echo $bilkanakkanak ?>" readonly>
                                <input type="hidden" name="jumlahharga" value="<?php echo $jumlahharga ?>">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon3">Rumah yang dipilih</span>
                                    </div>
                                    <input type="text" name="namarumah" class="form-control" value="<?php echo $query['namarumah'] ?>" readonly>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white text-dark" id="basic-addon3">Penginapan</span>
                                    </div>
                                    <input type="text" name="penginapan" class="form-control" value="<?php echo $plusremove ?> Malam" readonly>
                                </div>


                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white" id="basic-addon3">Harga 1 malam</span>
                                    </div>
                                    <input type="text" name="hargarumah" class="form-control" value="RM <?php echo $query['hargarumah'] ?>" readonly>
                                </div>

                                <!-- PAPARAN HARGA -->

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon3">Harga perlu dibayar</span>
                                    </div>
                                    <input type="text" name="paparanharga" class="form-control" value="RM <?php echo $jumlahharga ?>" readonly>
                                </div>

                            <?php } ?>
                        <?php } else {
                            header('location: index.php');
                        } ?>

                        <a href="#" role="button" data-toggle="modal" data-target="#bataltempahan" class="btn btn-outline-danger rounded-0">Batalkan tempahan</a>
                        <button type="submit" class="btn btn-primary rounded-0">Seterusnya</button>
                    </div>
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
</body>

</html>
<?php
$statuslogin = "";

session_start();
if (isset($_SESSION['User1'])) {
    $statuslogin = 1;
} else {
    $statuslogin = 0;
    header('location:../index.php');
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
    <script src="../jquery/jquery.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../style/favicon.ico">
    <script src="../jquery/jquery-3.4.1.min.js"></script>
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
                <li><a href="index.php">Tempah sekarang</a></li>
                <li><a href="#" class="active status" style="display: none">Tempahan saya</a></li>
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
        <div class="boranglogindalam">
            <div class="logininput">
                <h2 class="titlecolor">Tempahan Saya</h2>

                <button class="btn btn-success print">Cetak</button><br>
                <script>
                    $('.print').click(function() {
                        var cetak = document.getElementById('table');
                        var wme = window.open("", "", "width=900,height=700");
                        wme.document.write(cetak.outerHTML);
                        wme.document.close();
                        wme.focus();
                        wme.print();
                    })
                </script>

                <table border="1" class="table table-success table-bordered color" id="table" align="center" style="overflow: auto;">
                    <?php
                    include "../setup.php";
                    $idtempahan = "";
                    $idtempahandirect = "";
                    if (isset($_POST['idtempahan'])) {
                        $idtempahan = $_POST['idtempahan'];
                    }
                    if (isset($_GET['idtempahan'])) {
                        $idtempahandirect = $_GET['idtempahan'];
                    }
                    $query_mysql = mysqli_query($conn, "SELECT * FROM tempahan WHERE idtempahan ='$idtempahan' OR idtempahan='$idtempahandirect'");

                    if (mysqli_num_rows($query_mysql) < 1) {
                        echo ("<script>location.href = 'senaraitempahan.php';</script>");
                    } else {
                        echo "<a href='tel:01135020493' class='titlecolor'>Ingin membatalkan tempahan? Hubungi admin</a>";
                    }

                    while ($data = mysqli_fetch_array($query_mysql)) {


                        //MENUKAT FORMAT TARIKH
                        date_default_timezone_set('Asia/Kuala_Lumpur');


                        //TARIKH MASUK
                        $source = $data['tarikhmasuk'];
                        $date = new DateTime($source);
                        $tarikhmasukbaru = $date->format('d-m-Y');

                        //TARIKH KELUAR
                        $source2 = $data['tarikhkeluar'];
                        $date2 = new DateTime($source2);
                        $tarikhkeluarbaru = $date2->format('d-m-Y');


                        //MENGELUARKAN DATA NAMA RUMAH
                        $idrumah = $data['idrumah'];
                        $queryrumah = mysqli_query($conn, "SELECT * FROM rumah WHERE idrumah ='$idrumah'");
                        while ($datarumah = mysqli_fetch_array($queryrumah)) {
                            $namarumah = $datarumah['namarumah'];
                        }

                    ?>
                        <tr>
                            <th colspan="6">---Cetakan Tempahan Dvillahomestay---</th>
                        </tr>
                        <tr>
                            <td colspan="6"><b>Nama:</b> <?php echo $data['namapelanggan'] ?> &nbsp; <b>ID Tempahan:</b> <?php echo $data['idtempahan'] ?><br>
                            <b>Nombor telefon:</b> <?php echo $data['notelpelanggan'] ?></td>
                        </tr>
                        <tr>
                            <th>Tarikh Masuk</th>
                            <th>Tarikh Keluar</th>
                            <th>Bilangan dewasa</th>
                            <th>Bilangan kanak-kanak</th>
                            <th>Bayaran</th>
                        </tr>

                        <tr>
                            <td><?php echo $tarikhmasukbaru ?></td>
                            <td><?php echo $tarikhkeluarbaru ?></td>
                            <td><?php echo $data['bildewasa']; ?></td>
                            <td><?php echo $data['bilkanakkanak']; ?></td>
                            <td><?php echo $data['statusbayaran']; ?></td>
                        </tr>

                        <tr>
                            <td colspan="6"><b>Jenis rumah yang dipilih:</b> <?php echo $namarumah ?></td>
                        </tr>

                        <tr>
                            <td colspan="6"><b>Harga perlu dibayar:</b> RM <?php echo $data['jumlahharga']; ?></td>
                        </tr>

                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
    <div class="loader-wrapper">
        <h2 class="textcolor">Menyemak...</h2>&nbsp;&nbsp;&nbsp;&nbsp;
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
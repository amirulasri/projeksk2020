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
    <script src="../jquery/jquery.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../style/favicon.ico">
    <link rel="stylesheet" href="../style/loader.css">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body id="body" onload="semakloginstatus()">
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
                <li><a href="senaraitempahan.php" class="status" style="display: none;">Tempahan saya</a></li>
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

    <!-- USER INTERFACE TEMPAHAN DISINI. -->

    <form action="paparhargatempahan.php" method="get">
        <div class="boranglogin">
            <div class="boranglogindalam">
                <div class="logininput">
                    <h2 class="titlecolor">Lengkapkan maklumat di bawah</h2><br>
                    <?php
                    $info = '';
                    if (isset($_GET['info'])) {
                        $info = $_GET['info'];
                    }
                    if ($info == 1) {
                        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                 Tarikh masuk yang anda masukkan lebih besar daripada tarikh keluar!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>";
                    }
                    ?>
                    <!-- Dropdown rumah dari pangkalan data -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger text-white" id="basic-addon3">Pilih Rumah</span>
                        </div>
                        <?php
                        $queryrumah = mysqli_query($conn, "SELECT * FROM rumah");
                        ?>
                        <select name="namarumah" id="idrumah" class="form-control" required="required" oninvalid="this.setCustomValidity('Pilih rumah idaman anda')" oninput="this.setCustomValidity('')" onchange="tukarbg()">
                            <option value="" disabled="disabled" selected="true">-->Pilih Rumah<--</option> <?php
                                                                        while ($rumah = mysqli_fetch_array($queryrumah)) {
                                                                        ?> <option value="<?php echo $rumah['idrumah'] ?>" onclick="getidrumah()"><?php echo $rumah['namarumah'] ?>&nbsp;&nbsp;&nbsp;&nbsp; RM <?php echo $rumah['hargarumah'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white" id="basic-addon3">Tarikh Masuk</span>
                                </div>
                                <input id='tarikhmasuk' type="date" name="tarikhmasuk" class="form-control" onchange="mintarikhkeluar()" required>
                            </div>
                        </div><br><br>
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon3">Tarikh Keluar</span>
                                </div>
                                <input id="tarikhkeluar" type="date" min="" class="form-control" name="tarikhkeluar" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white" id="basic-addon3">Bilangan Dewasa</span>
                                </div>
                                <input type="number" name="bildewasa" class="form-control" max="10" min="0" oninput="validity.valid||(value='');" required>
                            </div>
                        </div><br><br>
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon3">Bilangan Kanak-kanak</span>
                                </div>
                                <input type="number" class="form-control" name="bilkanakkanak" max="10" min="0" oninput="validity.valid||(value='');">
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <a href="#" role="button" data-toggle="modal" data-target="#bataltempahan" class="btn btn-outline-danger">Batalkan tempahan</a>
                    <button type="submit" name="submit" class="btn btn-primary">Seterusnya</button>
                </div>
            </div>
        </div>
        <script>
            // Min untuk tarikh keluar. Mesti selepas tarikh masuk.
            function mintarikhkeluar() {
                var tarikhmasuk = document.getElementById("tarikhmasuk").value;
                var tarikhmasuk2 = new Date(tarikhmasuk);
                var hari = tarikhmasuk2.getDate() + 1; //Tambah 1 hari untuk min di tarikh keluar
                bulan = tarikhmasuk2.getMonth() + 1;
                if (hari < 10) {
                    hari = "0" + hari;
                }
                if (bulan < 10) {
                    bulan = "0" + bulan;
                }
                var tarikhmasuk3 = tarikhmasuk2.getFullYear() + "-" + bulan + "-" + hari;

                document.getElementById("tarikhkeluar").min = tarikhmasuk3;
                console.log(tarikhmasuk3);
            }
            // Min untuk Tarikh masuk. Tidak boleh pilih tarikh sebelum.
            today = new Date();
            bulansekarang = today.getMonth() + 1;
            if (bulansekarang < 10) {
                bulansekarang = "0" + bulansekarang;
            }
            tarikhsekarang = today.getFullYear() + "-" + bulansekarang + "-" + today.getDate();
            document.getElementById("tarikhmasuk").min = tarikhsekarang;
            console.log(tarikhsekarang);
        </script>
    </form>
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

    <script>
        function tukarbg() {
            var selectBox = document.getElementById("idrumah");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            document.body.style = "background: url(../gambarrumah/gambar"+selectedValue+".jpg); transition: 1s; background-size: cover; background-position: center;";
        }
    </script>

</body>

</html>
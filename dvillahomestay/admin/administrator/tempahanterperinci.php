<?php
session_start();

if (isset($_SESSION['User'])) {
} else {
    header("location:../index.php");
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
        <h2 class="textcolor">Terperinci</h2>&nbsp;&nbsp;&nbsp;&nbsp;
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
        <a href="index.php" class="logo">ADMINISTRATOR</a>
        <div class="menu-toggle" onclick="tukaricon(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav class="hidenav">
            <ul>
                <li><a href="tempahanpelanggan.php" class="active">Senarai tempahan keseluruhan</a></li>
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

    <?php
    include '../../setup.php';
    $idtempahan = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM tempahan INNER JOIN rumah ON tempahan.idrumah = rumah.idrumah WHERE idtempahan = '$idtempahan'");
    while ($data = mysqli_fetch_array($query)) {
        
        //Jumlah ahli keluarga
        $bildewasa1 = $data['bildewasa'];
        $bilkanakkanak1 = $data['bilkanakkanak'];
        $jumlahahlikeluarga = $bildewasa1 + $bilkanakkanak1;

        //Dapatkan nama rumah
        $namarumah = $data['namarumah'];

        //MENUKAT FORMAT TARIKH
        date_default_timezone_set('Asia/Kuala_Lumpur');


        //TARIKH MASUK
        $source = $data['tarikhmasuk'];
        try {
            $date = new DateTime($source);
            $tarikhmasukbaru = $date->format('d-m-Y');
        } catch (Exception $e) {
            $tarikhmasukbaru = $data['tarikhmasuk'];
        }


        //TARIKH KELUAR
        $source2 = $data['tarikhkeluar'];
        try {
            $date2 = new DateTime($source2);
            $tarikhkeluarbaru = $date2->format('d-m-Y');
        } catch (Exception $e) {
            $tarikhkeluarbaru = $data['tarikhkeluar'];
        }
    ?>


        <div class="boranglogin">
            <div class="boranglogindalam">
                <div id="ui" class="logininput" style="overflow: auto;">
                    <h3 id="hideprinttajuk" class="titlecolor">Terperinci bagi ID Tempahan: <u><?php echo $idtempahan ?></u></h3>
                    <h2 class="printtajuk">Tempahan D'Villa Homestay</h2>
                    <h4 class="printtajuk">ID Tempahan: <?php echo $idtempahan; ?></h4>
                    <table class="table table-hover table-success table-bordered" id="table" border="1" align="center" style="width: 100%">
                        <tr>
                            <th colspan="2">Nama pelanggan: <?php echo $data['namapelanggan']; ?><br>
                            Nombor telefon: <?php echo $data['notelpelanggan'] ?></th>
                        </tr>
                        <tr>
                            <td><b>Email: </b><?php echo $data['email'] ?></td>
                            <td><b>ID Tempahan: </b><?php echo $data['idtempahan']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Jenis rumah yang dipilih: </b><?php echo $namarumah ?></td>
                        </tr>
                        <tr>
                            <td><b>Tarikh Masuk: </b><?php echo $tarikhmasukbaru; ?></td>
                            <td><b>Tarikh Keluar: </b><?php echo $tarikhkeluarbaru; ?></td>
                        </tr>
                        <tr>
                            <th colspan="2">Ahli Keluarga: <?php echo $jumlahahlikeluarga ?></th>
                        </tr>
                        <tr>
                            <td><b>Bilangan dewasa: </b><?php echo $data['bildewasa']; ?></td>
                            <td><b>Bilangan kanak-kanak: </b><?php echo $data['bilkanakkanak']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Status Bayaran:</b> <?php echo $data['statusbayaran']; ?></td>
                        </tr>
                    </table>
                    <p style="float: right;" class="printtajuk">Cetakan pada tarikh: <?php echo Date('d-m-Y'); ?></p>
                    <a href="ubahpelanggan.php?id=<?php echo $idtempahan ?>" id="hideprint1" role="button" class="btn btn-primary">Ubah maklumat tempahan</a>
                    <button class="btn btn-success print" id="hideprint2">Cetak</button>
                </div>
            </div>
        </div>
    <?php } ?>
    <script>
        $('.print').click(function() {
            var cetak = document.getElementById('ui');
            var wme = window.open("", "", "width=900,height=700");
            wme.document.write(cetak.outerHTML);
            wme.document.getElementById("hideprinttajuk").style = "display: none;";
            wme.document.getElementById("hideprint1").style = "display: none;";
            wme.document.getElementById("hideprint2").style = "display: none;";
            wme.document.close();
            wme.focus();
            wme.print();
        })
    </script>
</body>

</html>
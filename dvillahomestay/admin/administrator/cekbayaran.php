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
</head>

<body>
    <div class="loader-wrapper">
        <h2 class="textcolor">Cek Bayaran</h2>&nbsp;&nbsp;&nbsp;&nbsp;
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

    <?php
    include '../../setup.php';
    $idtempahan = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM tempahan WHERE idtempahan='$idtempahan'");
    while ($data = mysqli_fetch_array($query)) {

    ?>


        <div class="boranglogin">
            <form action="prosescekbayaran.php" method="get">
                <div class="boranglogindalam">
                    <div class="logininput">
                        <h2 class="titlecolor">Cek Bayaran</h2>
                        <h6 class="titlecolor">Menanda sebagai telah dibayar kepada pelanggan</h6><br>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon3">Nama</span>
                            </div>
                            <input type="text" name="" class="form-control" value="<?php echo $data['namapelanggan']; ?>" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-dark" id="basic-addon3">Jumlah bayaran</span>
                            </div>
                            <input type="text" name="" class="form-control" value="<?php echo $data['jumlahharga']; ?>" readonly>
                        </div>

                        <a href="prosescekbayaran.php?cek=Telah%20dibuat%20secara%20tunai&id=<?php echo $idtempahan ?>" role="button" class="btn btn-primary">Telah dibayar secara tunai</a>
                        <a href="prosescekbayaran.php?cek=Telah%20dibuat%20melalui%20pembayaran%20online&id=<?php echo $idtempahan ?>" role="button" class="btn btn-success">Telah dibayar melalui pembayaran online</a>
                        <a href="prosescekbayaran.php?cek=Belum%20dibuat&id=<?php echo $idtempahan ?>" role="button" class="btn btn-danger">Belum dibuat</a><br><br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon3">Lain-lain. Nyatakan</span>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $idtempahan; ?>">
                            <input type="text" name="inputcek" class="form-control" placeholder="Cek, Debit Card, Atau lain-lain" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Cek Bayaran</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>
</body>

</html>
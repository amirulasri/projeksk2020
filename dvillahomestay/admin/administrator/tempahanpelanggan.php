<?php
include "../../setup.php";
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
        <h2 class="textcolor">Tempahan Keseluruhan</h2>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <!-- Modal import csv berjaya -->
    <div class="modal fade" id="csvberjaya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import CSV Berjaya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Fail CSV berjaya dimuat naik dan dimasukkan ke dalam pangkalan data
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal import csv gagal -->
    <div class="modal fade" id="csvgagal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import CSV Gagal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Fail CSV gagal dimasukkan ke dalam pangkalan data. Periksa fail CSV senarai rumah dan cuba semula. <br>
                    Perincian Ralat: <strong><?php
                    $ralat = '';
                    if(isset($_GET['ralat'])){
                        $ralat = $_GET['ralat'];
                    }
                    echo $ralat; ?></strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal import csv gagal fail kosong -->
    <div class="modal fade" id="csvgagalfailkosong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import CSV Gagal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Fail yang anda pilih kosong!. Pastikan anda memilih fail yang betul.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
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
                <li><a href="#" class="active">Senarai tempahan keseluruhan</a></li>
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
    $info = "";
    $idt = "";
    if (isset($_GET['info'])) {
        $info = $_GET['info'];
    }
    if (isset($_GET['idt'])) {
        $idt = $_GET['idt'];
    }
    ?>

    <div class="boranglogin">
        <div class="boranglogindalam">
            <div class="logininput" style="overflow: auto;">
                <h2 class="titlecolor">Senarai Tempahan Pelanggan</h2>
                <?php
                if ($info == 1) {
                    echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                             Pelanggan bagi ID Tempahan <strong>" . $idt . "</strong> berjaya dikemaskini
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                } elseif ($info == 2) {
                    $ralat = $_GET['ralat'];
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             Pelanggan bagi ID Tempahan <strong>" . $idt . "</strong> gagal dikemaskini <br>
                             Terdapat ralat: <strong> $ralat </strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                } elseif ($info == 3) {
                    echo "<script>
                    $('#csvberjaya').modal('show');
                    </script>";
                } elseif ($info == 4) {
                    echo "<script>
                    $('#csvgagal').modal('show');
                    </script>";
                } elseif ($info == 5) {
                    echo "<script>
                    $('#csvgagalfailkosong').modal('show');
                    </script>";
                }
                ?>
                <a href="sandardanpulihkan.php" role="button" class="btn btn-success">Eksport dan import data</a>
                <table border="1" class="table table-hover table-light table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Tempahan</th>
                            <th>Nama Pelanggan</th>
                            <th>Jumlah Harga</th>
                            <th>Terperinci</th>
                        </tr>
                    </thead>
                    <?php
                    $query_mysql = mysqli_query($conn, "SELECT * FROM tempahan ORDER BY idtempahan DESC");

                    if (mysqli_num_rows($query_mysql) < 1) {
                        echo "<h5 class='titlecolor'>Senarai tempahan kosong.</h5>";
                    } else {
                        echo "<h5 class='titlecolor'>Pergi ke <a href='cariantempahan.php'>Carian</a> untuk mengubah maklumat tempahan pelanggan.</h5>";
                    }

                    $nomor = 1;
                    while ($data = mysqli_fetch_array($query_mysql)) {

                    ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['idtempahan']; ?></td>
                            <td><?php echo $data['namapelanggan']; ?></td>
                            <td>RM <?php echo $data['jumlahharga']; ?></td>
                            <td><a href="tempahanterperinci.php?id=<?php echo $data['idtempahan']; ?>" role="button" class="btn btn-info">Lihat</a></td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
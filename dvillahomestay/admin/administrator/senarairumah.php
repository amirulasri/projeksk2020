<?php
include '../../setup.php';
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
    <!-- Modal padam rumah -->
    <div class="modal fade" id="boxpadamrumah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Padam rumah?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Adakah anda pasti ingin padam rumah ini? Memadam rumah akan menyebabkan tempahan pelanggan sedia ada juga akan dibatalkan dan dipadamkan. Sila berhati-hati.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="padamrumah.php" method="get">
                        <input type="hidden" name="id" value="" id="padamid">
                        <button type="submit" class="btn btn-danger">Ya, padam juga</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                    Ralat: <strong><?php 
                    $ralat='';
                    if(isset($_GET['ralat'])){
                        $ralat = $_GET['ralat'];
                        echo $ralat;
                    }
                    ?></strong>
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
    <!-- Modal Gagal Sambungan -->
    <div class="modal fade" id="gagalsambungan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gagal menyambung ke MySQL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Periksa fail setup.php atau pastikan pangkalan data anda berfungsi.
                    Perincian ralat: <?php echo $ralatsambungan; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cuba Semula</button>
                </div>
            </div>
        </div>
    </div>
    <div class="loader-wrapper">
        <h2 class="textcolor">Senarai Rumah</h2>&nbsp;&nbsp;&nbsp;&nbsp;
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
                <li><a href="#" class="active">Senarai rumah</a></li>
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
            <div class="logininput" style="overflow: auto;">
                <h2 class="titlecolor">Senarai rumah</h2>
                <a href="sandardanpulihkanrumah.php" role="button" class="btn btn-success">Eksport dan import data</a><br><br>
                <?php
                $info = "";
                $idrumah = "";
                if (isset($_GET['info'])) {
                    $info = $_GET['info'];
                }
                if (isset($_GET['idrumah'])) {
                    $idrumah = $_GET['idrumah'];
                }

                if ($info == 1) {
                    echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                         Rumah bagi id <strong>" . $idrumah . "</strong> berjaya dikemaskini
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                } elseif ($info == 2) {
                    $idrumah = $_GET['idrumah'];

                    echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                         Rumah telah berjaya didaftarkan. <strong>ID rumah baru adalah $idrumah </strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                } elseif ($info == 3) {
                    echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                         Rumah bagi <strong>ID " . $idrumah . "</strong> telah berjaya dipadamkan
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                } elseif ($info == 4) {
                    echo "<script>
                    $('#csvberjaya').modal('show');
                    </script>";
                } elseif ($info == 5) {
                    echo "<script>
                    $('#csvgagal').modal('show');
                    </script>";
                } elseif ($info == 6) {
                    $ralat = "";
                    if(isset($_GET['ralat'])){
                        $ralat = $_GET['ralat'];
                    }
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                         Rumah gagal dipadamkan. Terdapat ralat:<br>
                         <strong>$ralat</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                } elseif ($info == 7) {
                    $ralat = "";
                    if(isset($_GET['ralat'])){
                        $ralat = $_GET['ralat'];
                    }
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                         Rumah gagal dikemaskini. Terdapat ralat:<br>
                         <strong>$ralat</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                } elseif ($info == 8) {
                    $ralat = "";
                    if(isset($_GET['ralat'])){
                        $ralat = $_GET['ralat'];
                    }
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                         Rumah gagal didaftarkan. Terdapat ralat:<br>
                         <strong>$ralat</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                } elseif ($info == 9) {
                    echo "<script>
                    $('#csvgagalfailkosong').modal('show');
                    </script>";
                }
                ?>
                <?php
                $query_mysql = mysqli_query($conn, "SELECT * FROM rumah ORDER BY idrumah DESC");
                if (mysqli_num_rows($query_mysql) == 0) {
                    echo "<h4 class='titlecolor'>Senarai Rumah Kosong</h4>";
                }
                ?>
                <table border="1" class="table table-bordered">
                    <thead>
                        <tr class="table-light">
                            <th>ID Rumah</th>
                            <th>Nama rumah</th>
                            <th>Harga rumah</th>
                            <th>Tetapan</th>
                        </tr>
                    </thead>
                    <tbody class="table-hover">
                    <?php
                    include "../../setup.php";
                    while ($data = mysqli_fetch_array($query_mysql)) {

                    ?>
                        <tr <?php if($data['idrumah'] == $idrumah){echo 'class="table-primary"';}else{echo'class="table-success"';} ?>>
                            <td><?php echo $data['idrumah']; ?></td>
                            <td><?php echo $data['namarumah']; ?></td>
                            <td>RM <?php echo $data['hargarumah']; ?></td>
                            <td>
                                <a role="button" class="btn btn-warning" href="ubahrumah.php?id=<?php echo $data['idrumah']; ?>">Ubah</a>
                                <button class="btn btn-danger padam" id="<?php echo $data['idrumah']; ?>" data-toggle="modal" data-target="#boxpadamrumah">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(".padam").click(function() {
            var idrumah = this.id;
            document.getElementById("padamid").value = idrumah;
        });
    </script>
</body>

</html>
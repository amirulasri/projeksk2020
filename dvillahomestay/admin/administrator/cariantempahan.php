<?php
session_start();

if (isset($_SESSION['User'])) {
} else {
    header("location:../index.php");
}
$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
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
        <h2 class="textcolor">Carian Tempahan</h2>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <!-- Modal berjaya padam -->
    <div class="modal fade" id="padamtempahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tempahan berjaya dipadamkan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tempahan pelanggan bagi <b>ID <?php echo $id; ?></b> berjaya dipadamkan. Data yang dipadamkan tidak boleh dikembalikan semula.
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
                <li><a href="tempahanpelanggan.php">Senarai tempahan keseluruhan</a></li>
                <li><a href="daftarrumah.php">Daftar rumah</a></li>
                <li><a href="senarairumah.php">Senarai rumah</a></li>
                <li><a href="#" class="active">Carian</a></li>
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
        <form action="hasilcariantempahan.php" method="post">
            <div class="boranglogindalam">
                <div class="logininput">
                    <h2 class="titlecolor">Cari tempahan pelanggan</h2>
                    <?php
                    $info = "";
                    if (isset($_GET['info'])) {
                        $info = $_GET['info'];
                    }
                    if ($info == 1) {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                 Maklumat yang anda masukkan <strong>tidak dijumpai</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>";
                    } elseif ($info == 2) {
                        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                                 Anda telah menanda jenis pembayaran yang telah dibuat bagi ID Tempahan <strong>" . $id . "</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>";
                    } elseif ($info == 3) {
                        echo "<script>
                        $('#padamtempahan').modal('show');
                        </script>";
                    } elseif ($info == 4) {
                        $ralat = $_GET['ralat'];
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                 Gagal menanda jenis pembayaran yang telah dibuat bagi ID Tempahan <strong>" . $id . "</strong><br>
                                 Terdapat Ralat: <strong> $ralat <strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>";
                    } elseif ($info == 5) {
                        $ralat = $_GET['ralat'];
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                 Pelanggan bagi ID Tempahan <strong>" . $id . "</strong> gagal dikemaskini<br>
                                 Terdapat Ralat: <strong> $ralat <strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>";
                    }
                    ?>
                    <h6 class="titlecolor">Masukkan ID Tempahan, Email atau Nombor Telefon Pelanggan</h6><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success text-white" id="basic-addon3">Carian</span>
                        </div>
                        <input type="text" name="inputcarian" class="form-control" placeholder="ID Tempahan, Email Atau Nombor Telefon Pelanggan" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="submit">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
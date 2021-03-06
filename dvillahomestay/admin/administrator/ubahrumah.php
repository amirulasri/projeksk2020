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
        <h2 class="textcolor">Maklumat Rumah</h2>&nbsp;&nbsp;&nbsp;&nbsp;
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
        <a href="#" class="logo">ADMINISTRATOR</a>
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
    </script>
    <div class="boranglogin">
        <form action="kemaskinirumah.php" method="post" enctype="multipart/form-data">
            <div class="boranglogindalam">
                <div class="logininput">
                    <h2 class="titlecolor">Ubah maklumat rumah</h2><br>

                    <?php
                    include '../../setup.php';
                    $idrumah = $_GET['id'];

                    $query_mysql = mysqli_query($conn, "SELECT * FROM rumah WHERE idrumah='$idrumah'");
                    while ($data = mysqli_fetch_array($query_mysql)) {
                    ?>

                        <input type="hidden" name="idrumah" class="form-control" value="<?php echo $data['idrumah']; ?>" readonly>


                        <div class="form-row">
                            <div class="col-md-7">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon3">Nama/Jenis Rumah</span>
                                    </div>
                                    <input type="text" name="namarumah" class="form-control" value="<?php echo $data['namarumah']; ?>" required>
                                </div>
                            </div><br><br>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon3">Harga 1 malam</span>
                                    </div>
                                    <input type="number" class="form-control" name="hargarumah" value="<?php echo $data['hargarumah']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon3">Gambar baru</span>
                                </div>
                                <input type="file" name="file" class="btn btn-warning" accept=".jpg" required />
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('PERINGATAN: Jika anda mengubah harga rumah ini, pelanggan yang telah menempah rumah ini tidak akan menjejaskan harganya.')">Kemaskini</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
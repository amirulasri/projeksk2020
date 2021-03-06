<?php
session_start();
if (isset($_SESSION['User'])) { } else {
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
        <h2 class="textcolor">Mencari...</h2>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });

        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
    <!-- Modal -->
    <div class="modal fade" id="boxpadamrumah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Padam tempahan?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Adakah anda pasti ingin memadam maklumat ini?. Sebaik sahaja anda memadam, ia bermakna anda telah membatalkan tempahan pelanggan. Selepas memadam, anda akan berbalik semula ke bahagian carian.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="padamtempahan.php" method="get">
                        <input type="hidden" name="id" value="" id="padamid">
                        <button type="submit" class="btn btn-danger">Ya, padam juga</button>
                    </form>
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
        <div class="boranglogindalam">
            <div class="logininput" style="overflow: auto;">
                <h2 class="titlecolor">Hasil Carian</h2>

                <table border="1" class="table table-hover table-success table-bordered">
                    <tr>
                        <th>No</th>
                        <th>ID Tempahan</th>
                        <th>Nama Pelanggan</th>
                        <th>Jumlah Harga</th>
                        <th>Tetapan</th>
                    </tr>
                    <?php
                    include "../../setup.php";
                    $inputcarian = "";
                    if (isset($_POST['inputcarian'])) {
                        $inputcarian = $_POST['inputcarian'];
                    }elseif(isset($_GET['id'])){
                        $inputcarian = $_GET['id'];
                    }
                    if (empty($inputcarian)) {
                        echo("<script>location.href = 'cariantempahan.php';</script>");
                    }
                    $query = mysqli_query($conn, "SELECT * FROM tempahan WHERE idtempahan='$inputcarian' OR notelpelanggan='$inputcarian' OR email='$inputcarian'") or die("<h5 class='titlecolor'>Kegagalan telah berlaku</h5>");

                    if (mysqli_num_rows($query) < 1) {
                        echo("<script>location.href = 'cariantempahan.php?info=1';</script>");
                    }
                    $nomor = 1;
                    while ($data = mysqli_fetch_array($query)) {

                    ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['idtempahan']; ?></td>
                            <td><a href="tempahanterperinci.php?id=<?php echo $data['idtempahan']; ?>"><?php echo $data['namapelanggan']; ?></a></td>
                            <td>RM <?php echo $data['jumlahharga']; ?></td>
                            <td>
                                <a role="button" class="btn btn-warning" href="ubahpelanggan.php?id=<?php echo $data['idtempahan']; ?>">Ubah</a>
                                <button class="btn btn-danger padam" id="<?php echo $data['idtempahan'] ?>" data-toggle="modal" data-target="#boxpadamrumah">Padam</button>
                                <a href="cekbayaran.php?id=<?php echo $data['idtempahan']; ?>" role="button" class="btn btn-info">Cek Bayaran</a>
                            </td>
                        </tr>
                    <?php } ?>
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
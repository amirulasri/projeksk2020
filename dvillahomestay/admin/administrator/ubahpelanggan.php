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
        <h2 class="textcolor">Maklumat Pelanggan</h2>&nbsp;&nbsp;&nbsp;&nbsp;
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
        <form action="kemaskinipelanggan.php" method="post">
            <div class="boranglogindalam">
                <div class="logininput" style="overflow:auto; overflow-x:hidden;">

                    <?php
                    include '../../setup.php';

                    $idtempahan = $_GET['id'];

                    $querypelanggan = mysqli_query($conn, "SELECT * FROM tempahan WHERE idtempahan='$idtempahan'");

                    while ($query = mysqli_fetch_array($querypelanggan)) {
                    ?>
                        <h2 class="titlecolor">Ubah maklumat bagi ID Tempahan <u><?php echo $query['idtempahan'] ?></u></h2>
                        <h6 class="titlecolor">Masukkan maklumat yang baharu yang diberi oleh pelanggan.</h6><br>

                        <input type="hidden" name="idtempahan" class="form-control" value="<?php echo $query['idtempahan'] ?>" readonly>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon3">Nama pelanggan</span>
                            </div>
                            <input type="text" name="namapelanggan" class="form-control" value="<?php echo $query['namapelanggan'] ?>" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white" id="basic-addon3">Pilih Rumah Terkini</span>
                            </div>
                            <?php
                            $queryrumah = mysqli_query($conn, "SELECT * FROM rumah");
                            ?>
                            <select name="idrumah" id="idrumah" class="form-control" required="required" oninvalid="this.setCustomValidity('Pilih jenis rumah!')" oninput="this.setCustomValidity('')" onchange="tukarbg()">
                                <option value="" disabled="disabled" selected="true">-->Pilih Rumah<--</option> <?php
                                                                            while ($rumah = mysqli_fetch_array($queryrumah)) {
                                                                            ?> <option value="<?php echo $rumah['idrumah'] ?>"><?php echo $rumah['namarumah'] ?>&nbsp;&nbsp;&nbsp;&nbsp; RM <?php echo $rumah['hargarumah'] ?></option>
                            <?php } ?>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon3">Tarikh Masuk</span>
                                    </div>
                                    <input type="date" name="tarikhmasuk" class="form-control" value="<?php echo $query['tarikhmasuk'] ?>" required>
                                </div>
                            </div><br><br>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon3">Tarikh Keluar</span>
                                    </div>
                                    <input type="date" class="form-control" name="tarikhkeluar" value="<?php echo $query['tarikhkeluar'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon3">Bilangan dewasa</span>
                                    </div>
                                    <input type="number" name="bildewasa" class="form-control" value="<?php echo $query['bildewasa'] ?>" required>
                                </div>
                            </div><br><br>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon3">Bilangan kanak-kanak</span>
                                    </div>
                                    <input type="number" class="form-control" name="bilkanakkanak" value="<?php echo $query['bilkanakkanak'] ?>" required>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <button type="submit" class="btn btn-primary">Kemaskini</button>
                </div>
            </div>
        </form>
        <script>
            function tukarbg() {
                var selectBox = document.getElementById("idrumah");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                document.body.style = "background: url(../../gambarrumah/gambar" + selectedValue + ".jpg); transition: 1s; background-size: cover; background-position: center;";
            }
        </script>
    </div>
</body>

</html>
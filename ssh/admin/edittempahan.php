<?php include('../settings.php');
session_start();

if (isset($_SESSION['admin'])) {
} else {
    header("location:login.php?fail=1");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $sysname; ?></title>
    <script>
        var warnaasal = "black";

        function changeColor() {
            if (warnaasal == "black") {
                var elms = document.querySelectorAll("[id='tukarwarna']");

                for (var i = 0; i < elms.length; i++)
                    elms[i].style.color = 'white';
                warnaasal = "white";
            } else {
                var elms = document.querySelectorAll("[id='tukarwarna']");

                for (var i = 0; i < elms.length; i++)
                    elms[i].style.color = 'black';
                warnaasal = "black";
            }
        }
    </script>
    <script>
        function ubahsaiz(pendaraban) {
            var saizasal = document.body.style.zoom || 1;
            document.body.style.zoom = (parseFloat(saizasal) + (pendaraban * 0.2));
        }
    </script>
</head>

<body>
    <?php
    if (isset($_GET['berjaya'])) {
        echo '<script language="javascript">';
        echo 'alert("Tempahan anda berjaya dipupuskan")';
        echo '</script>';
    }
    if (isset($_GET['gagal'])) {
        echo '<script language="javascript">';
        echo 'alert("Tempahan anda gagal dipupuskan")';
        echo '</script>';
    }
    ?>
    <div class="uiinner">
        <div class="ui">
            <nav class="navbar">
                <div class="logoinner">
                    <a href="#" class="Logo"><?php echo $sysname; ?></a>
                </div>
                <p class="title colorchangebtn" onclick="ubahsaiz(1)">Zoom +</p>
                <p class="title colorchangebtn" onclick="ubahsaiz(-1)">Zoom -</p>
                <p class="title colorchangebtn" id="change" onclick="changeColor()">Tukar warna &nbsp;&nbsp;</p>
                <div class="navbar2">
                    <a href="daftarrumah.php">Daftar Rumah</a>
                    <a href="senaraitempahan.php">Senarai Tempahan</a>
                    <a href="carian.php" class="activenav">Carian</a>
                    <a href="logkeluar.php">Log keluar</a>
                </div>
            </nav>
            <?php
            $idrumah = "";
            $jumlahhari = "";
            $tarikhmasuk = "";
            $idtempahan = "";
            if (isset($_POST['idrumah'])) {
                $idrumah = $_POST['idrumah'];
            }
            if (isset($_POST['jumlahhari'])) {
                $jumlahhari = $_POST['jumlahhari'];
            }
            if (isset($_POST['tarikhmasuk'])) {
                $tarikhmasuk = $_POST['tarikhmasuk'];
            }
            if (isset($_GET['id'])) {
                $idtempahan = $_GET['id'];
            } else {
                header('location: carian.php');
            }
            if (empty($idtempahan)) {
                header('location: carian.php');
            }
            $queryrumah = mysqli_query($conn, "SELECT * FROM rumah");
            ?>
            <div class="interface">
                <div class="mainmenu">
                    <form action="" method="post">
                        <h2 id="tukarwarna">Edit Tempahan Pelanggan Bagi Id Tempahan <?php echo $idtempahan; ?></h2>
                        <form action="" method="post">
                            <label for="">Pilih Rumah:</label>
                            <select name="idrumah" id="" class="select" required>
                                <option value="">--->Rumah<---</option> <?php
                                                                                    while ($datarumah = mysqli_fetch_array($queryrumah)) {
                                                                                    ?> <option value="<?php echo $datarumah['idrumah']; ?>" <?php if ($idrumah == $datarumah['idrumah']) {
                                                                                                                                                echo "selected";
                                                                                                                                            } ?>><?php echo $datarumah['namarumah']; ?> --- <?php echo $datarumah['pemandangan']; ?> &nbsp;&nbsp;&nbsp; RM <?php echo $datarumah['harga']; ?></option>
                            <?php } ?>
                            </select><br>
                            <input type="hidden" name="idtempahan" value="<?php echo $idtempahan; ?>">
                            <label for="">Jumlah Hari</label>
                            <input type="number" value="<?php echo $jumlahhari; ?>" name="jumlahhari" min="1" oninput="validity.valid||(value='');" required><br>
                            <label for="">Tarikh Masuk:</label>
                            <input type="date" value="<?php echo $tarikhmasuk ?>" name="tarikhmasuk" id="" class="select" required>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="submit" value="Semak Harga" class="stylebtn"><br>
                        </form>
                        <form action="proseskemaskini.php" method="post">
                            <input type="hidden" name="idrumah" value="<?php echo $idrumah ?>">
                            <input type="hidden" name="jumlahhari" value="<?php echo $jumlahhari ?>">
                            <input type="hidden" name="tarikhmasuk" value="<?php echo $tarikhmasuk ?>">
                            <input type="hidden" name="idtempahan" value="<?php echo $idtempahan ?>">
                            <?php
                            if (isset($_POST['submit'])) {
                                $querypilih = mysqli_query($conn, "SELECT harga FROM rumah WHERE idrumah='$idrumah'");
                                $getharga = mysqli_fetch_array($querypilih);
                                $hargarumah = $getharga['harga'];
                                $jumlahharga = $hargarumah * $jumlahhari;
                                echo "<h3>Jumlah Harga: RM $jumlahharga</h3><br>
                            <button type='submit' class='stylebtn' name='submit'>Kemaskini Tempahan</button>";
                            }
                            ?>
                            <input type="hidden" name="jumlahharga" value="<?php echo $jumlahharga; ?>">
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
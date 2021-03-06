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
        echo 'alert("Tempahan telah berjaya dipadamkan")';
        echo '</script>';
    }
    if (isset($_GET['gagal'])) {
        echo '<script language="javascript">';
        echo 'alert("Tempahan telah gagal dipadamkan")';
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
                    <a href="daftartayangan.php">Daftar Tayangan</a>
                    <a href="senaraitempahan.php">Senarai Tempahan</a>
                    <a href="carian.php" class="activenav">Carian</a>
                    <a href="logkeluar.php">Log keluar</a>
                </div>
            </nav>
            <?php
            $idtayangan = "";
            $jumlahtiket = "";
            $tarikhtayangan = "";
            $idtempahan = "";
            if (isset($_POST['idtayangan'])) {
                $idtayangan = $_POST['idtayangan'];
            }
            if (isset($_POST['jumlahtiket'])) {
                $jumlahtiket = $_POST['jumlahtiket'];
            }
            if (isset($_POST['tarikhtayangan'])) {
                $tarikhtayangan = $_POST['tarikhtayangan'];
            }
            if (isset($_GET['id'])) {
                $idtempahan = $_GET['id'];
            } else {
                header('location: carian.php');
            }
            if (empty($idtempahan)) {
                header('location: carian.php');
            }
            $querymovie = mysqli_query($conn, "SELECT * FROM tayangan");
            ?>
            <div class="interface">
                <div class="mainmenu">
                    <form action="" method="post">
                        <h2 id="tukarwarna">Edit Tempahan Pelanggan Bagi Id Tempahan <?php echo $idtempahan; ?></h2>
                        <form action="" method="post">
                            <label for="">Pilih Tayangan/Filem:</label>
                            <select name="idtayangan" id="" class="select" required>
                                <option value="">--->Pilih Filem<---</option> <?php
                                                                                while ($movie = mysqli_fetch_array($querymovie)) {
                                                                                ?> <option value="<?php echo $movie['idtayangan']; ?>" <?php if ($idtayangan == $movie['idtayangan']) {
                                                                                                                                            echo "selected";
                                                                                                                                        } ?>><?php echo $movie['namatayangan']; ?></option>
                            <?php } ?>
                            </select><br>
                            <input type="hidden" name="idtempahan" value="<?php echo $idtempahan; ?>">
                            <label for="">Jumlah Tiket</label>
                            <input type="number" value="<?php echo $jumlahtiket; ?>" name="jumlahtiket" min="1" oninput="validity.valid||(value='');" required><br>
                            <label for="">Tarikh Tayangan:</label>
                            <input type="date" value="<?php echo $tarikhtayangan ?>" name="tarikhtayangan" id="" class="select" required>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="submit" value="Semak Harga" class="stylebtn"><br>
                        </form>
                        <form action="proseskemaskini.php" method="post">
                            <input type="hidden" name="idtayangan" value="<?php echo $idtayangan ?>">
                            <input type="hidden" name="jumlahtiket" value="<?php echo $jumlahtiket ?>">
                            <input type="hidden" name="tarikhtayangan" value="<?php echo $tarikhtayangan ?>">
                            <input type="hidden" name="idtempahan" value="<?php echo $idtempahan ?>">
                            <?php
                            if (isset($_POST['submit'])) {
                                $querygetharga = mysqli_query($conn, "SELECT * FROM tayangan WHERE idtayangan='$idtayangan'");
                                while ($data = mysqli_fetch_array($querygetharga)) {
                                    $harga = $data['harga'];
                                }
                                $jumlahharga = $harga * $jumlahtiket;
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
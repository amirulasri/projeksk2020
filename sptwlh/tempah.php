<?php include('settings.php');
session_start();

if (isset($_SESSION['User'])) {
} else {
    header("location:login.php?fail=1");
}
$getusername = $_SESSION['User'];

$querykp = mysqli_query($conn, "SELECT * FROM loginpelanggan WHERE id='$getusername'");
$getkp = mysqli_fetch_assoc($querykp);
$nokp = $getkp['kppelanggan'];
if (empty($nokp)) {
    header('location: daftarpelanggan.php?perlu=1');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/navbarstyle.css">
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
</head>

<body>
    <?php
    if (isset($_GET['berjaya'])) {
        echo '<script language="javascript">';
        echo 'alert("Tiket Wayang Layar Hamka Berjaya Ditempah. ")';
        echo '</script>';
    }
    ?>
    <div class="header">
        <input type="checkbox" id="chk">
        <ul class="menu">
            <a href="#" class="activenav">Tempah Tiket</a>
            <a href="carian.php">Carian</a>
            <a href="logkeluar.php">Log keluar</a>
            <label for="chk" class="hide-menu-btn">
                <p>X</p>
            </label>
        </ul>
    </div>
    <div class="uiinner">
        <div class="ui">
            <nav class="navbar">
                <div class="logoinner">
                    <a href="#" class="Logo"><?php echo $sysname; ?></a>
                    <label for="chk">
                        <p class="menubtn">Menu</p>
                    </label>
                </div>
                <p class="title colorchangebtn" id="change" onclick="changeColor()">Tukar warna</p>
                <div class="navbar2">
                    <a href="daftarpelanggan.php">Daftar Pelanggan</a>
                    <a href="#" class="activenav">Tempah Tiket</a>
                    <a href="carian.php">Carian</a>
                    <a href="logkeluar.php">Log keluar</a>
                </div>
            </nav>
            <?php
            $kppelanggan = "";
            $idtayangan = "";
            $jumlahtiket = "";
            $tarikhtayangan = "";
            if (isset($_POST['kppelanggan'])) {
                $kppelanggan = $_POST['kppelanggan'];
            }
            if (isset($_POST['idtayangan'])) {
                $idtayangan = $_POST['idtayangan'];
            }
            if (isset($_POST['jumlahtiket'])) {
                $jumlahtiket = $_POST['jumlahtiket'];
            }
            if (isset($_POST['tarikhtayangan'])) {
                $tarikhtayangan = $_POST['tarikhtayangan'];
            }
            $querymovie = mysqli_query($conn, "SELECT * FROM tayangan");
            ?>
            <div class="interface">
                <div class="mainmenu">
                    <form action="" method="post">
                        <h2 id="tukarwarna">Lengkapkan Maklumat Di Bawah</h2><br>
                        <label for="">Kad Pengenalan Pelanggan:</label>
                        <input type="text" name="kppelanggan" id="" value="<?php echo $kppelanggan; ?>" placeholder="Tanpa space dan -" minlength="12" maxlength="12" required><br>
                        <label for="">Pilih Tayangan/Filem:</label>
                        <select name="idtayangan" id="" class="select" required>
                            <option value="">--->Pilih Filem<---</option> <?php
                                                                            while ($movie = mysqli_fetch_array($querymovie)) {
                                                                            ?> <option value="<?php echo $movie['idtayangan']; ?>" <?php if ($idtayangan == $movie['idtayangan']) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $movie['namatayangan']; ?></option>
                        <?php } ?>
                        </select><br>
                        <label for="">Jumlah Tiket</label>
                        <input type="number" value="<?php echo $jumlahtiket; ?>" name="jumlahtiket" min="1" oninput="validity.valid||(value='');" required><br>
                        <label for="">Tarikh Tayangan:</label>
                        <input type="date" value="<?php echo $tarikhtayangan ?>" name="tarikhtayangan" id="" class="select" required>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Semak Harga" class="stylebtn"><br><br><br>
                    </form>
                    <form action="prosestempah.php" method="post">
                        <input type="hidden" name="kppelanggan" value="<?php echo $kppelanggan ?>">
                        <input type="hidden" name="idtayangan" value="<?php echo $idtayangan ?>">
                        <input type="hidden" name="jumlahtiket" value="<?php echo $jumlahtiket ?>">
                        <input type="hidden" name="tarikhtayangan" value="<?php echo $tarikhtayangan ?>">
                        <?php
                        if (isset($_POST['submit'])) {
                            $jumlahharga = 20 * $jumlahtiket;
                            echo "<h3>Jumlah Harga: RM $jumlahharga</h3><br>
                            <button type='submit' class='stylebtn' name='submit'>Tempah</button>";
                        }
                        ?>
                        <input type="hidden" name="jumlahharga" value="<?php echo $jumlahharga; ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
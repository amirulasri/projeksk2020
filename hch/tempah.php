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
        echo 'alert("Anda telah berjaya menempah di Homestay CH!")';
        echo '</script>';
    }
    ?>
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
                    <a href="#" class="activenav">Tempah Rumah</a>
                    <a href="carian.php">Carian</a>
                    <a href="logkeluar.php">Log keluar</a>
                </div>
            </nav>
            <?php
            $kppelanggan = "";
            $idrumah = "";
            $tarikhmasuk = "";
            $jumlahhari = "";
            if (isset($_POST['kppelanggan'])) {
                $kppelanggan = $_POST['kppelanggan'];
            }
            if (isset($_POST['idrumah'])) {
                $idrumah = $_POST['idrumah'];
            }
            if (isset($_POST['tarikhmasuk'])) {
                $tarikhmasuk = $_POST['tarikhmasuk'];
            }
            if (isset($_POST['jumlahhari'])) {
                $jumlahhari = $_POST['jumlahhari'];
            }
            $queryrumah = mysqli_query($conn, "SELECT * FROM rumah");
            ?>
            <div class="interface">
                <div class="mainmenu">
                    <form action="" method="post">
                        <h2 id="tukarwarna">Lengkapkan Maklumat Di Bawah</h2><br>
                        <label for="">Kad Pengenalan Pelanggan:</label>
                        <input type="text" name="kppelanggan" id="" value="<?php echo $kppelanggan; ?>" placeholder="Tanpa space dan -" minlength="12" maxlength="12" required><br>
                        <label for="">Pilih Nama Rumah:</label>
                        <select name="idrumah" id="" class="select" required>
                            <option value="">--->Pilih Nama Rumah<---</option> <?php
                                                                            while ($namarumah = mysqli_fetch_array($queryrumah)) {
                                                                            ?> <option value="<?php echo $namarumah['idrumah']; ?>" <?php if ($idrumah == $namarumah['idrumah']) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $namarumah['namarumah']; ?></option>
                        <?php } ?>
                        </select><br>
                        <label for="">Tarikh Masuk:</label>
                        <input type="date" value="<?php echo $tarikhmasuk ?>" name="tarikhmasuk" id="" class="select" required>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                        <label for="">Jumlah Hari:</label>
                        <input type="number" value="<?php echo $jumlahhari; ?>" name="jumlahhari" min="1" oninput="validity.valid||(value='');" required>
                        <input type="submit" name="submit" value="Semak Harga" class="stylebtn"><br><br><br>
                    </form>
                    <form action="prosestempah.php" method="post">
                        <input type="hidden" name="kppelanggan" value="<?php echo $kppelanggan ?>">
                        <input type="hidden" name="idrumah" value="<?php echo $idrumah ?>">
                        <input type="hidden" name="jumlahhari" value="<?php echo $jumlahhari ?>">
                        <input type="hidden" name="tarikhmasuk" value="<?php echo $tarikhmasuk ?>">
                        <?php
                        if (isset($_POST['submit'])) {
                            $jumlahharga = 130 * $jumlahhari;
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
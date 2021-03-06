<?php include('settings.php');
session_start();

if (isset($_SESSION['User'])) {
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
    <script src="js/tukarwarna.js"></script>
    <title><?php echo $sysname; ?></title>
</head>

<body>
<?php
    if (isset($_GET['sudahdaftar'])) {
        echo '<script language="javascript">';
        echo 'alert("Anda sudah pun mendaftar sebagai pelanggan. Anda tidak perlu mendaftar sekali lagi. Teruskan dengan tempahan tiket wayang.")';
        echo '</script>';
    }
    if (isset($_GET['gagaltempahkp'])) {
        echo '<script language="javascript">';
        echo 'alert("Tempahan gagal. Anda memasukkan Nombor Kad Pengenalan Yang salah. Sila cuba lagi")';
        echo '</script>';
    }
    if (isset($_GET['berjayatempah'])) {
        echo '<script language="javascript">';
        echo 'alert("Tempahan berjaya. Untuk melihat tempahan anda, Anda boleh lihat di bahagian carian dan masukkan nombor kad pengenalan anda.")';
        echo '</script>';
    }
    if (isset($_GET['gagaldaftarkp'])) {
        echo '<script language="javascript">';
        echo 'alert("Pendaftaran Gagal. KP pelanggan telah pun digunakan. Atau anda menggunakan  NO KP yang salah.")';
        echo '</script>';
    }
    if (isset($_GET['berjayadaftar'])) {
        echo '<script language="javascript">';
        echo 'alert("Pelanggan berjaya didaftar")';
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
                <p class="title colorchangebtn" id="tukarwarna" onclick="changeColor()">Tukar warna</p>
                <div class="navbar2">
                    <a href="daftarpelanggan.php">Daftar Pelanggan</a>
                    <a href="tempah.php">Tempah Tiket</a>
                    <a href="carian.php">Carian</a>
                    <a href="logkeluar.php">Log keluar</a>
                </div>
            </nav>
            <div class="interface">
                <div class="mainmenu">
                    <h2 id="tukarwarna">Selamat datang <?php echo $_SESSION['User']; ?></h2><br>
                    <p class="title" id="tukarwarna">Selamat datang ke <?php echo $sysname; ?>.</p><br><br><br><br>
                    <a href="tempah.php" class="stylebtn">Tempah Tiket</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
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
    if (isset($_GET['sudahdaftar'])) {
        echo '<script language="javascript">';
        echo 'alert("Anda sudah pun mendaftar sebagai pelanggan. Anda tidak boleh mendaftar sekali lagi. Teruskan dengan tempahan tiket wayang.")';
        echo '</script>';
    }
    if (isset($_GET['gagaltempahkp'])) {
        echo '<script language="javascript">';
        echo 'alert("Maaf! tempahan gagal. Anda memasukkan Nombor Kad Pengenalan Yang salah. Sila cuba lagi")';
        echo '</script>';
    }
    if (isset($_GET['berjayatempah'])) {
        echo '<script language="javascript">';
        echo 'alert("Tahniah! tempahan anda berjaya!!!. Untuk melihat tempahan anda, Anda boleh lihat di bahagian carian dan masukkan nombor kad pengenalan anda.")';
        echo '</script>';
    }
    if (isset($_GET['gagaldaftarkp'])) {
        echo '<script language="javascript">';
        echo 'alert("Maaf! pendaftaran Gagal. KP pelanggan telah pun digunakan. Atau anda memasukkan NO KP yang salah.")';
        echo '</script>';
    }
    ?>
    <div class="header">
        <input type="checkbox" id="chk">
        <ul class="menu">
            <a href="daftarpelanggan.php">Daftar Pelanggan</a>
            <a href="tempah.php">Tempahan</a>
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
                    <p class="title" id="tukarwarna">Antaramuka ini sesuai digunakan dalam pelbagai sistem<br>
                        Sesuai untuk kerja kursus tingkatan 5 Sains Komputer.</p><br><br><br><br>
                    <a href="#" class="stylebtn">Tempah Tiket</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
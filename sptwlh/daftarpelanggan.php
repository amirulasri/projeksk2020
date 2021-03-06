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
if(!empty($nokp)){
    header('location: index.php?sudahdaftar=1');
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
    if (isset($_GET['perlu'])) {
        echo '<script language="javascript">';
        echo 'alert("Maaf! Maklumat tentang diri anda tiada, Sila masukkan maklumat anda sebelum membuat tempahan")';
        echo '</script>';
    }
    ?>
    <div class="header">
        <input type="checkbox" id="chk">
        <ul class="menu">
            <a href="#" class="activenav">Daftar Pelanggan</a>
            <a href="tempah.php">Tempah Tiket</a>
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
                    <a href="#" class="activenav">Daftar Pelanggan</a>
                    <a href="tempah.php">Tempah Tiket</a>
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
                    <form action="prosesdaftarpelanggan.php" method="post">
                    <h2>Daftar Pengguna Baru</h2><br>
                        <label for="" class="loginlabel" id="tukarwarna">Kad Pengenalan Pelanggan:</label>
                        <input type="text" name="kppelanggan" placeholder="Tanpa space dan -" required /><br>
                        <label for="" id="tukarwarna">Nama Pelanggan:</label>
                        <input type="text" name="namapelanggan"><br>
                        <label for="" id="tukarwarna">Nombor Telefon:</label>
                        <input type="number" name="nombortelefon" required><br>
                       
                       
                        <label for="" id="tukarwarna">Jantina:</label>
                        <select name="jantina" id="" class="select">
                            <option value="Lelaki">Lelaki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select><br>
                        <button type="submit" class="stylebtn" name="submit">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
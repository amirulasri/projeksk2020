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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/tukarwarna.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $sysname; ?></title>
</head>

<body>
    <?php
    if (isset($_GET['perlu'])) {
        echo '<script language="javascript">';
        echo 'alert("Anda perlu melengkapkan lebih maklumat tentang diri anda dahulu sebelum membuat tempahan")';
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
                <!-- Butang navigasi -->
                <p class="title colorchangebtn" id="change" onclick="changeColor()">Tukar warna</p>
                <div class="navbar2">
                    <a href="#" class="activenav">Daftar Pelanggan</a>
                    <a href="tempah.php">Tempah Rumah</a>
                    <a href="carian.php">Carian</a>
                    <a href="logkeluar.php">Log keluar</a>
                </div>
            </nav>
            <div class="interface">
                <div class="mainmenu">
                <!-- Borang daftar pelanggan baru -->
                    <form action="prosesdaftarpelanggan.php" method="post">
                    <h2>Daftar pelanggan</h2><br>
                        <label for="" class="loginlabel" id="tukarwarna">Kad Pengenalan Pelanggan</label>
                        <input type="text" name="kppelanggan" placeholder="Tanpa space dan -" minlength="12" maxlength="12" required /><br>
                        <label for="" id="tukarwarna">Nama Pelanggan:</label>
                        <input type="text" name="namapelanggan" required><br>
                        <label for="" id="tukarwarna">Jantina:</label>
                        <select name="jantina" id="" class="select" required>
                            <option value="lelaki">Lelaki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br>
                        <label for="" id="tukarwarna">Nombor Telefon:</label>
                        <input type="number" name="nombortelefon" required><br>
                        <label for="" id="tukarwarna">Email pelanggan:</label>
                        <input type="text" name="emailpelanggan" required><br>
                        <button type="submit" class="stylebtn" name="submit">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
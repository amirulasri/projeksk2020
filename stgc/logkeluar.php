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
                    <a href="tempah.php">Tempah Tiket</a>
                    <a href="carian.php">Carian</a>
                    <a href="logkeluar.php" class="activenav">Log keluar</a>
                </div>
            </nav>
            <div class="interface">
                <form action="proseslogkeluar.php" method="post">
                    <div class="mainmenu">
                        <h2 id="tukarwarna">Log Keluar</h2><br>
                        <p class="title" id="tukarwarna">Adakah anda pasti ingin log keluar?</p><br><br><br><br>
                        <input type="submit" name="logout" class="stylebtn" value="Log Keluar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
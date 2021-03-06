<?php include('settings.php'); ?>
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
    if (isset($_GET['gagal'])) {
        echo '<script language="javascript">';
        echo 'alert("Nama pengguna atau kata laluan salah")';
        echo '</script>';
    }
    if (isset($_GET['logkeluar'])) {
        echo '<script language="javascript">';
        echo 'alert("Log keluar berjaya")';
        echo '</script>';
    }
    if (isset($_GET['daftarberjaya'])) {
        echo '<script language="javascript">';
        echo 'alert("Berjaya didaftarkan. Sila log masuk dengan menggunakan ID dan KATA LALUAN anda")';
        echo '</script>';
    }
    ?>
    <div class="uiinner">
        <div class="ui">
            <nav class="navbar">
                <div class="logoinner">
                    <a href="#" class="Logo"><?php echo $sysname; ?></a>
                </div>
                <p class="title colorchangebtn" id="change" onclick="changeColor()">Tukar warna</p>
            </nav>
            <div class="interfacelogin">
                <form action="proseslogin.php" method="post">
                    <div class="mainmenu">
                        <!-- Borang login pelanggan -->
                        <h2 class="loginlabel" id="tukarwarna">Log Masuk Pelanggan</h2><br>
                        <label for="" class="loginlabel" id="tukarwarna">Username:</label>
                        <input type="text" class="loginarrange" name="id" required><br><br>
                        <label for="" id="tukarwarna">Password:</label>
                        <input type="password" name="password" required minlength="8" maxlength="8"><br><br>
                        <button type="submit" class="stylebtn" name="Login">Login</button>
                        <a href="penggunabaru.php" class="stylebtn">Pengguna Baharu</a><br><br>
                        <a href="admin/login.php" class="stylebtn adminposition">Admin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
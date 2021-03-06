<?php include('settings.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/stylelogin.css">
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
    if (isset($_GET['gagal'])) {
        echo '<script language="javascript">';
        echo 'alert("Maaf nama pengguna atau kata laluan anda salah, sila cuba semula")';
        echo '</script>';
    }
    if (isset($_GET['logkeluar'])) {
        echo '<script language="javascript">';
        echo 'alert(" Anda sudah di log keluar ")';
        echo '</script>';
    }
    if (isset($_GET['daftarberjaya'])) {
        echo '<script language="javascript">';
        echo 'alert(" Tahniah anda sudah berjaya didaftarkan. Sila log masuk dengan menggunakan ID dan KATA LALUAN anda dengan betul ")';
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
                        <h2 class="loginlabel">Log Masuk Pelanggan</h2><br>
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
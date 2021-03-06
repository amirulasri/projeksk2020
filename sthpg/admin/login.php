<?php include('../settings.php'); ?>
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
    if (isset($_GET['logkeluar'])) {
        echo '<script language="javascript">';
        echo 'alert("Anda berjaya log untuk keluar")';
        echo '</script>';
    }
    if (isset($_GET['gagal'])){
        echo '<script language="javascript">';
        echo 'alert("Nama pengguna atau kata laluan yang anda masukkan adalah salah")';
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
                        <h2 class="loginlabel">Log Masuk Admin</h2><br>
                        <label for="" class="loginlabel" id="tukarwarna">Username:</label>
                        <input type="text" class="loginarrange" name="id" required><br><br>
                        <label for="" id="tukarwarna">Password:</label>
                        <input type="text" name="password" required minlength="8" maxlength="8"><br><br>
                        <button type="submit" class="stylebtn" name="Login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
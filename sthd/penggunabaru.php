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
    if (isset($_GET['tidaktersedia'])) {
        echo '<script language="javascript">';
        echo 'alert("Nama pengguna tidak wujud. Masukkan nama pengguna yang lain")';
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
                <form action="prosesdaftar.php" method="post" name="form1">
                    <div class="mainmenu">
                        <h2>Daftar Pengguna Baru</h2><br>
                        <label for="" class="loginlabel" id="tukarwarna">Username:</label>
                        <input type="text" class="loginarrange" name="id" required><br><br>
                        <p class="alert" id="kurang" style="display: none;">Kata laluan yang anda masukkan kurang dari 8 perkataan</p>
                        <p class="alert" id="lebih" style="display: none;">Kata laluan yang anda masukkan lebih dari 8 perkataan</p>
                        <label for="" id="tukarwarna">Password:</label>
                        <input type="text" name="katalaluan" placeholder="Tidak boleh kurang dan melebihi 8 aksara" required><br><br>
                        <button type="submit" class="stylebtn" name="submit" onclick="return stringlength(document.form1.katalaluan,8,8)">Seterusnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function stringlength(inputtxt, minlength, maxlength) {
            var field = inputtxt.value;
            var mnlen = minlength;
            var mxlen = maxlength;

            if (field.length < mnlen) {
                document.getElementById("lebih").style.display = "none";
                document.getElementById("kurang").style.display = "block";
                return false;
            } else if (field.length > mxlen){
                document.getElementById("kurang").style.display = "none";
                document.getElementById("lebih").style.display = "block";
                return false;
            }else{
                return confirm('Anda telah melengkapkan maklumat dengan betul. Klik OK untuk meneruskan pendaftaran, Klik Cancel untuk membatalkan pendaftaran');
            }
        }
    </script>
</body>

</html>
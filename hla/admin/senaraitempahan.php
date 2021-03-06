<?php include('../settings.php');
session_start();

if (isset($_SESSION['admin'])) {
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
    <script>
        function ubahsaiz(pendaraban){
            var saizasal = document.body.style.zoom || 1;
            document.body.style.zoom = (parseFloat(saizasal) + (pendaraban * 0.2));
        }
    </script>
</head>

<body>
    <div class="uiinner">
        <div class="ui">
            <nav class="navbar">
                <div class="logoinner">
                    <a href="#" class="Logo"><?php echo $sysname; ?></a>
                </div>
                <p class="title colorchangebtn" onclick="ubahsaiz(1)">Zoom +</p>
                <p class="title colorchangebtn" onclick="ubahsaiz(-1)">Zoom -</p>
                <p class="title colorchangebtn" id="change" onclick="changeColor()">Tukar warna &nbsp;&nbsp;</p>
                <div class="navbar2">
                    <a href="daftarrumah.php">Daftar Rumah</a>
                    <a href="senaraitempahan.php" class="activenav">Senarai Tempahan</a>
                    <a href="carian.php">Carian</a>
                    <a href="logkeluar.php">Log keluar</a>
                </div>
            </nav>
            <div class="interface">
                <?php
                include('../settings.php');
                $query = mysqli_query($conn, "SELECT * FROM pelanggan INNER JOIN tempahan ON pelanggan.kppelanggan = tempahan.kppelanggan");
                ?>
                <div class="mainmenu">
                    <h2 id="tukarwarna">Senarai Tempahan</h2><br>
                    <div class="tablepane">
                        <table align="center" border="1">
                            <thead>
                                <th>KP pelanggan</th>
                                <th>Email Pelanggan</th>
                                <th>ID Rumah</th>
                                <th>Tarikh Masuk</th>
                                <th>Jumlah Hari</th>
                                <th>Jumlah Harga</th>
                            </thead>
                            <tbody>
                                <?php
                                while($data = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $data['kppelanggan']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['idrumah']; ?></td>
                                    <td><?php echo $data['tarikhmasuk']; ?></td>
                                    <td><?php echo $data['jumlahhari']; ?></td>
                                    <td>RM <?php echo $data['jumlahharga']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
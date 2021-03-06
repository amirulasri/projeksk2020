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
    <link rel="stylesheet" href="../style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/tukarwarna.js"></script>
    <title><?php echo $sysname; ?></title>
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
                    <a href="index.php" class="Logo"><?php echo $sysname; ?></a>
                    <label for="chk">
                        <p class="menubtn">Menu</p>
                    </label>
                </div>
                <p class="title colorchangebtn" onclick="ubahsaiz(1)">Zoom +</p>
                <p class="title colorchangebtn" onclick="ubahsaiz(-1)">Zoom -</p>
                <p class="title colorchangebtn" id="change" onclick="changeColor()">Tukar warna &nbsp;&nbsp;</p>
                <div class="navbar2">
                    <a href="#" class="activenav">Daftar Tayangan</a>
                    <a href="senaraitempahan.php">Senarai Tempahan</a>
                    <a href="carian.php">Carian</a>
                    <a href="logkeluar.php">Log keluar</a>
                </div>
            </nav>
            <div class="interface">
                <div class="mainmenu">
                    <form action="prosesdaftartayangan.php" method="post">
                        <h2 id="tukarwarna">Daftar Tayangan</h2><br>
                        <?php
                        if (isset($_GET['berjaya'])) {
                            echo "<p style='background-color:greenyellow;'>Tayangan telah berjaya didaftarkan</p>";
                        }
                        if (isset($_GET['berjayaupload'])) {
                            echo '<script>
                            alert("Fail Berjaya Dimuat Naik!")
                            </script>';
                        }
                        if (isset($_GET['gagalupload'])) {
                            echo '<script>
                            alert("Fail Gagal Dimuat Naik!")
                            </script>';
                        }
                        ?>
                        <label for="" id="tukarwarna">Nama tayangan:</label>
                        <input type="text" name="namatayangan" required><br>
                        <br><br>
                        <button type="submit" class="stylebtn">Daftar Tayangan</button>
                    </form><br><br><br>
                    <form class="form-horizontal" action="prosesuploadcsv.php" method="post" name="uploadCSV" enctype="multipart/form-data">
                        <div class="input-row">
                            <label class="col-md-4 control-label" id="tukarwarna">Pilih fail .CSV</label> <input type="file" class="stylebtn" name="file" id="file" accept=".csv" required />
                            <button type="submit" id="submit" name="import" class="btn-submit stylebtn">Import</button>
                            <br />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
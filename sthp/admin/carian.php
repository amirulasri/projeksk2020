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
        function ubahsaiz(pendaraban) {
            var saizasal = document.body.style.zoom || 1;
            document.body.style.zoom = (parseFloat(saizasal) + (pendaraban * 0.2));
        }
    </script>
    <script src="../jquery/jquery-3.4.1.js"></script>
</head>

<body>
    <?php
    if (isset($_GET['berjaya'])) {
        echo '<script language="javascript">';
        echo 'alert("Tempahan sudah berjaya dipadamkan.")';
        echo '</script>';
    }
    if (isset($_GET['berjayakemaskini'])) {
        echo '<script language="javascript">';
        echo 'alert("Tempahan anda berjaya dikemaskini.")';
        echo '</script>';
    }
    if (isset($_GET['gagal'])) {
        echo '<script language="javascript">';
        echo 'alert("Maaf Tempahan anda gagal dikemaskini, sila cuba lagi.")';
        echo '</script>';
    }
    ?>
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
                    <a href="senaraitempahan.php">Senarai Tempahan</a>
                    <a href="carian.php" class="activenav">Carian</a>
                    <a href="logkeluar.php">Log keluar</a>
                </div>
            </nav>
            <div class="interface">
                <div class="mainmenu">
                    <form action="" method="get">
                        <?php
                        $kppelanggan = "";
                        if (isset($_GET['kppelanggan'])) {
                            $kppelanggan = $_GET['kppelanggan'];
                        }
                        $query = mysqli_query($conn, "SELECT * FROM pelanggan INNER JOIN tempahan ON pelanggan.kppelanggan = tempahan.kppelanggan INNER JOIN rumah ON rumah.idrumah = tempahan.idrumah WHERE tempahan.kppelanggan = '$kppelanggan'");
                        ?>
                        <h2 id="tukarwarna" class="title">Carian</h2><br>
                        <label for="">Masukkan KP Pelanggan:</label>
                        <input type="number" value="<?php echo $kppelanggan; ?>" name="kppelanggan" minlength="12" maxlength="12" required />
                        <button type="submit" class="stylebtn">Cari</button><br><br>
                        <div class="tablepane">
                            <table align="center" border="1" id="table">
                                <thead>
                                    <tr>
                                        <th colspan="7">Tempahan Pelanggan -<?php echo $sysname; ?>-</th>
                                    </tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Pemandangan</th>
                                    <th>Tarikh Masuk</th>
                                    <th>Jumlah Hari</th>
                                    <th>Jumlah Harga</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($carian = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $carian['namapelanggan']; ?></td>
                                            <td><?php echo $carian['pemandangan']; ?></td>
                                            <td><?php echo $carian['tarikhmasuk']; ?></td>
                                            <td><?php echo $carian['jumlahhari']; ?> Hari</td>
                                            <td>RM <?php echo $carian['jumlahharga']; ?></td>
                                            <td><a href="edittempahan.php?id=<?php echo $carian['idtempahan'] ?>">Edit</a></td>
                                            <td><a href="padamtempahan.php?id=<?php echo $carian['idtempahan'] ?>" onclick="return confirm('Adakah anda pasti ingin memadam tempahan ini? Selepas memadam, data tidak dapat dipulihkan semula')">Delete</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        echo '<button class="btn stylebtn">Cetak</button>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.btn').click(function() {
            var cetak = document.getElementById('table');
            var wme = window.open("", "", "width=900,height=700");
            wme.document.write(cetak.outerHTML);
            wme.document.close();
            wme.focus();
            wme.print();
            // wme.close();
        })
    </script>
</body>

</html>
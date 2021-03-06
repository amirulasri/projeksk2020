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
    <title><?php echo $sysname; ?></title>
    <script src="jquery/jquery-3.4.1.js"></script>
    <script src="js/tukarwarna.js"></script>
</head>

<body>
    <div class="uiinner">
        <div class="ui">
            <nav class="navbar">
                <div class="logoinner">
                    <a href="#" class="Logo"><?php echo $sysname; ?></a>
                </div>
                <p class="title colorchangebtn" id="change" onclick="changeColor()">Tukar warna</p>
                <div class="navbar2">
                    <a href="daftarpelanggan.php">Daftar Pelanggan</a>
                    <a href="tempah.php">Tempah Tiket</a>
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
                        $query = mysqli_query($conn, "SELECT * FROM pelanggan INNER JOIN tempahan ON pelanggan.kppelanggan = tempahan.kppelanggan INNER JOIN tayangan ON tempahan.idtayangan = tayangan.idtayangan WHERE pelanggan.kppelanggan = '$kppelanggan'");
                        ?>
                        <h2 id="tukarwarna" class="title">Carian</h2><br>
                        <label for="" id="tukarwarna">Masukkan KP Pelanggan:</label>
                        <input type="number" value="<?php echo $kppelanggan; ?>" name="kppelanggan" minlength="12" maxlength="12" required />
                        <button type="submit" class="stylebtn">Cari</button><br><br>
                        <div class="tablepane">
                            <table align="center" border="1" id="table">
                                <thead>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Tayangan</th>
                                    <th>Tarikh Tayangan</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Jumlah Harga</th>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($carian = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $carian['namapelanggan']; ?></td>
                                            <td><?php echo $carian['namatayangan']; ?></td>
                                            <td><?php echo $carian['tarikhtayangan']; ?></td>
                                            <td><?php echo $carian['jumlahtiket']; ?></td>
                                            <td>RM <?php echo $carian['jumlahharga']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div><br>
                    </form>
                    <?php
                    if(mysqli_num_rows($query) > 0 ){
                        echo '<button class="btn stylebtn">Cetak</button>';
                    }
                    ?>
                    
                    <script>
                        $('.btn').click(function(){
                            var cetak = document.getElementById('table');
                            var wme = window.open("","","width=900,height=700");
                            wme.document.write(cetak.outerHTML);
                            wme.document.close();
                            wme.focus();
                            wme.print();
                           // wme.close();
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
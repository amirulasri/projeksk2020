<?php
include('../../setup.php');

session_start();

if (isset($_SESSION['User'])) {
} else {
    header("location:../index.php");
}

//CHECK ROLE
$adminuser = $_SESSION['User'];
$queryrole = mysqli_query($conn, "SELECT * FROM adminlogin WHERE username='$adminuser'");
while ($dataadmin = mysqli_fetch_array($queryrole)) {
    $roleadmin = $dataadmin['role'];
}

if ($roleadmin == 'root' or $roleadmin == 'administrator') {
} else {
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>D'Villa Homestay</title>
    <link rel="stylesheet" href="../style/administrator.css" type="text/css">
    <link rel="stylesheet" href="../style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../../style/loader.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../style/favicon.ico">
    <script src="../../jquery/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</head>

<body>

    <div class="loader-wrapper">
        <h1 class="textcolor">Akaun Pelanggan</h1>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <!-- Modal log keluar -->
    <div class="modal fade" id="logkeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log keluar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Adakah anda pasti ingin mengelog keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="proseslogkeluar.php?logout=1" role="button" class="btn btn-danger">Ya, log keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal tambah pelanggan -->
    <div class="modal fade" id="tambahpelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="prosestambahpelanggan.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akaun Pelanggan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">Nama Pelanggan:</label>
                        <input type="text" name="namapelanggan" class="form-control" required><br>
                        <label for="">Email Pelanggan:</label>
                        <input type="email" name="emailpelanggan" class="form-control" required><br>
                        <label for="">Nombor Telefon:</label>
                        <input type="tel" name="notelpelanggan" pattern="[0-9]{10,11}" class="form-control" required><br>
                        <label for="">Kata Laluan Baru:</label>
                        <input type="password" name="katalaluanpelanggan" class="form-control" required><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Pelanggan Baru</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal ubah akaun pelanggan -->
    <div class="modal fade" id="ubahakaunpelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="proseskemaskiniakaunpelanggan.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Akaun Pelanggan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="dataakaunpelanggan">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <header>
        <a href="index.php" class="logo">ADMINISTRATOR</a>
        <div class="menu-toggle" onclick="tukaricon(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav class="hidenav">
            <ul>
                <li><a href="tempahanpelanggan.php">Senarai tempahan keseluruhan</a></li>
                <li><a href="daftarrumah.php">Daftar rumah</a></li>
                <li><a href="senarairumah.php">Senarai rumah</a></li>
                <li><a href="cariantempahan.php">Carian</a></li>
                <li><a href="#" data-toggle="modal" data-target="#logkeluar">Log keluar</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <script>
        $(document).ready(function() {
            $('.menu-toggle').click(function() {
                $('.menu-toggle').toggleClass('active')
                $('nav').toggleClass('active')
            })
        })

        function tukaricon(x) {
            x.classList.toggle("change");
        }
    </script>
    <div class="boranglogin">
        <div class="boranglogindalam">
            <div class="logininput" style="overflow-x: auto;">
                <h2 class="titlecolor">Akaun Pelanggan<br></h2>
                <p class="titlecolor">Anda boleh menambah akaun pelanggan melalui kawalan admin.</p>
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahpelanggan">Tambah Akaun Pelanggan Baru +</button>
                <br><br>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM pelanggan INNER JOIN pelangganlogin ON pelanggan.email = pelangganlogin.email");
                ?>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Email Pelanggan</th>
                            <th>Nombor Telefon</th>
                            <th>Kata Laluan</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr class="table-success" <?php if ($data['role'] == 'root') {
                                                            echo "style='display: none;'";
                                                        } ?>>
                                <td><?php echo $data['namapelanggan']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['notelpelanggan']; ?></td>
                                <td><?php echo $data['katalaluan']; ?></td>
                                <td><button id="<?php echo $data['email']; ?>" onclick="ubahdataakaunpelanggan(this.id)" class="btn btn-warning">Ubah</button> <a role="button" class="btn btn-danger" onclick="return confirm('Adakah anda pasti ingin memadam akaun ini?')" href="prosespadamakaunpelanggan.php?emailpelanggan=<?php echo $data['email']; ?>">Padam</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function ubahdataakaunpelanggan(str) {
            $('#ubahakaunpelanggan').modal('show');
            var xhttp;
            if (str == "") {
                document.getElementById("dataakaunpelanggan").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dataakaunpelanggan").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "ajaxdataakaunpelanggan.php?emailpelanggan=" + str, true);
            xhttp.send();
        }
    </script>
</body>

</html>
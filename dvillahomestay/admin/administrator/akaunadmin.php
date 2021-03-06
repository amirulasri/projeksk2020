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
        <h1 class="textcolor">Akaun Admin</h1>&nbsp;&nbsp;&nbsp;&nbsp;
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
    <!-- Modal tambah admin -->
    <div class="modal fade" id="tambahadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="prosestambahadmin.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">Nama Admin:</label>
                        <input type="text" name="namaadmin" class="form-control" required><br>
                        <label for="">Nama Pengguna:</label>
                        <input type="text" name="username" class="form-control" required><br>
                        <label for="">Kata Laluan Baru:</label>
                        <input type="password" name="katalaluan" class="form-control" required><br>
                        <label for="">Role:</label>
                        <select name="role" class="form-control" required>
                            <option value="" selected disabled>PILIH ROLE</option>
                            <option value="administrator">Administrator</option>
                            <option value="standard">Standard User</option>
                        </select>
                        <p>Jika anda pilih Administrator, pengguna itu dapat mengubah nama pengguna, kata laluan dan memadam akaun admin yang lain serta pelanggan. Manakala Standard User pula, pengguna itu hanya boleh menguruskan bahagian tempahan sahaja.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Admin Baru</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal ubah akaun admin -->
    <div class="modal fade" id="ubahakaunadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="proseskemaskiniakaunadmin.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Akaun Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="dataakaunadmin">

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
            <div class="logininput">
                <h2 class="titlecolor">Akaun Admin<br> </h2>
                <p class="titlecolor">Anda boleh menambah lebih banyak akaun admin untuk membolehkan pekerja mengurus sistem ini menggunakan akaun sendiri.</p>
                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahadmin">Tambah Admin Baru +</button>
                <br><br>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM adminlogin");
                ?>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Admin</th>
                            <th>Nama Pengguna</th>
                            <th>Kata Laluan</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr class="table-primary" <?php if ($data['role'] == 'root') {
                                                            echo "style='display: none;'";
                                                        } ?>>
                                <td><?php echo $data['namaadmin']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['password']; ?></td>
                                <td><button id="<?php echo $data['username']; ?>" onclick="ubahdataakaunadmin(this.id)" class="btn btn-warning">Ubah</button> <a role="button" class="btn btn-danger" onclick="return confirm('Adakah anda pasti ingin memadam akaun ini?')" href="prosespadamakaunadmin.php?username=<?php echo $data['username']; ?>">Padam</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function ubahdataakaunadmin(str) {
            $('#ubahakaunadmin').modal('show');
            var xhttp;
            if (str == "") {
                document.getElementById("dataakaunadmin").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dataakaunadmin").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "ajaxdataakaunadmin.php?username=" + str, true);
            xhttp.send();
        }
    </script>
</body>

</html>
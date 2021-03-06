<?php
include('../setup.php');
$statuslogin = "";

session_start();
if (isset($_SESSION['User1'])) {
    $statuslogin = 1;
} else {
    header('location: ../index.php');
    $statuslogin = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>D'Villa Homestay</title>
    <link rel="stylesheet" href="style/formstyle.css" type="text/css">
    <link rel="stylesheet" href="style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="style/navbar.css">
    <link rel="stylesheet" href="../style/loader.css">
    <script src="../jquery/jquery.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../style/favicon.ico">
    <script src="../jquery/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body onload="semakloginstatus()">
    <!-- Bahagian popup log keluar -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Log Keluar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Adakah anda pasti ingin mengelog keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="proseslogkeluar.php" role="button" class="btn btn-danger">Log keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Popup tukar saiz text -->
    <div class="modal fade" id="ubahsaiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah saiz teks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pilih saiz: <select name="zoom" class="form-control" id="zoom" required="required" onchange="tukarsaizteks()">
                        <option value="2" selected>Lalai</option>
                        <option style="font-size: 14px;" value="1">Kecil</option>
                        <option style="font-size: 20px;" value="3">Sederhana</option>
                        <option style="font-size: 30px;" value="4">Besar</option>
                    </select>
                    <input type="hidden" value="" id="idsaiz">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Papar kotak carian -->
    <div class="modal fade" id="carian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cari Tempahan Anda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="">Masukkan ID tempahan anda, dan klik OK</label><br>
                    <input type="number" id="idcarian" class="form-control" onkeyup="prosescarian()" placeholder="ID tempahan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?php echo $statuslogin; ?>" id="statuslogin">
    <header>
        <a href="../index.php" class="logo">D'Villa Homestay</a>
        <div class="menu-toggle" onclick="tukaricon(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav class="hidenav">
            <ul>
                <li><a href="index.php">Tempah sekarang</a></li>
                <li><a href="#" class="active status" style="display: none">Tempahan saya</a></li>
                <li><a href="#" role="button" data-toggle="modal" data-target="#ubahsaiz">Ubah Saiz</a></li>
                <li><a href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter" class="status" style="display: none">Log Keluar</a></li>
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
        <form action="tempahansaya.php?zoom=<?php echo $datazoom; ?>" method="post">
            <div class="boranglogindalam">
                <?php
                $email = $_SESSION['User1'];
                $queryjadual = mysqli_query($conn, "SELECT * FROM tempahan INNER JOIN rumah ON tempahan.idrumah = rumah.idrumah WHERE email='$email' ORDER BY idtempahan DESC");
                ?>
                <div class="logininput">
                    <h2 class="titlecolor">Senarai Tempahan Saya</h2>
                    <a href="#" role="button" data-toggle="modal" data-target="#carian" class="btn btn-success">Cari Tempahan</a>
                    <br><br>
                    <table class="table table-bordered" id="tempahanpelanggan">
                        <thead class="table-light">
                            <th>ID Tempahan</th>
                            <th>Rumah</th>
                            <th>Penginapan</th>
                            <th>Harga</th>
                            <th>Terperinci</th>
                        </thead>
                        <tbody class="table-hover table-primary">
                            <?php
                            while ($data = mysqli_fetch_assoc($queryjadual)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['idtempahan']; ?></td>
                                    <td><?php echo $data['namarumah']; ?></td>
                                    <td><?php
                                        $tarikhkeluar = strtotime($data['tarikhkeluar']);
                                        $tarikhmasuk = strtotime($data['tarikhmasuk']);
                                        $datediff = $tarikhkeluar - $tarikhmasuk;

                                        echo round($datediff / (60 * 60 * 24)) . " Malam";
                                        ?></td>
                                    <td>RM <?php echo $data['jumlahharga']; ?></td>
                                    <td><a href="tempahansaya.php?idtempahan=<?php echo $data['idtempahan']; ?>" role="button" class="btn btn-primary">Lihat</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div class="loader-wrapper">
        <h2 class="textcolor">Senarai Tempahan</h2>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <script>
        function semakloginstatus() {
            var statuslogin = document.getElementById("statuslogin").value;
            if (statuslogin == 1) {
                var x = document.querySelectorAll(".status");
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].style = "dislay: block;";
                }
            }
        }
    </script>
    <script>
        function tukarsaizteks() {
            var idsaiz = document.getElementById('zoom').value;
            var zoom = "";
            if (idsaiz == 1) {
                zoom = "80%";
            } else if (idsaiz == 2) {
                zoom = "100%";
            } else if (idsaiz == 3) {
                zoom = "120%";
            } else if (idsaiz == 4) {
                zoom = "130%";
            } else if (idsaiz == 5) {
                zoom = "140%";
            }
            document.body.style = "zoom:" + zoom + ";";
        }
    </script>
    <script>
        function prosescarian() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("idcarian");
            filter = input.value.toUpperCase();
            table = document.getElementById("tempahanpelanggan");
            tr = table.getElementsByTagName("tr");

            // Proses carian berdasarkan id tempahan yang dimasukkan. Jika tak ada yang berkaitan,
            //hilangkan row tersebut.
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
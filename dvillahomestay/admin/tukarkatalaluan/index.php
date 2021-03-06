<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>D'Villa Homestay</title>
    <link rel="stylesheet" href="../style/administrator.css" type="text/css">
    <link rel="stylesheet" href="../../style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../style/loader.css" type="text/css">
    <link rel="stylesheet" href="../style/navbar.css">
    <script src="../../jquery/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</head>

<body>

    <div class="loader-wrapper">
        <h1 class="textcolor">D'Villa Homestay</h1>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>

    <header>
        <a href="#" class="logo">ADMINISTRATOR</a>
        <div class="menu-toggle" onclick="tukaricon(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav class="hidenav">
            <ul>
                <li><a href="#" class="active">Tukar kata laluan admin</a></li>

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
    <?php
    $info = "";
    if (isset($_GET['info'])) {
        $info = $_GET['info'];
    }
    ?>
    <div class="boranglogin">
        <form action="prosestukarkatalaluan.php" method="POST">
            <div class="boranglogindalam">
                <div class="logininput">
                    <h2 class="titlecolor">Tukar kata laluan admin</h2>
                    <br>
                    <?php
                    if ($info == 1) {
                        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                             Kata laluan berjaya ditukar
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                    } elseif ($info == 2) {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             Dua kata laluan yang anda masukkan <strong>tidak sama!</strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                    } elseif ($info == 3) {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             Kata laluan lama yang anda masukkan adalah salah!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";
                    }
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white" id="basic-addon3">ID Admin Baru</span>
                        </div>
                        <input type="text" name="idadminbaru" class="form-control" placeholder="Jika tidak mahu ubah ID Admin, Biarkan Kosong">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white" id="basic-addon3">Kata laluan lama</span>
                        </div>
                        <input type="text" name="katalaluanlama" class="form-control" oninvalid="this.setCustomValidity('Masukkkan kata laluan lama!')" oninput="this.setCustomValidity('')" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white" id="basic-addon3">Kata laluan baru</span>
                        </div>
                        <input type="text" name="katalaluan1" class="form-control" oninvalid="this.setCustomValidity('Masukkkan kata laluan baru!')" oninput="this.setCustomValidity('')" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white" id="basic-addon3">Kata laluan baru sekali
                                lagi</span>
                        </div>
                        <input type="text" name="katalaluan2" class="form-control" oninvalid="this.setCustomValidity('Masukkkan kata laluan baru!')" oninput="this.setCustomValidity('')" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tukar kata laluan</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
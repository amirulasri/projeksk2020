<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">
  <title>Log Masuk</title>
  <link rel="stylesheet" href="style/loginstyle.css" type="text/css">
  <link rel="stylesheet" href="style/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="style/loader.css">
  <link rel="shortcut icon" type="image/x-icon" href="style/favicon.ico">
  <script src="jquery/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
  <div class="loader-wrapper">
    <h1 class="textcolor">Log Masuk</h1>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="loader"><span class="loader-inner"></span></span>
  </div>
  <script>
    $(window).on("load", function() {
      $(".loader-wrapper").fadeOut("slow");
    });
  </script>
  <!-- Modal log masuk gagal -->
  <div class="modal fade" id="loggagal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Gagal log masuk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Email atau kata laluan yang anda masukkan salah. Sila cuba lagi.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'setup.php';
  if (($conn->connect_errno) == 1049) {
    echo "<script>window.location.href='firststart.php'</script>";
  } else if (($conn->connect_errno) == 2002) {
    echo "<script>window.location.href='gagalsambungan.html'</script>";
  }
  $info = "";
  if (isset($_GET['info'])) {
    $info = $_GET['info'];
  }

  ?>
  <div class="boranglogin">
    <div class="boranglogindalam">
      <div class="logininput">
        <form action="pelangganloginproses.php" method="post">
          <h3 class="titlecolor">D'Villa Homestay</h3><br>
          <?php
          if (isset($_GET['email'])) {
            $email = $_GET['email'];
          }
          if ($info == 1) {
            echo "
            <script>
            $('#loggagal').modal('show');
            </script>
            <div class='alert alert-danger' role='alert'>
                        Email atau kata laluan yang dimasukkan adalah salah! <a href='resetkatalaluanpelanggan.php?email=$email' class='alert-link'>Terlupa Kata Laluan</a>
                      </div>";
          } elseif ($info == 3) {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        Kata laluan anda telah dihantar melalui email. Periksa sekarang.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
          } elseif ($info == 4) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Ralat: gagal menghantar kata laluan melalui email
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
          } elseif ($info == 5) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Email yang anda masukkan tidak dijumpai dalam data. Ini bermakna anda tidak mendaftar akaun D'Villa menggunakan email ini.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
          }
          ?>
          <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $email; ?>" required><br>
          <input type="password" name="katalaluan" placeholder="Kata laluan" class="form-control" required><br>
          <button type="submit" class="btn btn-primary" name="Login">Log Masuk</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
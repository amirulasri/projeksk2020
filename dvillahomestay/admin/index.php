<?php
include '../setup.php';
if ($conn->connect_errno) {
  echo "<script>window.location.href='../gagalsambunganadmin.html'</script>";
}
session_start();
if (isset($_SESSION['User'])) {
  header('location: administrator/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">
  <title>Admin</title>
  <link rel="stylesheet" href="style/loginstyle.css" type="text/css">
  <link rel="stylesheet" href="style/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="../style/loader.css">
  <link rel="shortcut icon" type="image/x-icon" href="../style/favicon.ico">
  <script src="../jquery/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>
  <div class="loader-wrapper">
    <h1 class="textcolor">ADMINISTRATOR</h1>&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="loader"><span class="loader-inner"></span></span>
  </div>
  <script>
    $(window).on("load", function() {
      $(".loader-wrapper").fadeOut("slow");
    });
  </script>
  <!-- Modal log keluar berjaya -->
  <div class="modal fade" id="logkeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Keluar Berjaya</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Log keluar berjaya, kembali ke laman login admin.
        </div>
      </div>
    </div>
  </div>
  <!-- Modal gagal log masuk -->
  <div class="modal fade" id="loggagal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Masuk Gagal!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ID dan Katalaluan yang dimasukkan salah!
        </div>
      </div>
    </div>
  </div>
  <?php
  $info = "";
  if (isset($_GET['info'])) {
    $info = $_GET['info'];
  }

  ?>
  <div class="boranglogin">
    <div class="boranglogindalam">
      <div class="logininput">
        <form action="adminloginproses.php" method="post">
          <h3 class="titlecolor">ADMIN D'Villa Homestay</h3><br>
          <?php
          if ($info == 1) {
            echo "
            <script>
            $('#loggagal').modal('show')
            </script>
            <div class='alert alert-danger' role='alert'>
                        ID atau kata laluan yang dimasukkan adalah salah!
                      </div>";
          } elseif ($info == 2) {
            echo "
            <script>
            $('#logkeluar').modal('show')
            </script>
            ";
          }
          ?>
          <input type="text" name="id" placeholder="ID Admin" class="form-control" required><br>
          <input type="password" name="password" placeholder="Kata laluan" class="form-control" required><br>
          <button type="submit" class="btn btn-primary" name="Login">Log Masuk</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
$id = $_GET['id'];

if ($id == 1) { } else {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>D'Villa Homestay</title>
    <link rel="stylesheet" href="../../../../admin/style/administrator.css" type="text/css">
    <link rel="stylesheet" href="../../../style/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../style/navbar.css">
    <link rel="stylesheet" href="../../../../style/loader.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../../../style/favicon.ico">
    <script src="../../../../jquery/jquery.js"></script>
    <script src="../../../../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="boranglogin">
        <div class="boranglogindalam">
            <div class="logininput">
                <h2 class="titlecolor">Reset Password Berjaya!</h2>
                <br>
                <p class="titlecolor">Gunakan ID: admin dan Katalaluan: 12345678 untuk log masuk admin</p>
                <a href="../../../index.php" role="button" class="btn btn-primary">Login Admin</a>
            </div>
        </div>
    </div>
    <div class="loader-wrapper">
        <h1 class="textcolor">Reset Password</h1>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>


</body>

</html>
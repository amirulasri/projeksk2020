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
    <header>
        <a href="#" class="logo">ADMINISTRATOR</a>
        <div class="menu-toggle" onclick="tukaricon(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav class="hidenav">
            <ul>
                <li><a href="#" class="active">RESET PASSWORD</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
        <script>
        $(document).ready(function () {
            $('.menu-toggle').click(function () {
                $('.menu-toggle').toggleClass('active')
                $('nav').toggleClass('active')
            })
        })

        function tukaricon(x) {
            x.classList.toggle("change");
        }
    </script>
    <div class="boranglogin">
        <form action="resetpasswordproses.php" method="post">
        <div class="boranglogindalam">
            <div class="logininput">
                <h2 class="titlecolor">Reset Admin Password</h2>
                <br>
                <button type="submit" name="submit" class="btn btn-danger">RESET!</button>
            </div>
        </div>
        </form>
    </div>
    <div class="loader-wrapper">
        <h1 class="textcolor">Reset Password</h1>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load", function () {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>


</body>

</html>
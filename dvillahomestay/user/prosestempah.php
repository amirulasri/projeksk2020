<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>Menyelesaikan Tempahan</title>
    <script src="../jquery/jquery.js"></script>
    <link rel="stylesheet" href="../style/loader.css">
    <link rel="stylesheet" href="../style/bootstrap.css">
</head>

<body>
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
</body>

</html>


<?php

include '../setup.php';
require '../PHPMailer/PHPMailerAutoload.php';
require '../vendor/autoload.php';

$idrumah = $_POST['idrumah'];
$tarikhmasuk = $_POST['tarikhmasuk'];
$tarikhkeluar = $_POST['tarikhkeluar'];
$jumlahharga = $_POST['jumlahharga'];
$email = $_POST['email'];
$namapelanggan = $_POST['namapelanggan'];
$notelpelanggan = $_POST['notelpelanggan'];
$bildewasa = $_POST['bildewasa'];
$bilkanakkanak = $_POST['bilkanakkanak'];
$katalaluan = $_POST['katalaluanpelanggan'];

if (empty($bilkanakkanak)) {
    $bilkanakkanak = 0;
}
if (empty($bildewasa)) {
    $bildewasa = 1;
}

//Proses mendaftar disini:
//Periksa sama ada rumah itu telah ditempah sebelum ini
$semakrumah = mysqli_query($conn, "SELECT * FROM tempahan WHERE idrumah='$idrumah'");
$kekosongan = mysqli_num_rows($semakrumah);
if ($tidaktersedia == 0) {
    // Jika rumah yang dipilih masih lagi belum ditempah oleh orang lain, Teruskan dengan tempahan
    //PROSES TEMPAHAN:
    $insert1 = "INSERT INTO pelanggan (email, namapelanggan, notelpelanggan) VALUES ('$email', '$namapelanggan', '$notelpelanggan')";
    $result2 = mysqli_query($conn, $insert1);

    //Jika data terperinci pelanggan berjaya daftar, Teruskan dengan masukkan maklumat login pelanggan
    if ($result2) {
        $insert0 = "INSERT INTO pelangganlogin (email, katalaluan) VALUES ('$email', '$katalaluan')";
        $result1 = mysqli_query($conn, $insert0);
        //Jika data login berjaya masukkan, teruskan dengan memasukkan data tempahan pelanggan
        if ($result1) {
            $insert2 = "INSERT INTO tempahan (idtempahan, idrumah, email, tarikhmasuk, tarikhkeluar, bildewasa, bilkanakkanak, jumlahharga, namapelanggan, notelpelanggan, statusbayaran) VALUES (NULL, '$idrumah', '$email', '$tarikhmasuk', '$tarikhkeluar', '$bildewasa', '$bilkanakkanak', '$jumlahharga', '$namapelanggan', '$notelpelanggan', 'Belum dibuat')";
            $result3 = mysqli_query($conn, $insert2);
            //Jika data tempahan berjaya dimasukkan, teruskan dengan menghantar resit melalui email
            if ($result3) {

                //PEMILIHAN DATA ID TEMPAHAN PELANGGAN
                $sql2 = "SELECT * FROM tempahan WHERE idrumah='$idrumah' && tarikhmasuk='$tarikhmasuk'";
                $result = $conn->query($sql2);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $idtempahan = $row["idtempahan"];
                    }
                }


                //PEMILIHAN DATA PEMANDANGAN YANG DIPILIH
                $sql3 = "SELECT * FROM rumah WHERE idrumah='$idrumah'";
                $result2 = $conn->query($sql3);

                if ($result2->num_rows > 0) {
                    // output data of each row
                    while ($row = $result2->fetch_assoc()) {
                        $namarumah = $row["namarumah"];
                    }
                }

                //MENUKAT FORMAT TARIKH
                date_default_timezone_set('Asia/Kuala_Lumpur');


                //TARIKH MASUK
                $source = $tarikhmasuk;
                $date = new DateTime($source);
                $tarikhmasukbaru = $date->format('d-m-Y');

                //TARIKH KELUAR
                $source2 = $tarikhkeluar;
                $date2 = new DateTime($source2);
                $tarikhkeluarbaru = $date2->format('d-m-Y');

                //Proses hantar email
                $mail = new PHPMailerOAuth;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->oauthUserEmail = "dvillahomestays@gmail.com";                 // SMTP username
				$mail->oauthClientId = "207643860161-38pivgr6v8ohv1e3jg8fiju1hg3dj5r1.apps.googleusercontent.com";
				$mail->oauthClientSecret = "xpI7wE0Bhhoym4BfEZ2p-Ip-";
				$mail->oauthRefreshToken = "1//0gDjnwBPJZWtQCgYIARAAGBASNwF-L9IrwHbz4sAAbLZgKTuDehdZHfZpMAwn3o-YPmgozkxkEKR7arc7XWwVE3nbK29RIyWXnfE";
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to
				$mail->AuthType = 'XOAUTH2';

                $mail->SetFrom('dvillahomestays@gmail.com', 'DVillaHomestay');
                $mail->addAddress($email);     // Add a recipient

                // DIMATIKAN $mail->addAttachment('picture/success.gif');         // Add attachments
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Tempahan Rumah DvillaHomestay';
                $mail->Body    = "Tempahan anda telah <b>berjaya dibuat!!!</b><br><h2>ID Tempahan anda ialah: " . $idtempahan . "</h2><br><h3>Maklumat tempahan anda:</h3>
    <p><b>Nama: </b>" . $namapelanggan . "<br>
    <b>Rumah yang dipilih: </b>" . $namarumah . "<br>
    <b>Tarikh Masuk: </b>" . $tarikhmasukbaru . "<br>
    <b>Tarikh Keluar: </b>" . $tarikhkeluarbaru . "<br>
    <b>Bilangan dewasa: </b>" . $bildewasa . "<br>
    <b>Bilangan kanak-kanak: </b>" . $bilkanakkanak . "<br></p>
    <h4>Jumlah Harga perlu dibayar: RM " . $jumlahharga . "</h4><br>";
                $mail->AltBody = 'Tidak dapat dimuatkan';

                if (!$mail->send()) {
                    echo 'Email gagal dihantar';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    echo ("<script>location.href = 'tempahanberjaya.php?idtempahan=" . $idtempahan . "&emeldihantar=2';</script>");
                } else {
                    echo 'Email dihantar';
                    echo ("<script>location.href = 'tempahanberjaya.php?idtempahan=" . $idtempahan . "&emeldihantar=1';</script>");
                }
            } else {
                echo ("<script>location.href = '../index.php?error=1';</script>");
            }
        } else {
            echo ("<script>location.href = '../index.php?error=1';</script>");
        }
    } else {
        // Jika dah daftar, tak perlu daftar sekali lagi. Log masuk je.
        echo ("Huraian ralat: " . mysqli_error($conn));
        echo ("<br> Kod Ralat: " . $errorcode = mysqli_errno($conn));

        if ($errorcode == 1062) {
            echo '<script>
        alert("Email yang anda masukkan telah didaftarkan. Sila log masuk untuk membuat tempahan.");
        window.location.href="../index.php";</script>';
        }
    }

    $conn->close();
} else {
    while ($tarikh = mysqli_fetch_assoc($semaktarikh)) {
        $tarikhmasuk1 = $tarikh['tarikhmasuk'];
        $tarikhkeluar2 = $tarikh['tarikhkeluar'];
    }
    if ($tarikhmasuk >= $tarikhmasuk1 && $tarikhkeluar <= $tarikhkeluar2) {
        echo '<script>
        alert("Maaf. Tarikh yang anda pilih telah ditempah oleh pelanggan lain. Lihat rumah lain yang tersedia.");
        window.location.href="index.php";</script>';
    } else {
        // Jika tarikh yang dimasukkan itu tidak berada dalam julat tidak tersedia, Teruskan dengan tempahan
        //PROSES TEMPAHAN:

        $insert1 = "INSERT INTO pelanggan (email, namapelanggan, notelpelanggan) VALUES ('$email', '$namapelanggan', '$notelpelanggan')";
        $result2 = mysqli_query($conn, $insert1);

        //Jika data terperinci pelanggan berjaya daftar, Teruskan dengan masukkan maklumat login pelanggan
        if ($result2) {
            $insert0 = "INSERT INTO pelangganlogin (email, katalaluan) VALUES ('$email', '$katalaluan')";
            $result1 = mysqli_query($conn, $insert0);
            //Jika data login berjaya masukkan, teruskan dengan memasukkan data tempahan pelanggan
            if ($result1) {
                $insert2 = "INSERT INTO tempahan (idtempahan, idrumah, email, tarikhmasuk, tarikhkeluar, bildewasa, bilkanakkanak, jumlahharga, namapelanggan, notelpelanggan, statusbayaran) VALUES (NULL, '$idrumah', '$email', '$tarikhmasuk', '$tarikhkeluar', '$bildewasa', '$bilkanakkanak', '$jumlahharga', '$namapelanggan', '$notelpelanggan', 'Belum dibuat')";
                $result3 = mysqli_query($conn, $insert2);
                //Jika data tempahan berjaya dimasukkan, teruskan dengan menghantar resit melalui email
                if ($result3) {

                    //PEMILIHAN DATA ID TEMPAHAN PELANGGAN
                    $sql2 = "SELECT * FROM tempahan WHERE idrumah='$idrumah' && tarikhmasuk='$tarikhmasuk'";
                    $result = $conn->query($sql2);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $idtempahan = $row["idtempahan"];
                        }
                    }


                    //PEMILIHAN DATA PEMANDANGAN YANG DIPILIH
                    $sql3 = "SELECT * FROM rumah WHERE idrumah='$idrumah'";
                    $result2 = $conn->query($sql3);

                    if ($result2->num_rows > 0) {
                        // output data of each row
                        while ($row = $result2->fetch_assoc()) {
                            $namarumah = $row["namarumah"];
                        }
                    }

                    //MENUKAT FORMAT TARIKH
                    date_default_timezone_set('Asia/Kuala_Lumpur');


                    //TARIKH MASUK
                    $source = $tarikhmasuk;
                    $date = new DateTime($source);
                    $tarikhmasukbaru = $date->format('d-m-Y');

                    //TARIKH KELUAR
                    $source2 = $tarikhkeluar;
                    $date2 = new DateTime($source2);
                    $tarikhkeluarbaru = $date2->format('d-m-Y');


                    $mail = new PHPMailerOAuth;

                    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->oauthUserEmail = "dvillahomestays@gmail.com";                 // SMTP username
					$mail->oauthClientId = "207643860161-38pivgr6v8ohv1e3jg8fiju1hg3dj5r1.apps.googleusercontent.com";
					$mail->oauthClientSecret = "xpI7wE0Bhhoym4BfEZ2p-Ip-";
					$mail->oauthRefreshToken = "1//0gDjnwBPJZWtQCgYIARAAGBASNwF-L9IrwHbz4sAAbLZgKTuDehdZHfZpMAwn3o-YPmgozkxkEKR7arc7XWwVE3nbK29RIyWXnfE";
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to
					$mail->AuthType = 'XOAUTH2';

                    $mail->SetFrom('dvillahomestays@gmail.com', 'DVillaHomestay');
                    $mail->addAddress($email);     // Add a recipient

                    // DIMATIKAN $mail->addAttachment('picture/success.gif');         // Add attachments
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = 'Tempahan Rumah DvillaHomestay';
                    $mail->Body    = "Tempahan anda telah <b>berjaya dibuat!!!</b><br><h2>ID Tempahan anda ialah: " . $idtempahan . "</h2><br><h3>Maklumat tempahan anda:</h3>
    <p><b>Nama: </b>" . $namapelanggan . "<br>
    <b>Rumah yang dipilih: </b>" . $namarumah . "<br>
    <b>Tarikh Masuk: </b>" . $tarikhmasukbaru . "<br>
    <b>Tarikh Keluar: </b>" . $tarikhkeluarbaru . "<br>
    <b>Bilangan dewasa: </b>" . $bildewasa . "<br>
    <b>Bilangan kanak-kanak: </b>" . $bilkanakkanak . "<br></p>
    <h4>Jumlah Harga perlu dibayar: RM " . $jumlahharga . "</h4><br>";
                    $mail->AltBody = 'Tempahan Homestay D Villa';

                    if (!$mail->send()) {
                        echo 'Email gagal dihantar';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                        echo ("<script>location.href = 'tempahanberjaya.php?idtempahan=" . $idtempahan . "&emeldihantar=2';</script>");
                    } else {
                        echo 'Email dihantar';
                        echo ("<script>location.href = 'tempahanberjaya.php?idtempahan=" . $idtempahan . "&emeldihantar=1';</script>");
                    }
                } else {
                    echo ("<script>location.href = '../index.php?error=1';</script>");
                }
            } else {
                echo ("<script>location.href = '../index.php?error=1';</script>");
            }
        } else {
            echo ("Huraian ralat: " . mysqli_error($conn));
            echo ("<br> Kod Ralat: " . $errorcode = mysqli_errno($conn));

            if ($errorcode == 1062) {
                echo '<script>
            alert("Email yang anda masukkan telah didaftarkan. Sila log masuk untuk membuat tempahan.");
            window.location.href="../index.php";</script>';
            }
        }

        $conn->close();
    }
}
?>
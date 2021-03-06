<?php

include 'setup.php';
require 'PHPMailer/PHPMailerAutoload.php';
require 'vendor/autoload.php';

if (isset($_GET['email'])) {

    $email = $_GET['email'];

    //Dptkan nama pelanggan
    $querynama = mysqli_query($conn, "SELECT * FROM pelanggan WHERE email='$email'");
    while ($nama = mysqli_fetch_assoc($querynama)) {
        $namapelanggan = $nama['namapelanggan'];
    }

    //Dapatkan kata laluan
    $querypass = mysqli_query($conn, "SELECT * FROM pelangganlogin WHERE email='$email'");
    while ($pass = mysqli_fetch_assoc($querypass)) {
        $passpelanggan = $pass['katalaluan'];
    }

    if (!empty($passpelanggan)) {
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

        $mail->Subject = 'Kata Laluan Akaun DvillaHomestay';
        $mail->Body    = "Hai $namapelanggan. Anda baru sahaja memohon kata laluan anda. <br>
Kata laluan anda ialah: <b>$passpelanggan</b> <br>
Gunakan kata laluan itu untuk mengelog masuk";
        $mail->AltBody = 'Tidak dapat dimuatkan';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo ("<script>location.href = 'loginpelanggan.php?info=4';</script>");
        } else {
            //echo 'Message has been sent';
            echo ("<script>location.href = 'loginpelanggan.php?info=3';</script>");
        }
    }else{
        echo ("<script>location.href = 'loginpelanggan.php?info=5';</script>");
    }
}

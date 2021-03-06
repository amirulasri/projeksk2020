<?php
// Nama sistem:
$sysname = "SISTEM TEMPAHAN HOMESTAY SUPERMAN";

//---BAHAGIAN INI SAHAJA YANG PERLU ANDA UBAH----

$servername = "localhost";  // Masukkan nama pelayan anda... Tetapan lalai: localhost
$username = "root";   // Nama pengguna untuk mengakses pelayan anda... Tetapan lalai: root
$password = "";  // Katalaluan untuk mengakses pelayan anda... Tetapan lalai: admin123
$dbname = "sth08";  // Masukkan nama pangkalan data yang ada dalam pelayan anda ...

//-----------------------------------------------


//JANGAN SESEKALI MENGUBAH DATA DIBAWAH. BOLEH MENYEBABKAN KEGAGALAN SISTEM.
//Penyambungan ke pelayan. JANGAN USIK.
$conn = new mysqli($servername, $username, $password, $dbname);
$host = mysqli_connect($servername,$username,$password,$dbname);
$db = mysqli_select_db($conn, $dbname);
?>
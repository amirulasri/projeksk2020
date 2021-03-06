<?php
// Nama sistem:
$sysname = "Tayangan TGC";

$servername = "localhost";  // Masukkan nama pelayan
$username = "root";   // Nama pengguna untuk mengakses pelayan
$password = "";  // Katalaluan untuk mengakses pelayan
$dbname = "stgc";  // Masukkan nama pangkalan data yang ada dalam pelayan

//-----------------------------------------------


//JANGAN SESEKALI MENGUBAH DATA DIBAWAH. BOLEH MENYEBABKAN KEGAGALAN SISTEM.
//Penyambungan ke pelayan. JANGAN USIK.
$conn = new mysqli($servername, $username, $password, $dbname);
$host = mysqli_connect($servername,$username,$password,$dbname);
$db = mysqli_select_db($conn, $dbname);

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
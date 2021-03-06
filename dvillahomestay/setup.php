<?php
error_reporting(E_ERROR | E_PARSE);

$servername = "localhost";
$username = "root";  
$password = "";
$dbname = "dvillahomestay";

//-------------------------

//Penyambungan ke pelayan. JANGAN USIK.
$conn = new mysqli($servername, $username, $password, $dbname);
$host = mysqli_connect($servername,$username,$password,$dbname);
$db = mysqli_select_db($conn, $dbname);

//Penyambungan untuk CSV EKSPORT/IMPORT dan Login Access. JANGAN USIK.
$connect = mysqli_connect("$servername", "$username", "$password", "$dbname");
?>
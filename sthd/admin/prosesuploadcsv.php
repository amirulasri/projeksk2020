<?php
//Atur cara untuk import data rumah ke dalam daftar rumah
include('../settings.php');

if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    //Jika fail lebih besar daripada 0MB, proses fail
    if ($_FILES["file"]["size"] > 0) {

        //Read only
        $file = fopen($fileName, "r");

        // Looping
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into rumah (idrumah, pemandangan)
                   values ('" . $column[0] . "','" . $column[1] . "')";
            $result = mysqli_query($conn, $sqlInsert);
        }
        if (!empty($result)) {
            //Jika berjaya, papar popup berjaya
            header('location: daftarrumah.php?berjayaupload=1');
        } else {
            //Jika gagal, papar popup gagal
            header('location: daftarrumah.php?gagalupload=1');
        }
    }
}
?>
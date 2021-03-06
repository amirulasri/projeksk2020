<?php
include('../settings.php');

if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into rumah (idrumah, namarumah)
                   values ('" . $column[0] . "','" . $column[1] . "')";
            $result = mysqli_query($conn, $sqlInsert);
        }
        if (!empty($result)) {
        } else {
            header('location: daftarrumah.php?gagalupload=1');
        }
    }
}
?>
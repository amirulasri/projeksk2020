<?php
include('../settings.php');

if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into tayangan (idtayangan, namatayangan)
                   values ('" . $column[0] . "','" . $column[1] . "')";
            $result = mysqli_query($conn, $sqlInsert);
        }
        if (!empty($result)) {
            header('location: daftartayangan.php?berjayaupload=1');
        } else {
            header('location: daftartayangan.php?gagalupload=1');
        }
    }
}
?>
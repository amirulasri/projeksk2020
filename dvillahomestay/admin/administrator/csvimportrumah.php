<?php
include '../../setup.php';

if (isset($_POST["submit"])) {    
    $fileName = $_FILES["file"]["tmp_name"];    
    if ($_FILES["file"]["size"] > 0) {        
        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) 
        {$sqlInsert = "INSERT into rumah (idrumah, namarumah, hargarumah)

       values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "')";
         $result = mysqli_query($conn, $sqlInsert);			
        }
        if($result){
            header('location: senarairumah.php?info=4');
        }else{
            $ralat = $conn->error;
            header('location: senarairumah.php?info=5&ralat='.$ralat.'');
        }
    }else{
        header('location: senarairumah.php?info=9');
    }
}
?>

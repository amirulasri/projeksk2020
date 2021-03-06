<?php
include '../../setup.php';

if (isset($_POST["submit"])) {    
    $fileName = $_FILES["file"]["tmp_name"];    
    if ($_FILES["file"]["size"] > 0) {        
        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) 
        {$sqlInsert = "INSERT into tempahan (idtempahan, idrumah, email, tarikhmasuk, tarikhkeluar, bildewasa, bilkanakkanak, jumlahharga, namapelanggan, notelpelanggan, statusbayaran)

       values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "')";
         $result = mysqli_query($conn, $sqlInsert);
        }
        if($result){
            header('location: tempahanpelanggan.php?info=3');
        }else{
            $ralat = $conn->error;
            header('location: tempahanpelanggan.php?info=4&ralat='.$ralat.'');
        }
    }else{
        header ('location: tempahanpelanggan.php?info=5');
    }
}else{
    header ('location: tempahanpelanggan.php');
}
?>

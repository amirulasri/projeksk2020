<?php  

include '../../setup.php';

if(isset($_POST["export"]))  
{   
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Dvilla Rumah Berdaftar.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('ID Rumah', 'Nama Rumah', 'Harga Rumah'));  
    $query = "SELECT * from rumah ORDER BY idrumah DESC";  
    $result = mysqli_query($connect, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  
        fputcsv($output, $row);  
    }  
    fclose($output);  
}  
?> 
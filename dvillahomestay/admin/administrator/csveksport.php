<?php  

include '../../setup.php';

if(isset($_POST["export"]))
{   
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=Dvilla Senarai Tempahan Pelanggan.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('ID tempahan', 'ID rumah', 'Email', 'Tarikh kasuk', 'Tarikh keluar', 'Bilangan dewasa', 'Bilangan kanak-kanak', 'Jumlahharga', 'Nama pelanggan', 'notelpelanggan', 'bayaran'));  
    $query = "SELECT * from tempahan ORDER BY idtempahan DESC";  
    $result = mysqli_query($connect, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  
        fputcsv($output, $row);  
    }  
    fclose($output);  
}
?>
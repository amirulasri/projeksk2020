<?php
include('settings.php');

$result = mysqli_query($conn, "INSERT INTO `tempahan` (`idtempahan`, `kppelanggan`, `idtayangan`, `jumlahtiket`, `tarikhtayangan`, `jumlahharga`) VALUES (NULL, '03032003049', '2', '3', '2', '223')");
if($result)
{
echo "Success";

}
else
{
echo "Error";

}
?>
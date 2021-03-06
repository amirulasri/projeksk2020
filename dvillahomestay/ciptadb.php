<?php
$conn = mysqli_connect('localhost', 'root', '');

$adminid = $_POST['adminid'];
$adminpass = $_POST['adminpass'];

$deletedb = "DROP DATABASE IF EXISTS dvillahomestay";
$cipta0 = "CREATE DATABASE IF NOT EXISTS dvillahomestay;";
$cipta1 = "USE dvillahomestay";
$cipta2 = "CREATE TABLE `adminlogin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `namaadmin` text NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$cipta3 = "INSERT INTO `adminlogin` (`username`, `password`, `namaadmin`, `role`) VALUES
('$adminid', '$adminpass', 'Admin', 'root'),";
$cipta4 = "CREATE TABLE `pelanggan` (
    `email` varchar(150) NOT NULL,
    `namapelanggan` varchar(150) NOT NULL,
    `notelpelanggan` varchar(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$cipta5 = "CREATE TABLE `pelangganlogin` (
    `email` varchar(150) NOT NULL,
    `katalaluan` varchar(20) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$cipta6 = "CREATE TABLE `rumah` (
    `idrumah` int(150) NOT NULL,
    `namarumah` varchar(150) NOT NULL,
    `hargarumah` varchar(10) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$cipta7 = "INSERT INTO `rumah` (`idrumah`, `namarumah`, `hargarumah`) VALUES
(1, 'Teres', '120'),
(2, 'Banglo', '210'),
(3, 'Rumah Kampung', '85'),
(4, 'Rumah Air', '110');";
$cipta8 = "CREATE TABLE `tempahan` (
    `idtempahan` int(150) NOT NULL,
    `idrumah` int(150) NOT NULL,
    `email` varchar(150) NOT NULL,
    `tarikhmasuk` varchar(15) NOT NULL,
    `tarikhkeluar` varchar(15) NOT NULL,
    `bildewasa` int(10) NOT NULL,
    `bilkanakkanak` int(10) NOT NULL,
    `jumlahharga` varchar(150) NOT NULL,
    `namapelanggan` varchar(150) NOT NULL,
    `notelpelanggan` varchar(11) NOT NULL,
    `statusbayaran` varchar(150) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$cipta9 = "ALTER TABLE `adminlogin`
ADD PRIMARY KEY (`username`);";
$cipta10 = "ALTER TABLE `pelanggan`
ADD PRIMARY KEY (`email`);";
$cipta11 = "ALTER TABLE `pelangganlogin`
ADD KEY `kunci_asing_email` (`email`) USING BTREE;";
$cipta12 = "ALTER TABLE `rumah`
ADD PRIMARY KEY (`idrumah`);";
$cipta13 = "ALTER TABLE `tempahan`
ADD PRIMARY KEY (`idtempahan`),
ADD KEY `kunci_asing_idrumah` (`idrumah`) USING BTREE,
ADD KEY `kunci_asing_email` (`email`) USING BTREE;";
$cipta14 = " ALTER TABLE `rumah`
MODIFY `idrumah` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;";
$cipta15 = "ALTER TABLE `tempahan`
MODIFY `idtempahan` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;";
$cipta16 = "ALTER TABLE `pelangganlogin`
ADD CONSTRAINT `pelangganlogin_ibfk_1` FOREIGN KEY (`email`) REFERENCES `pelanggan` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;";
$cipta17 = "ALTER TABLE `tempahan`
ADD CONSTRAINT `kunci_asing_email` FOREIGN KEY (`email`) REFERENCES `pelanggan` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `kunci_asing_idrumah` FOREIGN KEY (`idrumah`) REFERENCES `rumah` (`idrumah`) ON DELETE CASCADE ON UPDATE CASCADE;";

mysqli_query($conn, $deletedb);
mysqli_query($conn, $cipta0);
mysqli_query($conn, $cipta1);
mysqli_query($conn, $cipta2);
mysqli_query($conn, $cipta3);
mysqli_query($conn, $cipta4);
mysqli_query($conn, $cipta5);
mysqli_query($conn, $cipta6);
mysqli_query($conn, $cipta7);
mysqli_query($conn, $cipta8);
mysqli_query($conn, $cipta9);
mysqli_query($conn, $cipta10);
mysqli_query($conn, $cipta11);
mysqli_query($conn, $cipta12);
mysqli_query($conn, $cipta13);
mysqli_query($conn, $cipta14);
mysqli_query($conn, $cipta15);
mysqli_query($conn, $cipta16);
$lastresult = mysqli_query($conn, $cipta17);

if($lastresult){
    echo "<script>window.location.href='berjayabinadb.html'</script>";
}else{
    mysqli_query($conn, "DROP DATABASE IF EXISTS dvillahomestay");
    echo "<script>window.location.href='gagalbinadb.html'</script>";
}
?>
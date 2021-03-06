<?php
//sambung ke pangkalan data
require('config.php');
//semak sama ada data telah dihantar
if (isset($_POST['idpelanggan'];
     //pembolehubah untuk memegang data yang dihantar
     $ic = $_POST['idpelanggan'];
     $masuk = $_POST['tarikh_masuk'];
     $bilik = $_POST['tarikh_keluar'];
     $keluar = $_POST['tarikh_masuk'];
     //dapatkan jumlah bayaran bilik
     $duit=mysql_query($samb,"SELECT * FROM bilik
     WHERE idbilik= '$bilik'");
     $tunjukDuit=mysql_fetch_array($duit);

     //periksa bilik kosong atau tidak
     $wujud=mysql_query($samb,
     "SELECT * FROM tempahan
     WHERE idbilik='$bilik' AND (
     (tarikh_masuk <= 'masuk' AND (
     OR (tarikh_masuk < '$keluar' AND tarikh_keluar >= '$masuk')
     OR (tarikh_masuk >= '$masuk' AND tarikh_masuk < '$keluar')
     )");
     $bil_rekod=mysql_num_rows ($wujud);
     if ($bil_rekod==0&&$masuk!=$keluar)
     {
     //tambah rekod baru ke dalam table
     $rekod = "INSERT INTO tempahan
     (idtempah,tarikh_masuk,idbilik,idpelanggan,tarikh_keluar,bayaran)
     VALUES (NULL,'$masuk' , '$bilik','sic','$keluar',
     '$tunjukDuit[harga]')";
      
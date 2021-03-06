<?php
include('../../setup.php');

$emailpelanggan = $_GET['emailpelanggan'];

$query = mysqli_query($conn, "SELECT * FROM pelanggan INNER JOIN pelangganlogin ON pelanggan.email = pelangganlogin.email WHERE pelanggan.email = '$emailpelanggan'");

while ($data = mysqli_fetch_array($query)) {
?>
    <input type="hidden" name="emailsemasa" value="<?php echo $data['email']; ?>">
    <label for="">Nama Pelanggan:</label>
    <input type="text" value="<?php echo $data['namapelanggan']; ?>" name="namapelanggan" class="form-control" required><br>
    <label for="">Email Pelanggan:</label>
    <input type="email" value="<?php echo $data['email']; ?>" name="emailpelanggan" class="form-control" required><br>
    <label for="">Nombor Telefon:</label>
    <input type="tel" name="notelpelanggan" pattern="[0-9]{10,11}" value="<?php echo $data['notelpelanggan']; ?>" class="form-control" required><br>
    <label for="">Kata Laluan Baru:</label>
    <input type="password" value="<?php echo $data['katalaluan']; ?>" name="katalaluanpelanggan" class="form-control" required><br>


<?php } ?>
<?php
include('../../setup.php');

$usernameadmin = $_GET['username'];

$query = mysqli_query($conn, "SELECT * FROM adminlogin WHERE username='$usernameadmin'");

while ($data = mysqli_fetch_array($query)) {
    $role = $data['role'];
?>
    <input type="hidden" value="<?php echo $data['username']; ?>" name="usernamesemasa">
    <label for="">Nama Admin:</label>
    <input type="text" value="<?php echo $data['namaadmin']; ?>" name="namaadmin" class="form-control" required><br>
    <label for="">Nama Pengguna:</label>
    <input type="text" value="<?php echo $data['username']; ?>" name="username" class="form-control" required><br>
    <label for="">Kata Laluan Baru:</label>
    <input type="password" value="<?php echo $data['password']; ?>" name="katalaluan" class="form-control" required><br>
    <label for="">Role:</label>
    <select name="role" class="form-control" required>
        <option value="" selected disabled>PILIH ROLE</option>
        <option value="administrator">Administrator</option>
        <option value="standard">Standard User</option>
    </select>
    <p>Jika anda pilih Administrator, pengguna itu dapat mengubah nama pengguna, kata laluan dan memadam akaun admin yang lain serta pelanggan. Manakala Standard User pula, pengguna itu hanya boleh menguruskan bahagian tempahan sahaja.</p>


<?php } ?>


<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM user WHERE id=$id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $gambar = $_FILES['gambar']['name'];
    $tanggal = date("Y-m-d");
    $explode = explode('.', $gambar);
    $ekstensi = strtolower(end($explode));
    $gambar_baru = "$tanggal.$nama.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if (move_uploaded_file($tmp, 'gambar/' . $gambar_baru)) {
        
        $result = mysqli_query($conn, "UPDATE user 
            SET email='$email', nama='$nama', password='$password', gambar='$gambar_baru' WHERE id='$id'");
        if ($result) {
            echo "
            <script>
                alert('Data berhasil diperbarui!');
                document.location.href = 'halamanuser.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data Gagal Diperbarui ! ');
                document.location.href = 'halamanuser.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="regis.css">
</head>
<body>
    <h1>Edit user</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $user['nama']; ?>" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" required><br><br>

        <label for="">Upload Gambar</label>
        <input type="file" name="gambar" id=""><br>
        
        <input type="submit" value="Daftar" name="update">
    </form>
</body>
</html>

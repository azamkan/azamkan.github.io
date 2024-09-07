
<?php
require "koneksi.php";

if (isset($_POST["tambah"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Upload
    $gambar = $_FILES['gambar']['name'];
    $tanggal = date("Y-m-d");
    $explode = explode('.', $gambar);
    $ekstensi = strtolower(end($explode));
    $gambar_baru = "$tanggal,$nama.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if (move_uploaded_file($tmp, 'gambar/' . $gambar_baru)) {
        $result = mysqli_query($conn, "insert into user 
        values ('', '$email', '$nama', '$password', '$gambar_baru')");

        if ($result) {
            echo "
                <script>
                alert('Data Berhasil Ditambahkan! dan file berhasil di upload');
                document.location.href = 'halamanuser.php';
                </script>
            ";
        } else {
            echo error_log($result) . "
            <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'regis.php';
            </script>
        ";
        }
    } else {
        echo "Gagal Mengupload Gambar";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="regis.css">
</head>
<body>
    <h1>Registrasi</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="">Upload Gambar</label>
        <input type="file" name="gambar" id=""><br>
        
        <input type="submit" value="Daftar" name="tambah">
    </form>
</body>
</html>

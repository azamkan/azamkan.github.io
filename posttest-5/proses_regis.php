<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "insert into user (nama, email, password) VALUES ('$nama', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
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
    <h1>Akun</h1>
    <form>
        <p>Email    : <?= $email;?></p>
        <p>Nama     : <?= $nama;?></p>
        <p>Password : <?= $password;?></p>
    </form>
</body>
</html>
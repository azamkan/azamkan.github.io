<?php

    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
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
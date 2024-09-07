<?php
require "koneksi.php";

session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Dapatkan informasi pengguna dari session jika perlu
$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['user_email'];

// Logout: Hapus session saat tombol logout ditekan
if (isset($_POST['logout'])) {
    session_destroy(); // Hapus semua session
    header("Location: index.php"); // Redirect ke halaman login setelah logout
    exit();
}

$query = "select * from user";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Daftar User</h2>";
    echo "<table class='user-table'>";
    echo "<tr><th>ID</th><th>Nama</th><th>Email</th><th>Gambar</th><th>Aksi</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td><img src='gambar/" . $row['gambar'] . "' alt='ini gambar' width='50px' height='50px'></td>";
        echo "<td>
                  <a href='edit.php?id=" . $row["id"] . "' class='edit-button'>Edit</a>
                  <a href='hapus.php?id=" . $row["id"] . "' class='delete-button'>Hapus</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data.";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman user</title>
    <link rel="stylesheet" href="halamanuser.css">
</head>
<body>
    <p>Hari ini <?php date_default_timezone_set("Asia/Makassar"); echo date("h:i:sa, l, d M Y"); ?></p>
    <a href="regis.php">tambah user</a>
    <form method="post" action="halamanuser.php">
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>

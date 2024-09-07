<?php
require "koneksi.php";

$query = "select * from user";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Daftar User</h2>";
    echo "<table class='user-table'>";
    echo "<tr><th>ID</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
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
    <a href="regis.php">tambah user</a>
</body>
</html>
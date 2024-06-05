
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
<link rel="stylesheet" href="home.css">
</head>
<body>



<nav>
    <a href="home.php">Beranda</a>
    <a href="table.php">Tabel</a>
    <a href="index.php">Log out</a>
</nav>
<h1>

<?php
session_start();

// Periksa apakah pengguna telah login
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Selamat datang, $username!";
} else {
    // Jika pengguna belum login, arahkan kembali ke halaman login
    header("Location: index.php");
    exit();
}
?>

</h1>

</body>
</html>

<?php

$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "latihan_crud";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    // echo "Koneksi berhasil!";
}
?>

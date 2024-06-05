<?php
require_once('koneksi.php');

if(isset($_GET['id_mhs'])) {
    $id_mhs = $_GET['id_mhs'];
    $sql = "DELETE FROM mahasiswa WHERE id_mhs = $id_mhs";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID Mahasiswa tidak ditemukan.";
    exit();
}
?>

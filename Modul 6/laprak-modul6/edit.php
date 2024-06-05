<?php
require_once('koneksi.php');

if(isset($_GET['id_mhs'])) {
    $id_mhs = $_GET['id_mhs'];

    $sql = "SELECT * FROM mahasiswa WHERE id_mhs = $id_mhs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $nim = $row['nim'];
        $umur = $row['umur'];
        $prodi = $row['prodi'];
        $jurusan = $row['jurusan'];
        $jenis_kelamin = $row['jenis_kelamin'];
        $asal_kota = $row['asal_kota'];
    } else {
        echo "Data mahasiswa tidak ditemukan.";
        exit();
    }
} else {
    echo "ID Mahasiswa tidak ditemukan.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal_kota = $_POST['asal_kota'];

    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', umur='$umur', prodi='$prodi', jurusan='$jurusan', jenis_kelamin='$jenis_kelamin', asal_kota='$asal_kota' WHERE id_mhs=$id_mhs";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class = "header">Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].   '?id_mhs=' . $id_mhs); ?>" method="POST">
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required></td>
            </tr>
            <tr>
                <td><label for="nim">NIM:</label></td>
                <td><input type="text" id="nim" name="nim" value="<?php echo $nim; ?>" required></td>
            </tr>
            <tr>
                <td><label for="umur">Umur:</label></td>
                <td><input type="number" id="umur" name="umur" value="<?php echo $umur; ?>" required></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi:</label></td>
                <td><input type="text" id="prodi" name="prodi" value="<?php echo $prodi; ?>" required></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan:</label></td>
                <td><input type="text" id="jurusan" name="jurusan" value="<?php echo $jurusan; ?>" required></td>
            </tr>
            <tr>
                <td><label for="jenis_kelamin">Jenis Kelamin:</label></td>
                <td>
                    <select name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="Laki-laki" <?php if($jenis_kelamin == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="asal_kota">Asal Kota:</label></td>
                <td><input type="text" id="asal_kota" name="asal_kota" value="<?php echo $asal_kota; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </form>
    </table>
</body>
</html>

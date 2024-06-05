<?php
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];
    $prodi = $_POST['prodi'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal_kota = $_POST['asal_kota'];

    $sql = "INSERT INTO mahasiswa (nama, nim, umur, prodi, jurusan, jenis_kelamin, asal_kota) 
            VALUES ('$nama', '$nim', '$umur', '$prodi', '$jurusan', '$jenis_kelamin', '$asal_kota')";
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
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="tambah.css"> 
</head>

<body>
    <h2>Tambah Data Mahasiswa</h2>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <table>
        <tr>
            <td><label for="nama">Nama:</label></td>
            <td><input type="text" id="nama" name="nama" required></td>
        </tr>
        <tr>
            <td><label for="nim">NIM:</label></td>
            <td><input type="text" id="nim" name="nim" required></td>
        </tr>
        <tr>
            <td><label for="umur">Umur:</label></td>
            <td><input type="number" id="umur" name="umur" required></td>
        </tr>
        <tr>
            <td><label for="prodi">Program Studi:</label></td>
            <td><input type="text" id="prodi" name="prodi" required></td>
        </tr>
        <tr>
            <td><label for="jurusan">Jurusan:</label></td>
            <td><input type="text" id="jurusan" name="jurusan" required></td>
        </tr>
        <tr>
            <td><label for="jenis_kelamin">Jenis Kelamin:</label></td>
            <td><select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select></td>
        </tr>
        <tr>
            <td><label for="asal_kota">Asal Kota:</label></td>
            <td><input type="text" id="asal_kota" name="asal_kota" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
        
        </table>
    </form>
</body>

</html>

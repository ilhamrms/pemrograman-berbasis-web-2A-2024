<?php
require_once('koneksi.php');
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            margin: 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
        a{
            display: inline-block;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .merah{
            background: red;
        }
        .biru{
            background: #01B9F7;
        }
    </style>
</head>

<body>

    <h2>Data Mahasiswa</h2>
    <a href="tambah.php">Tambah</a>
    <table style="margin-top: 20px;">
    <a href="login.php">Log out</a>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Umur</th>
                <th>Program Studi</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Asal Kota</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter =1; ?>
            <?php foreach ($result as $row) : ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <!-- <td><?php echo $row["id_mhs"]; ?></td> -->
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["nim"]; ?></td>
                    <td><?php echo $row["umur"]; ?></td>
                    <td><?php echo $row["prodi"]; ?></td>
                    <td><?php echo $row["jurusan"]; ?></td>
                    <td><?php echo $row["jenis_kelamin"]; ?></td>
                    <td><?php echo $row["asal_kota"]; ?></td>
                    <td>
                        <a class="biru" href="edit.php?id_mhs=<?php echo $row["id_mhs"]; ?>">Edit</a>

                        <a class="merah" href="hapus.php?id_mhs=<?php echo $row["id_mhs"]; ?>">Delete</a>
                    </td>
                </tr>
                <?php $counter++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
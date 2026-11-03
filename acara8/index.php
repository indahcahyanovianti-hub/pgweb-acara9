<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kependudukan</title>
    <style>
        table {
            border-collapse: collapse; 
            width: 100%;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid black; 
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>

    <h2>Data Sebaran Kecamatan</h2>
    <a href="input/index.php">Tambah Data Baru</a>

    <table>
        <tr>
            <th>No</th>
            <th>Kecamatan</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Luas (km²)</th>
            <th>Jumlah Penduduk</th>
            <th>Aksi</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tabel_penduduk";

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Mengecek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM data_kecamatan";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $no = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $no++ . "</td>";
                echo "<td>" . htmlspecialchars($row["kecamatan"]) . "</td>";
                echo "<td>" . $row["longitude"] . "</td>";
                echo "<td>" . $row["latitude"] . "</td>";
                echo "<td>" . $row["luas"] . "</td>";
                echo "<td>" . $row["jumlah_penduduk"] . "</td>";
                // Menambahkan tombol edit dan hapus
                echo "<td class='action-links'>
                         <a href='edit/index.php?id=" . $row["id"] . "' onclick='return confirm
                         (\"Yakin ingin mengedit data ini?\")'>Edit</a>| 
                        <a href='delete.php?id=" . $row["id"] . "' onclick='return confirm
                        (\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='text-align: center;'>Tidak ada data</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
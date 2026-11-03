<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geoportal_bogor";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h2>Data Stasiun Kereta Api - Bogor</h2>";
echo "<a href='input/index.html'>Input Data Baru</a><br><br>";

$sql = "SELECT * FROM stasiun_bogor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1px' cellpadding='8' cellspacing='0'><tr>
    <th>Nama Stasiun</th>
    <th>Jenis</th>
    <th>Status</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th colspan='2'>Aksi</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["nama_stasiun"]."</td>".
        "<td>".$row["jenis"]."</td>".
        "<td>".$row["status"]."</td>".
        "<td>".$row["latitude"]."</td>".
        "<td>".$row["longitude"]."</td>".
        "<td><a href='delete.php?id=".$row["id"]."' onclick=\"return confirm('PERINGATAN: Apakah Anda yakin ingin menghapus data stasiun ini? Data yang dihapus tidak dapat dikembalikan.');\">hapus</a></td>".
        "<td><a href='edit/index.php?id=".$row["id"]."' onclick=\"return confirm('Apakah Anda ingin masuk ke halaman edit untuk data ini?');\">edit</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
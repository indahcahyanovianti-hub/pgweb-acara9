<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Stasiun</title>
</head>
<body>
<h2>Form Edit Stasiun</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geoportal_bogor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM stasiun_bogor WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
        <form action='edit.php' method='post'>
            <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
            
            <label>Nama Stasiun:</label><br>
            <input type='text' name='nama_stasiun' value='<?php echo $row['nama_stasiun']; ?>' required><br><br>
            
            <label>Jenis:</label><br>
            <input type='text' name='jenis' value='<?php echo $row['jenis']; ?>' required><br><br>
            
            <label>Status:</label><br>
            <input type='text' name='status' value='<?php echo $row['status']; ?>' required><br><br>
            
            <label>Latitude:</label><br>
            <input type='text' name='latitude' value='<?php echo $row['latitude']; ?>' required><br><br>
            
            <label>Longitude:</label><br>
            <input type='text' name='longitude' value='<?php echo $row['longitude']; ?>' required><br><br>
            
            <input type='submit' value='Simpan Perubahan' onclick="return confirm('Apakah Anda yakin ingin menyimpan perubahan data ini?');">
        </form>
<?php
    }
} else {
    echo "Data tidak ditemukan.";
}
$conn->close();
?>
</body>
</html>
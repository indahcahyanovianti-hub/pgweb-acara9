<?php
$nama_stasiun = $_POST['nama_stasiun'];
$jenis = $_POST['jenis'];
$status = $_POST['status'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geoportal_bogor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO stasiun_bogor (nama_stasiun, jenis, status, latitude, longitude)
        VALUES ('$nama_stasiun', '$jenis', '$status', $latitude, $longitude)";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
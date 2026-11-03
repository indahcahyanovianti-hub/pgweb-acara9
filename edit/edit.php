<?php
$id = $_POST['id'];
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

$sql = "UPDATE stasiun_bogor SET nama_stasiun='$nama_stasiun', jenis='$jenis', status='$status', latitude=$latitude, longitude=$longitude WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
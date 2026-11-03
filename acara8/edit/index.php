<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Kecamatan</title>
</head>
<body>
    <h2>Form Edit Data</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tabel_penduduk";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    // Memilih data berdasarkan ID
    $sql = "SELECT * FROM data_kecamatan WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<form action='edit.php' onsubmit='return validateForm(event)' method='post'>";
        while($row = $result->fetch_assoc()) {
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'><br>";
            
            echo "<label for='kecamatan'>Kecamatan: </label><br>";
            echo "<input type='text' id='kec' name='kecamatan' value='" . $row['kecamatan'] . "' required><br><br>";
            
            echo "<label for='longitude'>Longitude: </label><br>";
            echo "<input type='text' id='long' name='longitude' value='" . $row['longitude'] . "' required><br><br>";
            
            echo "<label for='latitude'>Latitude: </label><br>";
            echo "<input type='text' id='lat' name='latitude' value='" . $row['latitude'] . "' required><br><br>";
            
            echo "<label for='luas'>Luas: </label><br>";
            echo "<input type='text' id='luas' name='luas' value='" . $row['luas'] . "' required><br><br>";
            
            echo "<label for='jumlah_penduduk'>Jumlah Penduduk: </label><br>";
            echo "<input type='text' id='jml_pddk' name='jumlah_penduduk' value='" . $row['jumlah_penduduk'] . "' required><br><br>";
            
            echo "<input type='submit' value='Update Data'>";
        }
        echo "</form>";
    } else {
        echo "Data tidak ditemukan.";
    }
    $conn->close();
    ?>

    <p id="informasi" style="color: red;"></p>

    <script>
    function validateForm(event) {
        let luas = document.getElementById("luas").value;
        let text = "";
        
        if (isNaN(luas) || luas < 1) {
            text = "Data luas harus angka dan tidak boleh bernilai negatif";
            document.getElementById("informasi").innerHTML = text;
            event.preventDefault(); // Mencegah form dikirim jika error
            return false;
        }
        return true;
    }
    </script>
</body>
</html>
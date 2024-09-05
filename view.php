<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kontak</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Data Kontak</h1>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "form_contact";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM kontak";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nama</th><th>NIM</th><th>Email</th><th>Kelas</th><th>Pesan</th><th>Tanggal</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["nim"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["kelas"] . "</td>";
                echo "<td>" . $row["pesan"] . "</td>";
                echo "<td>" . $row["reg_date"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada data yang tersedia.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>

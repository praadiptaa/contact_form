<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kontak</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Gaya kartun pada font dan latar belakang */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Comic Neue', cursive; /* Font kartun */
            background: url('https://asset-2.tstatic.net/tribunnews/foto/bank/images/ilustrasi-fakultas-vokasi-universitas-brawijaya-ub.jpg') no-repeat center center fixed; /* Background transparan */
            background-size: cover;
            color: #333; /* Warna teks default */
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8); /* Latar belakang transparan */
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            border: 5px solid #ffcc00; /* Border berwarna cerah */
            animation: fadeIn 1.5s ease-in-out;
        }

        h1 {
            text-align: center;
            color: #ff5722;
            font-size: 3em;
            margin-bottom: 20px;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
            animation: bounceIn 1.5s;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            animation: scaleUp 0.7s ease-out;
            font-size: 1.2em; /* Ukuran font lebih besar untuk kesan kartun */
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 2px solid #ffcc00;
        }

        th {
            background-color: #ffeb3b;
            color: #000;
            font-weight: bold;
            animation: pulse 2s infinite;
        }

        td {
            background-color: #fff;
            color: #333;
            transition: background-color 0.4s ease;
        }

        tr:nth-child(even) {
            background-color: #f9fbe7;
        }

        tr:hover {
            background-color: #ffeb3b;
            cursor: pointer;
            animation: highlight 0.6s;
        }

        p {
            text-align: center;
            color: #ff5722;
            font-size: 1.5em;
            font-weight: bold;
            animation: fadeIn 1.5s ease-in;
        }

        /* Animasi tambahan */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes bounceIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        @keyframes scaleUp {
            from { transform: scale(0.9); }
            to { transform: scale(1); }
        }

        @keyframes pulse {
            0% { background-color: #ffeb3b; }
            50% { background-color: #fdd835; }
            100% { background-color: #ffeb3b; }
        }

        @keyframes highlight {
            0% { background-color: #ffeb3b; }
            50% { background-color: #ffeb3b; }
            100% { background-color: #ffcc00; }
        }
    </style>
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

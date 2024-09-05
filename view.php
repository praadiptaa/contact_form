<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kontak</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Gaya modern bersih dengan sentuhan warna cerah */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Comic Neue', cursive;
            background: url('https://img.pikbest.com/wp/202345/cartoon-forest-scene-beautiful-animated-wallpaper-hd_9582714.jpg!bw700') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease-in-out;
        }

        h1 {
    text-align: center;
    font-size: 2.5em;
    margin-bottom: 20px;
    background: linear-gradient(90deg, #fff 10%, #e6e6e6 50%, #fff 90%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0px 0px 5px rgba(255, 255, 255, 0.5), 1px 1px 3px rgba(0, 0, 0, 0.2);
    animation: shine 2s linear infinite, bounceIn 1.5s;
    position: relative;
}

@keyframes shine {
    0% {
        background-position: -200%;
    }
    100% {
        background-position: 200%;
    }
}

@keyframes bounceIn {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.2);
    }
    100% {
        transform: scale(1);
    }
}


        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1.1em;
            color: #333;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        th {
            background-color: #ff9800;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-right: 1px solid white;
            font-weight: bold;
        }

        th:last-child {
            border-right: none;
        }

        td {
            background-color: white;
            border-right: 1px solid #f0f0f0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        td:last-child {
            border-right: none;
        }

        /* Warna alternatif untuk baris genap */
        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        /* Efek hover */
        tr:hover td {
            background-color: #ffeb3b;
            color: #333;
            cursor: pointer;
        }

        p {
            text-align: center;
            color: #03a9f4;
            font-size: 1.4em;
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

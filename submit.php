<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pengiriman</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Inline CSS for styling the confirmation page */
        .container {
            width: 60%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .message {
            font-size: 18px;
            color: #333;
            margin: 20px 0;
        }

        .success {
            color: #28a745;
        }

        .error {
            color: #dc3545;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-back {
            background-color: #6c757d;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
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

        // Retrieve form data
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $email = $_POST['email'];
        $kelas = $_POST['kelas'];
        $pesan = $_POST['pesan'];

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO kontak (nama, nim, email, kelas, pesan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nama, $nim, $email, $kelas, $pesan);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<h1 class='success'>Data berhasil dikirim!</h1>";
            echo "<p class='message'>Terima kasih telah mengirimkan data Anda. Kami akan segera menghubungi Anda jika diperlukan.</p>";
        } else {
            echo "<h1 class='error'>Terjadi kesalahan!</h1>";
            echo "<p class='message'>Gagal mengirim data. Silakan coba lagi nanti.</p>";
        }

        // Close connection
        $stmt->close();
        $conn->close();
        ?>

        <a href="index.html" class="btn">Kembali ke Form</a>
        <a href="view.php" class="btn btn-back">Lihat Data Kontak</a>
    </div>
</body>
</html>

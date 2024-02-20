<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan</title>
    <style>
        body {
            font-family: bahnschrift;
        }

        table {
            font-family: bahnschrift;
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }

        th:last-child,
        td:last-child {
            border-right: none;
        }

        h2 {
            text-align: center;
            margin-top: 50px;
        }

        .title-row {
            font-family: Century Gothic;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <center>
        <h2>LAPORAN DATA MAHASISWA</h2>
    <table>
        <tr class="title-row">
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
        </tr>
        <?php
        // Koneksi ke database
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'datasekolah';

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die('Koneksi gagal: ' . mysqli_connect_error());
        }

        // Mengambil data dari tabel
        $query = "SELECT * FROM biodata";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='border-right: 1px solid black;'>" . $row['ID'] . "</td>";
                echo "<td style='border-right: 1px solid black;'>" . $row['Nama'] . "</td>";
                echo "<td style='border-right: 1px solid black;'>" . $row['Jenis_Kelamin'] . "</td>";
                echo "<td>" . $row['Agama'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
        }

        mysqli_close($conn);
        ?>
        </table>
        </center>
        <script>
            window.print()
        </script>    
</body>
</html>
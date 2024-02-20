<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/2f0814cdce.js" crossorigin="anonymous"></script>
    <title>LAPORAN DATA SISWA</title>
    <style>
        body {
            font-family: bahnschrift;
        }

        table {
            font-family: bahnschrift;
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
            border: 1px solid rgba(200,189,241,1);
        }

        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid rgba(200,189,241,1);
            border-right: 1px solid rgba(200,189,241,1);
        }

        th:last-child,
        td:last-child {
            border-right: none;
        }

        h2 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 0px;
            font-size: 50px;
        }

        .title-row {
            background-color: rgba(200,189,241,1);
            font-weight: bold;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .back-button {
            width: 10%;
            height: 35px;
            border: 1px solid;
            background: rgba(200,189,241,1);
            border-radius: 25px;
            font-size: 18px;
            color: white;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            text-align: center;
            margin-top: 32px;
            margin-left: 487px;
        }

        .back-button:hover {
            border-color: rgba(200,189,241,1);
            transition: .5s;
        }

        .print-button {
            width: 15%;
            height: 35px;
            border: 1px solid;
            background: rgba(200,189,241,1);
            border-radius: 25px;
            font-size: 15px;
            color: white;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            text-align: center;
            margin-top: 0px;
            margin-right: 35%;
            margin-bottom: 10px;
        }

        .print-button:hover {
            border-color: rgba(200,189,241,1);
            transition: .5s;
        }

        .save-button {
            width: 15%;
            height: 35px;
            border: 1px solid;
            background: rgba(200,189,241,1);
            border-radius: 25px;
            font-size: 15px;
            color: white;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            text-align: center;
            margin-top: 0px;
            margin-left: 320px;
            margin-bottom: 15px;
        }

        .save-button:hover {
            border-color: rgba(200,189,241,1);
            transition: .5s;
        }

        .edit-button {
            display: inline-block;
            margin-left: 5px;
        }
        
        .edit-button button {
            padding: 5px 10px;
            font-size: 12px;
            background-color: rgb(87, 129, 219);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

         .hapus-button {
            display: inline-block;
            margin-left: 5px;
        }
        
        .hapus-button button {
            padding: 5px 10px;
            font-size: 12px;
            background-color: rgb(241, 87, 100);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>LAPORAN DATA SISWA</h2>
    <div class="button-container">
        <button class="print-button" onclick="goToPrint()"><i class="fa-solid fa-print" style="color: white;"   >   Print Laporan</i></button>
    </div>
    <div class="save-pdf">
        <form method="POST" action="exportpdf.php" taget="_blank">
            <button class="save-button" onclick="goToPrint()"><i class="fa-solid fa-file-pdf"  />      Export to PDF</i></button>
        </form>
    </div>
    <table>
        <tr class="title-row">
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Opsi</th>
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
                echo "<td style='border-right: 1px solid rgba(200,189,241,1);'>" . $row['ID'] . "</td>";
                echo "<td style='border-right: 1px solid rgba(200,189,241,1);'>" . $row['Nama'] . "</td>";
                echo "<td style='border-right: 1px solid rgba(200,189,241,1);'>" . $row['Jenis_Kelamin'] . "</td>";
                echo "<td>" . $row['Agama'] . "</td>";
                echo "<td>";
                echo "<div class='edit-button'>
                <button onclick='editData(" . $row['ID'] . ")'><i class='fa-regular fa-pen-to-square'     />    Edit</i></button></div>";
                echo "<div class='hapus-button'>
                <button onclick='hapusData(" . $row['ID'] . ")'><i class='fa-solid fa-trash'   />    Hapus</i></button></div>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </table>
    
    <div class="button-container">
        <button class="back-button" onclick="goToHome()">Kembali</button>
    </div>
 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script>
        function goToPrint() {
            window.location.href = "cetak.php";
        }

        function goToHome() {
            window.location.href = "home.php";
        }
        
        function editData(id) {
            window.location.href = 'edit.php?id=' + id;
        }
        
        function hapusData(id) {
            if (confirm('Anda yakin ingin menghapus data ini?')) {
                // Lakukan permintaan AJAX ke skrip hapus dengan mengirimkan ID sebagai parameter
                // Contoh menggunakan JavaScript asli untuk permintaan AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'hapus.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        location.reload(); // Lakukan tindakan setelah penghapusan berhasil, misalnya memuat ulang tabel data
                    } else if (xhr.readyState === 4) {
                        console.log(xhr.responseText); // Tangani kesalahan yang mungkin terjadi saat penghapusan data
                    }
                };
                xhr.send('id=' + id);
            }
        }

        function saveAsPDF() {
            var doc = new jsPDF();
            
            // Judul kolom
            var columnTitles = document.querySelectorAll('.title-row th');
            
            // Data baris
            var dataRows = document.querySelectorAll('table tr:not(.title-row)');
            
            // Koordinat awal untuk penulisan teks
            var startX = 10;
            var startY = 20;
            
            // Tulis judul kolom
            columnTitles.forEach(function(title, index) {
                doc.text(startX + index * 40, startY, title.innerText);
            });
            
            // Tulis data baris
            dataRows.forEach(function(row, rowIndex) {
                var rowData = row.querySelectorAll('td');
                rowData.forEach(function(data, dataIndex) {
                    doc.text(startX + dataIndex * 40, startY + (rowIndex + 1) * 10, data.innerText);
                });
            });
            
            // Simpan file PDF dengan nama "Laporan_Mahasiswa.pdf"
            doc.save('Laporan_Mahasiswa.pdf');
        }
    </script>
</body>
</html>
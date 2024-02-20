<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="hero">
        <div class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="banner">
            <div class="left-column">
                <h1>Selamat Datang!</h1>
                <h3>Ini adalah website pendataan siswa dan guru.</h3>
                <button type="contained" onclick="goToFormSiswa()">Input Data Siswa</button>
                <button type="contained" onclick="goToFormGuru()">Input Data Guru</button>
                <button type="contained" onclick="goToLaporanSiswa()">Laporan Data Siswa</button>
                <button type="contained" onclick="goToLaporanGuru()">Laporan Data Guru</button>
            </div>
            <div class="right-column">
                <img src="image/campus.jpeg">
                <input type="exit" value="Keluar" onclick="goToExit()">
            </div>

            <script>
                function goToFormSiswa() {
                    window.location.href = "formbiodata.php";
                }
                function goToLaporanSiswa() {
                    window.location.href = "laporandata.php";
                }
                function goToExit() {
                    window.location.href = "login.php";
                }
            </script>
        </div>
    </div>
</body>
</html>
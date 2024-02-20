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

// Menerima ID yang dikirimkan melalui parameter GET
$ID = $_GET['id'];

// Memeriksa apakah form telah dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menerima data yang dikirimkan melalui form
    $Nama = $_POST['nama'];
    $Jenis_Kelamin = $_POST['jeniskelamin'];
    $Agama = $_POST['agama'];

    // Melakukan update data ke tabel berdasarkan ID
    $query = "UPDATE biodata SET Nama = '$Nama', Jenis_Kelamin = '$Jenis_Kelamin', Agama = '$Agama' WHERE ID = $ID";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}

// Mengambil data siswa berdasarkan ID
$query = "SELECT * FROM biodata WHERE ID = $ID";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/edit.css">
</head>
<body>
    <div class="center">
        <h2>EDIT DATA SISWA</h2>     
        <form method="post">
            <div class="txt_field">
                <input type="text" id="nama" name="nama" value="<?php echo $row['Nama']; ?>" required>
                <span></span>
                <label>Nama</label>
            </div>
        
            <div class="txt_field">
              <select name="jeniskelamin" class="txt_option" required>
                <option value="select" disabled selected>Jenis Kelamin</option>  
                <option value="Laki-laki" <?php if ($row['Jenis_Kelamin'] === 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($row['Jenis_Kelamin'] === 'Perempuan') echo 'selected'; ?>>Perempuan</option>
            </select>
            </div>

            <div class="txt_field">
              <select name="agama" class="txt_option" required>
                <option value="select" disabled selected>Agama</option>  
                <option value="Islam" <?php if ($row['Agama'] === 'Islam') echo 'selected'; ?>>Islam</option>
                <option value="Kristen" <?php if ($row['Agama'] === 'Kristen') echo 'selected'; ?>>Kristen</option>
                <option value="Hindu" <?php if ($row['Agama'] === 'Hindu') echo 'selected'; ?>>Hindu</option>
                <option value="Budha" <?php if ($row['Agama'] === 'Budha') echo 'selected'; ?>>Budha</option>
            </select>
            </div>

        <button class="submit" type="submit">Simpan</button>
    </form>
    
    <div class="back-button">
        <button class="back" onclick="goBack()">Kembali</button>
    </div>
    
    <script>
        function goBack() {
            window.history.back(); // Kembali ke halaman sebelumnya
        }
    </script>
</body>
</html>
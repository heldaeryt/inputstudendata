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

// Menerima ID yang dikirimkan melalui permintaan POST
$id = $_POST['id'];

// Menghapus data dari tabel berdasarkan ID
$query = "DELETE FROM biodata WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Data berhasil dihapus.";
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
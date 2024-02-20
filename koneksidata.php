<?php

$conn = mysqli_connect("localhost","root","","datasekolah");

if ($conn === false)
{
   die("ERROR : tidak dapat terkoneksi." . mysqli_connect_error());
}

$Nama = $_POST['nama'];
$Jenis_Kelamin = $_POST['jeniskelamin'];
$Agama = $_POST['agama'];

$query = "INSERT INTO biodata VALUES ('null','$Nama','$Jenis_Kelamin','$Agama')";

if(mysqli_query($conn, $query))
{
    echo "<h3> DATA BERHASIL DISIMPAN </h3>";
    echo "<div style='text-align: left; margin-top: 20px;'><a href='home.php'>Kembali</a></div>";
}
else
{
    echo "ERROR : MAAF DATA GAGAL DISIMPAN $sql." . mysqli_error($conn);
}

mysqli_close($conn);
?>
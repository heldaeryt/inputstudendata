<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="css/formbiodata.css"> 
</head>
<body>
    <div class="center">
        <h1>FORM BIODATA</h1>
        <form action="koneksidata.php" method="post">
            <div class="txt_field">
                <input type="text" name="nama" required>
                <span></span>
                <label>Nama</label>
            </div>
            <div class="txt_field">
              <select name="jeniskelamin" class="txt_option">
                <option value="select" disabled selected>Jenis Kelamin</option>  
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            </div>
            <div class="txt_field">
              <select name="agama" class="txt_option">
                <option value="select" disabled selected>Agama</option>  
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>
            </div>
            <input type="submit" value="Submit">
            <div class="button-container">
              <button type="exit" onclick="goToHome()">Kembali</button>
          </div>
          
          <script>
              function goToHome() {
                  window.location.href = "home.php";
              }
          </script>
        </form>
    </div>
</body>
</html>
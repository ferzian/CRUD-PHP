<?php

include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];

    $query = "INSERT INTO situs_budaya (nama, lokasi) VALUES ('$nama', '$lokasi')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan data!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <form action="tambah.php" method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</body>

</html>

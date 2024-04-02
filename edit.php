<?php

include('koneksi.php');

// Jika ID dikirimkan melalui metode GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan query untuk mendapatkan data mahasiswa berdasarkan ID
    $query = "SELECT * FROM situs_budaya WHERE id=$id";
    $result = mysqli_query($connection, $query);

    // Jika data ditemukan
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $lokasi = $row['lokasi'];
    } else {
        echo "Data tidak ditemukan";
        exit;
    }
}

// Jika form di-submit dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];

    // Lakukan query untuk melakukan update data
    $query = "UPDATE situs_budaya SET nama='$nama', lokasi='$lokasi' WHERE id=$id";
    $result = mysqli_query($connection, $query);

    // Jika query berhasil dijalankan
    if ($result) {
        echo "<script>alert('Data berhasil diupdate');</script>";
        echo "<script>window.location = 'index.php';</script>";
    } else {
        echo "Gagal mengupdate data!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Data</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $lokasi; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</body>
</html>

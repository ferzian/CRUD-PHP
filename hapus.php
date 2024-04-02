<?php

include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM situs_budaya WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>window.location = 'index.php';</script>";
    } else {
        echo "Gagal menghapus data!";
    }
}


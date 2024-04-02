<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        a {
            color: white;
            text-decoration: none;
        }

        .card-body {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Warisan Budaya
                    </div>
                    <div class="card-body">

                        <button class="btn btn-primary"><a href="tambah.php">Tambah Data</a></button> <br>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include ('koneksi.php');
                                $no = 1;
                                $query = mysqli_query($connection, "SELECT * FROM situs_budaya");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['lokasi']; ?>
                                        </td>
                                        <td>
                                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
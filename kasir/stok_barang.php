<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Barang</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .btn {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td a {
            color: #4CAF50;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Stock Barang</h2>
        <!-- Tombol kembali ke dashboard -->
        <button class="btn btn-secondary" onclick="location.href='dashboard.php'"><i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama</button>
        <!-- Tombol untuk menambah data baru -->
        <button class="btn btn-success" onclick="location.href='tambah_produk.php'"><i class="fas fa-plus"></i> Tambah Produk Baru</button>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ProdukID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include 'config.php';
                // Query untuk menampilkan barang dari tabel produk
                $sql = "SELECT ProdukID, NamaProduk, Harga, Stok FROM produk";
                $result = mysqli_query($conn, $sql);

                // Tampilkan hasil query
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["ProdukID"] . "</td>";
                        echo "<td>" . $row["NamaProduk"] . "</td>";
                        echo "<td>" . $row["Harga"] . "</td>";
                        echo "<td>" . $row["Stok"] . "</td>";
                        // Tambahkan tautan untuk mengedit dan menghapus data dengan ikon Font Awesome
                        echo "<td>";
                        echo "<a href='edit_produk.php?id=" . $row["ProdukID"] . "' title='Edit'><i class='fas fa-edit'></i></a>&nbsp;|&nbsp;";
                        echo "<a href='hapus_produk.php?id=" . $row["ProdukID"] . "' title='Hapus'><i class='fas fa-trash-alt'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>0 hasil</td></tr>";
                }

                // Tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>

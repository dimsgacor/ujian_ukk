<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        #header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        #sidebar {
            background-color: #495057;
            color: #fff;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            padding-top: 20px;
        }

        #sidebar .menu-item {
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            display: block;
        }

        #sidebar .menu-item:hover {
            background-color: #6c757d;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
        }

        .stats-box {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .stats-box h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .stats-box p {
            margin: 5px 0;
        }

        .stats-icon {
            font-size: 48px;
            margin-bottom: 10px;
            color: #343a40; 
        }
    </style>
</head>

<body>

    <div id="header">
        <div id="welcome">
            <h2>Selamat Datang di Aplikasi Kasir</h2>
        </div>
    </div>

    <div id="sidebar">
        <a href="pembelian.php" class="menu-item"><i class="fas fa-shopping-cart"></i> pembelian </a>
        <a href="stok_barang.php" class="menu-item"><i class="fas fa-cubes"></i> Stock Barang</a>
        <a href="detail_penjualan.php" class="menu-item"><i class="fas fa-chart-line"></i> Detail Penjualan</a>
        <?php
            // Periksa level
                if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
                echo '<a href="data_petugas.php" class="menu-item"><i class="fas fa-users"></i> Data Petugas</a>';
            }

        ?>
        <a href="data_pelanggan.php" class="menu-item"><i class="fas fa-user-friends"></i> Pelanggan </a>
        <a href="logout.php" class="menu-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div id="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3">
                <?php
                    include 'config.php';

                    //total pelanggan
                    $sql_total_pelanggan = "SELECT COUNT(*) AS total_pelanggan FROM pelanggan";
                    $result_total_pelanggan = mysqli_query($conn, $sql_total_pelanggan);
                    $row_total_pelanggan = mysqli_fetch_assoc($result_total_pelanggan);
                    $total_pelanggan = $row_total_pelanggan['total_pelanggan'];

                    //jumlah petugas
                    $sql_jumlah_petugas = "SELECT COUNT(*) AS jumlah_petugas FROM petugas";
                    $result_jumlah_petugas = mysqli_query($conn, $sql_jumlah_petugas);
                    $row_jumlah_petugas = mysqli_fetch_assoc($result_jumlah_petugas);
                    $jumlah_petugas = $row_jumlah_petugas['jumlah_petugas'];

                    //jumlah produk
                    $sql_jumlah_produk = "SELECT COUNT(*) AS jumlah_produk FROM produk";
                    $result_jumlah_produk = mysqli_query($conn, $sql_jumlah_produk);
                    $row_jumlah_produk = mysqli_fetch_assoc($result_jumlah_produk);
                    $jumlah_produk = $row_jumlah_produk['jumlah_produk'];

                    mysqli_close($conn);
                ?>
                <div class="col mb-4">
                    <div class="stats-box" style="background-color: #17a2b8;">
                        <i class="fas fa-users stats-icon"></i>
                        <h3 style="color: #fff;">Total Pelanggan</h3>
                        <p style="color: #fff;"><?php echo $total_pelanggan; ?></p>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="stats-box" style="background-color: #28a745;">
                        <i class="fas fa-user-tie stats-icon"></i>
                        <h3 style="color: #fff;">Jumlah Petugas</h3>
                        <p style="color: #fff;"><?php echo $jumlah_petugas; ?></p>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="stats-box" style="background-color: #ffc107;">
                        <i class="fas fa-box stats-icon"></i>
                        <h3 style="color: #fff;">Jumlah Produk</h3>
                        <p style="color: #fff;"><?php echo $jumlah_produk; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

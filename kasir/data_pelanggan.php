<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .button-container {
            text-align: left;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <h2>Data Pelanggan</h2>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th> 
            </tr>
        </thead>
        <tbody>

            <?php

            include 'config.php';

            $sql = "SELECT * FROM pelanggan";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['PelangganID'] . "</td>";
                    echo "<td>" . $row['NamaPelanggan'] . "</td>";
                    echo "<td>" . $row['Alamat'] . "</td>";
                    echo "<td>" . $row['NomorTelepon'] . "</td>";
                    echo "<td><a href='edit_pelanggan.php?id=" . $row['PelangganID'] . "' class='btn btn-primary mr-2'><i class='fa fa-edit'></i></a> <a href='hapus_pelanggan.php?id=" . $row['PelangganID'] . "' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data pelanggan.</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <div class="button-container">
        <a href="dashboard.php" class="btn btn-success">Kembali ke Dashboard</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

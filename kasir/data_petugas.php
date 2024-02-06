<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-gn8cHtUGuVJdZ3C8iK6NtHjL5x99NhN28Lv/KyviHZfVklvQDQTXTQpYjgVi/v+71b00NUarDT8F8z1mGBJj3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px 15px;
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

        a.button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        a.button:hover {
            background-color: #45a049;
        }

        a.edit-button {
            background-color: #4CAF50;
        }

        a.delete-button {
            background-color: red;
        }
    </style>
</head>

<body>

    <h2>Data Petugas</h2>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include 'config.php';
            $sql = "SELECT * FROM petugas";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_petugas'] . "</td>";
                    echo "<td>" . $row['nama_petugas'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['level'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_petugas.php?id=" . $row['id_petugas'] . "' class='btn btn-success edit-button'><i class='fas fa-edit'></i> Edit</a>";
                    echo "<a href='hapus_petugas.php?id=" . $row['id_petugas'] . "' class='btn btn-danger delete-button'><i class='fas fa-trash-alt'></i> Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data petugas.</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <a href="dashboard.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
    <a href="registrasi.php" class="btn btn-primary"><i class="fas fa-user-plus"></i> Tambah Petugas Baru</a>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

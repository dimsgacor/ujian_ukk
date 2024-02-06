<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_pelanggan = $_GET['id'];

    if (isset($_POST['submit'])) {
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $nomor_telepon = $_POST['nomor_telepon'];

        $sql_update = "UPDATE pelanggan SET NamaPelanggan='$nama_pelanggan', Alamat='$alamat', NomorTelepon='$nomor_telepon' WHERE PelangganID='$id_pelanggan'";

        if (mysqli_query($conn, $sql_update)) {
            echo "<script>alert('Data pelanggan berhasil diperbarui');</script>";
            header("Location: data_pelanggan.php"); 
            exit();
        } else {
            echo "<script>alert('Gagal memperbarui data pelanggan: " . mysqli_error($conn) . "');</script>";
        }
    }

    $sql_select = "SELECT * FROM pelanggan WHERE PelangganID='$id_pelanggan'";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('ID Pelanggan tidak ditemukan');</script>";
    header("Location: data_pelanggan.php"); 
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Edit Pelanggan</h2>
        <form method="post">
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan:</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $row['NamaPelanggan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['Alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon:</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo $row['NomorTelepon']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Perbarui</button>
            <a href="data_pelanggan.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

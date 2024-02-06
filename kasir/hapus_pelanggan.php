<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_pelanggan = $_GET['id'];

    $sql_delete = "DELETE FROM pelanggan WHERE PelangganID='$id_pelanggan'";

    if (mysqli_query($conn, $sql_delete)) {
        echo "<script>alert('Data pelanggan berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data pelanggan: " . mysqli_error($conn) . "');</script>";
    }
}

mysqli_close($conn);

header("Location: data_pelanggan.php");
exit();
?>

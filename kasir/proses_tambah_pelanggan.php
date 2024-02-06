<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat = $_POST["alamat"];
    $nomor_telepon = $_POST["nomor_telepon"];

    $sql = "INSERT INTO pelanggan (PelangganID, NamaPelanggan, Alamat, NomorTelepon) VALUES ('$id_pelanggan', '$nama_pelanggan', '$alamat', '$nomor_telepon')";

    if (mysqli_query($conn, $sql)) {
        header("Location: pembelian.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    header("Location: tambah_pelanggan.php");
}
?>

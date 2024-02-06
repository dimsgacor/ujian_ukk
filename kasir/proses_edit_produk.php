<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["produk_id"]) && isset($_POST["nama_produk"]) && isset($_POST["harga"]) && isset($_POST["stok"])) {
        $produk_id = $_POST["produk_id"];
        $nama_produk = $_POST["nama_produk"];
        $harga = $_POST["harga"];
        $stok = $_POST["stok"];

        $sql = "UPDATE produk SET NamaProduk='$nama_produk', Harga='$harga', Stok='$stok' WHERE ProdukID = $produk_id";

        if (mysqli_query($conn, $sql)) {
            echo "Data produk berhasil diperbarui.";
            header("Location: stok_barang.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Parameter yang dibutuhkan tidak lengkap.";
    }
} else {
    echo "Metode request tidak valid.";
}
?>

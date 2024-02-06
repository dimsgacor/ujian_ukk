<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nama_panjang = $_POST['nama_panjang'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = ($_POST['level'] == 'admin') ? 'admin' : 'user'; 

    $query = "INSERT INTO petugas (nama_petugas, username, password, level) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($stmt, "ssss", $nama_panjang, $username, $password, $level);
    
    $result = mysqli_stmt_execute($stmt);

    if ($result) {

        header("Location: data_petugas.php");
        exit();
    } else {
        echo "Registrasi gagal. Silakan coba lagi.";
    }
}
?>

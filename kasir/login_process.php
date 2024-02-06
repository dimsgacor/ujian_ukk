<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM petugas WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            $_SESSION['id_petugas'] = $row['id_petugas'];
            $_SESSION['nama_petugas'] = $row['nama_petugas'];
            $_SESSION['level'] = $row['level']; 

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Username atau Password salah.";
        }
    } else {
        $error = "Username atau Password salah.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Process</title>
</head>
<body>
    <div>
        <?php
            if (isset($error)) {
                echo "<p style='color: red;'>$error</p>";
            }
        ?>
    </div>
</body>
</html>

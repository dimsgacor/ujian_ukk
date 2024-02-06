<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Petugas</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
form label {
    font-weight: bold;
}
form input[type="text"], form select, form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}
form input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    cursor: pointer;
}
form input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
</head>
<body>

<h2>Edit Petugas</h2>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM petugas WHERE id_petugas=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
?>
<form action="proses_edit_petugas.php" method="post">
  <input type="hidden" name="id" value="<?php echo $row['id_petugas']; ?>">
  <div class="form-group">
    <label for="nama_petugas">Nama Petugas:</label>
    <input type="text" id="nama_petugas" name="nama_petugas" value="<?php echo $row['nama_petugas']; ?>">
  </div>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>">
  </div>
  <div class="form-group">
    <label for="level">Level:</label>
    <select id="level" name="level" class="form-control">
      <option value="admin" <?php if ($row['level'] == 'admin') echo 'selected'; ?>>Admin</option>
      <option value="user" <?php if ($row['level'] == 'user') echo 'selected'; ?>>Petugas</option>
    </select>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php
    } else {
        echo "Petugas tidak ditemukan.";
    }
} else {
    echo "Invalid request.";
}
mysqli_close($conn);
?>

</body>
</html>

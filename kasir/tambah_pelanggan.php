<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Pelanggan Baru</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f0f0f0;
  }
  h2 {
    text-align: center;
    color: #333;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  label {
    display: block;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
  }
  input[type="text"], button {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s ease;
  }
  input[type="text"]:focus {
    outline: none;
    border-color: #4CAF50;
  }
  button {
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<h2>Tambah Pelanggan Baru</h2>

<form action="proses_tambah_pelanggan.php" method="POST">
  <label for="id_pelanggan">ID Pelanggan:</label>
  <input type="text" id="id_pelanggan" name="id_pelanggan">
  
  <label for="nama_pelanggan">Nama Pelanggan:</label>
  <input type="text" id="nama_pelanggan" name="nama_pelanggan">
  
  <label for="alamat">Alamat:</label>
  <input type="text" id="alamat" name="alamat">
  
  <label for="nomor_telepon">Nomor Telepon:</label>
  <input type="text" id="nomor_telepon" name="nomor_telepon">
  
  <button type="submit">Tambah Pelanggan</button>
</form>

</body>
</html>

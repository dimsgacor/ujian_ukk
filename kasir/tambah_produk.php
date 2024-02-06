<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Produk Baru</title>
<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-gn8cHtUGuVJdZ3C8iK6NtHjL5x99NhN28Lv/KyviHZfVklvQDQTXTQpYjgVi/v+71b00NUarDT8F8z1mGBJj3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}
input[type="text"], button {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}
button {
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
}
button:hover {
    background-color: #45a049;
}
.error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}
</style>
</head>
<body>

<h2>Tambah Produk Baru</h2>

<form action="proses_tambah_produk.php" method="POST" onsubmit="return validateForm()">
  <label for="nama_produk">Nama Produk:</label>
  <input type="text" id="nama_produk" name="nama_produk">
  
  <label for="harga">Harga:</label>
  <input type="text" id="harga" name="harga">
  
  <label for="stok">Stok:</label>
  <input type="text" id="stok" name="stok">
  
  <button type="submit"><i class="fas fa-save"></i> Simpan</button>
  <div id="error-message" class="error-message"></div>
</form>

<script>
function validateForm() {
    var namaProduk = document.getElementById("nama_produk").value;
    var harga = document.getElementById("harga").value;
    var stok = document.getElementById("stok").value;
    var errorMessage = document.getElementById("error-message");

    if (namaProduk === "" || harga === "" || stok === "") {
        errorMessage.innerHTML = "Silakan lengkapi semua data.";
        return false;
    } else {
        errorMessage.innerHTML = "";
        return true;
    }
}
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
  }
  #register-box {
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
  }
  input[type="text"],
  input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
  #login-link {
    text-align: center;
    margin-top: 10px;
  }
  #login-link a {
    color: #4CAF50;
    text-decoration: none;
  }
</style>
</head>
<body>

<div id="register-box">
  <h2>Registrasi</h2>
  <form action="register_process.php" method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="text" name="nama_panjang" placeholder="Nama Panjang" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <label for="level">Level:</label>
    <select name="level" id="level">
      <option value="admin">Admin</option>
      <option value="petugas">Petugas</option>
    </select><br>
    <input type="submit" value="Daftar">
  </form>

  </div>

</body>
</html>
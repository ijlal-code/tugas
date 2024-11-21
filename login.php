<?php

include "service/database.php";
session_start();

$pesan_login = "";

if(isset($_SESSION["is_login"])){
    header("location: dashboard.php");
}

if(isset($_POST['login'])){
   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";


   $result = $db->query($sql);

   if($result->num_rows > 0){
    $data = $result->fetch_assoc();
    $_SESSION["username"] = $data["username"];
    $_SESSION["is_login"] = true;

    header("location: dashboard.php");

   }else {
    $pesan_login = "akun tidak ditemukan";
   }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm w-50">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Login</h4>
                <i><?= $pesan_login ?></i>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Email</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan email Anda" required name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan password Anda" required name="password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="text-center mt-3">
                    <p>Belum punya akun? <a href="daftar.php" class="text-primary">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

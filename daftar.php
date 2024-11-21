<?php

include "service/database.php";
session_start();

$pesan = "";

if(isset($_SESSION["is_login"])){
    header("location: dashboard.php");
}

if(isset($_POST["masuk"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if($db->query($sql)){
        $pesan = "Daftar akun berhasil, silahkan login";
    }else {
        $pesan = "Daftar akun gagal";
    }


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm w-50">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Daftar</h4>
                <i><?= $pesan ?></i>
                <form action="daftar.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan nama Anda" required name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan password Anda" required name="password">
                    </div>
                    <button type="submit" name="masuk" class="btn btn-success w-100">Daftar</button>
                </form>
                <div class="text-center mt-3">
                    <p>Sudah punya akun? <a href="login.php" class="text-primary">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

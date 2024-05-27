<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Ke Web Reservasi Cafe ITH</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <?php
        if(isset($_POST['username'])){
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $query = mysqli_query($koneksi, "INSERT INTO user(nama, username, password) VALUES('$nama', '$username', '$password')");
            if($query) {
                echo '<script>alert("Selamat, pendaftaran anda berhasil. Silahkan login."); window.location.href="login.php";</script>';
            }else{
                echo '<script>alert("Pendaftaran gagal.")</script>';
            }
        }
    ?>

    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Registrasi</h3>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Registrasi</button>
                    <a href="login.php">Login</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

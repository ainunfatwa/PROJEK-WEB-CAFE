<?php
session_start();
include "koneksi.php";

if(isset($_SESSION['user'])){
    header("Location: tampilan.php");
    exit;
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;
        header("Location: tampilan.php"); 
        exit; 
    } else {
        echo '<script>alert("Username atau Password Salah.");</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Ke Web Reservasi Cafe ITH</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Login</h3>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="login">Login</button>
                    <a href="registrasi.php">Registrasi</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

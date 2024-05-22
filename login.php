<?php
    // koneksi ke database
     $username = "root";
     $password = "";
     $dbname = "project_web2";
     $conn = new mysqli($servername, $username, $password, $dbname);
         if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
         }
     $email = $_POST['email'];
     $password = $_POST['password'];
    // mengecek apakah email dan password cocok
     $result = $conn->query("SELECT * FROM mahasiswa WHERE email='$email' AND 
            password='$password'");
     if ($result->num_rows == 0) {
    // mengecek apakah email terdaftar
     $check_email = $conn->query("SELECT * FROM mahasiswa WHERE email='$email'");
     if ($check_email->num_rows == 0) {
     echo "Password tidak cocok";
    } else {
     echo "Akun tidak terdaftar";
    }
    } else {
    // memulai sesi
     session_start();
     while ($row = $result->fetch_assoc()) {
     // mengatur variabel sesi
     $_SESSION['username'] = $row['username'];
     $_SESSION['email'] = $row['email'];
     $_SESSION['password'] = $row['password'];
     }
     header('Location: beranda.php');
     }
?>


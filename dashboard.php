<?php
session_start(); // Memulai sesi

if ($_SESSION['status'] == "login") {
    // Jika status sesi adalah login, tampilkan halaman dashboard
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
    <h2>SELAMAT DATANG <?php echo $_SESSION['username'], LOGIN ANDA BERHASIL</h2>
    </body>
    </html>
    <?php
} else {
    // Jika belum login, tampilkan pesan kesalahan
    echo "Maaf, anda belum login";
}
?>

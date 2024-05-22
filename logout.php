<?php
session_start();
if ($_SESSION['status']=="login"){
?>
<!DOCTYPEC html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<p><a href="logout.php">Keluar</a></p>
<h2>SELAMAT DATANG, LOGIN ANDA BERHASIL</h2>
</body>
</html>
<?php
{ else }
echo "maaf anda belum login";
}
?>
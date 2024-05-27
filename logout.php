<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <script type="text/javascript">
        alert('Selamat, anda berhasil logout.');
        location.href = 'login.php';
    </script>
</head>
<body>
</body>
</html>

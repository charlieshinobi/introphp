<?php
session_start();
if ($_SESSION['tipo'] !== 'administrador') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h1 class="mb-4">Bienvenido, Administrador</h1>
        <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <a href="logout.php" class="btn btn-secondary">Cerrar sesión</a>
    </div>
</body>
</html>
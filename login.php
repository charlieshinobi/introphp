<?php
session_start();
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    require_once __DIR__ . '/config/databaseli.php';

    $stmt = $conn->prepare("SELECT password, tipo FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hash, $tipo);
        $stmt->fetch();

        if (password_verify($password, $hash)) {
            $_SESSION['email'] = $email;
            $_SESSION['tipo'] = $tipo;

            if ($tipo === 'administrador') {
                header("Location: admin.php");
                exit;
            } else {
                header("Location: usuario.php");
                exit;
            }
        } else {
            $mensaje = "<div class='alert alert-danger'>Acceso Denegado (contraseña incorrecta)</div>";
        }
    } else {
        $mensaje = "<div class='alert alert-danger'>Acceso Denegado (email no encontrado)</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="min-width: 350px;">
        <h2 class="mb-4 text-center">Iniciar sesión</h2>

        <?php echo $mensaje; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="usuario@ejemplo.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
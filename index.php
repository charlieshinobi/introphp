<?php

require_once __DIR__ . '/config/database.php';

// Ejemplo de consulta
$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll();

foreach ($usuarios as $usuario) {
    echo $usuario['email'] . '<br>';
}

// Show all information, defaults to INFO_ALL
phpinfo();

// Show just the module information.
// phpinfo(8) yields identical results.
phpinfo(INFO_MODULES);


?>
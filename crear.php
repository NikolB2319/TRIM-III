<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO usuarios (nombre, correo) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre, $correo]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Correo: <input type="email" name="correo" required></label><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Regresar</a>
</body>
</html>

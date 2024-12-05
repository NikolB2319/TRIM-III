<?php
include 'conexion.php';

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $sql = "UPDATE usuarios SET nombre = ?, correo = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre, $correo, $id]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required></label><br>
        <label>Correo: <input type="email" name="correo" value="<?= $usuario['correo'] ?>" required></label><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Regresar</a>
</body>
</html>

<?php
include 'conexion.php';

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
exit;
?>

<?php
header("Content-Type: application/json");

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "ID de usuario no proporcionado."]);
    exit;
}

$idUsuario = (int) $_GET['id'];

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

$sql = "SELECT idUsuario, Correo_Electronico, Contrasenia, idRol FROM usuarios WHERE idUsuario = $idUsuario";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo json_encode(["error" => "Usuario no encontrado."]);
} else {
    echo json_encode($result->fetch_assoc());
}

$conn->close();
?>
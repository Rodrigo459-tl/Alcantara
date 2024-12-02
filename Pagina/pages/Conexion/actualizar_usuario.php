<?php
header("Content-Type: application/json");

// Decodificar los datos recibidos
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['idUsuario'])) {
    echo json_encode(["error" => "ID de usuario no proporcionado."]);
    exit;
}

$idUsuario = (int) $data['idUsuario'];
$correo = $data['Correo_Electronico'];
$contrasenia = $data['Contrasenia'];
$idRol = (int) $data['idRol'];

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Actualizar los datos del usuario
$sql = "UPDATE usuarios 
        SET Correo_Electronico = ?, Contrasenia = ?, idRol = ? 
        WHERE idUsuario = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $correo, $contrasenia, $idRol, $idUsuario);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "Error al actualizar el usuario: " . $conn->error]);
}

$stmt->close();
$conn->close();
?>
<?php
header("Content-Type: application/json");

// Obtener datos de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

// Validar datos
if (!$data || !isset($data['correo']) || !isset($data['contrasenia']) || !isset($data['rol'])) {
    echo json_encode(["error" => "Datos incompletos"]);
    exit;
}

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Error en la conexión a la base de datos: " . $conn->connect_error]);
    exit;
}

try {
    // Preparar datos
    $correo = $conn->real_escape_string($data['correo']);
    $contrasenia = $conn->real_escape_string($data['contrasenia']);
    $rol = (int) $data['rol'];

    // Verificar si el correo ya está registrado
    $checkCorreo = $conn->query("SELECT idUsuario FROM usuarios WHERE Correo_Electronico = '$correo'");
    if ($checkCorreo->num_rows > 0) {
        throw new Exception("El correo electrónico ya está registrado.");
    }

    // Insertar usuario en la base de datos
    $sql = "INSERT INTO usuarios (Contrasenia, Correo_Electronico, idRol) 
            VALUES ('$contrasenia', '$correo', $rol)";
    if (!$conn->query($sql)) {
        throw new Exception("Error al registrar el usuario: " . $conn->error);
    }

    echo json_encode(["success" => true]);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $conn->close();
}

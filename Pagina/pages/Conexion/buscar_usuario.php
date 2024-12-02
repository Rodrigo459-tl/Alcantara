<?php
header("Content-Type: application/json");

// Validar entrada
$correo = $_POST['correo'] ?? null;
if (!$correo) {
    echo json_encode(["error" => "Correo no proporcionado"]);
    exit;
}

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");
if ($conn->connect_error) {
    echo json_encode(["error" => "Error de conexión: " . $conn->connect_error]);
    exit;
}

try {
    // Consultar usuario por correo
    $sql = "SELECT u.idUsuario, u.Correo_Electronico AS Correo, 
                   (SELECT rol FROM roles WHERE idRol = u.idRol) AS Rol
            FROM usuarios u WHERE u.Correo_Electronico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "Usuario no encontrado"]);
    } else {
        $usuario = $result->fetch_assoc();
        echo json_encode($usuario);
    }
} catch (Exception $e) {
    echo json_encode(["error" => "Error: " . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
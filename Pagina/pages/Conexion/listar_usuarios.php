<?php
header("Content-Type: application/json");

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");
if ($conn->connect_error) {
    echo json_encode(["error" => "Error de conexión: " . $conn->connect_error]);
    exit;
}

try {
    // Consultar todos los usuarios
    $sql = "SELECT u.idUsuario, u.Correo_Electronico AS Correo, 
                   (SELECT rol FROM roles WHERE idRol = u.idRol) AS Rol
            FROM usuarios u";
    $result = $conn->query($sql);

    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }

    echo json_encode($usuarios);
} catch (Exception $e) {
    echo json_encode(["error" => "Error: " . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
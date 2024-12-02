<?php
header("Content-Type: application/json");

// Validar si se recibió el parámetro id
if (!isset($_GET['id'])) {
    echo json_encode(["error" => "ID del paciente no proporcionado."]);
    exit;
}

$idPaciente = (int) $_GET['id'];

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Error de conexión: " . $conn->connect_error]);
    exit;
}

$stmt = null; // Inicializar $stmt

try {
    // Consulta para obtener los datos del paciente, incluyendo el correo desde la tabla usuarios
    $sql = "SELECT 
                CONCAT(p.Nombre, ' ', p.AP, ' ', p.AM) AS NombreCompleto, 
                p.Telefono, 
                u.Correo_Electronico AS Correo, 
                h.idHistorial 
            FROM paciente p
            LEFT JOIN historial h ON p.idPaciente = h.idPaciente
            LEFT JOIN usuarios u ON p.idUsuario = u.idUsuario
            WHERE p.idPaciente = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idPaciente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "Paciente no encontrado."]);
    } else {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    }
} catch (Exception $e) {
    echo json_encode(["error" => "Error al obtener los datos: " . $e->getMessage()]);
} finally {
    if ($stmt) {
        $stmt->close();
    }
    $conn->close();
}
?>
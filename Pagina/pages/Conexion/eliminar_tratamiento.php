<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["error" => "Método no permitido"]);
    exit;
}

// Leer los datos enviados en el cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['idTratamiento'])) {
    echo json_encode(["error" => "No se proporcionó un ID de tratamiento."]);
    exit;
}

$idTratamiento = (int) $data['idTratamiento'];

$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Error de conexión: " . $conn->connect_error]);
    exit;
}

try {
    $sql = "DELETE FROM tratamiento WHERE idTratamiento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idTratamiento);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        throw new Exception("Error al eliminar el tratamiento: " . $stmt->error);
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $stmt->close();
    $conn->close();
}
?>
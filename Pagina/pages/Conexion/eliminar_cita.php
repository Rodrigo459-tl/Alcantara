<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["error" => "Método no permitido"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['idCita'])) {
    echo json_encode(["error" => "No se proporcionó un ID de cita."]);
    exit;
}

$idCita = (int) $data['idCita'];

$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Error de conexión: " . $conn->connect_error]);
    exit;
}

try {
    // Eliminar tratamientos relacionados
    $sqlTratamientos = "DELETE FROM tratamiento WHERE idCita = ?";
    $stmtTratamientos = $conn->prepare($sqlTratamientos);
    if (!$stmtTratamientos) {
        throw new Exception("Error al preparar la consulta de eliminación de tratamientos: " . $conn->error);
    }
    $stmtTratamientos->bind_param("i", $idCita);

    if (!$stmtTratamientos->execute()) {
        throw new Exception("Error al eliminar tratamientos relacionados: " . $stmtTratamientos->error);
    }

    // Eliminar la cita
    $sqlCita = "DELETE FROM cita WHERE idCita = ?";
    $stmtCita = $conn->prepare($sqlCita);
    if (!$stmtCita) {
        throw new Exception("Error al preparar la consulta de eliminación de la cita: " . $conn->error);
    }
    $stmtCita->bind_param("i", $idCita);

    if ($stmtCita->execute()) {
        echo json_encode(["success" => true]);
    } else {
        throw new Exception("Error al eliminar la cita: " . $stmtCita->error);
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    if (isset($stmtTratamientos))
        $stmtTratamientos->close();
    if (isset($stmtCita))
        $stmtCita->close();
    $conn->close();
}
?>
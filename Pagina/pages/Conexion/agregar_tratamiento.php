<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["error" => "Método no permitido"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['idCita'], $data['Tipo'], $data['Descripcion'], $data['Estado'], $data['Fecha_Inicio'], $data['Fecha_Finalizacion'])) {
    echo json_encode(["error" => "Faltan datos requeridos para agregar el tratamiento."]);
    exit;
}

$idCita = (int) $data['idCita'];
$tipo = $data['Tipo'];
$descripcion = $data['Descripcion'];
$estado = $data['Estado'];
$fechaInicio = $data['Fecha_Inicio'];
$fechaFin = $data['Fecha_Finalizacion'];

$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Error de conexión: " . $conn->connect_error]);
    exit;
}

try {
    $sql = "INSERT INTO tratamiento (idCita, Tipo, Descripcion, Estado, Fecha_Inicio, Fecha_Finalizacion) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $idCita, $tipo, $descripcion, $estado, $fechaInicio, $fechaFin);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        throw new Exception("Error al agregar el tratamiento: " . $stmt->error);
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $stmt->close();
    $conn->close();
}
?>
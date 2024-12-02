<?php
header("Content-Type: application/json");

// Leer los datos enviados por la solicitud
$data = json_decode(file_get_contents("php://input"), true);

// Validar los datos requeridos
if (
    !isset($data['idPaciente'], $data['idHistorial'], $data['Motivo'], $data['Fecha'], $data['Hora'], $data['Metodo_Agenda'], $data['Estado'])
) {
    echo json_encode(["error" => "Faltan datos requeridos para guardar la cita."]);
    exit;
}

// Asignar los valores
$idPaciente = (int) $data['idPaciente'];
$idHistorial = (int) $data['idHistorial'];
$motivo = $data['Motivo'];
$fecha = $data['Fecha'];
$hora = $data['Hora'];
$metodoAgenda = $data['Metodo_Agenda'];
$estado = $data['Estado'];

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Error de conexión: " . $conn->connect_error]);
    exit;
}

try {
    // Consulta para insertar la cita
    $sql = "INSERT INTO cita (idPaciente, idHistorial, Motivo, Fecha, Hora, Metodo_Agenda, Estado) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssss", $idPaciente, $idHistorial, $motivo, $fecha, $hora, $metodoAgenda, $estado);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "idCita" => $stmt->insert_id]);
    } else {
        throw new Exception("Error al guardar la cita: " . $stmt->error);
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $stmt->close();
    $conn->close();
}
?>
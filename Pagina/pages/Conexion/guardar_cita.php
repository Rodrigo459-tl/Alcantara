<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (
    !isset($data['idPaciente'], $data['idHistorial'], $data['Motivo'], $data['Fecha'], $data['Hora'], $data['Metodo_Agenda'], $data['Estado'], $data['Medio_Envio'])
) {
    echo json_encode(["error" => "Faltan datos requeridos para guardar la cita y el recordatorio."]);
    exit;
}

$idPaciente = (int) $data['idPaciente'];
$idHistorial = (int) $data['idHistorial'];
$motivo = $data['Motivo'];
$fecha = $data['Fecha'];
$hora = $data['Hora'];
$metodoAgenda = $data['Metodo_Agenda'];
$estado = $data['Estado'];
$medioEnvio = $data['Medio_Envio'];

$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Error de conexión: " . $conn->connect_error]);
    exit;
}

try {
    $conn->begin_transaction();

    // Insertar la cita
    $sqlCita = "INSERT INTO cita (idPaciente, idHistorial, Motivo, Fecha, Hora, Metodo_Agenda, Estado) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmtCita = $conn->prepare($sqlCita);
    $stmtCita->bind_param("iisssss", $idPaciente, $idHistorial, $motivo, $fecha, $hora, $metodoAgenda, $estado);

    if (!$stmtCita->execute()) {
        throw new Exception("Error al guardar la cita: " . $stmtCita->error);
    }

    $idCita = $stmtCita->insert_id;

    // Insertar el recordatorio
    $sqlRecordatorio = "INSERT INTO recordatorio (idCita, Medio_Envio, Estado_Envio) 
                        VALUES (?, ?, 'Pendiente')";
    $stmtRecordatorio = $conn->prepare($sqlRecordatorio);
    $stmtRecordatorio->bind_param("is", $idCita, $medioEnvio);

    if (!$stmtRecordatorio->execute()) {
        throw new Exception("Error al guardar el recordatorio: " . $stmtRecordatorio->error);
    }

    $conn->commit();
    echo json_encode(["success" => true, "idCita" => $idCita]);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $stmtCita->close();
    $stmtRecordatorio->close();
    $conn->close();
}
?>
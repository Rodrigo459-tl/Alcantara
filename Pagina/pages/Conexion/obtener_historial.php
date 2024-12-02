<?php
header("Content-Type: application/json");

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(["error" => "ID no proporcionado"]);
    exit;
}

$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

try {
    // Obtener datos del paciente
    $sql = "SELECT Nombre AS nombre, AP AS ap, AM AS am, Telefono AS telefono, FechaN AS fechaN, 
                   Municipio AS municipio, Colonia AS colonia, Calle AS calle, Estado AS estado, 
                   (SELECT Correo_Electronico FROM usuarios WHERE idUsuario = paciente.idUsuario) AS correo 
            FROM paciente 
            WHERE idPaciente = $id";
    $result = $conn->query($sql);

    if ($result->num_rows === 0) {
        throw new Exception("Paciente no encontrado");
    }

    $paciente = $result->fetch_assoc();

    // Verificar si las tablas de antecedentes utilizan idHistorial en lugar de idPaciente
    $resultHistorial = $conn->query("SELECT idHistorial FROM historial WHERE idPaciente = $id");
    if ($resultHistorial->num_rows === 0) {
        throw new Exception("Historial no encontrado para el paciente");
    }
    $idHistorial = $resultHistorial->fetch_assoc()['idHistorial'];

    // Obtener antecedentes patológicos
    $sqlPatologicos = "SELECT Nombre AS nombre, Estado AS estado, Descripcion AS descripcion 
                       FROM antecedentes_patologicos WHERE idHistorial = $idHistorial";
    $patologicos = $conn->query($sqlPatologicos)->fetch_all(MYSQLI_ASSOC);

    // Obtener antecedentes no patológicos
    $sqlNoPatologicos = "SELECT Nombre AS nombre, Estado AS estado, Descripcion AS descripcion 
                         FROM antecedentes_no_patologicos WHERE idHistorial = $idHistorial";
    $noPatologicos = $conn->query($sqlNoPatologicos)->fetch_all(MYSQLI_ASSOC);

    // Obtener citas del paciente
    $sqlCitas = "SELECT Fecha AS fecha, Hora AS hora, Motivo AS motivo, Metodo_Agenda AS metodoAgenda, Estado AS estado 
                 FROM cita 
                 WHERE idPaciente = $id";
    $citas = $conn->query($sqlCitas)->fetch_all(MYSQLI_ASSOC);

    // Responder con todos los datos en JSON
    echo json_encode([
        "paciente" => $paciente,
        "patologicos" => $patologicos,
        "noPatologicos" => $noPatologicos,
        "citas" => $citas
    ]);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $conn->close();
}

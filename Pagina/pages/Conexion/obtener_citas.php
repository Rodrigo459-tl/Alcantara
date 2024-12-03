<?php
header("Content-Type: application/json");

// Validar si se proporciona el ID del paciente
if (!isset($_GET['idPaciente'])) {
    echo json_encode(["error" => "No se proporcionó un ID de paciente."]);
    exit;
}

$idPaciente = (int) $_GET['idPaciente'];

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Error de conexión: " . $conn->connect_error]);
    exit;
}

try {
    // Consulta para obtener las citas asociadas al paciente
    $sqlCitas = "SELECT idCita, Fecha, Hora, Motivo, Estado, Metodo_Agenda 
                 FROM cita WHERE idPaciente = ? ORDER BY Fecha DESC, Hora DESC";
    $stmtCitas = $conn->prepare($sqlCitas);
    $stmtCitas->bind_param("i", $idPaciente);
    $stmtCitas->execute();
    $resultCitas = $stmtCitas->get_result();

    $citas = [];
    while ($rowCita = $resultCitas->fetch_assoc()) {
        $idCita = $rowCita['idCita'];

        // Consulta para obtener los tratamientos relacionados a cada cita
        $sqlTratamientos = "SELECT idTratamiento, Tipo, Descripcion, Estado, Fecha_Inicio, Fecha_Finalizacion 
                            FROM tratamiento WHERE idCita = ?";
        $stmtTratamientos = $conn->prepare($sqlTratamientos);
        $stmtTratamientos->bind_param("i", $idCita);
        $stmtTratamientos->execute();
        $resultTratamientos = $stmtTratamientos->get_result();

        $tratamientos = [];
        while ($rowTratamiento = $resultTratamientos->fetch_assoc()) {
            $tratamientos[] = [
                "idTratamiento" => $rowTratamiento['idTratamiento'],
                "Tipo" => $rowTratamiento['Tipo'],
                "Descripcion" => $rowTratamiento['Descripcion'],
                "Estado" => $rowTratamiento['Estado'],
                "Fecha_Inicio" => $rowTratamiento['Fecha_Inicio'],
                "Fecha_Finalizacion" => $rowTratamiento['Fecha_Finalizacion'],
            ];
        }

        $rowCita['tratamientos'] = $tratamientos;
        $citas[] = $rowCita;
    }

    echo json_encode(["citas" => $citas]);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $stmtCitas->close();
    $conn->close();
}
?>
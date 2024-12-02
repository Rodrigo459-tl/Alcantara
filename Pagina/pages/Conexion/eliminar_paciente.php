<?php
header("Content-Type: application/json");

// Decodificar los datos enviados desde el cliente
$data = json_decode(file_get_contents("php://input"), true);

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Validar que se recibe el ID del paciente
if (!isset($data['idPaciente']) || empty($data['idPaciente'])) {
    echo json_encode(["error" => "No se proporcionó el ID del paciente."]);
    exit;
}

$idPaciente = intval($data['idPaciente']);

try {
    // Iniciar una transacción
    if (!$conn->begin_transaction()) {
        throw new Exception("Error al iniciar la transacción: " . $conn->error);
    }

    // Obtener el idHistorial relacionado al paciente
    $sqlHistorial = "SELECT idHistorial FROM historial WHERE idPaciente = $idPaciente";
    $result = $conn->query($sqlHistorial);
    if (!$result) {
        throw new Exception("Error al obtener el historial: " . $conn->error);
    }

    $historial = $result->fetch_assoc();
    $idHistorial = $historial['idHistorial'] ?? null;

    // Eliminar datos relacionados si existe un historial
    if ($idHistorial) {
        // Eliminar antecedentes patológicos
        $sqlPatologicos = "DELETE FROM antecedentes_patologicos WHERE idHistorial = $idHistorial";
        if (!$conn->query($sqlPatologicos)) {
            throw new Exception("Error al eliminar antecedentes patológicos: " . $conn->error);
        }

        // Eliminar antecedentes no patológicos
        $sqlNoPatologicos = "DELETE FROM antecedentes_no_patologicos WHERE idHistorial = $idHistorial";
        if (!$conn->query($sqlNoPatologicos)) {
            throw new Exception("Error al eliminar antecedentes no patológicos: " . $conn->error);
        }

        // Eliminar citas
        $sqlCitas = "DELETE FROM cita WHERE idHistorial = $idHistorial";
        if (!$conn->query($sqlCitas)) {
            throw new Exception("Error al eliminar citas: " . $conn->error);
        }
    }

    // Eliminar el historial
    $sqlDeleteHistorial = "DELETE FROM historial WHERE idPaciente = $idPaciente";
    if (!$conn->query($sqlDeleteHistorial)) {
        throw new Exception("Error al eliminar el historial: " . $conn->error);
    }

    // Obtener el idUsuario asociado al paciente
    $sqlUsuario = "SELECT idUsuario FROM paciente WHERE idPaciente = $idPaciente";
    $resultUsuario = $conn->query($sqlUsuario);
    if (!$resultUsuario) {
        throw new Exception("Error al obtener el usuario: " . $conn->error);
    }

    $usuario = $resultUsuario->fetch_assoc();
    $idUsuario = $usuario['idUsuario'] ?? null;

    // Eliminar el paciente
    $sqlDeletePaciente = "DELETE FROM paciente WHERE idPaciente = $idPaciente";
    if (!$conn->query($sqlDeletePaciente)) {
        throw new Exception("Error al eliminar el paciente: " . $conn->error);
    }

    // Eliminar el usuario si existe un idUsuario
    if ($idUsuario) {
        $sqlDeleteUsuario = "DELETE FROM usuarios WHERE idUsuario = $idUsuario";
        if (!$conn->query($sqlDeleteUsuario)) {
            throw new Exception("Error al eliminar el usuario: " . $conn->error);
        }
    }

    // Confirmar la transacción
    if (!$conn->commit()) {
        throw new Exception("Error al confirmar la transacción: " . $conn->error);
    }

    echo json_encode(["success" => "Paciente y sus datos asociados eliminados correctamente."]);
} catch (Exception $e) {
    // Revertir la transacción en caso de error
    $conn->rollback();
    echo json_encode(["error" => "Error al eliminar los datos: " . $e->getMessage()]);
} finally {
    $conn->close();
}

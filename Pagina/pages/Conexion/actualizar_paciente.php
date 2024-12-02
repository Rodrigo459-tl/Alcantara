<?php
header("Content-Type: application/json");

// Decodificar los datos recibidos
$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['pacienteData']['idPaciente'])) {
    echo json_encode(["error" => "Datos inválidos o ID no proporcionado"]);
    exit;
}

$idPaciente = (int) $data['pacienteData']['idPaciente'];

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

try {
    // Verificar que el paciente existe y obtener idUsuario e idHistorial
    $result = $conn->query("SELECT idUsuario, h.idHistorial 
                            FROM paciente p
                            JOIN historial h ON h.idPaciente = p.idPaciente
                            WHERE p.idPaciente = $idPaciente");
    if ($result->num_rows === 0) {
        throw new Exception("Paciente no encontrado");
    }
    $row = $result->fetch_assoc();
    $idUsuario = $row['idUsuario'];
    $idHistorial = $row['idHistorial'];

    // Actualizar datos del usuario
    $correo = $conn->real_escape_string($data['pacienteData']['correo']);
    $sqlUsuario = "UPDATE usuarios SET Correo_Electronico = '$correo' WHERE idUsuario = $idUsuario";
    if (!$conn->query($sqlUsuario)) {
        throw new Exception("Error al actualizar usuario: " . $conn->error);
    }

    // Actualizar datos del paciente
    $paciente = $data['pacienteData'];
    $sqlPaciente = "UPDATE paciente 
                    SET Nombre = '{$conn->real_escape_string($paciente['nombre'])}',
                        AP = '{$conn->real_escape_string($paciente['ap'])}',
                        AM = '{$conn->real_escape_string($paciente['am'])}',
                        Telefono = '{$conn->real_escape_string($paciente['telefono'])}',
                        FechaN = '{$conn->real_escape_string($paciente['fechaN'])}',
                        Municipio = '{$conn->real_escape_string($paciente['municipio'])}',
                        Colonia = '{$conn->real_escape_string($paciente['colonia'])}',
                        Calle = '{$conn->real_escape_string($paciente['calle'])}',
                        Estado = '{$conn->real_escape_string($paciente['estado'])}'
                    WHERE idPaciente = $idPaciente";
    if (!$conn->query($sqlPaciente)) {
        throw new Exception("Error al actualizar paciente: " . $conn->error);
    }

    // Actualizar antecedentes patológicos
    if (isset($data['patologicos'])) {
        foreach ($data['patologicos'] as $patologico) {
            $nombre = $conn->real_escape_string($patologico['nombre']);
            $estado = (int) $patologico['estado'];
            $descripcion = $patologico['descripcion'] ? "'" . $conn->real_escape_string($patologico['descripcion']) . "'" : "NULL";

            $sqlPatologico = "INSERT INTO antecedentes_patologicos (idHistorial, Nombre, Estado, Descripcion) 
                              VALUES ($idHistorial, '$nombre', $estado, $descripcion)
                              ON DUPLICATE KEY UPDATE
                              Estado = $estado,
                              Descripcion = $descripcion";
            if (!$conn->query($sqlPatologico)) {
                throw new Exception("Error al actualizar antecedentes patológicos: " . $conn->error);
            }
        }
    }

    // Actualizar antecedentes no patológicos
    if (isset($data['noPatologicos'])) {
        foreach ($data['noPatologicos'] as $noPatologico) {
            $nombre = $conn->real_escape_string($noPatologico['nombre']);
            $estado = (int) $noPatologico['estado'];
            $descripcion = $noPatologico['descripcion'] ? "'" . $conn->real_escape_string($noPatologico['descripcion']) . "'" : "NULL";

            $sqlNoPatologico = "INSERT INTO antecedentes_no_patologicos (idHistorial, Nombre, Estado, Descripcion) 
                                VALUES ($idHistorial, '$nombre', $estado, $descripcion)
                                ON DUPLICATE KEY UPDATE
                                Estado = $estado,
                                Descripcion = $descripcion";
            if (!$conn->query($sqlNoPatologico)) {
                throw new Exception("Error al actualizar antecedentes no patológicos: " . $conn->error);
            }
        }
    }

    echo json_encode(["success" => true]);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $conn->close();
}

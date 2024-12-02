<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

try {
    // Insertar en usuarios
    $correo = $conn->real_escape_string($data['pacienteData']['correo']);
    $sqlUsuario = "INSERT INTO usuarios (Correo_Electronico, idRol) VALUES ('$correo', 1)";
    if (!$conn->query($sqlUsuario)) {
        throw new Exception("Error al insertar usuario: " . $conn->error);
    }
    $idUsuario = $conn->insert_id;

    // Insertar en paciente
    $paciente = $data['pacienteData'];
    $sqlPaciente = "INSERT INTO paciente (Nombre, AP, AM, Telefono, FechaN, Municipio, Colonia, Calle, Estado, idUsuario) 
                    VALUES ('{$conn->real_escape_string($paciente['nombre'])}', '{$conn->real_escape_string($paciente['ap'])}', 
                            '{$conn->real_escape_string($paciente['am'])}', '{$conn->real_escape_string($paciente['telefono'])}', 
                            '{$conn->real_escape_string($paciente['fechaN'])}', '{$conn->real_escape_string($paciente['municipio'])}', 
                            '{$conn->real_escape_string($paciente['colonia'])}', '{$conn->real_escape_string($paciente['calle'])}', 
                            '{$conn->real_escape_string($paciente['estado'])}', $idUsuario)";
    if (!$conn->query($sqlPaciente)) {
        throw new Exception("Error al insertar paciente: " . $conn->error);
    }
    $idPaciente = $conn->insert_id;

    // Insertar en historial
    $sqlHistorial = "INSERT INTO historial (idPaciente) VALUES ($idPaciente)";
    if (!$conn->query($sqlHistorial)) {
        throw new Exception("Error al insertar historial: " . $conn->error);
    }
    $idHistorial = $conn->insert_id;

    // Insertar antecedentes patológicos
    foreach ($data['patologicos'] as $patologico) {
        $nombre = $conn->real_escape_string($patologico['nombre']);
        $estado = (int) $patologico['estado'];
        $descripcion = $patologico['descripcion'] ? "'" . $conn->real_escape_string($patologico['descripcion']) . "'" : "NULL";

        $sqlPatologico = "INSERT INTO antecedentes_patologicos (idHistorial, Nombre, Estado, Descripcion) 
                          VALUES ($idHistorial, '$nombre', $estado, $descripcion)";
        if (!$conn->query($sqlPatologico)) {
            throw new Exception("Error al insertar antecedentes patológicos: " . $conn->error);
        }
    }

    // Insertar antecedentes no patológicos
    foreach ($data['noPatologicos'] as $noPatologico) {
        $nombre = $conn->real_escape_string($noPatologico['nombre']);
        $estado = (int) $noPatologico['estado'];
        $descripcion = $noPatologico['descripcion'] ? "'" . $conn->real_escape_string($noPatologico['descripcion']) . "'" : "NULL";

        $sqlNoPatologico = "INSERT INTO antecedentes_no_patologicos (idHistorial, Nombre, Estado, Descripcion) 
                            VALUES ($idHistorial, '$nombre', $estado, $descripcion)";
        if (!$conn->query($sqlNoPatologico)) {
            throw new Exception("Error al insertar antecedentes no patológicos: " . $conn->error);
        }
    }

    echo json_encode(["success" => true]);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $conn->close();
}

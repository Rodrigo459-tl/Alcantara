<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia por tu usuario
$password = "";     // Cambia por tu contraseña
$database = "ExpedienteMedico";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Leer datos del cuerpo de la solicitud
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['idUsuario'])) {
    echo json_encode(["error" => "ID de usuario no proporcionado."]);
    exit;
}

$idUsuario = (int) $data['idUsuario'];

// Iniciar una transacción
$conn->begin_transaction();

try {
    // Actualizar registros de la tabla `paciente` que referencien al usuario a NULL
    $queryUpdatePaciente = "UPDATE paciente SET idUsuario = NULL WHERE idUsuario = ?";
    $stmtUpdate = $conn->prepare($queryUpdatePaciente);
    $stmtUpdate->bind_param("i", $idUsuario);

    if (!$stmtUpdate->execute()) {
        throw new Exception("Error al desvincular usuario de pacientes: " . $stmtUpdate->error);
    }

    $stmtUpdate->close();

    // Eliminar al usuario de la tabla `usuarios`
    $queryDeleteUsuario = "DELETE FROM usuarios WHERE idUsuario = ?";
    $stmtDelete = $conn->prepare($queryDeleteUsuario);
    $stmtDelete->bind_param("i", $idUsuario);

    if (!$stmtDelete->execute()) {
        throw new Exception("Error al eliminar el usuario: " . $stmtDelete->error);
    }

    $stmtDelete->close();

    // Confirmar la transacción
    $conn->commit();

    echo json_encode(["success" => "Usuario eliminado correctamente."]);
} catch (Exception $e) {
    // Revertir la transacción en caso de error
    $conn->rollback();
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $conn->close();
}
?>
<?php
header("Content-Type: application/json");

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ExpedienteMedico");

// Verifica si la conexión fue exitosa
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Consulta para obtener todos los pacientes
$sql = "SELECT 
            p.idPaciente, 
            CONCAT(p.Nombre, ' ', p.AP, ' ', p.AM) AS NombreCompleto, 
            p.Telefono, 
            IFNULL(u.Correo_Electronico, 'NA') AS Correo
        FROM paciente p 
        LEFT JOIN usuarios u ON u.idUsuario = p.idUsuario";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    $pacientes = [];
    while ($row = $result->fetch_assoc()) {
        $pacientes[] = $row;
    }
    echo json_encode($pacientes); // Devolver los resultados como JSON
} else {
    echo json_encode(["error" => "No se encontraron pacientes."]);
}

// Cerrar la conexión
$conn->close();
?>
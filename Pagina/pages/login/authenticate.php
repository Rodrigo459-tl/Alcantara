<?php
// Iniciar sesión para manejar sesiones de usuario
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ExpedienteMedico";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se enviaron datos
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['username'];
    $contrasenia = $_POST['password'];

    // Consulta para verificar usuario y obtener su idRol
    $sql = "
        SELECT u.idUsuario, u.Correo_Electronico, u.idRol 
        FROM usuarios u
        WHERE u.Correo_Electronico = ? AND u.Contrasenia = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $correo, $contrasenia);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el usuario existe
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['idUsuario'];
        $_SESSION['user_email'] = $user['Correo_Electronico'];
        $_SESSION['user_role'] = $user['idRol'];

        // Redirigir según el idRol del usuario
        if ($user['idRol'] === 100) {
            header("Location: ../dashboard_doctor.php");
        } elseif ($user['idRol'] === 10) {
            header("Location: ../dashboard_recepcionista.php");
        } elseif ($user['idRol'] === 1) {
            header("Location: ../dashboard_paciente.php");
        } else {
            // Redirigir a un destino genérico si el idRol no es válido
            header("Location: error.php");
        }
        exit;
    } else {
        // Mostrar mensaje de error
        $_SESSION['error'] = "Datos ingresados incorrectos.";
        header("Location: login.php");
        exit;
    }
}

// Cerrar conexión
$conn->close();
?>
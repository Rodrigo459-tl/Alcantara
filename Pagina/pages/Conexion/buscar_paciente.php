<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluye la clase o el archivo donde está definida la función getId()
include 'funciones_tablas.php'; // Asegúrate de ajustar el nombre del archivo

// Comprueba si se recibe el nombre por POST
if (isset($_POST['name'])) {
    $name = $_POST['name'];

    // Crea una instancia de tu clase (ajusta el nombre de la clase según tu código)
    $pacienteObj = new funciones_tablas(); // Reemplaza 'TuClase' con el nombre real de tu clase

    // Llama a la función getId() y obtiene el resultado
    $resultado = $pacienteObj->buscarPaciente($name);

    // Verificar si la variable resultado está correctamente definida
    if ($resultado) {
        echo json_encode($resultado);  // Devolver el resultado como JSON
        //print_r($resultado);
    } else {
        echo json_encode(["error" => "No se encontraron resultados"]);
    }

} else {
    // Si no se recibe el nombre, devolver un error
    echo json_encode(["error" => "No se recibió el nombre"]);
}
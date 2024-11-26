<?php
session_start();

//Getting Data
require_once '../../models/Tabla_usuarios.php';

if (isset($_POST["mail"]) && isset($_POST["pass"])) {
    $correo = $_POST["mail"];
    $contrasena = $_POST["pass"];

    //Instancia modelo
    $tabla_usuarios = new Tabla_usuarios();
    $data = $tabla_usuarios->login($correo, $contrasena);

    if (!empty($data) && $data->estatus == 1 && $correo == $data->email_usuario && $data->password_usuario == $contrasena) {
        $_SESSION["is_logged"] = true;
        $_SESSION["name"] = $data->nombre_usuario . ' ' . $data->ap_usuario;
        $_SESSION["nickname"] = $data->nombre_usuario;
        $_SESSION["email"] = $data->email_usuario;
        $_SESSION["img"] = ($data->imagen_usuario == null) ?
            (($data->sexo_usuario == 0) ? 'female.png' : 'male.png')
            : $data->imagen_usuario;

        $_SESSION['msg'] = array(
            "type" => "info",
            "description" => "Bienvenido al sistema",
            "title" => "¡Exito al iniciar!"
        );
        header("location: ../../views/panel/dashboard.php");
        //print("<pre>".print_r($data)."<pre>");

    } elseif (!empty($data) && $data->estatus == 0 && $correo == $data->email_usuario && $data->password_usuario == $contrasena) {
        //Instancia de la sesion
        session_start();

        //Clean session var
        session_unset();

        //Destroy session
        session_destroy();
        $error = "El estatus esta inactivo";
        header("location: ../../../index.php?error=$error");
    } elseif (!empty($data) && $correo != $data->email_usuario || $data->password_usuario != $contrasena) {
        //Instancia de la sesion
        session_start();

        //Clean session var
        session_unset();

        //Destroy session
        session_destroy();
        $error = "El correo y la contraseña son invalidas";
        header("location: ../../../index.php?error=$error");
    }
} else {
    $error = "Error al mostrar datos";
    header("location: ../../../index.php?error=$error");
    print("<pre>" . print_r($data) . "<pre>");
}

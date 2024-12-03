<?php
session_start();
$error_message = isset($_SESSION['error']) ? $_SESSION['error'] : null;
unset($_SESSION['error']); // Limpiar el mensaje de error después de mostrarlo
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- METADATOS -->
    <title><strong>Login | DR. Nancy</strong></title>
    <meta charset="utf-8" />
    <meta name="author" content="Rodrigo" />
    <meta name="description" content="Login" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ENLACE DE ESTILOS -->
    <link rel="stylesheet" href="../../css/style.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        header nav {
            width: 100%;
            background-color: #0FCEC3;
            padding: 15px;
            color: white;
            text-align: center;
            position: fixed;
            /* Fija el nav en la parte superior */
            top: 0;
            /* Asegura que esté pegado a la parte superior */
            left: 0;
            /* Extiende desde el borde izquierdo */
            z-index: 1000;
            /* Asegura que esté encima de otros elementos */
        }

        body {
            /* Evita que el contenido se superponga con el nav */
        }


        header nav h1 {
            margin: 0;
            font-size: 1.8rem;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        header nav ul li {
            display: inline;
            margin: 0 10px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
        }

        .login-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
            text-align: center;
            animation: slide-in 0.5s ease-out;
        }

        .login-card h2 {
            margin-bottom: 1rem;
            color: #0FCEC3;
        }

        .login-card form div {
            margin-bottom: 1rem;
            text-align: left;
        }

        .login-card form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .login-card form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-card form button {
            background-color: #0FCEC3;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            width: 100%;
        }

        .login-card form button:hover {
            background-color: #0BA99E;
        }

        .login-card p {
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .login-card p a {
            color: #0FCEC3;
            text-decoration: none;
            font-weight: bold;
        }

        .login-card p a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            margin-top: 2rem;
            color: #777;
        }

        /* Animaciones */
        @keyframes slide-in {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>

</head>

<body>
    <header>
        <nav>
            <h1><strong style="color: white">NANCY LARA</strong></h1>
            <ul>
                <li><a href="../../index.php"><i class="fas fa-home"></i> Inicio</a></li>
            </ul>
        </nav>
    </header>

    <main>


        <div class="login-card">
            <h2>Iniciar Sesión</h2>
            <form action="./authenticate.php" method="POST">
                <div>
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required />
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required />
                </div>
                <button type="submit">Ingresar</button>
            </form>
            <br>
            <?php if ($error_message): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            <!-- <p>¿No tienes cuenta? <a href="../register.php">Regístrate aquí</a>.</p> -->
        </div>
    </main>

    <footer>
        <p>© 2024 DR. Nancy. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
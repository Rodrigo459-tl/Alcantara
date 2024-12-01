<?php
require_once("./Conexion/Tabla_paciente.php");

//Instancia modelo
$Tabla_paciente = new Tabla_paciente();
$data = $Tabla_paciente->buscarPaciente("Carlos");

//print_r($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <!--Boostrap 5.3-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!--CSS personalizado-->
  <link rel="stylesheet" href="style.css" />
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <style>
    .scrollable-div {
      height: 100vh;
      /* Ajusta la altura según tus necesidades */
      overflow-y: scroll;
      /* Habilita siempre la barra de desplazamiento vertical */
      border: 1px solid #ccc;
      /* Opcional: Añade un borde para visualizar el contenedor */
      /* Más alto que la barra de navegación */
      height: calc(100vh - 55px);
      /* Resta la altura de la barra de navegación */
      top: 55px;
      /* Alinea la barra lateral debajo de la navbar */
    }

    /* Estilo opcional para hacer la barra de desplazamiento más delgada */
    .scrollable-div::-webkit-scrollbar {
      width: 8px;
    }

    .scrollable-div::-webkit-scrollbar-thumb {
      background-color: #888;
      /* Color de la barra */
      border-radius: 4px;
      /* Bordes redondeados */
    }

    .scrollable-div::-webkit-scrollbar-thumb:hover {
      background-color: #555;
      /* Color al pasar el cursor */
    }
  </style>
</head>

<body>
  <!--Sidebard-->
  <nav class="sidebar">
    <a href="#" class="logo">Dashboard</a>

    <div class="menu-content ">
      <ul class="menu-items">

        <li class="item">
          <a onclick="showSection('pacientes')">Pacientes</a>
        </li>
        <li class="item">
          <a onclick="showSection('historiales')">Historiales</a>
        </li>
        <li class="item">
          <a onclick="showSection('antecedentes')">Antecedentes</a>
        </li>

        <!--
        <li class="item">
          <div class="submenu-item">
            <span>First submenu</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Your submenu title
            </div>
            <li class="item">
              <a href="#">First sublink</a>
            </li>
            <li class="item">
              <a href="#">First sublink</a>
            </li>
            <li class="item">
              <a href="#">First sublink</a>
            </li>
          </ul>
        </li>
  -->
      </ul>
    </div>
  </nav>

  <nav class="navbar">
    <i class="fa-solid fa-bars" id="sidebar-close"></i>
  </nav>

  <div class="main content scrollable-div">
    <div class="row w-100">
      <div class="col-lg-12"> <!--Columna principal-->

        <div id="pacientes" class="section active">
          <h2>Gestión de Pacientes</h2>
          <div class="search-container mt-3 mb-3 d-flex">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre...">
            <button id="searchButton" class="btn btn-primary ms-2">
              <i class="fa fa-search"></i> <!-- Ícono de lupa de Font Awesome -->
            </button>
          </div>
          <div class="card-content">
            <table id="pacientesTable" class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre Completo</th>
                  <th>Teléfono</th>
                  <th>Correo Electrónico</th>
                </tr>
              </thead>
              <tbody>
                <!-- Datos serán llenados dinámicamente desde la base de datos -->
              </tbody>
            </table>
          </div>
        </div>

        <div id="historiales" class="section">
          <h2>Gestión de Historiales</h2>

          <br> <!--datos personales del paciente -->
          <div class="row">
            <div class="col-12">
              <div class="card bg-white">
                <div class="card-body m-0 p-0">
                  <form>
                    <legend class="card-title" style="text-align: center;">Datos personales</legend>
                    <div class="card-content">
                      <div class="row mb-3">
                        <div class="form-group col">
                          <label for="nombre">Nombre</label>
                          <input type="text" class="form-control" id="nombre"
                            style="cursor:default ; outline: none; box-shadow: none;" value="Jose Miguel" readonly>
                        </div>
                        <div class="form-group col">
                          <label for="ap">Apellido paterno</label>
                          <input type="text" class="form-control" id="ap"
                            style="cursor:default ; outline: none; box-shadow: none;" value="Echavarria" readonly>
                        </div>
                        <div class="form-group col">
                          <label for="am">Apellido materno</label>
                          <input type="text" class="form-control" id="am"
                            style="cursor:default ; outline: none; box-shadow: none;" value="Matamoros" readonly>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="form-group col-3">
                          <label for="fn">Fecha de Nacimiento</label>
                          <input type="date" class="form-control" id="fn" value="2024-05-01" readonly>
                        </div>
                        <div class="form-group col-3">
                          <label for="fn">Teléfono</label>
                          <input type="tel" class="form-control" id="fn"
                            style="cursor:default ; outline: none; box-shadow: none;" value="2461987568" readonly>
                        </div>
                        <div class="form-group col">
                          <label for="mail">Correo electrónico</label>
                          <input type="email" class="form-control" id="mail"
                            style="cursor:default ; outline: none; box-shadow: none;"
                            value="jose.migue.7897763@gmail.com" readonly>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="form-group col">
                          <label for="calle">Calle y número</label>
                          <input type="text" class="form-control" id="calle"
                            style="cursor:default ; outline: none; box-shadow: none;"
                            value="3a Privada de independencia #12" readonly>
                        </div>
                        <div class="form-group col">
                          <label for="col">Colonia</label>
                          <input type="text" class="form-control" id="col"
                            style="cursor:default ; outline: none; box-shadow: none;" value="Ocotlan" readonly>
                        </div>
                        <div class="form-group col">
                          <label for="municipio">Municipio</label>
                          <input type="text" class="form-control" id="municipio"
                            style="cursor:default ; outline: none; box-shadow: none;" value="Tlaxcala de Xicohténcatl"
                            readonly>
                        </div>
                        <div class="form-group col">
                          <label for="estado">Estado</label>
                          <input type="text" class="form-control" id="estado"
                            style="cursor:default ; outline: none; box-shadow: none;" value="Tlaxcala" readonly>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div> <!--Fin datos del paciente-->


          <br> <!-- antecedentes Patologicos -->
          <div class="row">
            <div class="col-12">
              <div class="card p-0 m-0 bg-white">
                <div class="card-body p-0 m-0">
                  <!-- Botón que activa el panel -->
                  <button class="legend-button align-items-center" type="button" data-bs-toggle="collapse"
                    data-bs-target="#antecedentesPanel" aria-expanded="false" aria-controls="antecedentesPanel">
                    <span>Antecedentes Patológicos</span>
                    <i class="fas fa-angle-down icon-rotate" id="iconoColapso" style="font-size: 1.5rem;"></i>
                  </button>

                  <!-- Panel colapsable -->
                  <div class="row">
                    <div class="collapse p-0 m-0" id="antecedentesPanel">
                      <div class="row card-content p-0">
                        <!-- Antecedentes Patológicos -->
                        <div class="col-xl-6">
                          <h4 class="text-center">Antecedentes Patológicos</h4>
                          <table class="table table-bordered table-sm">
                            <thead class="thead-light">
                              <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Diabetes</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Hipertensión</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Enfermedades crónicas</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Problemas del corazón</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Problemas respiratorios</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Problemas del hígado</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Problemas renales</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Problemas digestivos</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Problemas de coagulación</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Intervenciones quirúrgicas</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Alergias</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Convulsiones</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Toma anticonceptivos</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Embarazo actual</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <!-- Antecedentes No Patológicos -->
                        <div class="col-xl-6">
                          <h4 class="text-center">Antecedentes No Patológicos</h4>
                          <table class="table table-bordered table-sm b-0 p-0">
                            <thead class="thead-light">
                              <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Higiene bucal</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Frecuencia de cepillado</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Fuma (cuántos cigarros al día)</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Consume alcohol</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                              <tr>
                                <td>Aprieta o rechina los dientes</td>
                                <td><input type="checkbox" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!--Fin Antecedentes Patologicos-->
        </div>

        <div id="antecedentes" class="section">
          <h2>Gestión de Antecedentes</h2>
          <p>Contenido relacionado con los historiales aquí.</p>
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document
      .getElementById("searchButton")
      .addEventListener("click", fetchPacientes);

    function fetchPacientes() {
      const searchValue = document.getElementById("searchInput").value.trim();

      if (!searchValue) {
        alert("Por favor, ingresa un nombre.");
        return;
      }

      // Crear objeto FormData para enviar datos al servidor
      const formData = new FormData();
      formData.append("name", searchValue);

      // Realizar la solicitud AJAX
      fetch("./Conexion/buscar_paciente.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json()) // Convertir la respuesta en JSON
        .then((data) => {
          mostrarResultados(data); // Llamar a la función para mostrar los resultados
        })
        .catch((error) => {
          console.error("Error al obtener los datos:", error);
        });
    }

    function mostrarResultados(paciente) {
      const tbody = document.querySelector("#pacientesTable tbody");
      tbody.innerHTML = ""; // Limpiar la tabla

      if (!paciente.idPaciente) {
        tbody.innerHTML =
          '<tr><td colspan="4" class="text-center">No se encontraron resultados.</td></tr>';
        return;
      }

      // Crear una fila con los datos recibidos
      const row = document.createElement("tr");
      row.innerHTML = `
      <td>${paciente.idPaciente}</td>
      <td>${paciente.NombreCompleto}</td>
      <td>${paciente.Telefono}</td>
      <td>${paciente.Correo ? paciente.Correo : "N/A"}</td>
      `;
      tbody.appendChild(row);
    }
  </script>
</body>

</html>
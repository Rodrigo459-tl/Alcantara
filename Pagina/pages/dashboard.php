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
  <!-- Vincula Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    #pacientesTable th,
    #pacientesTable td {
      text-align: center;
      vertical-align: middle;
    }

    #pacientesTable .fixed-column {
      width: 50px;
      /* Ajusta el tamaño de las columnas según tus necesidades */
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    #pacientesTable .fixed-column:last-child {
      width: 150px;
      /* Ajuste del tamaño para la columna de Acciones */
    }

    th {
      text-align: center;
      vertical-align: middle;
    }

    .centrado {
      text-align: center;
      vertical-align: middle;
    }

    .check {
      width: 20px;
      height: 20px;
      cursor: pointer;
    }

    .check-no-patologicos {
      width: 20px;
      height: 20px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <!--Sidebard-->
  <nav class="sidebar">
    <a onclick="showSection('dashboard')" class="logo">Dashboard</a>

    <div class="menu-content ">
      <ul class="menu-items">

        <li class="item">
          <a onclick="showSection('pacientes'); listarTodo(); ">Pacientes</a>
        </li>
        <li class="item">
          <a onclick="showSection('historiales')">Historiales</a>
        </li>
        <li class="item">
          <a onclick="showSection('antecedentes')">Antecedentes</a>
        </li>

        <!--Menus y sub menus-->
        <!--Pacientes-->
        <li class="item">
          <div class="submenu-item">
            <span>Pacientes</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Volver
            </div>
            <li class="item">
              <a onclick="showSection('registrarPaciente')">Registrar paciente</a>
            </li>
            <li class=" item">
              <a href="#">Ver pacientes</a>
            </li>
          </ul>
        </li>

        <!--Usuarios-->
        <li class="item">
          <div class="submenu-item">
            <span>Usuarios</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Volver
            </div>
            <li class="item">
              <a href="#">Registrar usuario</a>
            </li>
            <li class="item">
              <a href="#">Ver usuarios</a>
            </li>
          </ul>
        </li>

        <!--Citas-->
        <li class="item">
          <div class="submenu-item">
            <span>Citas</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Volver
            </div>
            <li class="item">
              <a href="#">Programar cita</a>
            </li>
            <li class="item">
              <a href="#">Ver citas</a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>

  <nav class="navbar">
    <i class="fa-solid fa-bars" id="sidebar-close"></i>
  </nav>

  <div class="main content scrollable-div">
    <div class="row w-100">
      <div class="col-lg-12"> <!--Columna principal-->
        <div id="dashboard" class="section">
          <h2>Dashboard</h2>
          <!--Inicio row tarjetas-->
          <div class="row mt-4">
            <!-- Tarjeta 1: Total Pacientes -->
            <div class="col-md-4">
              <div class="card bg-white mb-3 card-info shadow-sm">
                <div class="card-body">
                  <h5>Total Pacientes</h5>
                  <p class="card-text">120</p>
                </div>
              </div>
            </div>

            <!-- Tarjeta 2: Citas Pendientes -->
            <div class="col-md-4">
              <div class="card bg-white mb-3 card-warning shadow-sm">
                <div class="card-body">
                  <h5>Citas Pendientes</h5>
                  <p class="card-text">15</p>
                </div>
              </div>
            </div>

            <!-- Tarjeta 3: Nuevas Consultas -->
            <div class="col-md-4">
              <div class="card bg-white mb-3 card-success shadow-sm">
                <div class="card-body">
                  <h5>Nuevas Consultas</h5>
                  <p class="card-text">30</p>
                </div>
              </div>
            </div>
          </div> <!--Fin row tarjetas-->



          <!--Datos Extras-->
          <div class="mt-4">
            <div class="row">
              <!--Grafica de clientes-->
              <div class="col-8">
                <div class="card shadow-sm">
                  <div class="card-header bg-dark text-white" style="background-color: #11101d">
                    <h5 class=" mb-0">Citas programadas esta semana</h5>
                  </div>
                  <div class="card-body">
                    <canvas id="graficaPacientes"></canvas>
                  </div>
                </div>
              </div>

              <!-- Informacion de la proxima cita-->
              <div class="col-4">
                <div class="card shadow-sm mb-4">
                  <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Proxima cita</h5>
                  </div>
                  <div class="card-body">
                    <!-- Motivo de la Cita -->
                    <h6 class="text-primary"><strong>Motivo:</strong> Chequeo de rutina</h6>
                    <!-- Fecha y Hora -->
                    <p class="card-text">
                      <strong>Fecha:</strong> 2 de noviembre de 2024<br>
                      <strong>Hora:</strong> 10:00 AM
                    </p>
                    <!-- Método de Agenda -->
                    <p class="card-text">
                      <strong>Método de Agenda:</strong> Online
                    </p>
                    <!-- Estado de la Cita -->
                    <span class="badge bg-success">Confirmada</span>
                  </div>
                </div> <!-- Fin informacion de la proxima cita-->

              </div>
            </div> <!-- Fin datos de la semana -->
          </div>
        </div>

        <div id="registrarPaciente" class="section active">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Registrar Nuevo Paciente</h2>
            <button class="btn btn-success me-4" id="botonRegistrar" onclick="guardarDatos();">Registrar</button>
          </div>

          <br> <!-- Datos personales del paciente -->
          <div class="row">
            <div class="col-12">
              <div class="card bg-white">
                <div class="card-body m-0 p-0">
                  <form>
                    <h5 class="card-header card-title bg-dark text-white">Datos personales</h5>
                    <div class="card-content">
                      <div class="row mb-3">
                        <div class="form-group col">
                          <label for="nombre">Nombre</label>
                          <input type="text" class="form-control" id="nombre" value="Ernesto">
                        </div>
                        <div class="form-group col">
                          <label for="ap">Apellido paterno</label>
                          <input type="text" class="form-control" id="ap" value="Sanchez">
                        </div>
                        <div class="form-group col">
                          <label for="am">Apellido materno</label>
                          <input type="text" class="form-control" id="am" value="Piedras">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="form-group col-3">
                          <label for="fn">Fecha de Nacimiento</label>
                          <input type="date" class="form-control" id="fn" value="1985-05-05">
                        </div>
                        <div class="form-group col-3">
                          <label for="telefono">Teléfono</label>
                          <input type="tel" class="form-control" id="telefono" value="2947595684">
                        </div>
                        <div class="form-group col">
                          <label for="mail">Correo electrónico</label>
                          <input type="email" class="form-control" id="mail" value="ErnestoSP@gmail.com">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="form-group col">
                          <label for="calle">Calle y número</label>
                          <input type="text" class="form-control" id="calle" value="Avenida Juarez #123">
                        </div>
                        <div class="form-group col">
                          <label for="col">Colonia</label>
                          <input type="text" class="form-control" id="col" value="Centro">
                        </div>
                        <div class="form-group col">
                          <label for="municipio">Municipio</label>
                          <input type="text" class="form-control" id="municipio" value="Tlaxcala">
                        </div>
                        <div class="form-group col">
                          <label for="estado">Estado</label>
                          <input type="text" class="form-control" id="estado" value="Tlaxcala">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin datos del paciente -->


          <br> <!-- antecedentes Patologicos y no Patologicos -->
          <div class="row">
            <div class="col-12 mb-5">
              <div class="card p-0 m-0 bg-white">
                <div class="card-body p-0 m-0">
                  <!-- Botón que activa el panel -->
                  <button class="card-header bg-dark text-white legend-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#antecedentesPanel" aria-expanded="false" aria-controls="antecedentesPanel">
                    <h5 class="mb-0 text-start"> <i class="fas fa-angle-down icon-rotate" id="iconoColapso"
                        style="font-size: 1.2rem;"></i> Antecedentes</h5>
                  </button>

                  <!-- Panel colapsable -->
                  <div class="row">
                    <div class="collapse p-0 m-0" id="antecedentesPanel">
                      <div class="row card-content p-0 mb-2">
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
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-diabetes">
                                </td>
                                <td><input type="text" class="form-control" id="text-diabetes"></td>
                              </tr>
                              <tr>
                                <td>Hipertensión</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-hipertension">
                                </td>
                                <td><input type="text" class="form-control" id="text-hipertension"></td>
                              </tr>
                              <tr>
                                <td>Enfermedades crónicas</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-enfermedades-cronicas">
                                </td>
                                <td><input type="text" class="form-control" id="text-enfermedades-cronicas"></td>
                              </tr>
                              <tr>
                                <td>Problemas del corazón</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-problemas-corazon">
                                </td>
                                <td><input type="text" class="form-control" id="text-problemas-corazon"></td>
                              </tr>
                              <tr>
                                <td>Problemas respiratorios</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-problemas-respiratorios">
                                </td>
                                <td><input type="text" class="form-control" id="text-problemas-respiratorios"></td>
                              </tr>
                              <tr>
                                <td>Problemas del hígado</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-problemas-higado">
                                </td>
                                <td><input type="text" class="form-control" id="text-problemas-higado"></td>
                              </tr>
                              <tr>
                                <td>Problemas renales</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-problemas-renales">
                                </td>
                                <td><input type="text" class="form-control" id="text-problemas-renales"></td>
                              </tr>
                              <tr>
                                <td>Problemas digestivos</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-problemas-digestivos">
                                </td>
                                <td><input type="text" class="form-control" id="text-problemas-digestivos"></td>
                              </tr>
                              <tr>
                                <td>Problemas de coagulación</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-problemas-coagulacion">
                                </td>
                                <td><input type="text" class="form-control" id="text-problemas-coagulacion"></td>
                              </tr>
                              <tr>
                                <td>Intervenciones quirúrgicas</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-intervenciones-quirurgicas">
                                </td>
                                <td><input type="text" class="form-control" id="text-intervenciones-quirurgicas"></td>
                              </tr>
                              <tr>
                                <td>Alergias</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-alergias">
                                </td>
                                <td><input type="text" class="form-control" id="text-alergias"></td>
                              </tr>
                              <tr>
                                <td>Convulsiones</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-convulsiones">
                                </td>
                                <td><input type="text" class="form-control" id="text-convulsiones"></td>
                              </tr>
                              <tr>
                                <td>Toma anticonceptivos</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-toma-anticonceptivos">
                                </td>
                                <td><input type="text" class="form-control" id="text-toma-anticonceptivos"></td>
                              </tr>
                              <tr>
                                <td>Embarazo actual</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check" id="check-embarazo-actual">
                                </td>
                                <td><input type="text" class="form-control" id="text-embarazo-actual"></td>
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
                                <td class="centrado">
                                  <input type="checkbox" class="check-no-patologicos" id="check-higiene-bucal">
                                </td>
                                <td><input type="text" class="form-control" id="text-higiene-bucal"></td>
                              </tr>
                              <tr>
                                <td>Frecuencia de cepillado</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check-no-patologicos" id="check-frecuencia-cepillado">
                                </td>
                                <td><input type="text" class="form-control" id="text-frecuencia-cepillado">
                                </td>
                              </tr>
                              <tr>
                                <td>Fuma (cuántos cigarros al día)</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check-no-patologicos" id="check-fuma">
                                </td>
                                <td><input type="text" class="form-control" id="text-fuma"></td>
                              </tr>
                              <tr>
                                <td>Consume alcohol</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check-no-patologicos" id="check-consume-alcohol">
                                </td>
                                <td><input type="text" class="form-control" id="text-consume-alcohol"></td>
                              </tr>
                              <tr>
                                <td>Aprieta o rechina los dientes</td>
                                <td class="centrado">
                                  <input type="checkbox" class="check-no-patologicos" id="check-rechina-dientes">
                                </td>
                                <td><input type="text" class="form-control" id="text-rechina-dientes"></td>
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
          </div> <!--Fin Antecedentes-->
        </div>

        <div id="pacientes" class="section">
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
                  <th class="col-1">ID</th>
                  <th class="col-3">Nombre Completo</th>
                  <th class="col-2">Teléfono</th>
                  <th class="col-3">Correo Electrónico</th>
                  <th class="col-3">Acciones</th>
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
                    <i class="fas fa-angle-down icon-rotate" id="iconoColapso" style="font-size: 1.5rem;"></i>
                    <span>Antecedentes Patológicos</span>
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
    // Datos de ejemplo (número de pacientes por día)
    const datosPacientes = {
      labels: [
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado",
        "Domingo",
      ],
      datasets: [
        {
          label: "Número de Pacientes",
          data: [1, 2, 14, 12, 16, 10, 8], // Reemplaza con tus datos reales
          backgroundColor: "rgba(13, 110, 253, 0.6)", // Color primary de Bootstrap con transparencia
          borderColor: "rgba(13, 110, 253, 1)", // Color primary sólido de Bootstrap
          borderWidth: 2,
          borderRadius: 10,
        },
      ],
    };

    // Configuración de la gráfica
    const config = {
      type: "bar", // Tipo de gráfica (barras)
      data: datosPacientes,
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false, // Ocultar leyenda
          },
        },
        scales: {
          y: {
            beginAtZero: true, // Inicia el eje Y desde cero
          },
        },
      },
    };

    // Inicializar la gráfica en el canvas
    const ctx = document.getElementById("graficaPacientes").getContext("2d");
    new Chart(ctx, config);
  </script>
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
          '<tr><td colspan="5" class="text-center">No se encontraron resultados.</td></tr>';
        return;
      }

      // Crear una fila con los datos recibidos
      const row = document.createElement("tr");
      row.innerHTML = `
  <td class="col-1">${paciente.idPaciente}</td>
  <td class="col-3">${paciente.NombreCompleto}</td>
  <td class="col-2">${paciente.Telefono}</td>
  <td class="col-3">${paciente.Correo ? paciente.Correo : "N/A"}</td>
  <td class="col-3">
    <button class="btn btn-warning" onclick="modificarDatos(${paciente.idPaciente
        })">Actualizar</button>
        <button class="btn btn-danger" onclick="eliminarPaciente(${paciente.idPaciente
        })">Eliminar</button>
    <button class="btn btn-success" onclick="verHistorial(${paciente.idPaciente
        })">Ver historial</button>
  </td>
  `;

      tbody.appendChild(row);
    }

    function listarTodo() {
      fetch('./Conexion/listar_pacientes.php') // Asegúrate de usar la ruta correcta
        .then((response) => {
          if (!response.ok) {
            throw new Error("Error al obtener los pacientes");
          }
          return response.json();
        })
        .then((data) => {
          if (data.error) {
            alert(data.error);
            return;
          }
          const tbody = document.querySelector("#pacientesTable tbody");
          tbody.innerHTML = ""; // Limpiar la tabla

          if (data.length === 0) {
            tbody.innerHTML =
              '<tr><td colspan="5" class="text-center">No se encontraron pacientes.</td></tr>';
            return;
          }

          // Iterar sobre los pacientes y crear una fila por cada uno
          data.forEach((paciente) => {
            const row = document.createElement("tr");
            row.innerHTML = `
          <td class="col-1">${paciente.idPaciente}</td>
          <td class="col-3">${paciente.NombreCompleto}</td>
          <td class="col-2">${paciente.Telefono}</td>
          <td class="col-3">${paciente.Correo ? paciente.Correo : "N/A"}</td>
          <td class="col-3">
            <button class="btn btn-warning" onclick="modificarDatos(${paciente.idPaciente})">Actualizar</button>
            <button class="btn btn-danger" onclick="eliminarPaciente(${paciente.idPaciente})">Eliminar</button>
            <button class="btn btn-success" onclick="verHistorial(${paciente.idPaciente})">Ver historial</button>
          </td>
        `;
            tbody.appendChild(row);
          });
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("Ocurrió un error al cargar los pacientes.");
        });
    }


    // Función para manejar el botón "Modificar Datos"
    function modificarDatos(idPaciente) {
      console.log("Modificar datos del paciente con ID:", idPaciente);
      // Aquí puedes redirigir o hacer alguna acción con la id del paciente
      // Por ejemplo:
      // window.location.href = `modificar_paciente.php?id=${idPaciente}`;
    }

    // Función para manejar el botón "Ver Historial"
    function verHistorial(idPaciente) {
      console.log("Ver historial del paciente con ID:", idPaciente);
      // Aquí puedes redirigir o hacer alguna acción con la id del paciente
      // Por ejemplo:
      // window.location.href = `historial_paciente.php?id=${idPaciente}`;
    }

    // Función para manejar el botón "Eliminar el paciente"
    function eliminarPaciente(idPaciente) {
      if (confirm("¿Estás seguro de que deseas eliminar este paciente y toda su información asociada?")) {
        fetch("./Conexion/eliminar_paciente.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ idPaciente })
        })
          .then((response) => response.json())
          .then((data) => {
            console.log("Respuesta del servidor:", data);
            if (data.error) {
              alert(`Error al eliminar el paciente: ${data.error}`);
            } else {
              alert("Paciente eliminado con éxito.");
              location.reload(); // Opcional: Recargar la página tras éxito
            }
          })
          .catch((error) => {
            console.error("Error en la solicitud:", error);
            alert("Ocurrió un error inesperado. Inténtalo de nuevo.");
          });
      }
    }

  </script>

  <script>
    function guardarDatos() {
      const pacienteData = {
        nombre: document.getElementById("nombre").value,
        ap: document.getElementById("ap").value,
        am: document.getElementById("am").value,
        telefono: document.getElementById("telefono").value,
        fechaN: document.getElementById("fn").value,
        municipio: document.getElementById("municipio").value,
        colonia: document.getElementById("col").value,
        calle: document.getElementById("calle").value,
        estado: document.getElementById("estado").value,
        correo: document.getElementById("mail").value
      };

      // Antecedentes Patológicos
      const patologicos = [];
      const patologicosCheckboxes = document.querySelectorAll("input.check");
      patologicosCheckboxes.forEach((check) => {
        const nombre = check.closest("tr").cells[0].innerText;
        const estado = check.checked ? 1 : 0;
        const descripcion = check.checked
          ? document.getElementById(`text-${check.id.split('-')[1]}`).value || null
          : null;

        patologicos.push({
          nombre,
          estado,
          descripcion
        });
      });

      // Antecedentes No Patológicos
      const noPatologicos = [];
      const noPatologicosCheckboxes = document.querySelectorAll("input.check-no-patologicos");
      noPatologicosCheckboxes.forEach((check) => {
        const nombre = check.closest("tr").cells[0].innerText;
        const estado = check.checked ? 1 : 0;
        const descripcion = check.checked
          ? document.getElementById(`text-no-${check.id.split('-')[1]}`).value || null
          : null;

        noPatologicos.push({
          nombre,
          estado,
          descripcion
        });
      });

      // Enviar datos mediante fetch al servidor PHP
      fetch("./Conexion/guardar_paciente.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ pacienteData, patologicos, noPatologicos })
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error(`Error en la respuesta del servidor: ${response.statusText}`);
          }
          return response.json();
        })
        .then((data) => {
          if (data.error) {
            alert(`Error al registrar paciente: ${data.error}`);
          } else {
            alert("Paciente registrado con éxito.");
          }
        })
        .catch((error) => console.error("Error:", error));
    }


  </script>

</body>

</html>
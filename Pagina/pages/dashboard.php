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

    .update_check {
      width: 20px;
      height: 20px;
      cursor: pointer;
    }

    .update_check-no-patologicos {
      width: 20px;
      height: 20px;
      cursor: pointer;
    }

    .historial_check {
      width: 20px;
      height: 20px;
      cursor: pointer;
    }

    .historial_check-no-patologicos {
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
              <a onclick="showSection('verPacientes'); listarTodo();">Ver pacientes</a>
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
              <a onclick="showSection('registrarUsuario')">Registrar usuario</a>
            </li>
            <li class="item">
              <a onclick="showSection('verUsuarios'); listarTodosUsuarios();">Ver usuarios</a>
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
        <!--Seccion dashboard-->
        <div id="dashboard" class="section">
          <h2>Dashboard</h2>
          <!-- Inicio row tarjetas -->
          <div class="row mt-4">
            <!-- Tarjeta 1: Total Pacientes -->
            <div class="col-4">
              <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white">
                  <h5 class="mb-0">Total Pacientes</h5>
                </div>
                <div class="card-body">
                  <p class="card-text text-primary"><strong>Total:</strong> 120</p>
                </div>
              </div>
            </div>

            <!-- Tarjeta 2: Citas Pendientes -->
            <div class="col-4">
              <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white">
                  <h5 class="mb-0">Citas Pendientes</h5>
                </div>
                <div class="card-body">
                  <p class="card-text text-warning"><strong>Total:</strong> 15</p>
                </div>
              </div>
            </div>

            <!-- Tarjeta 3: Nuevas Consultas -->
            <div class="col-4">
              <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white">
                  <h5 class="mb-0">Nuevas Consultas</h5>
                </div>
                <div class="card-body">
                  <p class="card-text text-success"><strong>Total:</strong> 30</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin row tarjetas -->




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

        <!--Secciones de Paciente------------------------------------------------------------------------------->

        <!--Seccion Registrar paciente-->
        <div id="registrarPaciente" class="section">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Registrar Nuevo Paciente</h2>
            <button class="btn btn-primary me-4" id="botonRegistrar" onclick="guardarDatos();">Registrar</button>
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
          </div><!-- Fin datos del paciente -->


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

        <!--Seccion ver pacientes (Actualizar, eliminar y ver historial completo-->
        <div id="verPacientes" class="section">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">
              <i class="fas fa-user-friends"></i> Pacientes Registrados
            </h2>
            <button class="btn btn-dark" onclick="listarTodo();">
              <i class="fas fa-list"></i> Ver Todos
            </button>
          </div>

          <div class="search-container d-flex mb-3">
            <input type="text" id="searchInput" class="form-control rounded-start" placeholder="Buscar por nombre..." />
            <button id="searchButton" class="btn btn-dark rounded-end">
              <i class="fas fa-search"></i> Buscar
            </button>
          </div>

          <div class="card shadow-sm">
            <div class="card-header bg-black text-white">
              <h5 class="mb-0 text-center">
                <i class="fas fa-address-book"></i> Listado de Pacientes
              </h5>
            </div>
            <div class="card-body p-0">
              <table id="pacientesTable" class="table table-striped table-hover table-bordered mb-0">
                <thead class="table-dark">
                  <tr>
                    <th class="col-1 text-center">
                      <i class="fas fa-id-card"></i> ID
                    </th>
                    <th class="col-3">
                      <i class="fas fa-user"></i> Nombre Completo
                    </th>
                    <th class="col-2">
                      <i class="fas fa-phone"></i> Teléfono
                    </th>
                    <th class="col-3">
                      <i class="fas fa-envelope"></i> Correo Electrónico
                    </th>
                    <th class="col-3 text-center">
                      <i class="fas fa-cogs"></i> Acciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Datos serán llenados dinámicamente desde la base de datos -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Sección Actualizar Paciente -->
        <div id="actualizarPaciente" class="section">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Actualizar Paciente</h2>
            <button id="botonActualizar" class="btn btn-warning me-4" onclick="actualizarDatos();">Actualizar</button>
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
                          <input type="text" class="form-control" id="update_nombre" value="Ernesto">
                        </div>
                        <div class="form-group col">
                          <label for="ap">Apellido paterno</label>
                          <input type="text" class="form-control" id="update_ap" value="Sanchez">
                        </div>
                        <div class="form-group col">
                          <label for="am">Apellido materno</label>
                          <input type="text" class="form-control" id="update_am" value="Piedras">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="form-group col-3">
                          <label for="fn">Fecha de Nacimiento</label>
                          <input type="date" class="form-control" id="update_fn" value="1985-05-05">
                        </div>
                        <div class="form-group col-3">
                          <label for="telefono">Teléfono</label>
                          <input type="tel" class="form-control" id="update_telefono" value="2947595684">
                        </div>
                        <div class="form-group col">
                          <label for="mail">Correo electrónico</label>
                          <input type="email" class="form-control" id="update_mail" value="ErnestoSP@gmail.com">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="form-group col">
                          <label for="calle">Calle y número</label>
                          <input type="text" class="form-control" id="update_calle" value="Avenida Juarez #123">
                        </div>
                        <div class="form-group col">
                          <label for="col">Colonia</label>
                          <input type="text" class="form-control" id="update_col" value="Centro">
                        </div>
                        <div class="form-group col">
                          <label for="municipio">Municipio</label>
                          <input type="text" class="form-control" id="update_municipio" value="Tlaxcala">
                        </div>
                        <div class="form-group col">
                          <label for="estado">Estado</label>
                          <input type="text" class="form-control" id="update_estado" value="Tlaxcala">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div><!-- Fin datos del paciente -->

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
                                  <input type="checkbox" class="update_check" id="update_check-diabetes">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-diabetes"></td>
                              </tr>
                              <tr>
                                <td>Hipertensión</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-hipertension">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-hipertension"></td>
                              </tr>
                              <tr>
                                <td>Enfermedades crónicas</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-enfermedades-cronicas">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-enfermedades-cronicas"></td>
                              </tr>
                              <tr>
                                <td>Problemas del corazón</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-problemas-corazon">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-problemas-corazon"></td>
                              </tr>
                              <tr>
                                <td>Problemas respiratorios</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-problemas-respiratorios">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-problemas-respiratorios">
                                </td>
                              </tr>
                              <tr>
                                <td>Problemas del hígado</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-problemas-higado">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-problemas-higado"></td>
                              </tr>
                              <tr>
                                <td>Problemas renales</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-problemas-renales">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-problemas-renales"></td>
                              </tr>
                              <tr>
                                <td>Problemas digestivos</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-problemas-digestivos">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-problemas-digestivos"></td>
                              </tr>
                              <tr>
                                <td>Problemas de coagulación</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-problemas-coagulacion">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-problemas-coagulacion"></td>
                              </tr>
                              <tr>
                                <td>Intervenciones quirúrgicas</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check"
                                    id="update_check-intervenciones-quirurgicas">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-intervenciones-quirurgicas">
                                </td>
                              </tr>
                              <tr>
                                <td>Alergias</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-alergias">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-alergias"></td>
                              </tr>
                              <tr>
                                <td>Convulsiones</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-convulsiones">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-convulsiones"></td>
                              </tr>
                              <tr>
                                <td>Toma anticonceptivos</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-toma-anticonceptivos">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-toma-anticonceptivos"></td>
                              </tr>
                              <tr>
                                <td>Embarazo actual</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check" id="update_check-embarazo-actual">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-embarazo-actual"></td>
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
                                  <input type="checkbox" class="update_check-no-patologicos"
                                    id="update_check-higiene-bucal">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-higiene-bucal"></td>
                              </tr>
                              <tr>
                                <td>Frecuencia de cepillado</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check-no-patologicos"
                                    id="update_check-frecuencia-cepillado">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-frecuencia-cepillado">
                                </td>
                              </tr>
                              <tr>
                                <td>Fuma (cuántos cigarros al día)</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check-no-patologicos" id="update_check-fuma">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-fuma"></td>
                              </tr>
                              <tr>
                                <td>Consume alcohol</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check-no-patologicos"
                                    id="update_check-consume-alcohol">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-consume-alcohol"></td>
                              </tr>
                              <tr>
                                <td>Aprieta o rechina los dientes</td>
                                <td class="centrado">
                                  <input type="checkbox" class="update_check-no-patologicos"
                                    id="update_check-rechina-dientes">
                                </td>
                                <td><input type="text" class="form-control" id="update_text-rechina-dientes"></td>
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

        <!-- Sección Ver historial del Paciente -->
        <div id="historialPaciente" class="section">
          <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Historial de Paciente</h2>
            <button id="botonCerrarHistorial" class="btn btn-success me-4" onclick="showSection('verPacientes');">
              Cerrar historial
            </button>
          </div>

          <br />
          <!-- Datos personales del paciente -->
          <div class="row">
            <div class="col-12">
              <div class="card bg-white">
                <div class="card-body m-0 p-0">
                  <form>
                    <h5 class="card-header card-title bg-dark text-white">
                      Datos personales
                    </h5>
                    <div class="card-content">
                      <div class="row mb-3">
                        <div class="form-group col">
                          <label for="nombre">Nombre</label>
                          <input type="text" class="form-control" id="historial_nombre" value="Ernesto" />
                        </div>
                        <div class="form-group col">
                          <label for="ap">Apellido paterno</label>
                          <input type="text" class="form-control" id="historial_ap" value="Sanchez" />
                        </div>
                        <div class="form-group col">
                          <label for="am">Apellido materno</label>
                          <input type="text" class="form-control" id="historial_am" value="Piedras" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="form-group col-3">
                          <label for="fn">Fecha de Nacimiento</label>
                          <input type="date" class="form-control" id="historial_fn" value="1985-05-05" />
                        </div>
                        <div class="form-group col-3">
                          <label for="telefono">Teléfono</label>
                          <input type="tel" class="form-control" id="historial_telefono" value="2947595684" />
                        </div>
                        <div class="form-group col">
                          <label for="mail">Correo electrónico</label>
                          <input type="email" class="form-control" id="historial_mail" value="ErnestoSP@gmail.com" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="form-group col">
                          <label for="calle">Calle y número</label>
                          <input type="text" class="form-control" id="historial_calle" value="Avenida Juarez #123" />
                        </div>
                        <div class="form-group col">
                          <label for="col">Colonia</label>
                          <input type="text" class="form-control" id="historial_col" value="Centro" />
                        </div>
                        <div class="form-group col">
                          <label for="municipio">Municipio</label>
                          <input type="text" class="form-control" id="historial_municipio" value="Tlaxcala" />
                        </div>
                        <div class="form-group col">
                          <label for="estado">Estado</label>
                          <input type="text" class="form-control" id="historial_estado" value="Tlaxcala" />
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin datos del paciente -->

          <br />
          <!-- antecedentes Patologicos y no Patologicos -->
          <div class="row">
            <div class="col-12 mb-0">
              <div class="card p-0 m-0 bg-white">
                <div class="card-body p-0 m-0">
                  <!-- Botón que activa el panel -->
                  <button class="card-header bg-dark text-white legend-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#antecedentesPanel" aria-expanded="false" aria-controls="antecedentesPanel">
                    <h5 class="mb-0 text-start">
                      <i class="fas fa-angle-down icon-rotate" id="iconoColapso" style="font-size: 1.2rem"></i>
                      Antecedentes
                    </h5>
                  </button>

                  <!-- Panel colapsable -->
                  <div class="row">
                    <div class="collapse p-0 m-0" id="antecedentesPanel">
                      <div class="row card-content p-0 mb-3">
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
                                  <input type="checkbox" class="historial_check" id="historial_check-diabetes" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-diabetes" />
                                </td>
                              </tr>
                              <tr>
                                <td>Hipertensión</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check" id="historial_check-hipertension" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-hipertension" />
                                </td>
                              </tr>
                              <tr>
                                <td>Enfermedades crónicas</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check"
                                    id="historial_check-enfermedades-cronicas" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-enfermedades-cronicas" />
                                </td>
                              </tr>
                              <tr>
                                <td>Problemas del corazón</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check"
                                    id="historial_check-problemas-corazon" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-problemas-corazon" />
                                </td>
                              </tr>
                              <tr>
                                <td>Problemas respiratorios</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check"
                                    id="historial_check-problemas-respiratorios" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-problemas-respiratorios" />
                                </td>
                              </tr>
                              <tr>
                                <td>Problemas del hígado</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check"
                                    id="historial_check-problemas-higado" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-problemas-higado" />
                                </td>
                              </tr>
                              <tr>
                                <td>Problemas renales</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check"
                                    id="historial_check-problemas-renales" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-problemas-renales" />
                                </td>
                              </tr>
                              <tr>
                                <td>Problemas digestivos</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check"
                                    id="historial_check-problemas-digestivos" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-problemas-digestivos" />
                                </td>
                              </tr>
                              <tr>
                                <td>Problemas de coagulación</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check"
                                    id="historial_check-problemas-coagulacion" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-problemas-coagulacion" />
                                </td>
                              </tr>
                              <tr>
                                <td>Intervenciones quirúrgicas</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check"
                                    id="historial_check-intervenciones-quirurgicas" />
                                </td>
                                <td>
                                  <input type="text" class="form-control"
                                    id="historial_text-intervenciones-quirurgicas" />
                                </td>
                              </tr>
                              <tr>
                                <td>Alergias</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check" id="historial_check-alergias" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-alergias" />
                                </td>
                              </tr>
                              <tr>
                                <td>Convulsiones</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check" id="historial_check-convulsiones" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-convulsiones" />
                                </td>
                              </tr>
                              <tr>
                                <td>Toma anticonceptivos</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check"
                                    id="historial_check-toma-anticonceptivos" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-toma-anticonceptivos" />
                                </td>
                              </tr>
                              <tr>
                                <td>Embarazo actual</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check" id="historial_check-embarazo-actual" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-embarazo-actual" />
                                </td>
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
                                  <input type="checkbox" class="historial_check-no-patologicos"
                                    id="historial_check-higiene-bucal" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-higiene-bucal" />
                                </td>
                              </tr>
                              <tr>
                                <td>Frecuencia de cepillado</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check-no-patologicos"
                                    id="historial_check-frecuencia-cepillado" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-frecuencia-cepillado" />
                                </td>
                              </tr>
                              <tr>
                                <td>Fuma (cuántos cigarros al día)</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check-no-patologicos"
                                    id="historial_check-fuma" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-fuma" />
                                </td>
                              </tr>
                              <tr>
                                <td>Consume alcohol</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check-no-patologicos"
                                    id="historial_check-consume-alcohol" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-consume-alcohol" />
                                </td>
                              </tr>
                              <tr>
                                <td>Aprieta o rechina los dientes</td>
                                <td class="centrado">
                                  <input type="checkbox" class="historial_check-no-patologicos"
                                    id="historial_check-rechina-dientes" />
                                </td>
                                <td>
                                  <input type="text" class="form-control" id="historial_text-rechina-dientes" />
                                </td>
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
          </div>
          <!--Fin Antecedentes-->

          <br />
          <!-- Card para Listado de Citas -->
          <div class="row">
            <div class="col-12">
              <div class="card bg-white">
                <div class="card-body m-0 p-0">
                  <h5 class="card-header card-title bg-dark text-white">Historial de citas</h5>
                  <div class="card-content">
                    <table class="table table-bordered table-sm">
                      <thead class="thead-light">
                        <tr>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>Motivo</th>
                          <th>Método de Agenda</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <tbody id="citas_list">
                        <!-- Las citas se cargarán aquí -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Fin Listado de Citas -->
        </div>

        <!--Secciones de usuario------------------------------------------------------------------------------->
        <!--Registrar usuario-->
        <div id="registrarUsuario" class="section">
          <div class="container">
            <!-- Encabezado -->
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h2 class="text-dark">
                <i class="fas fa-user-plus me-2"></i>Registrar Usuario
              </h2>
            </div>

            <!-- Tarjeta principal -->
            <div class="card bg-white border-0 shadow">
              <div class="card-header bg-dark text-white text-center">
                <h5 class="mb-0">Información del Usuario</h5>
              </div>
              <div class="card-body p-4">
                <form id="formRegistrarUsuario" class="needs-validation" novalidate>
                  <!-- Correo y Contraseña -->
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="registro_correo" class="form-label">
                          <i class="fas fa-envelope me-2"></i>Correo Electrónico
                        </label>
                        <input type="email" class="form-control" id="registro_correo" placeholder="Ingrese el correo"
                          required />
                        <div class="invalid-feedback">Por favor, ingrese un correo válido.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="registro_contrasenia" class="form-label">
                          <i class="fas fa-key me-2"></i>Contraseña
                        </label>
                        <input type="password" class="form-control" id="registro_contrasenia"
                          placeholder="Ingrese la contraseña" required />
                        <div class="invalid-feedback">Por favor, ingrese una contraseña.</div>
                      </div>
                    </div>
                  </div>

                  <!-- Selección de Rol -->
                  <div class="row mb-4">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="registro_rol" class="form-label">
                          <i class="fas fa-user-tag me-2"></i>Rol
                        </label>
                        <select class="form-select" id="registro_rol" required>
                          <option value="" disabled selected>Seleccione un rol</option>
                          <option value="100">Administrador</option>
                          <option value="10">Operador</option>
                        </select>
                        <div class="invalid-feedback">Por favor, seleccione un rol.</div>
                      </div>
                    </div>
                  </div>

                  <!-- Botón de registro -->
                  <div class="text-center">
                    <button type="button" class="btn btn-dark btn-lg px-5" onclick="registrarUsuario()">
                      <i class="fas fa-save me-2"></i>Registrar
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Pie de página -->
            <div class="text-center mt-4">
              <p class="text-muted">
                <i class="fas fa-info-circle me-2"></i>Asegúrese de que los datos sean correctos antes de registrar al
                usuario.
              </p>
            </div>
          </div>
        </div>

        <!-- Sección Ver Usuarios -->
        <div id="verUsuarios" class="section">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-dark">
              <i class="fas fa-users me-2"></i> Usuarios Registrados
            </h2>
            <button class="btn btn-dark" onclick="listarTodosUsuarios();">
              <i class="fas fa-list"></i> Ver Todos
            </button>
          </div>

          <!-- Barra de búsqueda -->
          <div class="search-container mt-3 mb-4 d-flex">
            <input type="text" id="searchInputUsuarios" class="form-control rounded-start"
              placeholder="Buscar por correo electrónico..." />
            <button id="searchButtonUsuarios" class="btn btn-dark rounded-end">
              <i class="fas fa-search"></i> Buscar
            </button>
          </div>

          <!-- Tabla de usuarios -->
          <div class="card shadow-sm">
            <div class="card-header bg-black text-white">
              <h5 class="mb-0 text-center">
                <i class="fas fa-table me-2"></i> Listado de Usuarios
              </h5>
            </div>
            <div class="card-body p-0">
              <table id="usuariosTable" class="table table-striped table-hover table-bordered mb-0">
                <thead class="bg-black text-white">
                  <tr>
                    <th class="col-2 text-center">
                      <i class="fas fa-id-card me-1"></i> ID
                    </th>
                    <th class="col-4">
                      <i class="fas fa-envelope me-1"></i> Correo Electrónico
                    </th>
                    <th class="col-3">
                      <i class="fas fa-user-tag me-1"></i> Rol
                    </th>
                    <th class="col-3 text-center">
                      <i class="fas fa-cogs me-1"></i> Acciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Datos serán llenados dinámicamente desde la base de datos -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!--Animacion de grafica dashboard-->
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

  <!-------------------------------Script para PACIENTES ------------------------->
  <!--Listar pacientes (por nombre y general)-->
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
    <button class="btn btn-warning" onclick="showSection('actualizarPaciente'); modificarDatos(${paciente.idPaciente})">Actualizar</button>
    <button class="btn btn-danger" onclick="eliminarPaciente(${paciente.idPaciente})">Eliminar</button>
    <button class="btn btn-success" onclick="showSection('historialPaciente'); verHistorial(${paciente.idPaciente})">Ver historial</button>
  </td>
  `;

      tbody.appendChild(row);
    }

    function listarTodo() {
      fetch('./Conexion/listar_pacientes.php')
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
          <td class="col-3">${paciente.Correo}</td>
          <td class="col-3">
            <button class="btn btn-warning" onclick="showSection('actualizarPaciente'); modificarDatos(${paciente.idPaciente})">Actualizar</button>
            <button class="btn btn-danger" onclick="eliminarPaciente(${paciente.idPaciente})">Eliminar</button>
            <button class="btn btn-success" onclick="showSection('historialPaciente'); verHistorial(${paciente.idPaciente})">Ver historial</button>
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

  </script>

  <!--Funciones de usuarios (Actualizar, eliminar, ver historial)-->
  <script>
    // Función para manejar el botón "Modificar Datos"
    function modificarDatos(idPaciente) {
      console.log("Modificar datos del paciente con ID:", idPaciente);

      fetch(`./Conexion/obtener_paciente.php?id=${idPaciente}`)
        .then((response) => {
          if (!response.ok) {
            throw new Error(`Error al obtener datos: ${response.statusText}`);
          }
          return response.json();
        })
        .then((data) => {
          if (data.error) {
            alert(`Error: ${data.error}`);
            return;
          }

          const paciente = data.paciente;

          // Llenar los campos del formulario con los datos obtenidos
          document.getElementById("update_nombre").value = paciente.nombre || "";
          document.getElementById("update_ap").value = paciente.ap || "";
          document.getElementById("update_am").value = paciente.am || "";
          document.getElementById("update_fn").value = paciente.fechaN || "";
          document.getElementById("update_telefono").value = paciente.telefono || "";
          document.getElementById("update_mail").value = paciente.correo || "";
          document.getElementById("update_calle").value = paciente.calle || "";
          document.getElementById("update_col").value = paciente.colonia || "";
          document.getElementById("update_municipio").value = paciente.municipio || "";
          document.getElementById("update_estado").value = paciente.estado || "";

          // Llenar antecedentes patológicos
          data.patologicos.forEach((patologico) => {
            const check = document.getElementById(`update_check-${patologico.nombre.toLowerCase().replace(/ /g, '-')}`);
            const text = document.getElementById(`update_text-${patologico.nombre.toLowerCase().replace(/ /g, '-')}`);
            if (check) {
              check.checked = patologico.estado === "1";
            }
            if (text) {
              text.value = patologico.descripcion || "";
            }
          });

          // Llenar antecedentes no patológicos
          data.noPatologicos.forEach((noPatologico) => {
            const check = document.getElementById(`update_check-${noPatologico.nombre.toLowerCase().replace(/ /g, '-')}`);
            const text = document.getElementById(`update_text-${noPatologico.nombre.toLowerCase().replace(/ /g, '-')}`);
            if (check) {
              check.checked = noPatologico.estado === "1";
            }
            if (text) {
              text.value = noPatologico.descripcion || "";
            }
          });

          // Asociar el ID del paciente al botón de actualizar
          document.getElementById("botonActualizar").dataset.id = idPaciente;
        })
        .catch((error) => console.error("Error:", error));
    }

    function actualizarDatos() {
      const idPaciente = document.getElementById("botonActualizar").dataset.id;

      if (!idPaciente) {
        console.error("ID del paciente no está definido.");
        alert("No se pudo identificar el paciente a actualizar.");
        return;
      }

      const pacienteData = {
        idPaciente,
        nombre: document.getElementById("update_nombre").value,
        ap: document.getElementById("update_ap").value,
        am: document.getElementById("update_am").value,
        telefono: document.getElementById("update_telefono").value,
        fechaN: document.getElementById("update_fn").value,
        municipio: document.getElementById("update_municipio").value,
        colonia: document.getElementById("update_col").value,
        calle: document.getElementById("update_calle").value,
        estado: document.getElementById("update_estado").value,
        correo: document.getElementById("update_mail").value,
      };

      const patologicos = [];
      const noPatologicos = [];

      document.querySelectorAll("input.update_check").forEach((check) => {
        const nombreCell = check.closest("tr")?.cells[0];
        const nombre = nombreCell ? nombreCell.innerText : null;
        const estado = check.checked ? 1 : 0;
        const descripcionElement = document.getElementById(`update_text-${check.id.split('-')[1]}`);
        const descripcion = check.checked && descripcionElement ? descripcionElement.value || null : null;

        if (nombre) {
          patologicos.push({ nombre, estado, descripcion });
        }
      });

      document.querySelectorAll("input.update_check-no-patologicos").forEach((check) => {
        const nombreCell = check.closest("tr")?.cells[0];
        const nombre = nombreCell ? nombreCell.innerText : null;
        const estado = check.checked ? 1 : 0;
        const descripcionElement = document.getElementById(`update_text-${check.id.split('-')[1]}`);
        const descripcion = check.checked && descripcionElement ? descripcionElement.value || null : null;

        if (nombre) {
          noPatologicos.push({ nombre, estado, descripcion });
        }
      });

      fetch("./Conexion/actualizar_paciente.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ pacienteData, patologicos, noPatologicos }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            alert(`Error al actualizar paciente: ${data.error}`);
          } else {
            alert("Paciente actualizado con éxito.");
          }
        })
        .catch((error) => {
          console.error("Error en la solicitud de actualización:", error);
          alert("Ocurrió un error al actualizar el paciente.");
        });
    }

    // Función para manejar el botón "Ver Historial"
    function verHistorial(idPaciente) {
      console.log("Ver historial del paciente con ID:", idPaciente);

      fetch(`./Conexion/obtener_historial.php?id=${idPaciente}`)
        .then((response) => {
          if (!response.ok) {
            throw new Error(`Error al obtener datos: ${response.statusText}`);
          }
          return response.json();
        })
        .then((data) => {
          if (data.error) {
            alert(`Error: ${data.error}`);
            return;
          }

          const paciente = data.paciente;

          // Llenar los campos del formulario con los datos obtenidos
          document.getElementById("historial_nombre").value = paciente.nombre || "";
          document.getElementById("historial_ap").value = paciente.ap || "";
          document.getElementById("historial_am").value = paciente.am || "";
          document.getElementById("historial_fn").value = paciente.fechaN || "";
          document.getElementById("historial_telefono").value = paciente.telefono || "";
          document.getElementById("historial_mail").value = paciente.correo || "";
          document.getElementById("historial_calle").value = paciente.calle || "";
          document.getElementById("historial_col").value = paciente.colonia || "";
          document.getElementById("historial_municipio").value = paciente.municipio || "";
          document.getElementById("historial_estado").value = paciente.estado || "";

          // Llenar antecedentes patológicos
          data.patologicos.forEach((patologico) => {
            const check = document.getElementById(
              `historial_check-${patologico.nombre.toLowerCase().replace(/ /g, "-")}`
            );
            const text = document.getElementById(
              `historial_text-${patologico.nombre.toLowerCase().replace(/ /g, "-")}`
            );
            if (check) {
              check.checked = patologico.estado === "1";
            }
            if (text) {
              text.value = patologico.descripcion || "";
            }
          });

          // Llenar antecedentes no patológicos
          data.noPatologicos.forEach((noPatologico) => {
            const check = document.getElementById(
              `historial_check-${noPatologico.nombre.toLowerCase().replace(/ /g, "-")}`
            );
            const text = document.getElementById(
              `historial_text-${noPatologico.nombre.toLowerCase().replace(/ /g, "-")}`
            );
            if (check) {
              check.checked = noPatologico.estado === "1";
            }
            if (text) {
              text.value = noPatologico.descripcion || "";
            }
          });

          // Llenar la card de citas
          const citasContainer = document.getElementById("citas_list");
          citasContainer.innerHTML = ""; // Limpiar contenido anterior
          if (data.citas.length === 0) {
            citasContainer.innerHTML = "<p>No hay citas registradas para este paciente.</p>";
          } else {
            data.citas.forEach((cita) => {
              const citaItem = `
            <tr>
              <td>${cita.fecha}</td>
              <td>${cita.hora}</td>
              <td>${cita.motivo}</td>
              <td>${cita.metodoAgenda}</td>
              <td>${cita.estado}</td>
            </tr>
          `;
              citasContainer.insertAdjacentHTML("beforeend", citaItem);
            });
          }

          // Asociar el ID del paciente al botón de actualizar
          document.getElementById("botonActualizar").dataset.id = idPaciente;
        })
        .catch((error) => console.error("Error:", error));
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
              listarTodo(); // Opcional: Recargar la página tras éxito
            }
          })
          .catch((error) => {
            console.error("Error en la solicitud:", error);
            alert("Ocurrió un error inesperado. Inténtalo de nuevo.");
          });
      }
    }

  </script>

  <!--Registrar paciente-->
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

  <!-------------------------------Script para Usuarios ------------------------->
  <!--Registrar Usuario-->
  <script>
    function registrarUsuario() {
      // Obtener los datos del formulario
      const correo = document.getElementById("registro_correo").value.trim();
      const contrasenia = document.getElementById("registro_contrasenia").value.trim();
      const rol = document.getElementById("registro_rol").value;

      // Validar que todos los campos estén llenos
      if (!correo || !contrasenia || !rol) {
        alert("Por favor, complete todos los campos.");
        return;
      }

      // Crear el objeto para enviar al servidor
      const usuarioData = {
        correo,
        contrasenia,
        rol: parseInt(rol, 10),
      };

      // Enviar los datos al servidor
      fetch("./Conexion/registrar_usuario.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(usuarioData),
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error(`Error en la respuesta del servidor: ${response.statusText}`);
          }
          return response.json();
        })
        .then((data) => {
          if (data.error) {
            alert(`Error al registrar usuario: ${data.error}`);
          } else {
            alert("Usuario registrado con éxito.");
            document.getElementById("formRegistrarUsuario").reset();
          }
        })
        .catch((error) => {
          console.error("Error en la solicitud de registro:", error);
          alert("Ocurrió un error al registrar el usuario.");
        });
    }

  </script>

  <!--Listar usuarios (por nombre y general)-->
  <script>
    document.getElementById("searchButtonUsuarios").addEventListener("click", fetchUsuarios);

    function fetchUsuarios() {
      const searchValue = document.getElementById("searchInputUsuarios").value.trim();

      if (!searchValue) {
        alert("Por favor, ingresa un correo electrónico para buscar.");
        return;
      }

      const formData = new FormData();
      formData.append("correo", searchValue);

      fetch("./Conexion/buscar_usuario.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          mostrarUsuarios(data);
        })
        .catch((error) => {
          console.error("Error al obtener los datos:", error);
        });
    }

    function mostrarUsuarios(usuario) {
      const tbody = document.querySelector("#usuariosTable tbody");
      tbody.innerHTML = "";

      if (!usuario.idUsuario) {
        tbody.innerHTML =
          '<tr><td colspan="4" class="text-center">No se encontraron resultados.</td></tr>';
        return;
      }

      const row = document.createElement("tr");
      row.innerHTML = `
      <td class="col-2 text-center align-middle">${usuario.idUsuario}</td>
      <td class="col-4 text-center align-middle">${usuario.Correo}</td>
      <td class="col-3 text-center align-middle">${usuario.Rol}</td>
      <td class="col-3 text-center align-middle">
        <button class="btn btn-warning" onclick="actualizarUsuario(${usuario.idUsuario})">Actualizar</button>
        <button class="btn btn-danger" onclick="eliminarUsuario(${usuario.idUsuario})">Eliminar</button>
      </td>
    `;

      tbody.appendChild(row);
    }

    function listarTodosUsuarios() {
      fetch("./Conexion/listar_usuarios.php")
        .then((response) => {
          if (!response.ok) {
            throw new Error("Error al obtener los usuarios.");
          }
          return response.json();
        })
        .then((data) => {
          const tbody = document.querySelector("#usuariosTable tbody");
          tbody.innerHTML = "";

          if (data.length === 0) {
            tbody.innerHTML =
              '<tr><td colspan="4" class="text-center">No se encontraron usuarios.</td></tr>';
            return;
          }

          data.forEach((usuario) => {
            const row = document.createElement("tr");
            row.innerHTML = `
            <td class="col-2 text-center align-middle">${usuario.idUsuario}</td>
            <td class="col-4 text-center align-middle">${usuario.Correo}</td>
            <td class="col-3 text-center align-middle">${usuario.Rol}</td>
            <td class="col-3 text-center align-middle">
              <button class="btn btn-warning" onclick="actualizarUsuario(${usuario.idUsuario})">Actualizar</button>
              <button class="btn btn-danger" onclick="eliminarUsuario(${usuario.idUsuario})">Eliminar</button>
            </td>
          `;
            tbody.appendChild(row);
          });
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("Ocurrió un error al cargar los usuarios.");
        });
    }
  </script>

  <!--Funcion para eliminar y actualizar usuario-->
  <script>
    function eliminarUsuario(idUsuario) {
      if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
        fetch("./Conexion/eliminar_usuario.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ idUsuario }),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.error) {
              alert(`Error al eliminar el usuario: ${data.error}`);
            } else {
              alert("Usuario eliminado con éxito.");
              listarTodosUsuarios(); // Recargar la lista
            }
          })
          .catch((error) => {
            console.error("Error en la solicitud:", error);
            alert("Ocurrió un error inesperado. Inténtalo de nuevo.");
          });
      }
    }

    function actualizarUsuario(idUsuario) {
      console.log("Actualizar usuario con ID:", idUsuario);
      // Aquí puedes agregar la lógica para actualizar al usuario
      // Por ejemplo, abrir un modal o redirigir a otra página con más detalles.
    }
  </script>

</body>

</html>
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
</head>

<body>
  <!--Sidebard-->
  <nav class="sidebar">
    <a href="#" class="logo">Dashboard</a>

    <div class="menu-content">
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

  <div class="main content">
    <div class="row w-100">
      <div class="col-lg-12">
        <div id="pacientes" class="section">
          <h2>Gestión de Pacientes</h2>
          <p>Contenido relacionado con los pacientes aquí.</p>
        </div>

        <div id="historiales" class="section active">
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
                  <div class="">
                    <div class="collapse" id="antecedentesPanel">
                      <form id="pacienteForm">
                        <!---->
                        <div class="row card-content">
                          <div class="col-xl-12">


                          </div>
                        </div>
                      </form>
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
</body>

</html>
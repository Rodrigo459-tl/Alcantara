const sidebar = document.querySelector(".sidebar");
const sidebarClose = document.querySelector("#sidebar-close");
const menu = document.querySelector(".menu-content");
const menuItems = document.querySelectorAll(".submenu-item");
const subMenuTitles = document.querySelectorAll(".submenu .menu-title");
const collapseElement = document.getElementById("antecedentesPanel");
const icono = document.getElementById("iconoColapso");

sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));

menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    menu.classList.add("submenu-active");
    item.classList.add("show-submenu");
    menuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show-submenu");
      }
    });
  });
});

subMenuTitles.forEach((title) => {
  title.addEventListener("click", () => {
    menu.classList.remove("submenu-active");
  });
});

// Evento cuando el panel se expande
collapseElement.addEventListener("show.bs.collapse", () => {
  icono.classList.add("rotate-up"); // Añade rotación
});

// Evento cuando el panel se contrae
collapseElement.addEventListener("hide.bs.collapse", () => {
  icono.classList.remove("rotate-up"); // Quita rotación
});

console.log(menuItems, subMenuTitles);

function showSection(sectionId) {
  // Ocultar todas las secciones
  const sections = document.querySelectorAll(".section");
  sections.forEach((section) => section.classList.remove("active"));

  // Mostrar la sección seleccionada
  const sectionToShow = document.getElementById(sectionId);
  sectionToShow.classList.add("active");
}
//--------------------------------------------------Scrips de prueba-----------------------------
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
    <button class="btn btn-warning" onclick="modificarDatos(${
      paciente.idPaciente
    })">Modificar Datos</button>
    <button class="btn btn-success" onclick="verHistorial(${
      paciente.idPaciente
    })">Ver Historial</button>
  </td>
  `;

  tbody.appendChild(row);
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

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

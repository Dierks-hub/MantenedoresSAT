window.onload = function () {
  if (sessionStorage.length > 0) {
    sessionStorage.clear();
    console.log("se elimino el Storage");
  }
};

function getRandomColor() {
  // Genera un color hexadecimal aleatorio
  const letters = "0123456789ABCDEF";
  let color = "#";
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
// Funcion para realizar colores aleatorios
function rolesGuardados(roles) {
  sessionStorage.setItem("rolesSeleccionados", JSON.stringify(roles));
  updateRoleBadges(roles);
}
// Funcion que almacena los roles con sessionstorage
function updateRoleBadges(roles) {
  let badgeContainer = $("#contenedor-badge");
  badgeContainer.empty();

  roles.forEach((role) => {
    let randomColor = getRandomColor();
    badgeContainer.append(
      `<span class="badge me-1" style="background-color: ${randomColor}; color: #fff; ">${role.descripcion}</span>`
    );
  });
}
// funcion que carga los roles dentro de badge
function loadRoles() {
  let rolesAlmacen =
    JSON.parse(sessionStorage.getItem("rolesSeleccionados")) || [];
  updateRoleBadges(rolesAlmacen);
  return rolesAlmacen; // Retorna roles para usarlos al abrir el modal
}
// Funcion que carga los roles dentro del contenedor de badge para mostrarlos
// Mostrar la card de roles
$("#agregar-rol").on("click", function () {
  $.ajax({
    url: "https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=5&concepto=0012",
    method: "GET",
    dataType: "JSON",
    success: function (response) {
      let roles = response.datosTabla;
      let contenido = "";
      let rolesSeleccionados = loadRoles();

      roles.forEach((rol) => {
        let checked = rolesSeleccionados.some(
          (role) => role.codigo === rol.codigo_concepto
        )
          ? "checked"
          : "";
        contenido += `
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rol${rol.codigo_concepto}" data-descripcion="${rol.descripcion_concepto}" ${checked}>
                        <label class="form-check-label" for="rol${rol.codigo_concepto}">${rol.descripcion_concepto}</label>
                    </div>`;
      });

      $("#roles-card-body").html(contenido);
      $("#contenedor-roles").removeClass("d-none").addClass("d-block"); // Mostrar la card
      $("#contenedor-formulario")
        .removeClass("col-md-7 col-lg-6")
        .addClass("col-md-12 col-lg-8"); // Ajustar la columna del formulario
    },
    error: function () {
      alert("Datos no obtenidos");
    },
  });
});

// Ocultar la card de roles
$("#ocultar-card").on("click", function () {
  $("#contenedor-roles").removeClass("d-block").addClass("d-none"); // Ocultar la card
  $("#contenedor-formulario")
    .removeClass("col-md-12 col-lg-8")
    .addClass("col-md-4 col-lg-4"); // Expandir el formulario
});
// funcion que abre un modal y muestra los roles
$(document).on("click", "#guardar-roles-card", function () {
  let datosRoles = [];
  $("#contenedor-roles .form-check-input:checked").each(function () {
    datosRoles.push({
      codigo: $(this).attr("id").replace("rol", ""),
      descripcion: $(this).data("descripcion"),
    });
  });
  rolesGuardados(datosRoles);
  $("#contenedor-roles").removeClass("d-block").addClass("d-none"); // Ocultar la card después de guardar
});
// Funcion que hace que todas las funciones anteriores carguen en la pagina
$(document).ready(function () {
  loadRoles();
});

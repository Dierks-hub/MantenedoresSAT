window.onload = function () {
  if (sessionStorage.length > 0) {
    sessionStorage.clear();
    console.log("se eliminó el Storage");
  }
};

function getRandomColor() {
  const letters = "0123456789ABCDEF";
  let color = "#";
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function rolesGuardados(roles) {
  sessionStorage.setItem("rolesSeleccionados", JSON.stringify(roles));
  updateRoleBadges(roles);
  console.log(sessionStorage);
}

function updateRoleBadges(roles) {
  let badgeContainer = $("#contenedor-badge");
  badgeContainer.empty();

  roles.forEach((role) => {
    let randomColor = getRandomColor();
    badgeContainer.append(
      `<span id="${role.codigo}" class="badge me-1" style="background-color: ${randomColor}; color: #fff;">${role.descripcion}</span>`
    );
  });
}

function loadRoles() {
  let rolesAlmacen =
    JSON.parse(sessionStorage.getItem("rolesSeleccionados")) || [];
  updateRoleBadges(rolesAlmacen);
  return rolesAlmacen;
}

$("#agregar-rol").on("click", function () {
  $.ajax({
    url: "https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=ver_subconcepto&concepto=0012",
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
            <input class="form-check-input togglerol" type="checkbox" id="rol${rol.codigo_concepto}" data-descripcion="${rol.descripcion_concepto}" ${checked}>
            <label class="form-check-label" for="rol${rol.codigo_concepto}">${rol.descripcion_concepto}</label>
          </div>`;
      });

      $("#roles-card-body").html(contenido);
      $("#contenedor-roles").removeClass("d-none").addClass("d-block");
      $("#contenedor-formulario")
        .removeClass("col-md-7 col-lg-6")
        .addClass("col-md-12 col-lg-8");

      $(".togglerol").on("change", function () {
        let datosRoles = [];
        $("#contenedor-roles .form-check-input:checked").each(function () {
          datosRoles.push($(this).attr("id").replace("rol", ""));
        });
        updateRoleBadges(datosRoles);
        rolesGuardados(datosRoles);
      });
    },
    error: function () {
      alert("Datos no obtenidos");
    },
  });
});

$("#ocultar-card").on("click", function () {
  $("#contenedor-roles").removeClass("d-block").addClass("d-none");
  $("#contenedor-formulario")
    .removeClass("col-md-12 col-lg-8")
    .addClass("col-md-4 col-lg-4");
});

$(document).ready(function () {
  loadRoles();
});

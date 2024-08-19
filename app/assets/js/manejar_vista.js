function obtenerRolesSeleccionados() {
  return JSON.parse(sessionStorage.getItem("rolesSeleccionados")) || [];
}

$("#seleccionar-vistas").on("click", function () {
  let rolesSeleccionados = obtenerRolesSeleccionados();
  $.ajax({
    url: "https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=5&concepto=0011",
    method: "GET",
    dataType: "JSON",
    success: function (response) {
      console.log(response);
      let vistas = response.datosTabla;
      let contenido = "";

      vistas.forEach((vista) => {
        let checked = rolesSeleccionados.some(
          (role) => role.codigo === vista.codigo_concepto
        );
        let disabled = checked ? "disabled" : "";

        contenido += `
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="vista${
                  vista.codigo_concepto
                }" ${checked ? "checked" : ""} ${disabled}>
                 <label class="form-check-label" for="vista${
                   vista.codigo_concepto
                 }">${vista.descripcion_concepto}</label>
            </div>                           
                `;
      });

      $("#vistas-card-body").html(contenido);
      $("#contenedor-vistas").removeClass("d-none").addClass("d-block"); // Mostrar la card
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
$("#ocultar-card-vistas").on("click", function () {
  $("#contenedor-vistas").removeClass("d-block").addClass("d-none"); // Ocultar la card
  $("#contenedor-formulario")
    .removeClass("col-md-12 col-lg-8")
    .addClass("col-md-7 col-lg-6"); // Expandir el formulario
});

$("#guardar-vistas").on("click", function () {
  let vistasSeleccionadas = [];

  $("#vistas-card-body .form-check-input:checked").each(function () {
    vistasSeleccionadas.push($(this).attr("id").replace("vista", ""));
  });

  console.log("Vistas seleccionadas:", vistasSeleccionadas);
  // Aquí puedes enviar las vistas seleccionadas al backend o almacenarlas localmente
});

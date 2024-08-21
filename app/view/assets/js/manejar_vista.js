function obtenerRolesSeleccionados() {
  return JSON.parse(sessionStorage.getItem("rolesSeleccionados")) || [];
}

$("#seleccionar-vistas").on("click", function () {
  let rolesSeleccionados = obtenerRolesSeleccionados();
  let rolesArray = rolesSeleccionados.map((role) => role.codigo).join(",");

  $.ajax({
    url: `https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php`,
    method: "POST",
    dataType: "JSON",
    data: {
      caso: vistasxrol,
      rol: rolesArray,
    },
    success: function (response) {
      console.log("Vistas asociadas a los roles seleccionados:", response);
    },
    error: function () {
      alert("Error al obtener las vistas asociadas a los roles seleccionados.");
    },
  });
});

// Ocultar la card de roles
$("#ocultar-card-vistas").on("click", function () {
  $("#contenedor-vistas").removeClass("d-block").addClass("d-none");
  $("#contenedor-formulario")
    .removeClass("col-md-12 col-lg-8")
    .addClass("col-md-7 col-lg-6");
});

$("#guardar-vistas").on("click", function () {
  let vistasSeleccionadas = [];

  $("#vistas-card-body .form-check-input:checked").each(function () {
    vistasSeleccionadas.push($(this).attr("id").replace("vista", ""));
  });

  console.log("Vistas seleccionadas:", vistasSeleccionadas);
  // Aquí puedes enviar las vistas seleccionadas al backend o almacenarlas localmente
});

// Funcion que carga informacion completando el input con el rut
$("#buscar").on("click", function () {
  let run = $("#run").val();
  if (run) {
    $.ajax({
      url: `https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=1&rut=${run}`,
      method: "GET",
      dataType: "json",
      success: function (response) {
        console.log(response);
        if (response.status === 200) {
          let usuarioArray = response.datosTabla;

          let usuario = usuarioArray[0];
          let partes = usuario.nombre.split(" ");

          const nombres = `${partes[0] || ""} ${partes[1] || ""}`.trim();
          const apellidoPaterno = partes[2] || "";
          const apellidoMaterno = partes[3] || "";

          $("#nombre").val(nombres);
          $("#apellidoPaterno").val(apellidoPaterno);
          $("#apellidoMaterno").val(apellidoMaterno);
        }
      },
      error: function () {
        alert("Error al obtener la información.");
      },
    });
  } else {
    alert("Por favor, ingresa un RUN.");
  }
});

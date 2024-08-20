// Formatear el nombre completo del usuario
var formatFullName = function (item) {
  return `${item.nombres} ${item.apellidopaterno}`;
};

// Inicializar Tom Select
new TomSelect("#select-user", {
  maxOptions: 5,
  persist: false,
  create: true,
  valueField: "run",
  labelField: "run",
  searchField: ["run", "nombres", "apellidopaterno", "apellidomaterno"],
  options: [], // Puedes dejar vacío o cargarlo dinámicamente
  render: {
    // Renderizar el valor seleccionado (solo mostrar el RUN)
    item: function (item, escape) {
      return `<div>${escape(item.run)}</div>`;
    },
    // Renderizar las opciones en el dropdown
    option: function (item, escape) {
      return `<div>
                <span class="name">${escape(formatFullName(item))}</span>
                <span class="run">${escape(item.run)}</span><br>
              </div>`;
    },
  },
  create: false, // Si no quieres permitir la creación de nuevas opciones
  sortField: {
    field: "run",
    direction: "asc",
  },
});

// Cargar datos mediante AJAX
$.ajax({
  url: "https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=buscar_funcionarios",
  dataType: "JSON",
  method: "GET",
  success: function (response) {
    let datos = response.datosTabla;
    let selectUser = $("#select-user")[0].tomselect;
    selectUser.clearOptions();
    datos.forEach(function (item) {
      selectUser.addOption(item);
    });

    // Almacenar los datos para futuras búsquedas
    usuariosData = datos;
  },
  error: function () {
    console.error("Error al obtener los datos.");
  },
});

// Manejar el cambio de selección
$("#select-user").on("change", function () {
  let selectedValue = $(this).val();
  let usuarioSeleccionado = usuariosData.find(function (user) {
    return user.run === selectedValue;
  });

  if (usuarioSeleccionado) {
    $("#nombre").val(usuarioSeleccionado.nombres);
    $("#apellidoPaterno").val(usuarioSeleccionado.apellidopaterno);
    $("#apellidoMaterno").val(usuarioSeleccionado.apellidomaterno);
  }
});

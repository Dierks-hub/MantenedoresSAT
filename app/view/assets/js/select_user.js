var formatFullName = function (item) {
  return `${item.nombres} ${item.apellidopaterno}`;
};

new TomSelect("#select-user", {
  maxOptions: 5,
  persist: false,
  create: true,
  valueField: "run",
  labelField: "run",
  searchField: ["run", "nombres", "apellidopaterno", "apellidomaterno"],
  options: [],
  render: {
    item: function (item, escape) {
      return `<div>${escape(item.run)}</div>`;
    },
    option: function (item, escape) {
      return `<div>
                <span class="name">${escape(formatFullName(item))}</span>
                <span class="run">${escape(item.run)}</span><br>
              </div>`;
    },
  },
  create: false,
  sortField: {
    field: "run",
    direction: "asc",
  },
});
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

    usuariosData = datos;
  },
  error: function () {
    console.error("Error al obtener los datos.");
  },
}); 

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

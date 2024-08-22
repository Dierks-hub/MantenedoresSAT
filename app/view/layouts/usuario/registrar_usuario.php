<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("assets/php/libs_common.php") ?>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="run" class="form-label">RUN</label>
                            <div class="input-group">
                                <select name="" id="select-user" placeholder="Seleccione Usuario"></select>
                                <!-- <input id="run" class="form-control botoncito" placeholder="123456789">
                                    <span class="input-group-text text-bg-primary">
                                        <i type="button" class="bi bi-search" id="buscar"></i>
                                    </span> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3 mt-md-0">
                            <label for="nombre" class="form-label">Nombres</label>
                            <input id="nombre" class="form-control" placeholder="Pedrito" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-md-6">
                            <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                            <input id="apellidoPaterno" class="form-control" placeholder="Perez" disabled>
                        </div>
                        <div class="col-12 col-md-6 mt-3 mt-md-0">
                            <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                            <input id="apellidoMaterno" class="form-control" placeholder="Rojas" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-md-6">
                            <label for="date-init" class="form-label">Inicio</label>
                            <div class="input-group">
                                <input id="date-init" class="form-control selector" placeholder="Fecha de Inicio">
                                <span class="input-group-text text-bg-secondary">
                                    <i class="bi bi-calendar4-week"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3 mt-md-0">
                            <label for="date-finish" class="form-label">Término</label>
                            <div class="input-group">
                                <input id="date-finish" class="form-control selector" placeholder="Fecha de Termino">
                                <span class="input-group-text text-bg-secondary">
                                    <i class="bi bi-calendar4-week"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <label class="form-label">Roles del usuario:</label>
                        <div id="contenedor-badge" class="col">

                        </div>
                    </div>
                    <div class="row mt-4 d-flex">
                        <div class="col-12 col-lg-6 mt-3 mt-lg-0 mb-2">
                            <button id="agregar-rol" class="btn btn-outline-secondary btn-sm me-2" type="button">
                                <i class="fas fa-user-plus"></i> Asignar Rol
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Añadir Usuario</button>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3 col-lg-3 d-none mb-2" id="contenedor-roles">
        <div class="card shadow h-auto">
            <div class="card-header bg-primary text-light d-flex justify-content-between">
                <h5 class="mt-2">Asignar Roles</h5>
                <button type="button" class="btn-close btn-close-white mt-2" id="ocultar-card"></button>
            </div>
            <div class="card-body" id="roles-card-body" style="overflow-y:auto">
                <!-- Los roles se cargarán aquí -->
            </div>
            <div class="card-footer text-end">
                <button id="guardar-roles-card" class="btn btn-primary btn-sm">Guardar Roles</button>
            </div>
        </div>
    </div>
    <script src="assets/js/datatable.js"></script>
    <script src="assets/js/cargar_usuario.js"></script>
    <script src="assets/js/agregar_rol.js"></script>
    <script src="assets/js/manejar_vista.js"></script>
    <script src="assets/js/select_user.js"></script>
    <script defer src="assets/js/general.js"></script>

    <script>
        let fechaInicio = $("#date-init").flatpickr({
            minDate: "today",
            dateFormat: "d-m-Y",
            onChange: function(selectedDates, dateStr, instance) {
                fechaTermino.set('minDate', dateStr);
            }
        });

        let fechaTermino = $("#date-finish").flatpickr({
            dateFormat: "d-m-Y",
        });
    </script>
    <script>
        $("#añadir-usuario").on('click', function() {
            ShowLoader()
            let run = $("#select-user").val();
            let fechaini = $("#date-init").val();
            let fechafin = $("#date-finish").val();
            let nombent = "";



            let rolesSeleccionados = JSON.parse(sessionStorage.getItem("rolesSeleccionados")) || [];
            console.log(rolesSeleccionados);
            let codrol = rolesSeleccionados.length > 0 ? rolesSeleccionados.map(role => role.codigo) : undefined;
            let codrol2 = JSON.stringify(codrol);
            $.ajax({
                url: `https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php`,
                method: "POST",
                data: {
                    caso: 'modificar_usuarios',
                    run: run,
                    // nombent: '',
                    fechaini: fechaini,
                    fechafin: fechafin,
                    codroles: codrol2,

                },
                success: function(response) {
                    console.log("Usuario agregado exitosamente:", response);
                },

            });
            HideLoader()
        });
    </script>

</body>

</html>
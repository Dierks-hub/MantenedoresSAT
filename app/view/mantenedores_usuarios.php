<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios</title>
    <?php include_once("../assets/php/libs_common.php") ?>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5 mb-2 h-25%">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h5 class="mt-2 text-light">Registrar Usuario</h5>
                    </div>
                    <div class="card-body">
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
                        <div class="row mt-4 d-flex justify-content-between">
                            <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                                <button id="agregar-rol" class="btn btn-outline-secondary btn-sm me-2" type="button">
                                    <i class="fas fa-user-plus"></i> Asignar Rol
                                </button> <button id="seleccionar-vistas" class="btn btn-outline-secondary btn-sm" type="button">
                                    <i class="fas fa-edit"></i> Editar Vistas
                                </button>
                            </div>
                            <div class="col-12 col-lg-6 ">
                                <button class="btn btn-outline-danger btn-sm me-2">Cancelar</button>
                                <button class="btn btn-primary btn-sm" id="añadir-usuario">Añadir Usuario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 d-none mb-2" id="contenedor-roles">
                <div class="card shadow">
                    <div class="card-header bg-primary text-light d-flex justify-content-between">
                        <h5 class="mt-2">Asignar Roles</h5>
                        <button type="button" class="btn-close btn-close-white mt-2" id="ocultar-card"></button>
                    </div>
                    <div class="card-body" id="roles-card-body">
                        <!-- Los roles se cargarán aquí -->
                    </div>
                    <div class="card-footer text-end">
                        <button id="guardar-roles-card" class="btn btn-primary btn-sm">Guardar Roles</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 d-none mb-2" id="contenedor-vistas">
                <div class="card shadow">
                    <div class="card-header bg-primary text-light d-flex justify-content-between">
                        <h5 class="mt-2">Asignar Vistas</h5>
                        <button type="button" class="btn-close btn-close-white mt-2" id="ocultar-card-vistas"></button>
                    </div>
                    <div class="card-body" id="vistas-card-body">
                        <!-- Las vistas se cargarán aquí -->
                    </div>
                    <div class="card-footer text-end">
                        <button id="guardar-vistas" class="btn btn-primary btn-sm">Guardar Vistas</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/datatable.js"></script>
    <script src="../assets/js/cargar_usuario.js"></script>
    <script src="../assets/js/agregar_rol.js"></script>
    <script src="../assets/js/manejar_vista.js"></script>
    <script src="../assets/js/select_user.js"></script>
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
            let run = $("#select-user").val();
            let fechaini = $("#date-init").val();
            let fechafin = $("#date-finish").val();
            let nombent = "";

            let rolesSeleccionados = JSON.parse(sessionStorage.getItem("rolesSeleccionados")) || [];
            let codrol = rolesSeleccionados.length > 0 ? rolesSeleccionados.map(role => role.codigo).join(",") : undefined;
            $.ajax({
                url: `https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=modificar_usuarios&run=${run}&nombent=${''}&codrol=${codrol}&fechaini=${fechaini}&fechafin=${fechafin}`,
                method: "POST",
                success: function(response) {
                    console.log("Usuario modificado exitosamente:", response);
                },
                error: function(error) {
                    console.error("Error al modificar usuario:", error);
                },
            });
        });
    </script>

</body>

</html>
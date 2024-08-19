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
            <div class="col-12 col-md-6 col-lg-5 mb-2">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h5 class="mt-2 text-light">Registrar Usuario</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="run" class="form-label">RUN</label>
                                <div class="input-group">
                                    <input id="run" class="form-control botoncito" placeholder="123456789">
                                    <span class="input-group-text text-bg-primary">
                                        <i type="button" class="bi bi-search" id="buscar"></i>
                                    </span>
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
                                    <span class="input-group-text text-bg-primary">
                                        <i class="bi bi-calendar4-week"></i>
                                    </span>
                                    <input id="date-init" class="form-control selector" placeholder="Fecha de Inicio">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-3 mt-md-0">
                                <label for="date-finish" class="form-label">Término</label>
                                <div class="input-group">
                                    <input id="date-finish" class="form-control selector" placeholder="Fecha de Termino">
                                    <span class="input-group-text text-bg-primary">
                                        <i class="bi bi-calendar4-week"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label class="form-label">Roles del usuario:</label>
                            <div id="contenedor-badge" class="col">
                                <!-- Badges for roles -->
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 col-lg-6 d-flex justify-content-start">
                                <button class="btn btn-primary me-2">Añadir Usuario</button>
                                <button class="btn btn-outline-danger">Cancelar</button>
                            </div>
                            <div class="col-12 col-lg-6 d-flex justify-content-lg-end justify-content-start mt-3 mt-lg-0">
                                <button id="agregar-rol" class="btn btn-primary me-2" type="button">Asignar Rol</button>
                                <button id="seleccionar-vistas" class="btn btn-primary" type="button">Editar Vistas</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 d-none mb-2" id="contenedor-roles">
                <div class="card shadow">
                    <div class="card-header bg-primary text-light">
                        <h5>Asignar Roles</h5>
                        <button type="button" class="btn-close btn-close-white" id="ocultar-card"></button>
                    </div>
                    <div class="card-body" id="roles-card-body">
                        <!-- Los roles se cargarán aquí -->
                    </div>
                    <div class="card-footer text-end">
                        <button id="guardar-roles-card" class="btn btn-primary">Guardar Roles</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3 d-none mb-2" id="contenedor-vistas">
                <div class="card shadow">
                    <div class="card-header bg-primary text-light">
                        <h5>Asignar Vistas</h5>
                        <button type="button" class="btn-close btn-close-white" id="ocultar-card-vistas"></button>
                    </div>
                    <div class="card-body" id="vistas-card-body">
                        <!-- Las vistas se cargarán aquí -->
                    </div>
                    <div class="card-footer text-end">
                        <button id="guardar-vistas" class="btn btn-primary">Guardar Vistas</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/datatable.js"></script>
    <script src="../assets/js/cargar_usuario.js"></script>
    <script src="../assets/js/agregar_rol.js"></script>
    <script src="../assets/js/manejar_vista.js"></script>
    <script>
        // Inicializamos el flatpickr para la fecha de inicio
        let fechaInicio = $("#date-init").flatpickr({
            minDate: "today", // La fecha mínima es hoy
            dateFormat: "d-m-Y",
            onChange: function(selectedDates, dateStr, instance) {
                // Cuando se selecciona una fecha de inicio, actualizamos minDate en #date-finish
                fechaTermino.set('minDate', dateStr);
            }
        });

        // Inicializamos el flatpickr para la fecha de término
        let fechaTermino = $("#date-finish").flatpickr({
            dateFormat: "d-m-Y",
            // minDate no se establece hasta que se seleccione una fecha de inicio
        });
    </script>
</body>

</html>
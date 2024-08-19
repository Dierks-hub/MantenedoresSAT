<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mb-2">
                <div class="card shadow-lg" style="width: 35rem;">
                    <div class="card-header bg-unap-green color-white">Gestión de roles

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-primary mb-2 " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" id="addRoleBtn">Agregar rol<i
                                        class="bi bi-file-earmark-plus m-2"></i> </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col table-responsive">
                                <table class="table tablita">
                                    <thead>
                                        <tr>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Datos dinamicos -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-unap-green color-white">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar rol</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="roleForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre de rol</label>
                                <input type="text" class="form-control" id="name" placeholder="Ingrese el nombre">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="saveChanges">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-unap-green color-white">
                        <h5 class="modal-title" id="exampleModalLabel">Editar permisos de vistas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">
                                <h5>Vistas asignadas</h5>
                                <ul id="availableViews" class="list-group lista-vista">
                                    <!-- Dynamically generated views -->
                                </ul>
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                <div class="btn-group-vertical">
                                    <button id="moveToSelected" class="btn btn-primary">&gt;&gt;</button>
                                    <button id="moveToAvailable" class="btn btn-secondary">&lt;&lt;</button>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h5>Vistas disponibles</h5>
                                <ul id="selectedViews" class="list-group lista-vista">
                                    <!-- Dynamically generated selected views -->
                                </ul>
                            </div>
                        </div>

                        <!-- <ul class="list-group lista-vista">
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Vista 1
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Vista 2
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Vista 3
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Vista 4
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Vista 5
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Vista 6
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Vista 7
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                                    Vista 8
                                </li>
                            </ul> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-unap-green color-white">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmación de Eliminación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro de que desea eliminar este rol?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="/get_rol.js"></script>

</html>
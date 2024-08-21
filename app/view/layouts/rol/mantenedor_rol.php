<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header bg-primary">
                <h6 class="text-wrap text-light mt-2">Tabla roles</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form id="roleForm">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Ingrese el nombre del rol">
                                </div>
                                <div class="col d-flex justify-content-end ">
                                    <button type="button" class="btn btn-primary"
                                        onclick="agregarol()">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col table-responsive">
                        <table class="table tablita2">
                            <thead>
                                <tr>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-unap-green color-white">
                    <h5 class="modal-title" id="exampleModalLabel">Editar permisos de vistas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <h5>Vistas disponibles</h5>
                            <ul id="selectedViews" class="list-group lista-vista">

                            </ul>
                        </div>
                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <div class="btn-group-vertical">
                                <button id="moveToSelected" class="btn btn-primary"><i
                                        class="bi bi-arrow-bar-left"></i></button>
                                <button id="moveToAvailable" class="btn btn-secondary"><i
                                        class="bi bi-arrow-bar-right"></i></button>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Vistas vistas asignadas</h5>
                            <ul id="availableViews" class="list-group lista-vista">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/get_rol.js"></script>
<script>
    function agregarol() {
        Swal.fire({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            title: "Estas seguro de agregar este rol?",
            icon: "question",
            showDenyButton: true,
            confirmButtonText: "Agregar",
            denyButtonText: `Cancelar`,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Rol agregado!", "", "success");
            }
        });
    }
</script>
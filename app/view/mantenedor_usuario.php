<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("assets/php/libs_common.php") ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <script defer src="assets/js/general.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg nav-main mb-3">
            <div class="d-flex justify-content-between align-items-center w-100">
                <!-- Sección de íconos a la izquierda -->
                <div class="d-flex align-items-center">
                    <i type="button" class="bi bi-layout-sidebar-inset p-3 icono-style" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
                </div>
                <!-- Sección central con la imagen y el perfil -->
                <div class="d-flex align-items-center px-3">
                    <!-- Sección de íconos a la derecha -->
                    <div class="d-flex align-items-center">
                        <i type="button" class="bi bi-bell px-3 icono-style" data-bs-toggle="popover"
                            data-bs-custom-class="custom-popover" data-bs-placement="bottom"
                            data-bs-content="Notificaciones.">
                        </i>
                        <i type="button" class="bi bi-moon px-3 icono-style" data-bs-toggle="popover"
                            data-bs-custom-class="custom-popover" data-bs-placement="bottom"
                            data-bs-content="Modo Noche.">
                        </i>
                    </div>
                    <div class="vr mx-2 d-none d-lg-block"></div>
                    <img src="https://picsum.photos/50/50" alt="foto" class="img-fluid rounded-5">
                    <div class="px-3 d-none d-lg-block">
                        <p class="mb-0">Jaime David Guszman Rojas</p>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 me-1 cargoseleccionado">Administrador</p>
                            <div class="dropdown">
                                <i type="button" class="bi bi-pencil dropstart fs-6 icono-style" aria-expanded="false"
                                    data-bs-toggle="popover" data-bs-custom-class="custom-popover"
                                    data-bs-placement="bottom" data-bs-content="Cambiar rol.">
                                </i>
                                <ul class="dropdown-menu cargoselector">
                                    <li><a class="dropdown-item" href="#">Cargo 1</a></li>
                                    <li><a class="dropdown-item" href="#">Cargo 2</a></li>
                                    <li><a class="dropdown-item" href="#">Cargo 3</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-11">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="datos-academicos" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="card shadow">
                                <div class="card-header ">
                                    <h6 class="text-wrap mt-2">Tabla Usuarios</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Launch demo modal
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <table
                                                id="tabla-usuario" class="table text-wrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th class="col-auto text-start">Rut</th>
                                                        <th class="col-auto text-start">Usuario</th>
                                                        <th class="col-auto text-start">Fecha Inicio</th>
                                                        <th class="col-auto text-start">Fecha Termino</th>
                                                        <th class="col-auto text-start">Roles</th>
                                                        <th class="col-auto text-start">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer></footer>
        </div>
    </main>
    <script>
        new DataTable("#tabla-usuario", {
            layout: {
                topStart: ['pageLength'],
                topEnd: ['buttons', 'search'],
            },
            ajax: {
                url: 'https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=usuarios_registrados',
                method: 'POST',
                dataSrc: 'datosTabla',
            },
            buttons: [{
                extend: 'copy',
                text: '<i class="bi bi-copy"></i>',
                className: 'btn-sm'

            }, {
                extend: 'pdf',
                text: '<i class="bi bi-file-earmark-pdf"></i>',
                className: 'btn-sm'
            }, {
                extend: 'excel',
                text: '<i class="bi bi-file-earmark-excel"></i>',
                className: 'btn-sm'

            }],
            columns: [{
                    data: 'run',
                    className: 'text-start'
                },
                {
                    data: 'nombres'
                },
                {
                    data: 'fechainicio'
                },
                {
                    data: 'fechafin'
                },
                {
                    data: 'descroles'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<button type="button" class="btn btn-outline-secondary rounded-4 btn-sm btnnEditar" data-run="${row.run}">
                    Editar<i class="bi bi-pencil-square px-1"></i>
                </button>
                <button type="button" class="btn btn-outline-secondary rounded-4 btn-sm btnVistas">
                    Vistas<i class="bi bi-eye px-1"></i>
                </button`;
                    }
                },
            ],
            searching: true,
            ordering: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json",
            },
            paging: true,
            scrollCollapse: false,
            scrollY: true,
            responsive: true,


        });

        $(document).on('click', '.btnEditar', function() {
            let run = $(this).data('run');

            $.ajax({
                url: `https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php`,
                method: 'POST',
                data: {
                    caso: 'rolxusuario',
                    run: run,
                },
                success: function(response) {
                    let datos = response.datosTabla;
                    console.log(datos)
                },
                error: function(response) {
                    console.log(error, 'response');
                }
            });
        });
    </script>
</body>

</html>
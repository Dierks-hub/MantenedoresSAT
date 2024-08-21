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
            <div class="row my-3">
                <div id="carouselExample" class="carousel carousel-dark slide" data-bs-interval="false">
                    <div class="carousel-inner">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <div class="carousel-item active">
                                <div class="row g-3 justify-content-center">
                                    <div class="col-auto d-flex justify-content-center">
                                        <div class="card shadow-sm hover-effect" style="width:150px; height:75px;">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi bi-book" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">Registrar usuarios</h6>
                                                    <p class="mb-0 " style="font-size: 0.875rem;"></p>
                                                </div>
                                                <a href="#datos-academicos" id="llamar-datos-academicos"
                                                    class="stretched-link active" id="datos-academicos-tab"
                                                    data-bs-toggle="tab" data-bs-target="#datos-academicos"
                                                    type="button" role="tab" aria-controls="academicos-tab-pane"
                                                    aria-selected="true"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex justify-content-center">
                                        <div class="card shadow-sm hover-effect" style="width:150px; height:75px;">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi-pencil" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">Gestionar roles</h6>
                                                    <p class="mb-0 " style="font-size: 0.875rem;"></p>
                                                </div>
                                                <a href="#datos-matriculas" id="llamar-datos-matriculas"
                                                    class="stretched-link" data-bs-toggle="tab"
                                                    data-bs-target="#datos-matriculas" type="button" role="tab"
                                                    aria-controls="matriculas-tab-pane" aria-selected="false"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="datos-academicos" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h6 class="text-wrap text-light mt-2">Tabla Usuarios</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <a href="layouts/usuario/registrar_usuario.php">
                                                <button class="btn btn-primary"><i class="bi bi-plus me-1"></i>Registrar usuario</button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <table
                                                id="tabla-usuario" class="table table-hover table-striped text-wrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th class="text-start">Rut</th>
                                                        <th class="text-start">Usuario</th>
                                                        <th class="text-start">Fecha Inicio</th>
                                                        <th class="text-start">Fecha Termino</th>
                                                        <th class="text-start">Roles</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="datos-matriculas" role="tabpanel"
                            aria-labelledby="profile-tab" tabindex="0">
                            <?php include_once("layouts/rol/mantenedor_rol.php"); ?>
                        </div>
                        <div class="tab-pane fade" id="datos-bienestar" role="tabpanel"
                            aria-labelledby="contact-tab" tabindex="0">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer contenido -->
            <footer></footer>
        </div>

    </main>
</body>
<script defer src="assets/js//datatable.js"></script>
<script defer src="assets/js//get_rol.js"></script>
<script>
    new DataTable("#tabla-usuario", {
        layout: {
            topStart: ['pageLength'],
            topEnd: ['buttons', 'search']
        },
        buttons: [{
                extend: "copy",
                text: '<i class="bi bi-clipboard"></i>',
            },
            {
                extend: 'pdf',
                text: '<i class="bi bi-file-earmark-pdf"></i>',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                }
            },
            {
                extend: 'excel',
                text: '<i class="bi bi-file-earmark-excel"></i>',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                },
            },
        ],
        ajax: {
            url: 'https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=usuarios_registrados',
            method: 'POST',
            dataSrc: 'datosTabla',

        },
        columns: [{
                data: 'run'
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

        ],
        searching: true,
        ordering: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json",
        },
        paging: true,
        scrollCollapse: false,
        scrollY: true,
        responsive: true
    });
</script>


</html>
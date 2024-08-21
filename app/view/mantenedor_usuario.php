<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("assets/php/libs_common.php") ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <script defer src="assets/js/general.js"></script>
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
            <!-- Contenedor principal -->
            <div class="row">
                <div class="col">
                    <!-- Aca iria la toolvar para gestionar las variables de la tabla -->
                    <div class="row">
                        <div class="col"></div>
                    </div>
                    <!-- Aca se cargara la tabla con los datos del usuario -->
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h6 class="text-wrap text-light mt-2">Tabla Usuarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col table-responsive">
                                    <table id="tabla-usuario" class="table table-hover table-striped text-wrap w-100 tablita">
                                        <thead>
                                            <tr>
                                                <th>Rut</th>
                                                <th>Usuario</th>
                                                <th>Fecha Inicio</th>
                                                <th>Fecha Termino</th>
                                                <th>Roles</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Aca va la card con las demas vistas -->
                <!-- <div class="col"></div> -->
            </div>
        </div>
    </main>
</body>
<!-- <script src="assets/js//datatable.js"></script> -->
<script>
    $(document).ready(function() {
        $.ajax({
            url: 'https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=usuarios_registrados',
            dataType: 'JSON',
            method: 'GET',
            success: function(response) {
                const usuarios = response.datosTabla;
                const tablita = $('.tablita tbody');
                let filas = '';
                let espacio =

                    usuarios.forEach(usuario => {
                        filas += `
                    <tr>
                        <td>${usuario.run}</td>
                        <td>${usuario.nombres}${usuario.apellidopaterno}${usuario.apellidomaterno}</td>
                        <td>${usuario.fechainicio}</td>
                        <td>${usuario.fechafin}</td>
                        <td>${usuario.descroles}</td>
                        <td><i type="button" class="bi bi-pen btn-primary modificar-usuario"></i></td>
                    </tr>
                `;
                    });
                // Object.entries(usuarios).forEach(([rut, usuario]) => {
                //     const roles = usuario.descroles.length ? usuario.descroles.join(', ') : 'S/R';
                // });

                tablita.append(filas); // Añade todas las filas al DOM en una sola operación
            },
            error: function(error) {
                console.error("Error:", error);
            },
        });
    });
</script>


</html>
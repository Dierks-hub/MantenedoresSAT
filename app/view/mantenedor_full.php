<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../assets/php/libs_common.php") ?>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- Offcanvas -->
    <?php include_once("layouts/components/sidebar.php"); ?>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg nav-main">
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
    <!-- Contenido main -->
    <div class="container-fluid">
        <main>
            <div class="row">
                <div class="col mt-3 d-flex justify-content-center">
                    <!-- Sección de botones de gestion de roles y usuarios -->
                    <div class="card shadow-sm mb-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <button type="button" class="btn btn-secondary d-flex align-items-center" onclick="window.location.href='mantenedores_usuarios.php'">
                                        <span>Registrar usuarios</span>
                                        <i class="bi bi-person-fill-add p-3"></i>
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-secondary d-flex align-items-center" onclick="window.location.href='mantenedores_roles.php'">
                                        <span>Gestionar roles</span>
                                        <i class="bi bi-person-vcard-fill p-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sección de Navtools y tabla de datos-->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="datos-academicos" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <?php include_once("layouts/datos_academicos.php"); ?>
                                </div>
                                <div class="tab-pane fade" id="datos-matriculas" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <?php include_once("layouts/datos_matriculas.php"); ?>
                                </div>
                                <div class="tab-pane fade" id="datos-bienestar" role="tabpanel"
                                    aria-labelledby="contact-tab" tabindex="0">
                                    <?php include_once("layouts/datos_bienestar.php") ?>
                                </div>
                                <div class="tab-pane fade" id="datos-financieros" role="tabpanel"
                                    aria-labelledby="disabled-tab" tabindex="0">
                                    <?php include_once("layouts/datos_financieros.php") ?>
                                </div>
                                <div class="tab-pane fade" id="datos-admisiones" role="tabpanel"
                                    aria-labelledby="disabled-tab" tabindex="0">
                                    <?php include_once("layouts/datos_admision.php") ?>
                                </div>
                                <div class="tab-pane fade" id="datos-gestiones" role="tabpanel"
                                    aria-labelledby="disabled-tab" tabindex="0">f</div>
                                <div class="tab-pane fade" id="datos-upra" role="tabpanel"
                                    aria-labelledby="disabled-tab" tabindex="0">g</div>
                                <div class="tab-pane fade" id="datos-pizarra" role="tabpanel"
                                    aria-labelledby="disabled-tab" tabindex="0">h</div>
                                <div class="tab-pane fade" id="datos-pace" role="tabpanel"
                                    aria-labelledby="disabled-tab" tabindex="0">i</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- Footer contenido -->
        <footer></footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Activacion de popovers -->
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl, {
            trigger: 'hover'
        }));
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../assets/php/libs_common.php") ?>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <div class="row my-4">
                <div id="carouselExample" class="carousel carousel-dark slide" data-bs-interval="false">
                    <div class="carousel-inner">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <div class="carousel-item active">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm hover-effect">
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
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm hover-effect">
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
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="datos-academicos" role="tabpanel"
                                    aria-labelledby="home-tab" tabindex="0">
                                    <?php include_once("layouts/mantenedor_usuario.php"); ?>
                                </div>
                                <div class="tab-pane fade" id="datos-matriculas" role="tabpanel"
                                    aria-labelledby="profile-tab" tabindex="0">
                                    <?php include_once("layouts/mantenedor_rol.php"); ?>
                                </div>
                                <div class="tab-pane fade" id="datos-bienestar" role="tabpanel"
                                    aria-labelledby="contact-tab" tabindex="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sección de Navtools y tabla de datos-->
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
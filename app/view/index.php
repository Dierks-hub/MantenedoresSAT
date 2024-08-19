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
                    <i type="button" class="bi bi-layout-sidebar-inset p-3 icono-style" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
                </div>
                <!-- Sección de íconos a la derecha -->
                <div class="d-flex align-items-center">
                    <i type="button" class="bi bi-bell px-3 icono-style"
                        data-bs-toggle="popover"
                        data-bs-custom-class="custom-popover"
                        data-bs-placement="bottom"
                        data-bs-content="Notificaciones.">
                    </i>
                    <i type="button" class="bi bi-moon px-3 icono-style"
                        data-bs-toggle="popover"
                        data-bs-custom-class="custom-popover"
                        data-bs-placement="bottom"
                        data-bs-content="Modo Noche.">
                    </i>
                </div>
                <!-- Sección central con la imagen y el perfil -->
                <div class="d-flex align-items-center px-3">
                    <div class="vr mx-2 d-none d-lg-block"></div>
                    <img src="https://picsum.photos/50/50" alt="foto" class="img-fluid rounded-5">
                    <div class="px-3 d-none d-lg-block">
                        <p class="mb-0">Jaime David Guszman Rojas</p>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 me-1 cargoseleccionado">Administrador</p>
                            <div class="dropdown">
                                <i type="button" class="bi bi-pencil dropstart fs-6 icono-style" aria-expanded="false"
                                    data-bs-toggle="popover"
                                    data-bs-custom-class="custom-popover"
                                    data-bs-placement="bottom"
                                    data-bs-content="Cambiar rol.">
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
                    <div class="card shadow-sm mb-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <!-- Botones de radio -->
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                                        <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="success-outlined"><i class="fas fa-user-graduate"></i></label>
                                        <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="danger-outlined"><i class="fas fa-chalkboard-teacher"></i></label>
                                    </div>
                                </div>
                                <!-- Input de texto -->
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control border-primary shadow-none" id="run" placeholder="RUN" aria-label="Username" aria-describedby="basic-addon1">
                                        <button class="btn btn-primary" id="buscar"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
                                <!-- Botón de Filtrar -->
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100" id="filtrar"><i class="bi bi-funnel"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2 mt-1 d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm" id="student-info">
                        <h5 class="card-header">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-md-end">
                                        <span class="badge text-bg-primary">Sin Gratuidad Semestre 2 - 2017</span>
                                    </div>
                                </div>
                            </div>
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <!-- Imagen que se oculta en pantallas pequeñas -->
                                <div class="col-md-3 d-flex justify-content-start">
                                    <img src="https://picsum.photos/120/130" alt="foto" class="img-fluid d-none d-md-block">
                                </div>
                                <!-- Lista de detalles del estudiante -->
                                <div class="col-md-7 px-2 d-flex justify-content-start">
                                    <ul class="list-unstyled">
                                        <li id="nombre"><strong>Nombre:</strong></li>
                                        <li id="run1"><strong>RUT:</strong></li>
                                        <li id="email"><strong>Email:</strong><a href=""></a></li>
                                        <li id="telefono-movil"><strong>Celular:</strong></li>
                                        <li id="telefono-fijo"><strong>Telefono:</strong></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div id="carouselExample" class="carousel carousel-dark slide" data-bs-interval="false">
                    <div class="carousel-inner">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <div class="carousel-item active">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm small-card hover-effect">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi bi-book" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">Datos Académicos</h6>
                                                    <p class="mb-0 " style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                                </div>
                                                <a href="#datos-academicos" id="llamar-datos-academicos" class="stretched-link active" id="datos-academicos-tab" data-bs-toggle="tab" data-bs-target="#datos-academicos" type="button" role="tab" aria-controls="academicos-tab-pane" aria-selected="true"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm small-card hover-effect">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi-pencil" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">Matriculas</h6>
                                                    <p class="mb-0 " style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                                </div>
                                                <a href="#datos-matriculas" id="llamar-datos-matriculas" class="stretched-link" data-bs-toggle="tab" data-bs-target="#datos-matriculas" type="button" role="tab" aria-controls="matriculas-tab-pane" aria-selected="false"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm small-card hover-effect">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">

                                                    <i class="bi-heart" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">Bienestar</h6>
                                                    <p class="mb-0 " style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                                </div>
                                                <a href="#datos-bienestar" class="stretched-link" data-bs-toggle="tab" data-bs-target="#datos-bienestar" type="button" role="tab" aria-controls="bienestar-tab-pane" aria-selected="false"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm small-card hover-effect">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi bi-piggy-bank" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">Financieros</h6>
                                                    <p class="mb-0 " style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                                </div>
                                                <a href="#datos-financieros" class="stretched-link" data-bs-toggle="tab" data-bs-target="#datos-financieros" type="button" role="tab" aria-controls="financieros-tab-pane" aria-selected="false"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm small-card hover-effect">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi-person-check" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">Admisión</h6>
                                                    <p class="mb-0 " style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                                </div>
                                                <a href="#" class="stretched-link" data-bs-toggle="tab" data-bs-target="#datos-admisiones" type="button" role="tab" aria-controls="admision-tab-pane" aria-selected="false"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm small-card hover-effect">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi-gear" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">Gestiones</h6>
                                                    <p class="mb-0 " style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                                </div>
                                                <a href="#" class="stretched-link" data-bs-toggle="tab" data-bs-target="#datos-gestiones" type="button" role="tab" aria-controls="gestiones-tab-pane" aria-selected="false"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm small-card hover-effect">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi-calendar" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">UPRA</h6>
                                                    <p class="mb-0 " style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                                </div>
                                                <a href="#" class="stretched-link" data-bs-toggle="tab" data-bs-target="#datos-upra" type="button" role="tab" aria-controls="upra-tab-pane" aria-selected="false"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm small-card hover-effect">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi bi-book" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">Pizarra Academica</h6>
                                                    <p class="mb-0" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                                </div>
                                                <a href="#" class="stretched-link" data-bs-toggle="tab" data-bs-target="#datos-pizarra" type="button" role="tab" aria-controls="pizarra-tab-pane" aria-selected="false"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-2 mb-2">
                                        <div class="card shadow-sm small-card hover-effect">
                                            <div class="card-body d-flex align-items-center stylecard">
                                                <div class="me-3">
                                                    <i class="bi-person-lines-fill" style="font-size: 1.5rem;"></i>
                                                </div>
                                                <div>
                                                    <h6 class="card-title mb-1">PACE</h6>
                                                    <p class="mb-0" style="font-size: 0.875rem;">Descripción breve del contenido académico.</p>
                                                </div>
                                                <a href="#" class="stretched-link" data-bs-toggle="tab" data-bs-target="#datos-pace" type="button" role="tab" aria-controls="pace-tab-pane" aria-selected="false"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                    <button class="carousel-control-prev d-flex justify-content-end" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next d-flex justify-content-start" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="datos-academicos" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><?php include_once("layouts/datos_academicos.php"); ?></div>
                                <div class="tab-pane fade" id="datos-matriculas" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"><?php include_once("layouts/datos_matriculas.php"); ?></div>
                                <div class="tab-pane fade" id="datos-bienestar" role="tabpanel" aria-labelledby="contact-tab" tabindex="0"><?php include_once("layouts/datos_bienestar.php") ?></div>
                                <div class="tab-pane fade" id="datos-financieros" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0"><?php include_once("layouts/datos_financieros.php") ?></div>
                                <div class="tab-pane fade" id="datos-admisiones" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0"><?php include_once("layouts/datos_admision.php") ?></div>
                                <div class="tab-pane fade" id="datos-gestiones" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">f</div>
                                <div class="tab-pane fade" id="datos-upra" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">g</div>
                                <div class="tab-pane fade" id="datos-pizarra" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">h</div>
                                <div class="tab-pane fade" id="datos-pace" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">i</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer contenido -->
        <footer></footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Activacion de popovers -->
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl, {
            trigger: 'hover'
        }));
    </script>
</body>

</html>
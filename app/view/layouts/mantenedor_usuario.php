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
                <div class="card" style="border:none;">
                    <div class="card-header " style="background-color:#ffffff">
                        <div class="row">
                             <div class="col mb-3 d-flex justify-content-start">
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group me-2" role="group" aria-label="First group">
                                        <button type="button" class="btn btn-primary">1</button>
                                        <button type="button" class="btn btn-primary">2</button>
                                        <button type="button" class="btn btn-primary">3</button>
                                        <button type="button" class="btn btn-primary">4</button>
                                    </div>
                                    <div class="btn-group me-2" role="group" aria-label="Second group">
                                        <button type="button" class="btn btn-secondary">5</button>
                                        <button type="button" class="btn btn-secondary">6</button>
                                        <button type="button" class="btn btn-secondary">7</button>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <button type="button" class="btn btn-info">8</button>
                                    </div>
                                </div>
                            </div> 
                            <div class="col mb-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mx-2" onclick=" window.location.href ='mantenedores_usuarios.php'">Agregar usuario</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col table-responsive">
                                <table class="table w-100 tablitau">
                                    <thead style="white-space: nowrap;">
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Rut</th>
                                            <th>Apellido paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Termino</th>
                                            <th>Roles</th>
                                            <th></th>
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
<script>
    $(document).ready(function () {
        $.ajax({
            url: 'https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=usuarios_registrados',
            dataType: 'JSON',
            method: 'GET',
            success: function (response) {
                const usuarios = response.datosTabla;
                const tablita = $('.tablitau tbody');
                let filas = '';


                usuarios.forEach(usuario => {
                    filas += `
                    <tr>
                        <td>${usuario.run}</td>
                        <td>${usuario.nombres}</td>
                        <td>${usuario.apellidopaterno}</td>
                        <td>${usuario.apellidomaterno}</td>
                        <td>${usuario.fechainicio}</td>
                        <td>${usuario.fechafin}</td>
                        <td>${usuario.descroles}</td>
                        <td><i type= "button" class="bi bi-pencil"></i></td>
                    </tr>
                `;
                });
                // Object.entries(usuarios).forEach(([rut, usuario]) => {
                //     const roles = usuario.descroles.length ? usuario.descroles.join(', ') : 'S/R';


                // });

                tablita.append(filas); // Añade todas las filas al DOM en una sola operación
            },
            error: function (error) {
                console.error("Error:", error);
            },
        });
    });
</script>
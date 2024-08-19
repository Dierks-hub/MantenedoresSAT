<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../assets/php/libs_common.php") ?>
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav id="navbar-main" class="navbar navbar-expand-lg" data-var0="var0"></nav>
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
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped text-wrap w-100 tablita">
                                <thead>
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
                <!-- Aca va la card con las demas vistas -->
                <!-- <div class="col"></div> -->
            </div>
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
        $.ajax({
            url: 'https://portalonlinedev.unap.cl/MantenedoresSat/presentacion/index.php?caso=4',
            dataType: 'JSON',
            method: 'GET',
            success: function(response) {
                const usuarios = response.datosTabla;
                const tablita = $('.tablita tbody');
                let filas = '';

                // Iterar sobre las entradas del objeto `usuarios` para obtener tanto el RUT como los datos del usuario
                Object.entries(usuarios).forEach(([rut, usuario]) => {
                    const roles = usuario.descroles.length ? usuario.descroles.join(', ') : 'S/R';

                    filas += `
                    <tr>
                        <td>${usuario.nombres}</td>
                        <td>${rut}</td>
                        <td>${usuario.apellidopaterno}</td>
                        <td>${usuario.apellidomaterno}</td>
                        <td>${usuario.fechainicio}</td>
                        <td>${usuario.fechafin}</td>
                        <td>${roles}</td>
                        <td></td>
                    </tr>
                `;
                });

                tablita.append(filas); // Añade todas las filas al DOM en una sola operación
            },
            error: function(error) {
                console.error("Error:", error);
            },
        });
    });
</script>

</html>
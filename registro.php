<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
    <title>Registro</title>
</head>

<body>
    <div class="container">
        <h2 style="text-align: center;">Registro de Usuario</h2>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <!-- frmRegisto lo cacha el jquery,
            el onsubmit agregarUsuarioNuevo() lo llamamos en la function de jquery -->
                <form action="" id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
                    <label for="">Nombre Personal</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                    <label for="">Fecha de Nacimiento</label>
                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required readonly>
                    <label for="">Email o Correo</label>
                    <input type="email" name="correo" id="correo" class="form-control" required>
                    <label for="">Nombre de Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                    <label for="">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <button class="btn btn-primary">Registrar</button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="index.php" class="btn btn-warning">Login</a>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script>
        $(function() {
            var fechaA = new Date();
            var yyyy = fechaA.getFullYear();

            $("#fechaNacimiento").datepicker({

                changeMonth: true,
                changeYear: true,
                yearRange: '1900:' + yyyy,
                dateFormat: "dd-mm-yy"
            });
        });

        function agregarUsuarioNuevo() {
            $.ajax({
                method: "POST",
                data: $('#frmRegistro').serialize(), //Traemos los datos del formulario
                url: 'procesos/usuario/registro/agregarUsuario.php', //url de donde donde mandaremos la informacion
                success: function(respuesta) {
                    respuesta = respuesta.trim(); //limpiamos el formulario una vez que esten llenos los campos
                    if (respuesta == 1) {
                        $('#frmRegistro')[0].reset();
                        swal("", "Agregado con exito", "success");
                    } else if (respuesta == 2) {
                        swal("Este usuario ya existe, por favor escribe otro");

                    } else {
                        swal("", "Fallo al Agregar", "Error");
                    }
                }
            });
            return false;
        }
    </script>
</body>

</html>
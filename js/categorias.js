function agregarCategoria() {
    var categoria = $('#nombreCategoria').val();
    if (categoria == "") {
        swal("Debes agregar una categoria");
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: "categoria=" + categoria,
            url: "../procesos/categorias/agregarCategoria.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#tablaCategorias').load("tablaCategorias.php"); //cargamos la tabla que esta en tablaCategorias.php
                    $('#nombreCategoria').val("");
                    swal("", "Agregado con exito!", "success");
                } else {
                    swal("", "Fallo al Agregar!", "error");
                }
            }
        });
    }
}
function eliminarCategoria(idCategoria) {
    idCategoria = parseInt(idCategoria)
    if (idCategoria < 1) {
        swal("No tienes ID de Categoria");
        return false;
    } else {
        swal({
            title: "Estas seguro de eliminar esta categoria?",
            text: "Una vez eliminada, No podra recuperarse!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: "idCategoria=" + idCategoria,
                        url: "../procesos/categorias/eliminarCategoria.php",
                        success: function (respuesta) {
                            respuesta = respuesta.trim();
                            if (respuesta == 1) {
                                $('#tablaCategorias').load("tablaCategorias.php"); //cargamos la tabla que esta en tablaCategorias.php
                                swal("Eliminado con exito!", {
                                    icon: "success",
                                });
                            } else {
                                swal("", "Fallo al eliminar", "error");
                            }
                        }

                    });

                }
            });
    }

}
function obtenerDatosCategoria(idCategoria) {
    $.ajax({
        type: "POST",
        data: "idCategoria=" + idCategoria,
        url: "../procesos/categorias/obtenerCategoria.php",
        success: function (respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idCategoria').val(respuesta['idCategoria']);
            $('#categoriaU').val(respuesta['nombreCategoria']);
        }
    });
}
function actulizaCategoria() {
    if ($('#categoriaU').val() == "") {
        swal("No hay categoria");
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: $('#frmActualizaCategoria').serialize(),
            url: "../procesos/categorias/actualizaCategoria.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                   $('#tablaCategorias').load("tablaCategorias.php"); //cargamos la tabla que esta en tablaCategorias.php
                    swal("", "Actualizado con exito", "success");
                } else {
                    swal("", "Fallo al actulizar", "error");
                }
            }
        });
    }

}
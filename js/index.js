$(document).ready(function() {
    traerdatos();
});

/**
 * Traer datos sobre el vuelo
 */
function traerdatos() {
    $.ajax({
        url: "../controller/traervuelos.php",
        type: "POST",
        data: {},
        dataType: "json",
        success: function(result) {
            var detalle = "";
            jQuery.each(result, function(i) {
                detalle += "<tr>";
                detalle += "<th scope='row'>" + result[i].id + "</th>";
                detalle += "<td>" + result[i].nombre_aerolinea + "</td>";
                detalle += "<td>" + result[i].nvuelo + "</td>";
                detalle += "<td>" + result[i].destino + "</td>";
                detalle += "<td><button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' onClick='traerInfo(" + result[i].id + ")'>Actualizar</button></td>";
                detalle += "<td><button type='button' class='btn btn-outline-danger' onclick='eliminarRegistro(" + result[i].id + ")'>Eliminar</button></td>";
                detalle += "</tr>";
            });
            $("#tabla_vuelos tbody").html(detalle);
        },
        error: function(result) {
            console.error("Este maneja errores", result);
        }
    });
}

/**
 * Traer datos del vuelo por id
 * @param {id} id 
 */
function traerInfo(id) {
    $.ajax({
        url: "../controller/traervuelos.php",
        type: "POST",
        data: {
            id: id
        },
        dataType: "json",
        success: function(result) {
            $('#id').val(result.id);
            $('#nombre_aerolinea').val(result.nombre_aerolinea);
            $('#nvuelo').val(result.nvuelo);
            $('#destino').val(result.destino);
        },
        error: function(result) {
            console.error("Este maneja errores", result);
        }
    });
}


function guardarRegistro(isActualizacion) {
    var id = $('#id').val();
    var nombre_aerolinea = $('#nombre_aerolinea').val();
    var nvuelo = $('#nvuelo').val();
    var destino = $('#destino').val();

    var postData = {
        nombre_aerolinea: nombre_aerolinea,
        nvuelo: nvuelo,
        destino: destino
    };

    if (isActualizacion) {
        postData.actualizar = 'actualizar';
        postData.id = id;
    } else {
        postData.guardar = 'guardar';
    }

    $.ajax({
        url: "../controller/aplic.php",
        type: "POST",
        data: postData,
        dataType: "text",
        success: function(result) {
            alert(result);
            $('#nombre_aerolinea').val('');
            $('#nvuelo').val('');
            $('#destino').val('');
            $('#id').val(''); // Limpia el campo ID después de una inserción o actualización
            $('#exampleModal').modal('hide');
            traerdatos();
        },
        error: function(result) {
            console.error("Este maneja errores", result);
        }
    });
}

function guardarVuelo() {
    var id = $('#id').val();

    if (id) {
        // Si hay un ID, es una actualización
        guardarRegistro(true);
    } else {
        // Si no hay un ID, es una inserción
        guardarRegistro(false);
    }
}
function eliminarRegistro(id) {
    if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
        $.ajax({
            url: "../controller/aplic.php",
            type: "POST",
            data: {
                eliminar: 'eliminar',
                id: id
            },
            dataType: "text",
            success: function(result) {
                alert(result);
                traerdatos(); // Vuelve a cargar los datos después de la eliminación
            },
            error: function(result) {
                console.error("Este maneja errores", result);
            }
        });
    }
}
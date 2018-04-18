

/**
 * -----------------------------------------------------------------------------
 * Live search localidades/poblacion
 * -----------------------------------------------------------------------------
 * @param {type} localidad
 * @returns {undefined}
 */
function findLocalidad(localidad) {

    
    $('#live_search_poblacion').removeClass('hidden');
    var url = '/base/poblacion/findPoblacion/' + $('#aux_provincia').val()+'/'+localidad;
    $.getJSON(url, function (data) {
        console.log(data);

        var poblacion_output = "";
        $.each(data.poblaciones, function (i, poblacion) {
            poblacion_output += "<tr onclick='asignarLocalidad(\"" + poblacion.poblacion + "\",\"" + poblacion.id_poblacion + "\")'>"
                    + "<td>" + poblacion.poblacion + " (" + poblacion.provincia + ") </td>"
                    + "</tr>";
            $('#json_localidades').html(poblacion_output);
        });
    });
}

/**
 * -----------------------------------------------------------------------------
 * Asigna una localidad
 * -----------------------------------------------------------------------------
 * @param {type} localidad
 * @param {type} id_localidad
 * @returns {undefined}
 */
function asignarLocalidad(localidad, id_localidad) {
    $('#live_search_poblacion').addClass('hidden');
    $('#f_id_poblacion').val(id_localidad);
    $('#k_localidad').val(localidad);

}

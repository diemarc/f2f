function findLocalidad(localidad) {
    var url = "/base/poblacion/findPoblacion/" + localidad;

    $.getJSON(url, function (data) {
        console.log(data);
        var poblacion_output = "";
        $.each(data.poblaciones, function (i, poblacion) {
            poblacion_output += "<tr>"
                    + "<td>" + poblacion.id_poblacion + "</td>"
                    + "<td>" + poblacion.poblacion + "</td>"
                    + "</tr>";
            $('#json_localidades').html(poblacion_output);
        });
    });
}

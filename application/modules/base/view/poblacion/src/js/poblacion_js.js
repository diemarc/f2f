function findLocalidad(localidad) {
    var url = "/base/poblacion/findPoblacion/" + localidad;

    $.getJSON(url, function (data) {
        console.log(data);
        $.each(data.tutorials, function (i, poblacion) {
            var newRow =
                    "<tr>"
                    + "<td>" + poblacion.id_poblacion + "</td>"
                    + "<td>" + poblacion.poblacion + "</td>"
                    + "</tr>";
            $(newRow).appendTo("#json_localidades");
        });
    });
}

/**
 * -----------------------------------------------------------------------------
 * Load services list to select and add in the invoice body
 * -----------------------------------------------------------------------------
 * @returns {undefined}
 */

function loadListServices() {

    var url = '/fac2fast/serviciocontratante/getContratanteServicesJson';
    $.getJSON(url, function (data) {
        console.log(data);

        if (data.exists) {

            var services_list = '';
            $.each(data.response, function (i, service) {

                // check icon service default
                var icon_service = (service.is_default === '1') ? '<i class="fa fa-star text-yellow"></i>' : '';

                services_list += '<tr id="list_service_' + service.id_servicio + '">';
                services_list += '<td>' + icon_service + '</td>';
                services_list += '<td>' + service.servicio + '</td>';
                services_list += '<td>' + service.descripcion + '</td>';
                services_list += '<td>' + service.precio + '</td>';
                services_list += '<td>' + service.iva_servicio + '</td>';
                services_list += '<td>' + service.retencion_servicio + '</td>';
                services_list += '<td><button class="btn btn-xs btn-success"\n\
                onclick="addService(' + service.id_servicio + ')" \n\
                id="btn_add_service_' + service.id_servicio + '" title="Agregar servicio">\n\
                <i class="fa fa-check-square-o"></i></button>\n\
            </td>';
                services_list += '</tr>';

            });
            $('#div_services_list').html(services_list);


        } else {
            console.log('empty services list.');
            console.log(data);
        }

    });

}

/**
 * -----------------------------------------------------------------------------
 * Add new service in view html new factura
 * -----------------------------------------------------------------------------
 * @param {type} id_service
 * @returns {undefined}
 */
function addService(id_service) {

    var url = '/fac2fast/servicio/getServicioJson/' + id_service;
    $.getJSON(url, function (data) {

        if (data.exists) {

            //alert(data.record.servicio);
            data_service = '';

            data_service += '<tr id="service_' + data.record.id_servicio + '">';

            // checkbox
            data_service += '<td>';
            data_service += '<input type="checkbox" name="f_concepto[' + data.record.id_servicio + ']" checked value="' + data.record.id_servicio + '"/>';
            data_service += '</td>';

            // servicio
            data_service += '<td>';
            data_service += '<div class="col-sm-12 text-success">';
            data_service += ' <i class="fa fa-comment-o" title="Click para agregar detalles del servicio" ';
            data_service += ' onclick="showObsServicio(' + data.record.id_servicio + ')"></i> ';
            data_service += data.record.servicio;
            data_service += '</div>';
            // servicio personalizacion
            data_service += '<div class="col-sm-12 hidden" id="person_' + data.record.id_servicio + '"> ';
            data_service += '<div class="input-group has-success">';
            data_service += '<div class="input-group-addon"><i class="fa fa-close" onclick="cleanObsServicio('+data.record.id_servicio+')"></i></div>';
            data_service += '<textarea class="form-control form-control-sm" rows="1" ';
            data_service += 'id="f_concepto_personalizacion_' + data.record.id_servicio + '"';
            data_service += 'name="f_concepto_personalizacion[' + data.record.id_servicio + ']"></textarea>';
            data_service += '</div>';
            data_service += '</div>';


            data_service += '</td>';
            // precio
            data_service += '<td> <div class="col-sm-12"> ';
            data_service += '<div class="input-group">';
            data_service += '<div class="input-group-addon">';
            data_service += '<i class="fa fa-euro"></i>';
            data_service += '</div>';
            data_service += '<input type="number" class="form-control form-control-sm"';
            data_service += 'name="f_concepto_precio[' + data.record.id_servicio + ']"';
            data_service += 'value="' + data.record.precio + '"/> </div>';
            data_service += '</div></td> ';
            // cantidade
            data_service += '<td> <div class="col-sm-12"> ';
            data_service += '<input type="number" class="form-control pull-right"';
            data_service += 'name="f_concepto_cantidad[' + data.record.id_servicio + ']"';
            data_service += 'value="1"/> ';
            data_service += '</div></td> ';

            // iva
            data_service += '<td> <div class="col-sm-8"> ';
            data_service += '<input type="number" step="0.01" class="form-control pull-right"';
            data_service += 'name="f_concepto_iva[' + data.record.id_servicio + ']"';
            data_service += 'value="' + data.record.iva_servicio + '"/> ';
            data_service += '</div></td> ';

            // retencion
            data_service += '<td> <div class="col-sm-8"> ';
            data_service += '<input type="number" step="0.01" class="form-control pull-right"';
            data_service += 'name="f_concepto_retencion[' + data.record.id_servicio + ']"';
            data_service += 'value="' + data.record.retencion_servicio + '"/> ';
            data_service += '</div></td> ';

            // total
            data_service += '<td> <div class="col-sm-12"> ';
            data_service += '<div class="input-group">';
            data_service += '<div class="input-group-addon">';
            data_service += '<i class="fa fa-euro"></i>';
            data_service += '</div>';
            data_service += '<input type="text" class="form-control form-control-sm"';
            data_service += 'name=""';
            data_service += 'value="' + data.record.precio + '"/> </div>';
            data_service += '</div></td> ';

            // end tr
            data_service += '</tr>';

            $('#div_servicios_factura').append(data_service);
            $('#list_service_' + data.record.id_servicio).addClass('bg-success');
            $('#btn_add_service_' + data.record.id_servicio).addClass('hidden');

        } else {
            console.log('no service found');
        }

    });

}

/**
 * -----------------------------------------------------------------------------
 * Show textarea for servicio
 * -----------------------------------------------------------------------------
 * @param {type} id_service
 * @returns {undefined}
 */
function showObsServicio(id_service) {
    $('#person_' + id_service).removeClass('hidden');
}

function cleanObsServicio(id_service) {
    $('#person_' + id_service).addClass('hidden');
    $('#f_concepto_personalizacion_' + id_service).val('');
}

/**
 * -----------------------------------------------------------------------------
 * Submit a new services from factura
 * -----------------------------------------------------------------------------
 * @returns {undefined}
 */
function saveNewServiceContratante() {

    $.ajax({
        type: "POST",
        url: $("#formNewService").attr('action'),
        data: $("#formNewService").serialize(), // Adjuntar los campos del formulario enviado.
        success: function (data)
        {
            loadListServices();
            $('#myModel').modal('hide');
            // remove remote content from modal window
            $('#myModel').removeData('bs.modal');


        },
        error: function (data) {
            alert('An Error occured, see the console.log');
            console.log('An error occurred.');
            console.log(data);
        }
    });

}

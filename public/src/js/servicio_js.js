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

            var total_actual = $('#sw_total_factura').val();
            var total = Number(total_actual) + Number(data.record.total_serv);
            $('#sw_total_factura').val(total);
            $('#total_factura').html(total);
            $('#btnGrabarFactura').removeClass('hidden');

            //alert(data.record.servicio);
            data_service = '';

            data_service += '<tr id="service_' + data.record.id_servicio + '">';

            // checkbox
            data_service += '<td>';
            data_service += '<input type="checkbox" name="f_concepto[' + data.record.id_servicio + ']" \n\
                checked value="' + data.record.id_servicio + '"/>';
            data_service += '</td>';

            // servicio
            data_service += '<td>';
            data_service += '<div class="text-primary">';
            data_service += ' <strong><i class="fa fa-comment-o" \n\
            title="Click para agregar detalles del servicio" ';
            data_service += ' onclick="showObsServicio(' + data.record.id_servicio + ')"></i>\n\
            </strong> ';
            data_service += data.record.servicio;
            data_service += '</div>';

            // servicio personalizacion
            data_service += '<div class="col-sm-12 hidden" id="person_' + data.record.id_servicio + '"> ';
            data_service += '<div class="input-group has-info">';
            data_service += '<div class="input-group-addon"><i class="fa fa-trash" \n\
                onclick="cleanObsServicio(' + data.record.id_servicio + ')"></i></div>';
            data_service += '<textarea class="form-control form-control-sm" rows="1" ';
            data_service += 'id="f_concepto_personalizacion_' + data.record.id_servicio + '"';
            data_service += 'name="f_concepto_personalizacion[' + data.record.id_servicio + ']"\n\
            ></textarea>';
            data_service += '</div>';
            data_service += '</div>';
            data_service += '</td>';

            // cantidades
            data_service += '<td>';
            data_service += '<input type="number" class="form-control input-sm pull-right" \n\
                onkeyup="changeCantidad(' + data.record.id_servicio + ')"\n\
                onchange="changeCantidad(' + data.record.id_servicio + ')"';
            data_service += 'name="f_concepto_cantidad[' + data.record.id_servicio + ']"';
            data_service += 'value="1" id="f_cantidad_' + data.record.id_servicio + '"/> ';
            data_service += '</td> ';

            // precio
            data_service += '<td>';
            data_service += '<div class="input-group">';
            data_service += '<div class="input-group-addon">';
            data_service += '<i class="fa fa-euro"></i>';
            data_service += '</div>';
            data_service += '<input type="number" id="f_concepto_precio_' + data.record.id_servicio + '" \n\
                class="form-control input-sm form-control-sm"';
            data_service += 'name="f_concepto_precio[' + data.record.id_servicio + ']"';
            data_service += 'value="' + data.record.precio + '" \n\
                onkeyup="changeCantidad(' + data.record.id_servicio + ')"\n\
                onchange="changeCantidad(' + data.record.id_servicio + ')" /> </div>';
            data_service += '</td> ';

            // iva
            data_service += '<td> ';
            data_service += '<select class="form-control \n\
                input-sm pull-right"';
            data_service += 'name="f_concepto_iva[' + data.record.id_servicio + ']" \n\
                onchange="changeCantidad(' + data.record.id_servicio + ')"';
            data_service += 'id="f_iva_' + data.record.id_servicio + '"> ';
            $.each(data.ivas,function(i,iva){
                
                var selected = (data.record.iva_servicio === iva.porcentaje) ? 'selected' : '';
                data_service += '<option value="'+iva.porcentaje+'" '+selected+'>'+iva.porcentaje+'</option>';
            });
            data_service += '</select>';
            data_service += '</td> ';

            // retencion
            data_service += '<td> ';
            data_service += '<select class="form-control \n\
                input-sm pull-right"';
            data_service += 'name="f_concepto_retencion[' + data.record.id_servicio + ']" \n\
                onchange="changeCantidad(' + data.record.id_servicio + ')"';
            data_service += 'id="f_retencion_' + data.record.id_servicio + '"> ';
            $.each(data.retenciones,function(o,retencion){
                
                var selected_ret = (data.record.retencion_servicio === retencion.porcentaje) ? 'selected' : '';
                data_service += '<option value="'+retencion.porcentaje+'" '+selected_ret+'>'+retencion.porcentaje+'</option>';
            });
            
            data_service += '</select> ';
            data_service += '</td> ';

            // total
            data_service += '<td>';
            data_service += '<div class="input-group">';
            data_service += '<div class="input-group-addon">';
            data_service += '<span class="text-primary"><i class="fa fa-euro"></i></span>';
            data_service += '</div>';
            data_service += '<input type="text"  step="0.01" \n\
                class="input_total form-control input-sm form-control-sm"';
            data_service += 'name="" id="total_' + data.record.id_servicio + '"';
            data_service += 'value="' + data.record.total_serv + '"/> </div>';
            data_service += '</td> ';

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
 * change total cantidad
 * -----------------------------------------------------------------------------
 * @param {type} id_service
 * @returns {undefined}
 */
function changeCantidad(id_service) {

    var base_imponible = $('#f_cantidad_' + id_service).val() * $('#f_concepto_precio_' + id_service).val();
    var iva_servicio = ($('#f_iva_' + id_service).val())/100;
    var retencion_servicio = $('#f_retencion_' + id_service).val();
    var total_actual = base_imponible + (base_imponible * iva_servicio) - retencion_servicio;
    $('#total_' + id_service).val(total_actual);

    var sum = 0;
    $('.input_total').each(function () {
        sum += Number($(this).val());
    });

    $('#sw_total_factura').val(sum);
    $('#total_factura').html(sum);



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

/**
 * -----------------------------------------------------------------------------
 * Remove data from service personalization and hidde the div
 * -----------------------------------------------------------------------------
 * @param {type} id_service
 * @returns {undefined}
 */

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
            // addService('22');
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

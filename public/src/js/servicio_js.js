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
            $.each(data.response,function (i,service){
                
                // check icon service default
                var icon_service = (service.is_default === '1') ? '<i class="fa fa-star text-yellow"></i>' : '';
                
                services_list += '<tr>';
                services_list += '<td>'+icon_service+'</td>';
                services_list += '<td>'+service.servicio+'</td>';
                services_list += '<td>'+service.descripcion+'</td>';
                services_list += '<td>'+service.precio+'</td>';
                services_list += '<td>'+service.iva_servicio+'</td>';
                services_list += '<td>'+service.retencion_servicio+'</td>';
                services_list += '<td><button class="btn btn-xs btn-success"\n\
                onclick="addService('+service.id_servicio+')" title="Agregar servicio">\n\
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


function addService(id_service){
    alert(' Se va agregar este servicio '+id_service);
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

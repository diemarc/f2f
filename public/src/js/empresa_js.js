

/**
 * -----------------------------------------------------------------------------
 * Live search empresa
 * -----------------------------------------------------------------------------
 * @param {string} empresa
 * @returns avoid
 */
function findEmpresa(empresa) {
    $('#overlay_cliente').removeClass('hidden');

    var url = '/fac2fast/empresacontratante/findEmpresaContratante/' + empresa;
    $.getJSON(url, function (data) {
        console.log(data);

        if (data.exists) {
            $('#div_cliente_notfound').addClass('hidden');
            $('#live_search_empresa').removeClass('hidden');
            $('#overlay_cliente').addClass('hidden');
            var empresa_output = "";
            $.each(data.empresas, function (i, empresa) {
                empresa_output += "<tr onclick='assignClient("+empresa.id_empresa + ")'>"
                        + "<td>" + empresa.razon_social_empresa + " (" + empresa.cif + ") </td>"
                        + "</tr>";
                $('#json_empresas').html(empresa_output);
            });
        } else {
            $('#live_search_empresa').addClass('hidden');
            $('#div_cliente_notfound').removeClass('hidden');
            $('#f_id_empresa').val('');
        }
    });
}

/**
 * -----------------------------------------------------------------------------
 * Assign a empresa
 * -----------------------------------------------------------------------------
 * @param {string} empresa
 * @param {int} id_empresa
 * @returns {undefined}
 */
//function asignarEmpresa(empresa, id_empresa) {
//    $('#section_cliente').removeClass('hidden');
//    $('#live_search_empresa').addClass('hidden');
//    $('#div_conceptos').removeClass('hidden');
//    $('#div_info_fac').removeClass('hidden');
//    $('#btnGrabarFactura').removeClass('hidden');
//    $('#div_cliente').addClass('has-success');
//    $('#f_id_empresa').val(id_empresa);
//    $('#k_cliente').val(empresa);
//    $('#span_empresa').html(empresa);
//    $('#j_empresa').append(empresa);
//
//}

/**
 * -----------------------------------------------------------------------------
 * Assign a client
 * -----------------------------------------------------------------------------
 * @param {type} id_empresa
 * @returns {undefined}
 */
function assignClient(id_empresa) {


    alert("es esta empresa "+id_empresa);

    var url = '/fac2fast/empresa/getEmpresaJson/' + id_empresa;

    $.getJSON(url, function (data) {
        if (data.exists) {

            // show cliente rightside
            $('#section_cliente').removeClass('hidden');
            $('#div_cliente').addClass('has-success');
            $('#i_client').removeClass('fa fa-search');
            $('#i_client').addClass('fa fa-check');
            $('#f_id_empresa').val(id_empresa);
            // hide seach result cliente
            $('#live_search_empresa').addClass('hidden');
            
            // assign values
            $('#client_name').append(data.record.empresa);
            $('#client_nickname').append(data.record.razon_social);
            $('#client_cif').append(data.record.cif);
            $('#client_address').append(data.record.direccion);
            $('#client_local').append(data.record.poblacion);
            $('#client_phone').append(data.record.telefono);
            $('#client_mail').append(data.record.email);


        } else {
            console.log('no empresa found');
        }

    });

}




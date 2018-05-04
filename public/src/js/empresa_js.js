

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
                empresa_output += "<tr onclick='asignarEmpresa(\"" + empresa.razon_social_empresa + "\",\"" + empresa.id_empresa + "\")'>"
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
function asignarEmpresa(empresa, id_empresa) {
    $('#live_search_empresa').addClass('hidden');
    $('#div_cliente').addClass('has-success');
    $('#f_id_empresa').val(id_empresa);
    $('#k_cliente').val(empresa);
    $('#span_empresa').html(empresa);

}




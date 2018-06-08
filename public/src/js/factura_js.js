
/**
 * -----------------------------------------------------------------------------
 * Submit a new empresa from factura an run callback to get
 * the new empresa created
 * -----------------------------------------------------------------------------
 * @returns {undefined}
 */
function saveEmpresaFactura() {

    $.ajax({
        type: "POST",
        url: $("#formNewEmpresa").attr('action'),
        data: $("#formNewEmpresa").serialize(), // Adjuntar los campos del formulario enviado.
        success: function (data)
        {
            var json = $.parseJSON(data);
            // if is success
            if (json.success) {
                assignClient(json.cliente, json.id_empresa);
                $('#div_cliente_notfound').addClass('hidden');
                $('#myModel').modal('hide');
                // remove remote content from modal window
                $('#myModel').removeData('bs.modal');
            } else {
                alert('un error ocurrio');
            }

        },
        error: function (data) {
            alert('An Error occured, see the console.log');
            console.log('An error occurred.');
            console.log(data);
        }
    });

}

/**
 * -----------------------------------------------------------------------------
 * Submit a form via ajax.
 * -----------------------------------------------------------------------------
 * @param {string} form
 * @param {string} callback
 * @returns {undefined}
 */
function submitAjaxForm(form, callback) {

// if callback is undefined
    if (typeof callback === 'undefined') {
        callback = '';
    }
    
    // if form is undefined, the formKerana is default
    form = (typeof form === 'undefined') ? 'formKerana' : form;
    
    var form_to_submit = $("#" + form);

    $.ajax({
        type: "POST",
        url: form_to_submit.attr('action'),
        data: form_to_submit.serialize(), // Adjuntar los campos del formulario enviado.
        success: function (data)
        {
            console.log('Submission was successful.');
            console.log(data);
            if (callback !== '') {
                callback(data);
            }

        },
        error: function (data) {
            alert('An Error occured, see the console.log');
            console.log('An error occurred.');
            console.log(data);
        }
    });
}


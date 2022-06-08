function modify(){
    document.getElementById('modifica').style.display = 'none';
    document.getElementById('conferma').style.display = 'inline';
    $("#inputnome").attr("readonly", false);
    $("#inputcognome").attr("readonly", false);
    $("#inputnascita").attr("readonly", false);
    $("#inputsesso").attr("disabled", false);
    $("#inputusername").attr("readonly", false);
    $("#inputpassword").attr("readonly", false);
    $("#password-confirm").attr("readonly", false);

}
function setup(){
    document.getElementById('conferma').style.display = 'none';
}
function getErrorHtml(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errors">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}

function doFormValidation(actionUrl, formId) {
    var form = new FormData(document.getElementById(formId));
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMsgs[id]));
                });
            }
        },
        success: function () {
            alert("Le modifiche sono state salvate correttamente");
            document.getElementById('modifica').style.display = 'inline';
            document.getElementById('conferma').style.display = 'none';
        },
        contentType: false,
        processData: false
    });
}
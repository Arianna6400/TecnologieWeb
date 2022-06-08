function modify(){
    document.getElementById('modifica').style.display = 'none';
    document.getElementById('elimina').style.display = 'none';
    document.getElementById('conferma').style.display = 'inline';
    $('.label').each(function(){
        $(this).hide();
       });
    $('.formall').each(function(){
        $(this).show();
       });
}

function setup(){
    document.getElementById('conferma').style.display = 'none';
    $('.label').each(function(){
        $(this).show();
       });
    $('.formall').each(function(){
        $(this).hide();
       });
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
        dataType:"json",
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
            document.getElementById('elimina').style.display = 'inline';
            document.getElementById('conferma').style.display = 'none';
            location.reload();
        },
        contentType: false,
        processData: false
    });
}
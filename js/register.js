// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {

        var validation = new validateRegister("regFirstname", "feedbackFirstname", "regLastname",
                                                "feedbackLastname", "regUser", "feedbackUser", "regMail", "feedbackMail",
                                                "regPassword", "feedbackPassword", 'regPasswordControl', 'feedbackPasswordControl',
                                                "submitPassword", "passwordWrapper", onRegisterValidationSuccess);
    }, false);
})();

function onRegisterValidationSuccess()
{
    let form = $("#register-form");
    let submitButton = form.find("button[type=submit]");
    submitButton.prop('disabled', true); //prevent sending form again till result is here
    $.ajax({
        'url': form.attr('action'),
        'method': form.attr('method'),
        'data': form.serialize(),
        'dataType': "json",
        'success': function (data) {
            submitButton.prop('disabled', false);
            if(data["result"] === false)
            {
                $("#registerServiceError").addClass("d-block");
            }
            else{
                window.location.href = "/registrationComplete";
            }
        }
    });
}
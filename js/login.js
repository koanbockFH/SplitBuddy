// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        let login = new Login("#login-form", (data) => {
            if(data["result"] === false)
            {
                $("#loginServiceError").addClass("d-block");
            }
            else{
                window.location.href = "/";
            }
        });
    }, false);
})();

function Login(formId, callbackOnSuccess){
    let form = $(formId);
    let submitButton = form.find("button[type=submit]");

    form.submit(function(e) {
        e.preventDefault();
        e.stopPropagation();

        if(this.checkValidity()){
            submitButton.prop('disabled', true); //prevent sending form again till result is here
            $.ajax({
                'url': form.attr('action'),
                'method': form.attr('method'),
                'data': form.serialize(),
                'dataType': "json",
                'success': function (data) {
                    submitButton.prop('disabled', false);
                    if(callbackOnSuccess && typeof callbackOnSuccess === "function"){
                        callbackOnSuccess(data);
                    }
                }
            });
        }
        this.classList.add('was-validated');
    });
}
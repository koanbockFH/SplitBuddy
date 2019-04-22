(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let form = document.getElementById('register-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            event.stopPropagation();

            form.checkValidity();
            form.classList.add('was-validated');

            var reg = new registration("#register-form");
        }, false);
    }, false);
})();

function registration(formId){
    let form = $(formId);

    let submitButton = form.find("button[type=submit]");

    submitButton.prop('disabled', true); //prevent sending form again till result is here

    $.ajax({
        'url': form.attr('action'),
        'method': form.attr('method'),
        'data': form.serialize(),
        'dataType': "json",
        'success': function () {
            submitButton.prop('disabled', false);
        }
    });
}
<?php

echo $this->header;

?>

    <h1>Anmelden</h1>
    <form class="needs-validation" novalidate id="login-form">

        <div class="form-row justify-content-center">

            <div class="col-5 col-md-4 mb-3 ">
                <label for="user" class="d-none d-md-block">Benutzername oder E-Mail</label>
                <input type="text" class="form-control" id="user" placeholder="Username oder E-Mail" required>
                <div class="invalid-feedback">Bitte geben Sie einen Usernamen ein</div>
            </div>

            <div class="col-5 col-md-4 mb-3">
                <label for="password" class="d-none d-md-block">Passwort</label>
                <input type="password" class="form-control" id="password" placeholder="Nachname" required>
                <div class="invalid-feedback">Bitte geben Sie ein Passwort ein</div>
            </div>

        </div>


        <div class="form-row justify-content-center">
            <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>
        </div>

        <div class="form-row justify-content-center">
            <button type="submit" class="btn" id="submitPassword" value="Absenden">Anmelden</button>
        </div>

    </form>



    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');

                        event.preventDefault();
                        event.stopPropagation();
                    }, false);
                });
            }, false);
        })();
    </script>



<?php

echo $this->footer;

?>
<?php

echo $this->header;

?>
    <h1>Registrieren</h1>
    <form class="needs-validation" novalidate id="login-form">
        <div class="form-row justify-content-center">
            <div class="col-5 col-md-4 mb-3 ">
                <label for="regFirstname" class="d-none d-md-block">Vorname*</label>
                <input type="text" class="form-control" id="regFirstname" placeholder="Vorname" required>
                <label id="feedbackFirstname" class="feedback"></label>
            </div>
            <div class="col-5 col-md-4 mb-3">
                <label for="regLastname" class="d-none d-md-block">Nachname*</label>
                <input type="text" class="form-control" id="regLastname" placeholder="Nachname" required>
                <label id="feedbackLastname" class="feedback"></label>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="col-5 col-md-4 mb-3 ">
                <label for="regUser" class="d-none d-md-block">Benutzername*</label>
                <input type="text" class="form-control" id="regUser" placeholder="Benutzername" required>
                <label id="feedbackUser" class="feedback"></label>
            </div>
            <div class="col-5 col-md-4 mb-3">
                <label for="regMail" class="d-none d-md-block">E-Mail*</label>
                <input type="email" class="form-control" id="regMail" placeholder="E-Mail" required>
                <label id="feedbackMail" class="feedback"></label>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="col-5 col-md-4 mb-3 ">
                <label for="regPassword" class="d-none d-md-block">Passwort*</label>
                <input type="password" class="form-control" id="regPassword" placeholder="Passwort" required>
                <div class="passwordStrength error" id="passwordWrapper">
                    <div class="strengthIndicator"></div>
                    <!-- feedback balken -->
                    <div id="feedbackPassword" class="error feedback"></div>
                    <div class="weak feedback">schwaches Passwort</div>
                    <div class="moderate feedback">mittleres Passwort</div>
                    <div class="strong feedback">starkes Passwort</div>
                </div>
            </div>
            <div class="col-5 col-md-4 mb-3">
                <label for="regPasswordControl" class="d-none d-md-block">Passwort überprüfen</label>
                <input type="password" class="form-control" id="regPasswordControl" placeholder="Passwort überprüfen" required>
                <label id="feedbackPasswordControl" class="feedback"></label>
            </div>
        </div>
        <button type="submit" class="btn" id="submitPassword" value="Absenden">Jetzt Registrieren</button>
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
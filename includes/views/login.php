<?php

echo $this->header;

?>


    <form class="needs-validation" novalidate>
        
        <!-- loginfelder -->
        <div class="row">
            <div class="col-sm-2"></div>

            <div class="col-sm-8">
                <div class="loginForm">
                    <h1>Anmelden</h1>

                    <div>
                        <label for="user">Benutzername oder E-Mail</label>
                        <input type="text" class="form-control" id="user"  name="user" required>
                        <div class="invalid-feedback">Bitte geben Sie einen Usernamen ein</div>
                    </div>

                    <div>
                        <label for="password">Passwort</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">Bitte geben Sie ein Passwort ein</div>
                    </div>

                    <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>

                    <button type="submit" class="btn" id="submitPassword" value="Absenden">Anmelden</button>
                </div>
            </div>


            <div class="col-sm-2">

            </div>
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
                    }, false);
                });
            }, false);
        })();
    </script>




<?php

echo $this->footer;

?>
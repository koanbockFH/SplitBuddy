<?php

echo $this->header;

?>

<h1>Anmelden</h1>
    <form class="needs-validation" novalidate id="login-form">

        <div class="form-row justify-content-center">

            <div class="col-5 col-md-4 mb-3 ">
                <label for="user" class="d-none d-md-block">Benutzername oder E-Mail</label>
                <input type="text" class="form-control" id="user" placeholder="Username oder E-Mail" required>
                <label id="userFeedback" class="feedback"></label>
            </div>

            <div class="col-5 col-md-4 mb-3">
                <label for="password" class="d-none d-md-block">Passwort</label>
                <input type="password" class="form-control" id="password" placeholder="Nachname" required>
                <label id="passwordFeedback" class="feedback"></label>
            </div>

        </div>


        <div class="form-row justify-content-center">
        <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>
        </div>

        <div class="form-row justify-content-center">
        <button type="submit" class="btn" id="submitPassword" value="Absenden">Anmelden</button>
        </div>

    </form>



   <!-- <div class="container">
         loginfelder
        <div class="row">
            <div class="col-sm-2">

            </div>

            <div class="col-sm-8">
                <div class="loginForm">
                    <h1>Anmelden</h1>

                    <div>
                        <label for="user">Benutzername oder E-Mail</label>
                        <input type="text" class="form-control" id="user"  name="user">
                        <label id="userFeedback" class="feedback"></label>
                    </div>

                    <div>
                        <label for="password">Passwort</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <label id="passwordFeedback" class="feedback"></label>
                    </div>

                    <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>

                    <button type="submit" class="btn" id="submitPassword" value="Absenden">Anmelden</button>
                </div>
            </div>


            <div class="col-sm-2">

            </div>
        </div>
    </div> -->


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
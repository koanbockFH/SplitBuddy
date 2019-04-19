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

                    <div id="feedbackPassword" class="error feedback"></div>
                    <div id="schwach" class="weak feedback">schwaches Passwort</div>
                    <div id="mittel"class="moderate feedback">mittleres Passwort</div>
                    <div id="stark"class="strong feedback">starkes Passwort</div>


                </div>
            </div>

            <div class="col-5 col-md-4 mb-3">
                <label for="regPasswordControl" class="d-none d-md-block">Passwort überprüfen*</label>
                <input type="password" class="form-control" id="regPasswordControl" placeholder="Passwort überprüfen" required>
                <label id="feedbackPasswordControl" class="feedback"></label>
            </div>

        </div>


        <button type="submit" class="btn" id="submitPassword" value="Absenden">Jetzt Registrieren</button>
    </form>


<?php

echo $this->footer;

?>
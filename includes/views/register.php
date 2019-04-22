<?php

echo $this->header;

?>
    <h1>Registrieren</h1>
    <form action="register" method="post" class="needs-validation" novalidate id="register-form">
        <div class="form-row justify-content-center">
            <div class="col-5 col-md-4 mb-3 ">
                <label for="regFirstname" class="d-none d-md-block">Vorname*</label>
                <input type="text" class="form-control" id="regFirstname" placeholder="Vorname" required name="regFirstname">
                <label id="feedbackFirstname" class="feedback"></label>
            </div>
            <div class="col-5 col-md-4 mb-3">
                <label for="regLastname" class="d-none d-md-block">Nachname*</label>
                <input type="text" class="form-control" id="regLastname" placeholder="Nachname" required name="regLastname">
                <label id="feedbackLastname" class="feedback"></label>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="col-5 col-md-4 mb-3 ">
                <label for="regUser" class="d-none d-md-block">Benutzername*</label>
                <input type="text" class="form-control" id="regUser" placeholder="Benutzername" required name="regUser">
                <label id="feedbackUser" class="feedback"></label>
            </div>
            <div class="col-5 col-md-4 mb-3">
                <label for="regMail" class="d-none d-md-block">E-Mail*</label>
                <input type="email" class="form-control" id="regMail" placeholder="E-Mail" required name="regMail">
                <label id="feedbackMail" class="feedback"></label>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="col-5 col-md-4 mb-3 ">
                <label for="regPassword" class="d-none d-md-block">Passwort*</label>
                <input type="password" class="form-control" id="regPassword" placeholder="Passwort" required name="regPassword">
                <div class="passwordStrength error" id="passwordWrapper">
                    <div class="strengthIndicator"></div>
                    <!-- feedback balken -->
                    <div id="feedbackPassword" class="error feedback"></div>
                    <div class="weak">schwaches Passwort</div>
                    <div class="moderate">mittleres Passwort</div>
                    <div class="strong">starkes Passwort</div>
                </div>
            </div>
            <div class="col-5 col-md-4 mb-3">
                <label for="regPasswordControl" class="d-none d-md-block">Passwort überprüfen*</label>
                <input type="password" class="form-control" id="regPasswordControl" placeholder="Passwort überprüfen" required name="regPasswordControl">
                <label id="feedbackPasswordControl" class="feedback"></label>
            </div>

        </div>
        <div class="form-row justify-content-center">
            <button type="submit" class="btn" id="submitPassword" value="Absenden">Jetzt Registrieren</button>
        </div>
    </form>
<?php

echo $this->footer;

?>
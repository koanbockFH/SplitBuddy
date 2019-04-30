<?php

echo $this->header;

?>
    <div class="container mb-5 mt-5">
        <div class="sb-whiteBackground">
        <h1 class="display-1">Registrieren</h1>
            <form action="register" method="post" novalidate id="register-form">
                <div class="form-row justify-content-center">
                    <div class="col-10 col-md-4 mb-md-3 mb-2">
                        <label for="regFirstname" class="d-none d-md-block">Vorname</label>
                        <input type="text" class="form-control" id="regFirstname" placeholder="Vorname" required name="regFirstname">
                        <div id="feedbackFirstname" class="feedback"></div>
                    </div>
                    <div class="col-10 col-md-4 mb-md-3 mb-2">
                        <label for="regLastname" class="d-none d-md-block">Nachname</label>
                        <input type="text" class="form-control" id="regLastname" placeholder="Nachname" required name="regLastname">
                        <div id="feedbackLastname" class="feedback"></div>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="col-10 col-md-4 mb-md-3 mb-2">
                        <label for="regUser" class="d-none d-md-block">Benutzername</label>
                        <input type="text" class="form-control" id="regUser" placeholder="Benutzername" required name="regUser">
                        <div id="feedbackUser" class="feedback"></div>
                    </div>
                    <div class="col-10 col-md-4 mb-md-3 mb-2">
                        <label for="regMail" class="d-none d-md-block">E-Mail</label>
                        <input type="email" class="form-control" id="regMail" placeholder="E-Mail" required name="regMail">
                        <div id="feedbackMail" class="feedback"></div>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="col-10 col-md-4 mb-md-3 mb-2">
                        <label for="regPassword" class="d-none d-md-block">Passwort</label>
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
                    <div class="col-10 col-md-4 mb-md-3 mb-2">
                        <label for="regPasswordControl" class="d-none d-md-block">Passwort überprüfen</label>
                        <input type="password" class="form-control" id="regPasswordControl" placeholder="Passwort überprüfen" required name="regPasswordControl">
                        <div id="feedbackPasswordControl" class="feedback"></div>
                    </div>

                </div>
                <div class="form-row justify-content-center">
                    <button type="submit" class="btn btn-primary" id="submitPassword" value="Absenden">Registrieren</button>
                    <label class="invalid-feedback text-center" id="registerServiceError">Username ist bereits vergeben, bitte wählen Sie einen anderen Usernamen.</label>
                </div>
            </form>
        </div>
    </div>
<?php

echo $this->footer;

?>
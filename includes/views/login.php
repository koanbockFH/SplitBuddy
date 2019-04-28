<?php

echo $this->header;

?>
    <h1>Anmelden</h1>
    <form method="post" action="login" novalidate id="login-form">

        <div class="form-row justify-content-center">

            <div class="col-8 col-md-8 mb-3 ">
                <label for="user" class="d-none d-md-block">Benutzername oder E-Mail</label>
                <input type="text" class="form-control" id="user" name="username" placeholder="Username oder E-Mail" required>
                <div class="invalid-feedback">Bitte geben Sie einen Usernamen ein</div>
            </div>

            <div class="col-8 col-md-8 mb-3">
                <label for="password" class="d-none d-md-block">Passwort</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Passwort" required>
                <div class="invalid-feedback">Bitte geben Sie ein Passwort ein</div>
            </div>

        </div>


        <div class="form-row justify-content-center">
            <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>
        </div>

        <div class="form-row justify-content-center">
            <button type="submit" class="btn" id="submitPassword">Anmelden</button>
            <label class="invalid-feedback text-center" id="loginServiceError">Username oder Passwort nicht korrekt.</label>
        </div>
    </form>
<?php

echo $this->footer;

?>
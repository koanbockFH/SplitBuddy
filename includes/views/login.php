<?php

echo $this->header;

?>
<div class="loginForm">
    <h1>Anmelden</h1>

        <div class="userField">
            <label for="user">Benutzername oder E-Mail</label>
            <input class="form-control" id="user"  name="user">
            <label id="userFeedback"></label>
        </div>

        <div class="passwordField">
            <label for="password">Passwort</label>
            <input type="password" class="form-control" id="password" name="password">
            <label id="passwordFeedback"></label>
        </div>

        <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>

        <button type="submit" class="btn" id="submitPassword" value="Absenden">Anmelden</button>
</div>
<?php

echo $this->footer;

?>
<?php

echo $this->header;

?>

    <div class="loginForm">
        <h1>Registrieren</h1>

        <div class="small">
            <label for="user">Vorname*</label><br>
            <input type="text"  id="reg-firstname"  name="vorname">
            <label id="feedbackFirstname" class="feedback"></label>
        </div>

        <div class="small">
            <label for="user">Nachname*</label><br>
            <input type="text" id="reg-lastname" name="nachname">
            <label id="feedbackLastname" class="feedback"></label>
        </div>

        <div class="small">
            <label for="user">Benutzername*</label><br>
            <input type="text" id="reg-user"  name="user">
            <label id="feedbackRegUser" class="feedback"></label>
        </div>

        <div class="small">
            <label for="user">E-Mail*</label><br>
            <input type="text"  id="reg-mail" name="mail">
            <label id="feedbackMail" class="feedback"></label>
        </div>

        <div class="small">
            <label for="password">Passwort</label><br>
            <input type="password"  id="reg-password" name="password">
            <label id="feedbackRegPassword" class="feedback"></label>
        </div>

        <div class="passwordStrength small">

            <label>Passwortstärke</label>
            <div class="placeholder"></div>

        </div>

        <div class="big">
            <label for="password">Passwort überprüfen</label><br>
            <input type="password"  id="reg-password" name="password">
            <label id="feedbackRegPasswordControl" class="feedback"></label>
        </div>


        <button type="submit" class="btn" id="submitPassword" value="Absenden">Jetzt Registrieren</button>
    </div>



<?php

echo $this->footer;

?>
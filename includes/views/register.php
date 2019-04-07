<?php

echo $this->header;

?>

    <div class="loginForm">
        <h1>Registrieren</h1>

        <div class="small">
            <label for="user">Vorname*</label><br>
            <input type="text"  id="regFirstname"  name="vorname">
            <label id="feedbackFirstname" class="feedback"></label>
        </div>

        <div class="small">
            <label for="user">Nachname*</label><br>
            <input type="text" id="regLastname" name="nachname">
            <label id="feedbackLastname" class="feedback"></label>
        </div>

        <div class="small">
            <label for="user">Benutzername*</label><br>
            <input type="text" id="regUser"  name="user">
            <label id="feedbackUser" class="feedback"></label>
        </div>

        <div class="small">
            <label for="user">E-Mail*</label><br>
            <input type="text"  id="regMail" name="mail">
            <label id="feedbackMail" class="feedback"></label>
        </div>

        <div class="small">
            <label for="password">Passwort</label><br>
            <input type="password"  id="regPassword" name="password">
            <label id="feedbackPassword" class="feedback"></label>
        </div>

        <div class="small">
            <label for="password">Passwort überprüfen</label><br>
            <input type="password"  id="regPasswordControl" name="password">
            <label id="feedbackPasswordControl" class="feedback"></label>
        </div>

        <div class="passwordStrength big" id="passwordWrapper">
            <div class="strengthIndicator"></div>
            <div class="weak pwFeedback">schwaches Passwort</div>
            <div class="moderate pwFeedback">mittleres Passwort</div>
            <div class="strong pwFeedback">starkes Passwort</div>

        </div>



        <button type="submit" class="btn" id="submitPassword" value="Absenden">Jetzt Registrieren</button>
    </div>



<?php

echo $this->footer;

?>
<?php

echo $this->header;

?>

    <div class="regForm">
        <h1>Registrieren</h1>

        <div>
            <label for="user">Benutzername oder E-Mail</label>
            <input type="text" class="form-control" id="user"  name="user">
            <label id="userFeedback"></label>
        </div>

        <div>
            <label for="password">Passwort</label>
            <input type="password" class="form-control" id="password" name="password">
            <label id="passwordFeedback"></label>
        </div>

        <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>

        <button type="submit" class="btn" id="submitPassword" value="Absenden">Anmelden</button>
    </div>

        <form>


            <div class="form-group">
                <label for="pwd">Passwort</label>
                <input type="password" class="form-control" id="pwd" placeholder="Passwort eingeben" name="pwd">
            </div>

            <div class="form-group">
                <label for="pwd-control">Passwort überprüfe </label>
                <input type="password" class="form-control" id="pwd-control" placeholder="Passwort eingeben" name="pwd">
            </div>

            <p>Noch kein Konto? Jetzt <a href="register">HIER</a> registrieren</p>

            <button type="submit" class="btn btn-default">Anmelden</button>
        </form>
    </div>


<?php

echo $this->footer;

?>